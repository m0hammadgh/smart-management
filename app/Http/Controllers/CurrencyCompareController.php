<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\CurrencyCompare;
use App\Models\Exchange;
use Illuminate\Http\Request;

class CurrencyCompareController extends Controller
{
    function list()
    {
        $list = CurrencyCompare::paginate(30);
        return view('admin.compare.list', compact('list'));
    }

    function add()
    {
        $exchanges = Exchange::all();
        $currencies = Currency::all();
        return view('admin.compare.new', compact('currencies', 'exchanges'));
    }

    function store(Request $request)
    {
        $existCurrency = CurrencyCompare::where('currency_id', $request->currency_id)->first();
        if ($existCurrency) {
            return back()->with('msg', 'رمز ارز انتخاب شده  در لیست مقایسه ها موجود می باشد');
        }
        CurrencyCompare::create($request->all());
        return redirect()->route('compare.list')->with('msg', 'با موفقیت افزوده شد');
    }

    function edit($id)
    {
        $edit = CurrencyCompare::find($id);
        if (!$edit) {
            return back()->with('msg', 'موردی یافت نشد');
        }
        $exchanges = Exchange::all();
        $currencies = Currency::all();
        return view('admin.compare.new', compact('edit', 'currencies', 'exchanges'));
    }

    function update(Request $request, $id)
    {
        $edit = CurrencyCompare::find($id);
        if (!$edit) {
            return back()->with('msg', 'موردی یافت نشد');
        }

        $edit->update($request->all());
        return redirect()->route('compare.list')->with('msg', 'با موفقیت به روز رسانی شد');
    }

    function delete($id)
    {
        $edit = CurrencyCompare::find($id);
        if (!$edit) {
            return back()->with('msg', 'موردی یافت نشد');
        }
        $edit->delete();
        return redirect()->route('compare.list')->with('msg', 'با موفقیت حذف شد');
    }
}
