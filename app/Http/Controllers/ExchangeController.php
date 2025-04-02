<?php

namespace App\Http\Controllers;

use App\Models\CryptoAsset;
use App\Models\CryptoExchange;
use App\Models\PaymentMethod;
use App\Services\CryptoService;
use Illuminate\Http\Request;

class ExchangeController extends Controller
{
    public function index()
    {
        $this->syncCryptoAssets();
        $assets = CryptoAsset::where('user_id', auth()->id())->get();
        $deposits = CryptoExchange::where('user_id', auth()->id())->where('type', 'deposit')->latest()->get();
        $withdrawal = CryptoExchange::where('user_id', auth()->id())->where('type', 'withdrawal')->latest()->get();
        $prices = $assets->pluck('price', 'id');
        return view('dashboard.crypto.exchange', compact('assets', 'deposits', 'prices', 'withdrawal'));
    }

    public function store(Request $request)
    {
        $data  = new CryptoExchange();
        $data->crypto_asset_id = $request->crypto_asset_id;
        $data->user_id = auth()->id();
        $data->amount = $request->amount;
        $data->type = "deposit";
        $data->save();
        return redirect()->back()->with('success', "Deposit Request Sent Successfully, Awaiting Approval...");
    }

    public function withdrawal(Request $request)
    {
       $asset = CryptoAsset::findOrFail($request->crypto_asset_id);
        if ($request->amount > $asset->balance) {
            return redirect()->back()->with('error', 'Insufficient Balance for '.$asset->name.' Wallet');
        }
        $data  = new CryptoExchange();
        $data->crypto_asset_id = $request->crypto_asset_id;
        $data->user_id = auth()->id();
        $data->amount = $request->amount;
        $data->type = "withdrawal";
        $data->withdrawal_wallet = $request->withdrawal_wallet;
        $data->save();
        return redirect()->back()->with('success', "Withdrawal Request Sent Successfully, Awaiting Approval...");
    }


    protected $cryptoService;
    public function __construct(CryptoService $cryptoService)
    {
        $this->cryptoService = $cryptoService;
    }
    public function syncCryptoAssets()
    {
        $cryptoService = new CryptoService();
        $cryptoService->syncCryptoAssets(auth()->id());
        return response()->json(['message' => 'Crypto assets synced successfully.']);
    }
    public function userSyncCryptoAssets($id)
    {
        $cryptoService = new CryptoService();
        $cryptoService->syncCryptoAssets($id);
        return redirect()->back()->with('success', "Coin fetch successfully");
    }


}
