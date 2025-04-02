<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CryptoAsset;
use App\Models\CryptoSwap;
use App\Models\Stake;
use App\Models\Trade;
use App\Models\User;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function stakeHistory()
    {
        $data = Stake::all();
        return view('admin.history.stake-history', compact('data'));
    }


    public function stakingProfit(Request $request, $id)
    {
        $trade = Stake::findOrFail($id);
        $asset = CryptoAsset::where('user_id', $trade->user_id)->where('id', $trade->crypto_asset_id)->first();
        if ($request->type == 'profit')
        {
            $trade->profit += $request->amount;
            $trade->save();
            $asset->balance += $request->amount;
            $asset->save();
            return redirect()->back()->with('success', 'Profit Added Successfully');
        }
        $trade = Stake::findOrFail($id);
        $trade->profit -= $request->amount;
        $trade->save();

        $asset->balance -= $request->amount;
        $asset->save();
        return redirect()->back()->with('success', 'Loss Trade Added Successfully');

    }

    public function endStaking($id)
    {
        $data = Stake::findOrFail($id);
        $data->status = 2;
        $data->save();
        return redirect()->back()->with('success', 'Ended Successfully');
    }

    public function swapHistory()
    {
        $data = CryptoSwap::all();
        return view('admin.history.swap-history', compact('data'));
    }


}
