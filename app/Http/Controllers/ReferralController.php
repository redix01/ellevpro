<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
   public function referrals($username)
    {
        $user = User::where('username', $username)->with('referrals.referredUser')->firstOrFail();
        return response()->json($user->referrals);
    }
}
