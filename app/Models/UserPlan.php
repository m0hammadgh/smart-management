<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlan extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'plan_id',
        'expire_time',
        'purchased_time',
        'factor_id',
    ];

    function plan()
    {
        return $this->belongsTo('App\Models\SubscriptionPlan','plan_id');
    }
}
