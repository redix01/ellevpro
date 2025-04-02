<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminStakeController;
use App\Http\Controllers\Admin\BotPlanController;
use App\Http\Controllers\Admin\CopyTraderController;
use App\Http\Controllers\Admin\CryptoAssetController;
use App\Http\Controllers\Admin\CryptoTransactionsController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\OthersController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\StakingPlanController;
use App\Http\Controllers\Admin\TradeController;
use App\Http\Controllers\Admin\TradeSignalController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AssetsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth', 'verified', 'admin'], 'prefix' => 'admin', 'as' => 'admin.'], function(){
     Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
     Route::get('settings', [AdminController::class, 'settings'])->name('settings');
     Route::post('update/profile', [AdminController::class, 'updateProfile'])->name('updateProfile');
     Route::get('activities', [AdminController::class, 'activities'])->name('activities');
     Route::get('security', [AdminController::class, 'security'])->name('security');
     Route::post('update/password', [AdminController::class, 'updatePassword'])->name('updatePassword');

     Route::delete('delete/user/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');
     Route::get('users', [UserController::class, 'index'])->name('users.index');
     Route::get('user/show/{id}', [UserController::class, 'show'])->name('user.show');
     Route::get('user/assets/{id}', [UserController::class, 'userAssets'])->name('userAssets');
     Route::get('verify/user/{id}', [UserController::class, 'verifyUser'])->name('verifyUser');
     Route::get('connected/wallet/{id}', [UserController::class, 'connectedWallet'])->name('connectedWallet');
     Route::post('fund/user/{id}', [UserController::class, 'fundUser'])->name('fundUser');

     Route::resource('payment-method', PaymentMethodController::class);
     Route::resource('asset', CryptoAssetController::class);
     Route::patch('update/asset/{id}', [CryptoAssetController::class, 'updateAsset'])->name('updateAsset');

     Route::get('transactions/deposits', [TransactionController::class, 'deposits'])->name('transactions.deposits');
     Route::get('approve/deposit/{id}', [TransactionController::class, 'approveDeposit'])->name('approveDeposit');
     Route::get('transactions/withdrawal', [TransactionController::class, 'withdraws'])->name('transactions.withdraws');
     Route::post('approve/withdrawal/{id}', [TransactionController::class, 'approveWithdraw'])->name('approveWithdraw');
     Route::get('copied/trades/', [TransactionController::class, 'copiedTrade'])->name('copiedTrade');
     Route::get('end/copied/trades/{id}', [TransactionController::class, 'stopTrade'])->name('stopTrade');

     Route::get('create/copy-trader', [CopyTraderController::class, 'index'])->name('copyTrader.index');
     Route::post('store/copy-trader', [CopyTraderController::class, 'store'])->name('copyTrader.store');
     Route::patch('update/copy-trader/{id}', [CopyTraderController::class, 'update'])->name('copyTrader.update');
     Route::delete('delete/copy-trader/{id}', [CopyTraderController::class, 'destroy'])->name('copyTrader.destroy');

     Route::resource('signal', TradeSignalController::class);
     Route::resource('botplan', BotPlanController::class);

     Route::get('traded/signal/history', [OthersController::class, 'signalHistory'])->name('signalHistory');
     Route::post('signal/profit/{id}', [OthersController::class, 'fundSignalProfit'])->name('fundSignalProfit');
     Route::get('close/signal/{id}', [OthersController::class, 'closeSignal'])->name('closeSignal');
     Route::get('tradedbot/history', [OthersController::class, 'botHistory'])->name('botHistory');
     Route::post('bot/profit/{id}', [OthersController::class, 'addBotProfit'])->name('addBotProfit');

     Route::get('crypto/exchange/history', [CryptoTransactionsController::class, 'cryptoExchange'])->name('cryptoExchange');
     Route::post('approve/crypto/deposit/{id}', [CryptoTransactionsController::class, 'cryptoExchangeStore'])->name('cryptoExchangeStore');
     Route::post('approve/crypto/withdrawal/{id}', [CryptoTransactionsController::class, 'cryptoExchangeWithdraw'])->name('cryptoExchangeWithdraw');

     Route::get('staking/plan', [StakingPlanController::class, 'index'])->name('stakingPlan.index');
     Route::post('staking/plan/store', [StakingPlanController::class, 'store'])->name('stakingPlan.store');
     Route::patch('staking/plan/update/{d}', [StakingPlanController::class, 'update'])->name('stakingPlan.update');
     Route::delete('staking/plan/delete/{id}', [StakingPlanController::class, 'destroy'])->name('stakingPlan.destroy');

     Route::get('swap/history', [HistoryController::class, 'swapHistory'])->name('swapHistory');

     Route::get('staking/history', [HistoryController::class, 'stakeHistory'])->name('stakeHistory');
     Route::post('staking/profit/{id}', [HistoryController::class, 'stakingProfit'])->name('stakingProfit');
     Route::get('end/staking/{id}', [HistoryController::class, 'endStaking'])->name('endStaking');

     Route::get('trades/history', [TradeController::class, 'tradeHistory'])->name('tradeHistory');
     Route::get('close/trade/{id}', [TradeController::class, 'closeTrade'])->name('closeTrade');
     Route::post('trade/profit/{id}', [TradeController::class, 'tradeProfit'])->name('tradeProfit');
     Route::delete('delete/trade/{id}', [TradeController::class, 'deleteTrade'])->name('deleteTrade');

     Route::get('/fetch-coins/{id}', [AssetsController::class, 'userSyncCryptoAssets'])->name('userSyncCryptoAssets');
});
