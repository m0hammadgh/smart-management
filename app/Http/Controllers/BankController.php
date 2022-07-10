<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BankController extends Controller
{
    function listBanks()
    {
        $list = Bank::paginate(30);
        return view('admin.bank.list', compact('list'));
    }

    function addBank()
    {
        return view('admin.bank.new');
    }

    function storeBank(Request $request)
    {
        if ($request->title == null) {
            return back()->with('msg', 'نام بانک را انتخاب کنید');
        }
        if ($request->image != null) {
            $imageName = time() . Str::random(5) . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/bank'), $imageName);
            $request->request->add(['icon' => $imageName]);
        }
        Bank::create($request->all());
        return redirect()->route('bank.list')->with('msg', 'با موفقیت افزوده شد');
    }

    function editBank($id)
    {
        $edit = Bank::find($id);
        if (!$edit) {
            return back()->with('msg', 'موردی یافت نشد');
        }
        return view('admin.bank.new', compact('edit'));
    }

    function updateBank(Request $request,  $id)
    {
        $edit = Bank::find($id);
        if (!$edit) {
            return back()->with('msg', 'موردی یافت نشد');
        }
        if ($request->image != null) {
            $imageName = time() . Str::random(5) . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/bank'), $imageName);
            $request->request->add(['icon' => $imageName]);
        }
        $edit->update($request->all());
        return redirect()->route('bank.list')->with('msg', 'با موفقیت به روز رسانی شد');
    }

    function delete($id)
    {
        $edit = Bank::find($id);
        if (!$edit) {
            return back()->with('msg', 'موردی یافت نشد');
        }
        $edit->delete();
        return redirect()->route('bank.list')->with('msg', 'با موفقیت حذف شد');
    }
}
