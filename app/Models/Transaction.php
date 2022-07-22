<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'factor_id',
        'status',
        'amount',
        'realAmount',
        'wage',
        'transId',
        'paymentDate',

    ];
}
