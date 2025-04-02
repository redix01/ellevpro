<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $wallets = [
            "MetaMask",
            "Trust Wallet",
            "Exodus",
            "Coinbase",
            "Binance",
            "Cardano",
            "Bitcoin.com",
        ];

        foreach ($wallets as $item) {
            DB::table('wallet_connects')->insert([
                'wallet' => $item,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

}
