<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CryptoAsset;
use App\Models\PaymentMethod;
use App\Models\StakingPlan;
use Illuminate\Http\Request;

class StakingPlanController extends Controller
{
    public function index()
    {
        $data = StakingPlan::all();
        $assets = StakingPlan::getCryptoWallets();
        return view('admin.crud.staking-plans', compact('data', 'assets'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'min_amount' => 'required|numeric|min:0',
            'max_amount' => 'required|numeric|min:0|gt:min_amount',
            'stake_token' => 'required|string',
            'roi' => 'required|numeric',
            'lock_period_days' => 'required|integer|min:0',
        ]);

        StakingPlan::create([
            'name' => $validatedData['name'],
            'min_amount' => $validatedData['min_amount'],
            'max_amount' => $validatedData['max_amount'],
            'stake_token' => $validatedData['stake_token'],
            'roi' => $validatedData['roi'],
            'lock_period_days' => $validatedData['lock_period_days'],
        ]);
        return back()->with('success', 'Staking plan created successfully.');
    }


    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'min_amount' => 'nullable|numeric|min:0',
            'max_amount' => 'nullable|numeric|min:0|gt:min_amount',
            'stake_token' => 'nullable|string',
            'roi' => 'nullable|numeric',
            'lock_period_days' => 'nullable|integer|min:0',
        ]);
        $stakingPlan = StakingPlan::find($id);
        $stakingPlan->update($validatedData);
        return back()->with('success', 'Staking plan updated successfully.');
    }

    public function destroy($id)
    {
        $data = StakingPlan::findOrFail($id);
        $data->delete();
        return back()->with('success', 'Staking plan deleted successfully.');
    }


}
