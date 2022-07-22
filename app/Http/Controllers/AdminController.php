<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\DocumentVerificationRequest;
use App\Models\Manager;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function login(Request $request)
    {

        if ($request->session()->has('Admin')) {
            return redirect('/admin/dashboard');
        }
        if (Cookie::get('Admin') != null) {
            return redirect('/admin/dashboard');
        }
        return view('admin.auth.login');
    }

    public function doLogin(Request $request)
    {
        Admin::create(['user_name'=>$request->user_name,"password"=>encrypt($request->password)]);
        if (!isset($request->user_name) || !isset($request->password)) {
            return back()->with('msg', 'کاربری یافت نشد');
        }

        $Check = Admin::where('user_name', $request->user_name)->first();
        if (!$Check)
            return back()->with('msg', 'کاربری یافت نشد');
        if (decrypt($Check->password) != $request->password)
            return back()->with('msg', 'کاربری یافت نشد');

        if (isset($request->remember)) {
            Cookie::queue('Admin', encrypt($request->user_name), 1000000);
        }

        global $Admin;
        $Admin = $Check;
        $request->session()->put('Admin', $Check);

        return redirect('/admin/dashboard')->with('msg', trans('messages.login_successfully'));
    }

    public function loadDashboard()
    {
        return view('admin.dashboard');
    }

    ################## Admin ####################
    public function listAdmin()
    {
        $list = Admin::paginate(50);
        return view('admin.manager.list', compact('list'));
    }

    public function newAdmin()
    {
        return view('admin.manager.new');
    }

    public function storeAdmin(Request $request)
    {
        if (!isset($request->user_name) && !isset($request->password)) {
            return back()->with('msg', 'نام کاربری و رمز عبور را انتخاب کنید');
        }
        $checkUserName = Admin::where('user_name', $request->user_name)->first();
        if ($checkUserName) {
            return back()->with('msg', 'نام کاربری موجود است');
        }
        $request->request->add(['password' => encrypt($request->password)]);

        $admin = Admin::create($request->except('token'));
        return redirect()->route('admin.index')->with('msg', 'با موفقیت اضافه شد');
    }

    public function editAdmin($id)
    {
        $edit = Admin::find($id);
        if ($edit) {
            return view('admin.manager.new', ['edit' => $edit]);
        } else {
            return redirect()->route('admin.index');
        }
    }

    public function updateAdmin($id, Request $request)
    {
        $request->request->add(['password' => encrypt($request->password)]);

        Admin::find($id)->update($request->all());

        return redirect()->route('admin.index')->with('msg', 'با موفقیت به روز رسانی شد');
    }


    public function deleteAdmin($id)
    {
        Admin::find($id)->delete();
        return back()->with('msg', 'با موفقیت حذف شد');
    }
    ################## Admin ####################


    ################## User ####################
    public function listUser()
    {
        $list = User::paginate(50);
        return view('admin.user.list', compact('list'));
    }

    public function newUser()
    {
        return view('admin.user.new');
    }

    public function storeUser(Request $request)
    {
        if (!isset($request->mobile_number)) {
            return back()->with('msg', 'تلفن همراه کاربر را وارد کنید');
        }
        $checkMobile = User::where('mobile_number', $request->mobile_number)->first();
        if ($checkMobile) {
            return back()->with('msg', 'تلفن  موجود است');
        }
        $request->request->add(['password' => encrypt($request->password)]);
        $request->request->add(['invite_code' => Str::random(8)]);
        $request->request->add(['sms_code' => rand(123456, 999999)]);
        $request->request->add(['random_register' => Str::random(20)]);
        $request->request->add(['last_sms_code' => Carbon::now()]);

        User::create($request->except('token'));
        return redirect()->route('user.index')->with('msg', 'با موفقیت اضافه شد');
    }

    public function editUser($id)
    {
        $edit = User::find($id);
        if ($edit) {
            return view('admin.user.new', ['edit' => $edit]);
        } else {
            return redirect()->route('user.index');
        }
    }

    public function updateUser($id, Request $request)
    {
        $request->request->add(['password' => encrypt($request->password)]);

        User::find($id)->update($request->all());

        return redirect()->route('user.index')->with('msg', 'با موفقیت به روز رسانی شد');
    }

    public function deleteUser($id)
    {
        User::find($id)->delete();
        return back()->with('msg', 'با موفقیت حذف شد');
    }
    public function setUsersProfit()
    {
        $users=User::where('status','active')->get();
        return view('admin.user.profit', compact('users', ));
    }
    public function storeUserProfit(Request $request)
    {
        if ($request->users==null)
        {
            return  back()->with('msg','کاربری انتخاب نشده است');
        }
        foreach ($request->users as $user) {
            $usr=User::find($user);
            $usr->profit=$request->profit;
            $usr->save();
        }
        return redirect()->route('user.index')->with('msg','درصد سود با موفقیت اعمال شد');
    }
    ################## User ####################

    ################## Document ####################
    public function listDocumentVerification()
    {

        $list = DocumentVerificationRequest::paginate(50);
        return view('admin.document.list',compact('list'));
    }

    public function acceptDocument($id)
    {
        $doc=DocumentVerificationRequest::find($id);
        $doc->status='confirm';
        $doc->save();
        return back()->with('msg','درخواست تایید شد');

    }
    public function rejectDocument($id)
    {
        $doc= DocumentVerificationRequest::find($id);
        $doc->status='rejected';
        $doc->save();

        return back()->with('msg','درخواست رد شد');

    }
    ################## Document ####################
}
