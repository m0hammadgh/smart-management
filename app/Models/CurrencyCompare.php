<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyCompare extends Model
{
    use HasFactory;

    protected $fillable=[
        'currency_id',
        'low_price',
        'top_price',
        'top_exchange_id',
        'low_exchange_id',
        'profit',

    ];


    public function currency()
    {
        return $this->belongsTo('App\Models\Currency','currency_id');
    }

    public function lowPriceExchange()
    {
        return $this->belongsTo('App\Models\Exchange','low_exchange_id');
    }

    public function topPriceExchange()
    {
        return $this->belongsTo('App\Models\Exchange','top_exchange_id');
    }
}
