<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'discount_id',
        'price',
        'discounted_price',
        'status',
        'transfer_type',
        'image',
        'type',
        'token',
        'payment_id',
        'mode',
        'description',
    ];

    public function user()
    {
        $this->belongsTo('App\Models\User','user_id');
    }
}
