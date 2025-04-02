<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubBotPlan extends Model
{
    protected $guarded;

     public function bot_plan()
    {
        return $this->belongsTo(BotPlans::class);
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
        }
        return "<span class='badge bg-danger'>Ended</span>";

    }
}
