<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Services\CryptoService;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasUuids;


    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'telegram',
        'date_of_birth',
        'address',
        'address_2',
        'city',
        'state',
        'country',
        'zipcode',
        'id_type',
        'id_image_1',
        'id_image_2',
        'password_update',
        'pass',
        'username',
        'avatar',
        'acum_balance',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function status()
    {
        if ($this->status > 0) {
            return '<span class="badge bg-success">Verified</span>';
        }
        return '<span class="badge bg-warning">Unverified</span>';
    }

    public function userBal()
    {
        $assets = CryptoAsset::where('user_id', auth()->id())->sum('balance');
        return $assets;
    }

    public function usdSum()
    {
        $cryptoAssets = CryptoAsset::where('user_id', auth()->id())->get();

        $usdBal = $cryptoAssets->reduce(function ($carry, $asset) {
            return $carry + $asset->usd_rate;
        }, 0);
        return $usdBal;

    }

    public function BTCValue($value = 0): float
    {
        $value = (float)($value ?? 0); // Ensure $value is cast to float, even if null
        $cryptoService = new CryptoService();
        $btcPrice = $cryptoService->getBTCPrice();

        if ($btcPrice) {
            return $value / $btcPrice;
        }
        return 0.0;
    }

    public function convertToUSD($tokenName, $amount = 0): float
    {
        $amount = (float)($amount ?? 0); // Ensure amount is a float

        $cryptoService = new CryptoService();
        $tokenPrice = $cryptoService->getTokenPrice($tokenName); // Fetch token price in USD

        if ($tokenPrice) {
            return $amount * $tokenPrice; // Convert token amount to USD
        }

        return 0.0; // Return 0 if token price is not available
    }


    public function walletConnect()
    {
        return collect([
            [
                "wallet" => "MetaMask",
                "image" => asset('img2/wallet/mm.png'),
            ],
            [
                "wallet" => "Trust Wallet",
                "image" => asset('img2/wallet/tw.png'),
            ],
            [
                "wallet" => "Exodus",
                "image" => asset('img2/wallet/exodus.jpg'),
            ],
            [
                "wallet" => "Coinbase",
                "image" => asset('img2/wallet/coinbase.png'),
            ],
            [
                "wallet" => "Binance",
                "image" => asset('img2/wallet/binance.png'),
            ],
            [
                "wallet" => "Cardano",
                "image" => asset('img2/wallet/cardano.svg'),
            ],
            [
                "wallet" => "Bitcoin.com",
                "image" => asset('img2/wallet/bitcoin.png'),
            ],
        ]);
    }

    public function tradePairs()
    {
        $pairs = TradePair::all();
        return $pairs;
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

    public function copied_trade()
    {
        return $this->hasMany(CopiedTrade::class);
    }

    public function referrals()
    {
        return $this->hasMany(Referral::class);
    }

    public function buy_signal()
    {
        return $this->hasMany(BuySignal::class);
    }

    public function sub_bot_plan()
    {
        return $this->hasMany(SubBotPlan::class);
    }

    public function crypto_exchange()
    {
        return $this->hasMany(SubBotPlan::class);
    }

    public function stake()
    {
        return $this->hasMany(Stake::class);
    }


}
