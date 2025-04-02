<?php

namespace App\Http\Controllers;

use App\Models\BotPlans;
use App\Models\SubBotPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubBotPlanController extends Controller
{
    public function index()
    {
        $plans = BotPlans::all();
        $data = SubBotPlan::where('user_id', auth()->id())->get();
        return view('dashboard.others.subbot', compact('plans', 'data'));
    }

    public function store(Request $request)
    {
        $planId = $request->bot_plan_id;
        $bot = BotPlans::findOrFail($planId);
        if ($bot->amount > auth()->user()->balance)
        {
            return redirect()->back()->with('error', 'Insufficient Balance');
        }
        $data = new SubBotPlan();
        $data->user_id = auth()->id();
        $data->bot_plan_id = $request->bot_plan_id;
        $data->amount = $request->amount;
        $data->pair = $request->pair;
        $data->status = 1;
        $data->save();
        $user = Auth::user();
        $user->balance -= $request->amount;
        $user->acum_balance += $request->amount;
        $user->save();
        return redirect()->back()->with('success', 'Bot Activated Successfully');
    }

}
