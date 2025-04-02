<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CryptoSwap extends Model
{
    use HasUuids;

    protected $fillable = [
        'crypto_asset_id',
        'user_id',
        'swap_from',
        'swap_to',
        'amount',
        'status',
    ];

    public function cryptoAsset(): BelongsTo
    {
        return $this->belongsTo(CryptoAsset::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function status()
    {
        if ($this->status == 1)
        {
            return "<span class='badge bg-success'>Successful</span>";
        }
        return "<span class='badge bg-warning'>Unsuccessful</span>";
    }

}
