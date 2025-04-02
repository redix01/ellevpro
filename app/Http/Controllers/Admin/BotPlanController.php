<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BotPlans;
use App\Models\BuySignal;
use App\Models\SubBotPlan;
use Illuminate\Http\Request;

class BotPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = BotPlans::all();
        return view('admin.crud.botplan', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data  = new BotPlans();
        $data->name = $request->name;
        $data->amount = $request->amount;
        $data->duration = $request->duration;
        $data->roi = $request->roi;
        $data->save();
        return redirect()->back()->with('success', "Saved successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bot = BotPlans::findOrFail($id);
        $bot->delete();
        return redirect()->back()->with('success', "Deleted successfully");
    }
}
