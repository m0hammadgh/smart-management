<?php

namespace App\Http\Controllers;

use App\Models\Exchange;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExchangeController extends Controller
{
    function list()
    {
        $list = Exchange::paginate(30);
        return view('admin.exchange.list', compact('list'));
    }

    function add()
    {
        return view('admin.exchange.new');
    }

    function store(Request $request)
    {
        if ($request->title == null) {
            return back()->with('msg', 'نام صرافی را انتخاب کنید');
        }
        if ($request->image != null) {
            $imageName = time() . Str::random(5) . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/exchange'), $imageName);
            $request->request->add(['icon' => $imageName]);
        }
        Exchange::create($request->all());
        return redirect()->route('exchange.list')->with('msg', 'با موفقیت افزوده شد');
    }

    function edit($id)
    {
        $edit = Exchange::find($id);
        if (!$edit) {
            return back()->with('msg', 'موردی یافت نشد');
        }
        return view('admin.exchange.new', compact('edit'));
    }

    function update(Request $request,  $id)
    {
        $edit = Exchange::find($id);
        if (!$edit) {
            return back()->with('msg', 'موردی یافت نشد');
        }
        if ($request->image != null) {
            $imageName = time() . Str::random(5) . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/exchange'), $imageName);
            $request->request->add(['icon' => $imageName]);
        }
        $edit->update($request->all());
        return redirect()->route('exchange.list')->with('msg', 'با موفقیت به روز رسانی شد');
    }

    function delete($id)
    {
        $edit = Exchange::find($id);
        if (!$edit) {
            return back()->with('msg', 'موردی یافت نشد');
        }
        $edit->delete();
        return redirect()->route('exchange.list')->with('msg', 'با موفقیت حذف شد');
    }
}
