<?php

namespace App\Http\Controllers;

use App\Models\TradeHistory;
use Illuminate\Http\Request;

class FactorController extends Controller
{
    function list()
    {
        $list = TradeHistory::paginate(30);
        return view('admin.factors.list', compact('list'));
    }

}
