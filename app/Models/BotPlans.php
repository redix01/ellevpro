<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BotPlans extends Model
{
    //
    public function sub_bot_plan()
    {
        return $this->hasMany(SubBotPlan::class);
    }
}
