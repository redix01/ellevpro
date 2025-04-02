<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trade extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'amount',
        'acct_type',
        'market',
        'time_interval',
        'stop_loss',
        'take_profit',
        'trade_type',
        'user_id',
        'status',
        'crypto_pair',
        'forex_pair',
        'stock_pair',
        'common_pair',
        'indices_pair',
        'bond_pair',
        'etf_pair',
        'profit',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trade_type()
    {
        if ($this->trade_type == 'buy')
        {
            return "<span class='badge bg-success'>BUY</span>";
        }
        return "<span class='badge bg-danger'>SELL</span>";
    }
    public function tradePair()
    {
        $pairs = [
            "Cryptocurrency" => $this->crypto_pair,
            "Forex" => $this->forex_pair,
            "Stock" => $this->stock_pair,
            "Commodities" => $this->common_pair,
            "Indices" => $this->indices_pair,
            "Bonds" => $this->bond_pair,
            "ETFs" => $this->etf_pair,
        ];

        return $pairs[$this->market] ?? "";
    }


    public function status()
    {
        if ($this->status == 1)
        {
            return "<span class='badge bg-success'>Open</span>";
        }elseif($this->status > 1)
        {
            return "<span class='badge bg-danger'>Closed</span>";
        }
        return "<span class='badge bg-warning'>Pending</span>";

    }



}
