<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StakingPlan extends Model
{
    protected $guarded;

    public function stake()
    {
        return $this->hasMany(Stake::class, 'staking_plan_id');
    }

    public static function getCryptoWallets()
    {
        return [
            'Bitcoin',
            'Ethereum',
            'XRP',
            'USDT',
            'Solana',
            'BNB',
            'Dogecoin',
            'USDC',
            'Cardano',
            'TRON',
            'Avalanche',
            'Chainlink',
            'Shiba Inu',
            'Toncoin',
            'Sui',
        ];
    }

     public function getCryptoShort($name)
    {
        return match ($name) {
            "Bitcoin" => "BTC",
            "Ethereum" => "ETH",
            "BNB" => "BNB",
            "Cardano" => "ADA",
            "Tether USDt" => "USDT",
            "XRP" => "XRP",
            "USDC" => "USDC",
            "TRON" => "TRX",
            "Toncoin" => "TON",
            "Solana" => "SOL",
            "Dogecoin" => "DOGE",
            "Sui" => "SUI",
            "Stellar" => "XLM",
            default => null,
        };
    }

}
