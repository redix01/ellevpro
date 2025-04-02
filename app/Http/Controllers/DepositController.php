<?php

namespace App\Http\Controllers;

use App\Mail\AdminDepositAlert;
use App\Models\Deposit;
use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DepositController extends Controller
{
    public function index()
    {
        $wallets = PaymentMethod::all();
        $deposits = Deposit::whereUserId(\auth()->id())->latest()->get();
        $user = Auth::user();
        return view('dashboard.deposit.index', compact('wallets', 'deposits', 'user'));
    }

    public function store(Request $request)
    {
        $deposit = new Deposit();
        $deposit->user_id = Auth::id();
        $deposit->payment_method_id = $request->payment_method_id;
        $deposit->amount = $request->amount;
        $deposit->save();
        return redirect()->route('user.deposit.payment', $deposit->id);
    }

    public function payment($id)
    {
        $deposit = Deposit::findOrFail($id);
        return view('dashboard.deposit.payment', compact('deposit'));
    }

    public function confirmPayment(Request $request, $id)
    {
        $request->validate([
            'payment_proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $deposit = Deposit::findOrFail($id);
        if ($request->hasFile('payment_proof')) {
            $filePath = $request->file('payment_proof')->store('files', 'public');
            $deposit->payment_proof = $filePath;
            $deposit->save();
        }
        $admin = User::where('role', 'admin')->first();
        Mail::to($admin)->send(new AdminDepositAlert($deposit));
        return redirect()->back()->with('success', 'Deposit Confirmed, Awaiting Approval...');
    }



}
