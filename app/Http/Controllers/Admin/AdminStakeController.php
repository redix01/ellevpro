<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stake;
use Illuminate\Http\Request;

class AdminStakeController extends Controller
{
    public function index()
    {
        $data = Stake::all();
        return view('admin.history.stake-history', compact('data'));
    }
}
