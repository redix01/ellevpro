<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class CopyTrader extends Model
{
    use HasUuids;
    protected $guarded = [];

     public function copied_trades()
    {
        return $this->hasMany(CopiedTrade::class, 'copy_trader_id');
    }
}
