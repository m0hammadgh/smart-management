<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeHistory extends Model
{
    use HasFactory;
    protected $fillable=[
        'profit',
        'success',
        'sell_price',
        'buy_price',
        'sell_exchange_id',
        'buy_exchange_id',
        'date',
        'currency_id',
        'user_id',
    ];

    public function currency()
    {
        return $this->belongsTo('App\Models\Currency','currency_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function buyerExchange()
    {
        return $this->belongsTo('App\Models\Exchange','buy_exchange_id');
    }
    public function sellerExchange()
    {
        return $this->belongsTo('App\Models\Exchange','sell_exchange_id');
    }
}
