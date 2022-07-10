<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscriptionPlan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        'duration',
        'charge_amount',
        'description',
        'withdraw_rial',
        'withdraw_crypto',
        'all_features',
        'user_profit',
        'admin_profit',
        'price',
        'title'
    ];
}
