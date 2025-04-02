<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trade;
use App\Models\User;
use Illuminate\Http\Request;

class TradeController extends Controller
{
    public function tradeHistory()
    {
        $trades = Trade::latest()->get();
        return view('admin.history.trade-history', compact('trades'));
    }
    public function closeTrade($id)
    {
        $trade = Trade::find($id);
        $trade->status = 2;
        $trade->save();
        $user = User::find($trade->user_id);
        $user->balance += $trade->amount;
        $user->save();
        return redirect()->back()->with('success', 'Trade closed Successfully');
    }

    public function tradeProfit(Request $request, $id)
    {
        $trade = Trade::findOrFail($id);
        if ($request->type == 'profit')
        {
            $trade->profit += $request->amount;
            $trade->save();
            $user = User::find($trade->user_id);
            $user->balance += $request->amount;
            $user->profit += $request->amount;
            $user->save();
            return redirect()->back()->with('success', 'Profit Added Successfully');
        }
        $trade = Trade::findOrFail($id);
        $trade->profit -= $request->amount;
        $trade->save();
        $user = User::find($trade->user_id);
        $user->balance -= $request->amount;
        $user->save();
        return redirect()->back()->with('success', 'Loss Trade Added Successfully');

    }

    public function deleteTrade($id)
    {
        $trade = Trade::find($id);
        $trade->delete();
        return redirect()->back()->with('success', 'Trade Deleted Successfully');
    }
}
