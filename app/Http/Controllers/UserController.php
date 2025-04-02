<?php

namespace App\Http\Controllers;

use App\Mail\AccountUpgrade;
use App\Models\CopiedTrade;
use App\Models\CryptoAsset;
use App\Models\Deposit;
use App\Models\Trade;
use App\Models\TradePair;
use App\Models\User;
use App\Models\WalletConnect;
use App\Models\Withdrawal;
use App\Services\CryptoService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    protected $cryptoService;

    public function __construct(CryptoService $cryptoService)
    {
        $this->cryptoService = $cryptoService;
    }
    public function syncCryptoAssets()
    {
        $cryptoService = new CryptoService();
        $cryptoService->syncCryptoAssets(auth()->id());
        return response()->json(['message' => 'Crypto assets synced successfully.']);
    }

    public function index()
    {
        $this->syncCryptoAssets();
        $user = Auth::user();
        $assets = CryptoAsset::where('user_id', auth()->id())->get();
        $balance = CryptoAsset::where('user_id', auth()->id())->sum('balance');
        $deposits = Deposit::where('user_id', auth()->id())->where('status', 1)->sum('amount');
        $withdrawal = Withdrawal::where('user_id', auth()->id())->where('status', 1)->sum('usd_amount');
        $sumTrades = Trade::where('user_id', auth()->id())->where('status', 2)->sum('amount');
        $sumCT = CopiedTrade::where('user_id', auth()->id())->where('status', 1)->sum('amount');
        $pairs = TradePair::all();
        $wallets = WalletConnect::all();
        $wonTrades = Trade::where('user_id', auth()->id())->where('status', 2)->where('profit', '>', 0)->count();
        $lossTrades = Trade::where('user_id', auth()->id())->where('status', 2)->where('profit', '<', 0)->count();
        return view('dashboard.index', compact('user', 'assets', 'balance', 'deposits', 'withdrawal',
            'sumTrades', 'pairs', 'wallets', 'sumCT', 'wonTrades', 'lossTrades'));
    }
    public function tradePanel()
    {
        $user = Auth::user();
        $pairs = TradePair::all();
        return view('dashboard.trade.panel', compact('user',  'pairs'));
    }

    public function wallet()
    {
        $user = Auth::user();
        $deposits = Deposit::where('user_id', auth()->id())->where('status', 1)->sum('amount');
        $withdrawal = Withdrawal::where('user_id', auth()->id())->where('status', 1)->sum('usd_amount');
        return view('dashboard.wallet', compact('user', 'deposits', 'withdrawal'));
    }
    public function trade()
    {
        return view('dashboard.trade');
    }
    public function tradeNotify()
    {
        $user = Auth::user();
        $admin = User::where('role', 'admin')->first();

        if (!$admin || !$admin->email) {
            return redirect()->back()->with('error', 'Admin email not found. Please try again later.');
        }
        Mail::to($admin->email)->send(new AccountUpgrade($user));
        return redirect()->back()->with('success', 'Your application is under review. We will get back to you shortly.');
    }

    public function reward()
    {
        $user = Auth::user();
        $hasDeposit = $user->deposits()->exists();
        return view('dashboard.reward', compact('user', 'hasDeposit'));
    }


    public function profile()
    {
        $user = Auth::user();
        return view('dashboard.user.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $validateData = $request->validate([
            'name' => 'nullable',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'telegram' => 'nullable',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($request->hasFile('avatar')) {
            $validateData['avatar'] = $request->file('avatar')->store('files', 'public');
        }
        $user->update($validateData);
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function security()
    {
        $user = Auth::user();
        $sessions = DB::table('sessions')->where('user_id', auth()->id())->get();
        return view('dashboard.user.security', compact('user', 'sessions'));
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
        $user->password_update = Carbon::now();
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully!');
    }


    public function kyc()
    {
        return view('dashboard.user.kyc');
    }
    public function kycForm()
    {
        $user = Auth::user();
        return view('dashboard.user.verify-kyc', compact('user'));
    }
    public function verifyKyc(Request $request)
    {
        $validatedData = $request->validate([
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'address_2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'zipcode' => 'nullable|string|max:20',
            'id_type' => 'nullable|string|max:50',
            'id_image_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'id_image_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('id_image_1')) {
            $validatedData['id_image_1'] = $request->file('id_image_1')->store('files', 'public');
        }

        if ($request->hasFile('id_image_2')) {
            $validatedData['id_image_2'] = $request->file('id_image_2')->store('files', 'public');
        }

        $user = auth()->user();
        $user->update($validatedData);

        return redirect()->route('user.kycStatus', $user->id)->with('success', 'KYC information updated successfully.');
    }

    public function kycStatus($id)
    {
        $user = User::find($id);
        return view('dashboard.user.kyc-status', compact('user'));
    }




}
