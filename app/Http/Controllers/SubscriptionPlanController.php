<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;

class SubscriptionPlanController extends Controller
{
    function listPlans()
    {
        $list = SubscriptionPlan::paginate(30);
        return view('admin.subscription.list', compact('list'));
    }

    function addPlan()
    {
        return view('admin.subscription.new');
    }

    function storeSubscription(Request $request)
    {
        if ($request->title == null) {
            return back()->with('msg', 'عنوان طرح را وارد کنید');
        }

        SubscriptionPlan::create($request->all());
        return redirect()->route('subscription.list')->with('msg', 'با موفقیت افزوده شد');
    }

    function editPlan($id)
    {
        $edit = SubscriptionPlan::find($id);
        if (!$edit) {
            return back()->with('msg', 'موردی یافت نشد');
        }
        return view('admin.subscription.new', compact('edit'));
    }

    function updateSubscription(Request $request,  $id)
    {
        $edit = SubscriptionPlan::find($id);
        if (!$edit) {
            return back()->with('msg', 'موردی یافت نشد');
        }

        $edit->update($request->all());
        return redirect()->route('subscription.list')->with('msg', 'با موفقیت به روز رسانی شد');
    }

    function delete($id)
    {
        $edit = SubscriptionPlan::find($id);
        if (!$edit) {
            return back()->with('msg', 'موردی یافت نشد');
        }
        $edit->delete();
        return redirect()->route('subscription.list')->with('msg', 'با موفقیت حذف شد');
    }
}
