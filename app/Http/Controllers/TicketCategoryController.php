<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPlan;
use App\Models\TicketCategory;
use Illuminate\Http\Request;

class TicketCategoryController extends Controller
{
    function listItems()
    {
        $list = TicketCategory::paginate(30);
        return view('admin.ticket_category.list', compact('list'));
    }

    function addTicketCat()
    {
        return view('admin.ticket_category.new');
    }

    function storeTicketCat(Request $request)
    {
        if ($request->title == null) {
            return back()->with('msg', 'عنوان  را وارد کنید');
        }

        TicketCategory::create($request->all());
        return redirect()->route('ticketCategory.list')->with('msg', 'با موفقیت افزوده شد');
    }

    function edit($id)
    {
        $edit = TicketCategory::find($id);
        if (!$edit) {
            return back()->with('msg', 'موردی یافت نشد');
        }
        return view('admin.ticket_category.new', compact('edit'));
    }

    function update(Request $request,  $id)
    {
        $edit = TicketCategory::find($id);
        if (!$edit) {
            return back()->with('msg', 'موردی یافت نشد');
        }

        $edit->update($request->all());
        return redirect()->route('ticketCategory.list')->with('msg', 'با موفقیت به روز رسانی شد');
    }

    function delete($id)
    {
        $edit = TicketCategory::find($id);
        if (!$edit) {
            return back()->with('msg', 'موردی یافت نشد');
        }
        $edit->delete();
        return redirect()->route('ticketCategory.list')->with('msg', 'با موفقیت حذف شد');
    }
}
