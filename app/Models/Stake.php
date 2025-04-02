<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stake extends Model
{
    protected $guarded;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function staking_plan()
    {
        return $this->belongsTo(StakingPlan::class);
    }


    public function status()
    {
        if ($this->status == 1)
        {
            return "<span class='badge bg-success'>Active</span>";
        }elseif($this->status > 1)
        {
            return "<span class='badge bg-danger'>Ended</span>";
        }
        return "<span class='badge bg-warning'>Pending</span>";

    }
}
