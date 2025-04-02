<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BuySignal;
use App\Models\SubBotPlan;
use App\Models\User;
use Illuminate\Http\Request;

class OthersController extends Controller
{
    public function signalHistory()
    {
        $data = BuySignal::all();
        return view('admin.history.signalHistory', compact('data'));
    }

    public function fundSignalProfit(Request $request, $id)
    {

        $signal = BuySignal::findOrFail($id);
        if ($request->type == 'profit')
        {
            $signal->profit += $request->amount;
            $signal->save();
            $user = User::find($signal->user_id);
            $user->balance += $request->amount;
            $user->profit += $request->amount;
            $user->save();
            return redirect()->back()->with('success', 'Profit Added Successfully');
        }
        $signal = BuySignal::findOrFail($id);
        $signal->profit -= $request->amount;
        $signal->save();
        $user = User::find($signal->user_id);
        $user->balance -= $request->amount;
        $user->save();
        return redirect()->back()->with('success', 'Loss Trade Added Successfully');
    }
    public function closeSignal($id)
    {
        $data = BuySignal::findOrFail($id);
        $data->status = 2;
        $data->save();
        return redirect()->back()->with('success', "Profit Added Successfully");
    }

    public function botHistory()
    {
        $data = SubBotPlan::all();
        return view('admin.history.botHistory', compact('data'));
    }

    public function addBotProfit(Request $request, $id)
    {
        $data = SubBotPlan::findOrFail($id);
        $data->profit = $request->profit;
        $data->save();
        $user = User::findOrFail($data->user_id);
        $user->profit += $request->profit;
        $user->balance += $request->profit;
        $user->save();
        return redirect()->back()->with('success', "Profit Added Successfully");
    }


}
