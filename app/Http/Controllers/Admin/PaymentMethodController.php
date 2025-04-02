<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CryptoAsset;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PaymentMethod::all();
        $assets = PaymentMethod::getCryptoWallets();
        return view('admin.payment-method.index', compact('data', 'assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       $validated = $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'value' => 'nullable|string|max:255',
        ]);

        $slug = Str::slug($request->name);

        if (PaymentMethod::where('slug', $slug)->exists()) {
            return back()->withErrors(['name' => 'Wallet name already exists.']);
        }

        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('files', 'public');
        }

        $validated['slug'] = $slug;
        $validated['avatar'] = $avatarPath;
        PaymentMethod::create($validated);

        return back()->with('success', 'Record created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'value' => 'nullable|string|max:255',
        ]);

        $slug = Str::slug($request->name);

        // Check if the slug exists for any other record
        if (PaymentMethod::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            return back()->withErrors(['name' => 'Wallet name already exists.']);
        }

        $wallet = PaymentMethod::findOrFail($id);

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('files', 'public');
        } else {
            $validated['avatar'] = $wallet->avatar;
        }

        $validated['slug'] = $slug;
        $wallet->update($validated);

        return back()->with('success', 'Wallet updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wallet = PaymentMethod::findOrFail($id);
        $wallet->delete();
        return back()->with('success', 'Wallet deleted successfully!');
    }
}
