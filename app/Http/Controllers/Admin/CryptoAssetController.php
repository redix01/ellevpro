<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AssetsController;
use App\Http\Controllers\Controller;
use App\Models\CryptoAsset;
use App\Services\CryptoService;
use Illuminate\Http\Request;

class CryptoAssetController extends Controller
{


    public function index()
    {
        $this->syncCryptoAssets();
        $data = CryptoAsset::latest()->get();
        return view('admin.asset.index', compact('data'));
    }

     public function updateAsset(Request $request, $id)
    {
         $validated = $request->validate([
             'balance' => 'nullable|numeric|min:0',
        ]);

        $asset = CryptoAsset::findOrFail($id);
        $asset->update(['balance' => $request->amount]);
        return redirect()->back()->with('success', 'Wallet Funded successfully');
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


}
