<?php

namespace App\Http\Controllers;

use App\Models\CryptoAsset;
use App\Models\Stake;
use App\Models\StakingPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StakeController extends Controller
{
    public function index()
    {
        $data = StakingPlan::latest()->get();
        $traded = Stake::where('user_id', auth()->id())->latest()->get();

        $allowedAssetIds = StakingPlan::pluck('stake_token')->toArray();

        $assets = CryptoAsset::where('user_id', auth()->id())
            ->whereIn('name', $allowedAssetIds)
            ->latest()
            ->get();

        return view('dashboard.crypto.staking', compact('data', 'traded', 'assets', 'allowedAssetIds'));
    }


    public function store(Request $request)
    {
        $planId = $request->get('plan_id');
        $amount = $request->get('amount');

        $plan = StakingPlan::findOrFail($planId);
        $asset = CryptoAsset::where('user_id', auth()->id())->where('name', $plan->stake_token)->first();

        // Check if the requested amount is within the plan limits
        if ($amount < $plan->min_amount || $amount > $plan->max_amount) {
            return redirect()->back()->with('error', 'The amount must be within the staking plan limits.');
        }

        // Check if the user's asset balance is sufficient
        if ($asset->balance < $amount) {
            return redirect()->back()->with('error', 'Insufficient balance for this staking token.');
        }

        try {

            $user = Auth::user();
            // Convert the staked amount to USD
            $usdValue = $user->convertToUSD($asset->name, $amount);

            $asset->balance -= $amount;
            $asset->save();

            Stake::create([
                'user_id' => auth()->id(),
                'staking_plan_id' => $planId,
                'amount' => $amount,
                'status' => 1,
            ]);

            // Update user's accumulated balance in USD
            $user->acum_balance += $usdValue;
            $user->save();

            return redirect()->back()->with('success', 'Staking successful!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to process staking: ' . $e->getMessage());
        }
    }


}
