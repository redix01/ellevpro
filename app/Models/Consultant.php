<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'business_email',
        'phone_number',
        'company_name',
        'help_topic',
        'message',
    ];

}
