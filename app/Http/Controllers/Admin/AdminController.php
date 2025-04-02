<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::latest()->paginate(5);
        $total_users = User::count();
        $deposits = Deposit::where('status', 1)->sum('amount');
        $withdrawals = Withdrawal::where('status', 1)->sum('amount');
        return view('admin.index', compact('users', 'total_users', 'deposits', 'withdrawals'));
    }

    public function settings()
    {
        $user = Auth::user();
        return view('admin.setting.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $request->validate(
            ['name' => 'required']
        );

        $user->name = $request['name'];
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function activities()
    {
        $user = Auth::user();
        $data = DB::table('sessions')->whereUserId(\auth()->id())->get();
        return view('admin.setting.activities', compact('data', 'user'));
    }

    public function security()
    {
        $user = Auth::user();
        return view('admin.setting.security', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully!');
    }

}
