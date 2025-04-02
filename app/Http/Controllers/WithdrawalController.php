<?php

namespace App\Http\Controllers;

use App\Mail\WithdrawalNotice;
use App\Models\CryptoAsset;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class WithdrawalController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $data = Withdrawal::where('user_id', \auth()->id())->latest()->get();
        $assets = CryptoAsset::where('user_id', \auth()->id())->get();
        return view('dashboard.withdraw.index', compact('data', 'user', 'assets'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:0',
            'wallet' => 'required|string',
            'address' => 'required|string',
            'account_type' => 'required|string',
        ]);

        $user = Auth::user();
        $amount = $request->amount;

        // Check if the withdrawal is from 'Main' balance
        if ($request->account_type == 'Main' && $amount > $user->balance) {
            return redirect()->back()->with('error', 'Insufficient Main Balance To Withdraw');
        }

        // Check if the withdrawal is from 'Profit' balance
        if ($request->account_type != 'Main' && $amount > $user->profit) {
            return redirect()->back()->with('error', 'Insufficient Profit Balance To Withdraw');
        }

        $validatedData['user_id'] = auth()->id();
        $data = Withdrawal::create($validatedData);
        $user->save();
        Mail::to($user)->send(new WithdrawalNotice($data));

        return redirect()->route('user.withdraw.show', $data->id)->with('success', 'Withdrawal Request Submitted');
    }


    public function show($id)
    {
        $withdraw = Withdrawal::findOrFail($id);
        return view('dashboard.withdraw.show', compact('withdraw'));
    }


}
