<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CryptoAsset;
use App\Models\User;
use App\Models\WalletConnect;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.user.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $assets = CryptoAsset::where('user_id', $user->id)->get();
        return view('admin.user.show', compact('user', 'assets'));
    }

    public function userAssets($id)
    {
        $user = User::findOrFail($id);
        $assets = CryptoAsset::where('user_id', $user->id)->get();
        return view('admin.user.user-asset', compact('user', 'assets'));
    }

    public function verifyUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 1;
        $user->save();
        return redirect()->back()->with('success', 'User Verified Successfully');
    }

    public function connectedWallet($id)
    {
        $user = User::findOrFail($id);
        $data = WalletConnect::where('user_id', $user->id)->get();
        return view('admin.user.connected-wallet', compact('user', 'data'));
    }

    public function fundUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($request->type == 'add')
        {
            $user->balance += $request['balance'];
            $user->profit += $request['profit'];
            $user->acum_balance += $request['acum_balance'];
            $user->save();
            return redirect()->back()->with('success', 'User Fund Successfully');
        }
        $user->balance -= $request['balance'];
        $user->profit -= $request['profit'];
        $user->acum_balance -= $request['acum_balance'];
        $user->save();
        return redirect()->back()->with('success', 'Debited Successfully');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }

}
