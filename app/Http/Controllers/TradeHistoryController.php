<?php

namespace App\Http\Controllers;

use App\Models\Trade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TradeHistoryController extends Controller
{
    public function history()
    {
        $trades = Trade::where('user_id', Auth::id())->get();
        return view('dashboard.trade.history', compact('trades'));
    }
}
