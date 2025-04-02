<?php

use App\Http\Controllers\AssetsController;
use App\Http\Controllers\BuySignalController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\CopiedTradeController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\StakeController;
use App\Http\Controllers\SubBotPlanController;
use App\Http\Controllers\SwapController;
use App\Http\Controllers\TradeHistoryController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\TradeController;
use App\Http\Controllers\WalletConnectController;
use App\Http\Controllers\WithdrawalController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.index')->name('index');
Route::view('/about', 'pages.about')->name('about');
Route::view('/account', 'pages.account')->name('account');
Route::view('/trading', 'pages.trading')->name('trading');
Route::view('/market', 'pages.market')->name('market');
Route::view('/platform', 'pages.platform')->name('platform');
Route::view('/news', 'pages.news')->name('news');
Route::view('/contact-us', 'pages.contact')->name('contact');
Route::view('/consultant', 'pages.consultant')->name('consultant');
Route::post('/contact/consultant', [ConsultantController::class, 'store'])->name('contact.store');



Route::group(['middleware' => ['auth'], 'prefix' => 'user', 'as' => 'user.'], function(){
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('trade/panel', [UserController::class, 'tradePanel'])->name('tradePanel');
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::post('update/profile', [UserController::class, 'updateProfile'])->name('updateProfile');
    Route::get('security', [UserController::class, 'security'])->name('security');
    Route::post('change/password', [UserController::class, 'updatePassword'])->name('updatePassword');
    Route::get('wallet', [UserController::class, 'wallet'])->name('wallet');
    Route::get('trade', [UserController::class, 'trade'])->name('trade');
    Route::get('trade/notify', [UserController::class, 'tradeNotify'])->name('tradeNotify');
    Route::get('rewards', [UserController::class, 'reward'])->name('reward');
    Route::get('kyc/verification', [UserController::class, 'kyc'])->name('kyc');
    Route::get('kyc/verification/step', [UserController::class, 'kycForm'])->name('kycForm');
    Route::post('verify/kyc', [UserController::class, 'verifyKyc'])->name('verifyKyc');
    Route::get('kyc/status/{id}', [UserController::class, 'kycStatus'])->name('kycStatus');

    Route::get('deposit', [DepositController::class, 'index'])->name('deposit.index');
    Route::post('store/deposit', [DepositController::class, 'store'])->name('deposit.store');
    Route::get('deposit/payment/{id}', [DepositController::class, 'payment'])->name('deposit.payment');
    Route::post('confirm/deposit/payment/{id}', [DepositController::class, 'confirmPayment'])->name('confirmPayment');

    Route::get('withdraw', [WithdrawalController::class, 'index'])->name('withdraw.index');
    Route::post('withdraw/store', [WithdrawalController::class, 'store'])->name('withdraw.store');
    Route::get('withdraw/show/{id}', [WithdrawalController::class, 'show'])->name('withdraw.show');

    Route::get('assets', [AssetsController::class, 'index'])->name('assets.index');

    Route::get('copytrades', [CopiedTradeController::class, 'index'])->name('copytrade.index');
    Route::post('store/copytrades', [CopiedTradeController::class, 'store'])->name('copytrade.store');

    Route::post('/register/{referrerUsername?}', [ReferralController::class, 'register']);
    Route::get('/referrals/{username}', [ReferralController::class, 'referrals']);

    Route::resource('trade', TradeController::class);
    Route::get('trades/history', [TradeHistoryController::class, 'history'])->name('tradeHistory');
    Route::resource('signal', BuySignalController::class);
    Route::resource('subbot', SubBotPlanController::class);

    Route::get('swap/crypto', [SwapController::class, 'index'])->name('swapCrypto.index');
    Route::post('store/swap/crypto', [SwapController::class, 'store'])->name('swapCrypto.store');

    Route::get('crypto/exchange', [ExchangeController::class, 'index'])->name('cryptoExchange.index');
    Route::post('crypto/exchange/deposit', [ExchangeController::class, 'store'])->name('cryptoExchange.store');
    Route::post('crypto/exchange/withdrawal', [ExchangeController::class, 'withdrawal'])->name('cryptoExchange.withdrawal');

    Route::get('staking', [StakeController::class, 'index'])->name('staking.index');
    Route::post('staking/store', [StakeController::class, 'store'])->name('staking.store');

    Route::post('/connect-wallet/store', [WalletConnectController::class, 'store'])->name('walletConnect.store');

    Route::get('fetch-coins/{id}', [AssetsController::class, 'userSyncCryptoAssets']);
    Route::get('test-fetch-coins', [AssetsController::class, 'syncCryptoAssetsTest']);

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
