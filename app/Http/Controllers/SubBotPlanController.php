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
        $user = auth()->user();
        $planId = $request->bot_plan_id;


        $bot = BotPlans::findOrFail($planId);
        if ($bot->amount > $user->balance) {
            return redirect()->back()->with('error', 'Insufficient Balance');
        }

        // Check if the pair already exists for this bot plan
        $existingPair = SubBotPlan::where('bot_plan_id', $planId)
            ->where('pair', $request->pair)
            ->exists();

        if ($existingPair) {
            return redirect()->back()->with('error', 'This trading pair is already assigned to this Bot.');
        }

        $data = SubBotPlan::create([
            'user_id' => $user->id,
            'bot_plan_id' => $planId,
            'amount' => $request->amount,
            'pair' => $request->pair,
            'status' => 1
        ]);

        $user->decrement('balance', $request->amount);
        $user->increment('acum_balance', $request->amount);

        return redirect()->back()->with('success', 'Bot Activated Successfully');
    }


}
