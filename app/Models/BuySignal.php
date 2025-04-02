<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuySignal extends Model
{
    protected $guarded = [];
    public function trade_signal()
    {
        return $this->belongsTo(TradeSignal::class, 'trade_signal_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        if ($this->status == 1)
        {
            return "<span class='badge bg-success'>Active</span>";
        }elseif($this->status == 2)
        {
            return "<span class='badge bg-danger'>Closed</span>";
        }
        return "<span class='badge bg-danger'>Inactive</span>";

    }


}
