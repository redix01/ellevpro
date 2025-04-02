<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CryptoAsset;
use App\Models\CryptoExchange;
use Illuminate\Http\Request;

class CryptoTransactionsController extends Controller
{
    public function cryptoExchange()
    {
        $deposits = CryptoExchange::where('type', 'deposit')->get();
        $withdrawal = CryptoExchange::where('type', 'withdrawal')->get();
        return view('admin.crypto.exchange', compact('deposits', 'withdrawal'));
    }

    public function cryptoExchangeStore(Request $request, $id)
    {
        $asset = CryptoAsset::findOrFail($request->crypto_asset_id);
        $asset->balance += $request->amount;
        $asset->save();
        $data = CryptoExchange::findOrFail($id);
        $data->status = 1;
        $data->save();
        return redirect()->back()->with('success', 'Approved Successfully');
    }

    public function cryptoExchangeWithdraw(Request $request, $id)
    {
        $asset = CryptoAsset::findOrFail($request->crypto_asset_id);
        $asset->balance -= $request->amount;
        $asset->save();
        $data = CryptoExchange::findOrFail($id);
        $data->status = 1;
        $data->save();
        return redirect()->back()->with('success', 'Approved Successfully');
    }

}
