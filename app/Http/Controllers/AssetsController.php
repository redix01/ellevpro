<?php

namespace App\Http\Controllers;

use App\Models\CryptoAsset;
use App\Models\Deposit;
use App\Models\Withdrawal;
use App\Services\CryptoService;
use Illuminate\Http\Request;

class AssetsController extends Controller
{
    public function index()
    {
        $this->syncCryptoAssets();
       $assets = CryptoAsset::where('user_id', auth()->id())->get();
       $balance = CryptoAsset::where('user_id', auth()->id())->sum('balance');
       $deposits = Deposit::where('user_id', auth()->id())->where('status', 1)->sum('amount');
       $withdrawal = Withdrawal::where('user_id', auth()->id())->where('status', 1)->sum('amount');
       return view('dashboard.crypto-asset.index', compact('assets', 'balance', 'deposits', 'withdrawal'));
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

    public function syncCryptoAssetsTest()
    {
        try {
            $cryptoData = $this->cryptoService->getTopCryptoAssets();
            return response()->json($cryptoData);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



}
