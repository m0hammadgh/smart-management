<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Exchange;
use App\Models\TradeHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TradeHistoryController extends Controller
{
    function list()
    {
        $list = TradeHistory::paginate(30);
        return view('admin.trade_history.list', compact('list'));
    }

    function add()
    {
        $users = User::where('status', 'active')->get();
        $exchanges = Exchange::all();
        $currencies = Currency::all();
        return view('admin.trade_history.new', compact('users', 'currencies', 'exchanges'));
    }

    function store(Request $request)
    {
        if ($request->users==null)
        {
            return  back()->with('msg','کاربر را انتخاب کنید');
        }
        foreach ($request->users as $user) {
            TradeHistory::create(
                [
                    "profit"=>$request->profit,
                    "sell_price"=>$request->sell_price,
                    "buy_price"=>$request->buy_price,
                    "sell_exchange_id"=>$request->sell_exchange_id,
                    "buy_exchange_id"=>$request->buy_exchange_id,
                    "date"=>$request->date,
                    "user_id"=>$user,
                    "currency_id"=>$request->currency_id,
                    "success"=>$request->success,
                ]
            );
        }
        return redirect()->route('tradeHistory.list')->with('msg', 'با موفقیت افزوده شد');
    }

    function edit($id)
    {
        $edit = TradeHistory::find($id);
        if (!$edit) {
            return back()->with('msg', 'موردی یافت نشد');
        }
        $users = User::where('status', 'active')->get();
        $exchanges = Exchange::all();
        $currencies = Currency::all();
        return view('admin.trade_history.new', compact('edit','users', 'currencies', 'exchanges'));
    }

    function update(Request $request, $id)
    {
        $edit = TradeHistory::find($id);
        if (!$edit) {
            return back()->with('msg', 'موردی یافت نشد');
        }

        $edit->update($request->all());
        return redirect()->route('tradeHistory.list')->with('msg', 'با موفقیت به روز رسانی شد');
    }

    function delete($id)
    {
        $edit = TradeHistory::find($id);
        if (!$edit) {
            return back()->with('msg', 'موردی یافت نشد');
        }
        $edit->delete();
        return redirect()->route('tradeHistory.list')->with('msg', 'با موفقیت حذف شد');
    }
}
