<?php

use App\Models\User;
use App\Services\CryptoService;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


Artisan::command('crypto:sync', function () {
    $cryptoService = new CryptoService();
    $cryptoService->syncCryptoAssets(User::first()->id);
    $this->comment('Crypto assets synced successfully.');
})->purpose('Sync top crypto assets from API')->everyFiveMinutes();
