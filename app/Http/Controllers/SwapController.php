<?php

namespace App\Http\Controllers;

use App\Models\CryptoAsset;
use App\Models\CryptoSwap;
use App\Services\CryptoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SwapController extends Controller
{
    public function index()
    {
        $this->syncCryptoAssets();
        $assets = CryptoAsset::where('user_id', auth()->id())->get();
        $data = CryptoSwap::all();
        return view('dashboard.crypto.swap', compact('assets', 'data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'swap_from' => 'required|uuid|exists:crypto_assets,id',
            'swap_to' => 'required|uuid|exists:crypto_assets,id',
            'amount' => 'required|numeric|min:0.000001',
        ]);

        try {
        $swapFromId = $request->swap_from;
        $swapToId = $request->swap_to;
        $amount = $request->amount;

        DB::transaction(function () use ($swapFromId, $swapToId, $amount) {
            $swapFrom = CryptoAsset::findOrFail($swapFromId);
            $swapTo = CryptoAsset::findOrFail($swapToId);

            if ($swapFromId === $swapToId) {
                throw new \Exception('Cannot swap the same token.');
            }

            // Check if balance is sufficient
            if ($swapFrom->balance < $amount) {
                throw new \Exception('Insufficient balance to complete the swap.');
            }

            // Calculate equivalent amount for "to" asset
            $equivalentAmount = $amount * ($swapFrom->price / $swapTo->price);

            // Adjust balances without altering the value of the amount
            $swapFrom->update(['balance' => $swapFrom->balance - $amount]);
            $swapTo->update(['balance' => $swapTo->balance + $equivalentAmount]);

            // Log swap details in CryptoSwap
            CryptoSwap::create([
                'crypto_asset_id' => $swapFrom->id,
                'user_id' => Auth::id(),
                'swap_from' => $swapFrom->name,
                'swap_to' => $swapTo->name,
                'amount' => $amount,
                'status' => 1, // Success
            ]);
        });

        return redirect()->back()->with('success', 'Swap successfully completed.');
    } catch (\Exception $e) {
         return redirect()->back()->with('error', $e->getMessage());
        }
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
