<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ApproveDeposit;
use App\Mail\ApproveWithdrawal;
use App\Models\CopiedTrade;
use App\Models\CopyTrader;
use App\Models\CryptoAsset;
use App\Models\Deposit;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    public function deposits()
    {
        $deposits = Deposit::all();
        return view('admin.transaction.deposits', compact('deposits'));
    }

    public function approveDeposit(Request $request, $id)
    {
        $deposit = Deposit::findOrFail($id);
        $deposit->status = 1;
        $deposit->save();
        $user = User::findOrFail($deposit->user_id);
        $user->balance += $deposit->amount;
        $user->save();
        Mail::to($user->email)->send(new ApproveDeposit($deposit));
        return redirect()->back()->with('success', 'Deposit Approved Successfully');
    }

    public function withdraws()
    {
        $withdraws = Withdrawal::latest()->get();
        return view('admin.transaction.withdraws', compact('withdraws'));
    }

    public function approveWithdraw(Request $request, $id)
    {
        $withdraw = Withdrawal::findOrFail($id);
        $user = User::findOrFail($withdraw->user_id);

        // Check if the action is "decline"
        if ($request->action === 'decline') {
            $withdraw->status = 2; // Set status to declined
            $withdraw->save();
            return redirect()->back()->with('error', 'Withdrawal Declined');
        }

        // Validate sufficient funds based on account type
        if ($withdraw->account_type == 'Main' && $withdraw->amount > $user->balance) {
            return redirect()->back()->with('error', 'Insufficient Balance for this User');
        }

        if ($withdraw->account_type != 'Main' && $withdraw->amount > $user->profit) {
            return redirect()->back()->with('error', 'Insufficient Profit for this User');
        }

        // Deduct the amount from the correct balance type
        if ($withdraw->account_type == 'Main') {
            $user->balance -= $withdraw->amount;
        } else {
            $user->profit -= $withdraw->amount;
        }

        // Approve withdrawal
        $withdraw->status = 1;
        $withdraw->save();
        $user->save();

        Mail::to($user->email)->send(new ApproveWithdrawal($withdraw));

        return redirect()->back()->with('success', 'Withdrawal Approved');
    }

//    public function approveWithdraw(Request $request, $id)
//    {
//        $withdraw = Withdrawal::findOrFail($id);
//        $asset = CryptoAsset::where('user_id', $withdraw->user_id)->findOrFail($withdraw->crypto_asset_id);
//        if ($withdraw->amount > $asset->balance)
//        {
//            return redirect()->back()->with('error', 'Insufficient Balance For this User');
//        }
//        $asset->balance -= $withdraw->amount;
//        $asset->save();
//        $withdraw->status = 1;
//        $withdraw->usd_amount += $request['amount'];
//        $withdraw->save();
//        $user = User::findOrFail($withdraw->user_id);
//        $user->balance -= $withdraw->amount;
//        $user->save();
//        Mail::to($user->email)->send(new ApproveWithdrawal($withdraw));
//        return redirect()->back()->with('success', 'Withdraw Approved');
//    }

    public function copiedTrade()
    {
        $trades = CopiedTrade::all();
        return view('admin.transaction.copied-trades', compact('trades'));
    }

    public function stopTrade($id)
    {
        $trade = CopiedTrade::findOrFail($id);
        $trade->status = 2;
        $trade->save();
        return redirect()->back()->with('success', 'Copied Trade Ended');
    }

}
