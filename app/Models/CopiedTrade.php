<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class CopiedTrade extends Model
{
    use HasUuids;

     protected $guarded = [];

    public function copy_trader()
    {
        return $this->belongsTo(CopyTrader::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        if ($this->status == 1)
        {
            return '<span class="badge bg-success">Copying...</span>';
        }elseif($this->status == 2)
        {
            return '<span class="badge bg-danger">Ended</span>';
        }
        return '<span class="badge bg-warning">Pending</span>';
    }
}
