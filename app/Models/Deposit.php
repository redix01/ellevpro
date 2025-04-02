<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasUuids;
    protected $fillable = ['user_id', 'payment_method_id', 'amount', 'status', 'payment_proof'];

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class);
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
        }elseif ($this->status == 2)
        {
            return "<span class='badge bg-danger'>Declined</span>";
        }
        return "<span class='badge bg-warning'>Pending</span>";
    }
}
