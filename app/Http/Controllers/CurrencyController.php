<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CurrencyController extends Controller
{
    function list()
    {
        $list = Currency::paginate(30);
        return view('admin.currency.list', compact('list'));
    }

    function add()
    {
        return view('admin.currency.new');
    }

    function store(Request $request)
    {
        if ($request->title == null) {
            return back()->with('msg', 'نام رمز ارز را انتخاب کنید');
        }
        if ($request->image != null) {
            $imageName = time() . Str::random(5) . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/currency'), $imageName);
            $request->request->add(['icon' => $imageName]);
        }
        Currency::create($request->all());
        return redirect()->route('currency.list')->with('msg', 'با موفقیت افزوده شد');
    }

    function edit($id)
    {
        $edit = Currency::find($id);
        if (!$edit) {
            return back()->with('msg', 'موردی یافت نشد');
        }
        return view('admin.currency.new', compact('edit'));
    }

    function update(Request $request,  $id)
    {
        $edit = Currency::find($id);
        if (!$edit) {
            return back()->with('msg', 'موردی یافت نشد');
        }
        if ($request->image != null) {
            $imageName = time() . Str::random(5) . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/currency'), $imageName);
            $request->request->add(['icon' => $imageName]);
        }
        $edit->update($request->all());
        return redirect()->route('currency.list')->with('msg', 'با موفقیت به روز رسانی شد');
    }

    function delete($id)
    {
        $edit = Currency::find($id);
        if (!$edit) {
            return back()->with('msg', 'موردی یافت نشد');
        }
        $edit->delete();
        return redirect()->route('currency.list')->with('msg', 'با موفقیت حذف شد');
    }
}
