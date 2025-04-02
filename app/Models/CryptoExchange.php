<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CryptoExchange extends Model
{
    protected $guarded = [];

    public function cryptoValue()
    {
        $asset = CryptoAsset::find($this->crypto_asset_id);
        return $this->amount / ($asset->price ?: 0);
    }
    public function usdValue()
    {
       $asset = CryptoAsset::find($this->crypto_asset_id);
        if ($asset->price && $this->amount) {
            return $this->amount * $asset->price;
        }
        return 0.00;
    }

    public function crypto_asset()
    {
        return $this->belongsTo(CryptoAsset::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        if ($this->status == 1)
        {
            return "<span class='badge bg-success'>Successful</span>";
        }
        return "<span class='badge bg-warning'>Pending</span>";
    }




}
