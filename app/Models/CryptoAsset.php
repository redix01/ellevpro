<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Testing\Fluent\Concerns\Has;

class CryptoAsset extends Model
{
    use HasUuids;
    protected $fillable = [
        'user_id', 'name', 'avatar', 'price', 'balance', 'change', 'usd_rate'];

    protected $appends = ['usd_rate'];

    public function getUsdRateAttribute()
    {
        if ($this->price && $this->balance) {
            return $this->balance * $this->price;
        }
        return 0.00;
    }

    public function usdSum()
    {
        $cryptoAssets = CryptoAsset::where('user_id', auth()->id())->get();

        $usdBal = $cryptoAssets->reduce(function ($carry, $asset) {
            return $carry + $asset->usd_rate;
        }, 0);
        return $usdBal;
    }

    public function avatar()
    {
        $avatars = [
            "Bitcoin" => 'img/crypto/bitcoin.png',
            "Ethereum" => 'img/crypto/etherium.png',
            "BNB" => 'img/crypto/binance.png',
            "Cardano" => 'img/crypto/cardano.png',
            "Tether USDt" => 'img/crypto/tether.png',
            "XRP" => 'img/crypto/xrp.png',
            "USDC" => 'img/crypto/usdc.png',
            "TRON" => 'img/crypto/tron.png',
            "Toncoin" => 'img/crypto/Toncoin.webp',
            "Solana" => 'img/crypto/solana.png',
            "Dogecoin" => 'img/crypto/dogecoin.png',
            "Avalanche" => 'img/crypto/Avalanche.png',
            "Chainlink" => 'img/crypto/Chainlink.png',
            "Shiba Inu" => 'img/crypto/Shiba Inu.png',
            "Toncoin" => 'img/crypto/Toncoin.png',
            "Toncoin" => 'img/crypto/Toncoin.png',
            "Polkadot" => 'img/crypto/Polkadot.png',
            "Sui" => 'img/crypto/sui.png',
            "Stellar" => 'img/crypto/stellar.png',
        ];

        return asset($avatars[$this->name] ?? 'img2/crypto.png');
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

    public function getCryptoValue(string $cryptoName): ?string
    {
        // List of supported cryptocurrencies
        $supportedCryptos = [
            'Bitcoin',
            'Ethereum',
            'XRP',
            'Tether USDT (TRC20)',
            'Tether USDT (ERC)',
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

        if (!in_array($cryptoName, $supportedCryptos)) {
            return null;
        }

        $paymentMethod = PaymentMethod::where('name', $cryptoName)->first();
        return $paymentMethod ? $paymentMethod->value : null;
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function withdrawal()
    {
        return $this->hasMany(Withdrawal::class, 'crypto_asset_id');
    }

    public function crypto_exchange()
    {
        return $this->hasMany(CryptoExchange::class, 'crypto_asset_id');
    }
    public function staking_plan()
    {
        return $this->hasMany(StakingPlan::class, 'crypto_asset_id');
    }

    public function stake()
    {
        return $this->hasMany(Stake::class, 'crypto_asset_id');
    }


}
