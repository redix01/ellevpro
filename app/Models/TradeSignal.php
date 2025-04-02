<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TradeSignal extends Model
{
    protected $guarded = [];
    public function buy_signal()
    {
        return $this->hasMany(BuySignal::class);
    }


}
