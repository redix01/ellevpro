<?php

namespace App\Http\Controllers;

use App\Models\BuySignal;
use App\Models\TradeSignal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuySignalController extends Controller
{
    public function index()
    {
        $data = TradeSignal::all();
        $user = Auth::user();
        $traded = BuySignal::where('user_id', auth()->id())->get();
        return view('dashboard.trade.signal', compact('data', 'user', 'traded'));
    }

    public function store(Request $request)
    {
       $signalId = $request->get('signal_id');
       $signal = TradeSignal::findOrFail($signalId);
       $user = Auth::user();
       if ($signal->amount > $user->balance)
       {
           return redirect()->back()->with('error', "Insufficient balance");
       }
       $data = new BuySignal();
       $data->user_id = Auth::id();
       $data->trade_signal_id = $signalId;
       $data->amount = $request->amount;
       $data->status = 1;
       $data->save();
       $user->balance -= $signal->amount;
       $user->acum_balance += $signal->amount;
       $user->save();
       return redirect()->back()->with('success', "Signal Traded Successfully");
    }


}
