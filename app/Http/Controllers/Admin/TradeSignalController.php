<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BuySignal;
use App\Models\TradeSignal;
use Illuminate\Http\Request;

class TradeSignalController extends Controller
{
    public function index()
    {
        $data = TradeSignal::all();
        return view('admin.crud.signal-plan', compact('data'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('files', 'public');
            $validatedData['avatar'] = $avatarPath;
        }

        $data  = new TradeSignal();
        $data->name = $request->name;
        $data->avatar = $validatedData['avatar'] ?? null;
        $data->amount = $request->amount;
        $data->percent = $request->percent;
        $data->leverage = $request->leverage;
        $data->save();
        return redirect()->back()->with('success', "Saved successfully");
    }

//    public function show($id)
//    {
//
//    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string',
            'amount' => 'nullable|numeric',
            'percent' => 'nullable|numeric',
            'leverage' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('files', 'public');
            $validatedData['avatar'] = $avatarPath;
        }

        $data = TradeSignal::findOrFail($id);
        $data->update($validatedData);
        return redirect()->back()->with('success', "Updated successfully");
    }

    public function destroy($id)
    {
        $data = TradeSignal::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', "Deleted successfully");
    }
}
