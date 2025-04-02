<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasUuids;
    protected $fillable = ['user_id', 'amount', 'wallet', 'address', 'account_type', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cryptoAsset()
    {
        return $this->belongsTo(CryptoAsset::class);
    }

    public function with_status()
    {
        if ($this->status == 0)
        {
            return "<span class='badge bg-warning'>Pending</span>";
        }elseif ($this->status == 1)
        {
            return "<span class='badge bg-success'>Successful</span>";
        }
        return "<span class='badge bg-danger'>Declined</span>";
    }

}
