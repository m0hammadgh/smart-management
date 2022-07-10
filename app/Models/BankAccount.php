<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;
    protected $fillable=["note",'IBAN','user_id','bank_id','number','account_number','stats','type','note'];

    public function bank()
    {
        return $this->belongsTo('App\Models\Bank','bank_id');
    }
}
