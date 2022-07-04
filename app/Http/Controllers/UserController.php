<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Kavenegar\KavenegarApi;

class UserController extends Controller
{
    #################### User ####################
    public function login(Request $request)
    {

//        if ($request->session()->has('User')) {
//            return redirect('/user/dashboard');
//        }
//        if (Cookie::get('User') != null) {
//            return redirect('/auserdmin/dashboard');
//        }
        return view('user.auth.login');
    }

    public function doLogin(Request $request)
    {

        if (!isset($request->mobile_number) || !isset($request->password)) {
            return back()->with('msg', 'کاربری یافت نشد');
        }

        $Check = User::where('mobile_number', $request->mobile_number)->first();
        if (!$Check)
            return back()->with('msg', 'کاربری یافت نشد');
        if (decrypt($Check->password) != $request->password)
            return back()->with('msg', 'کاربری یافت نشد');

        if (isset($request->remember)) {
            Cookie::queue('User', encrypt($request->user_name), 1000000);
        }

        global $User;
        $User = $Check;
        $request->session()->put('User', $Check);

        return redirect('/user/dashboard')->with('msg', trans('messages.login_successfully'));
    }

    public function register(Request $request)
    {

//        if ($request->session()->has('User')) {
//            return redirect('/user/dashboard');
//        }
//        if (Cookie::get('User') != null) {
//            return redirect('/auserdmin/dashboard');
//        }
        return view('user.auth.register');
    }

    public function doregister(Request $request)
    {
        if (!isset($request->mobile_number)) {
            return back()->with('msg', 'شماره موبایل را وارد کنید');
        }
        if (!isset($request->password)) {
            return back()->with('msg', 'رمز عبور  را وارد کنید');
        }


        if (isset($request->password) && Str::length($request->password) < 8) {
            return back()->with('msg', 'رمز عبور باید 8 کاراکتر و از ارقام و حروف تشکیل شده باشد');
        }

        if (isset($request->email) && $request->email != "" && Str::length($request->email) < 8) {
            return back()->with('msg', 'ایمیل وارد شده صحیح نمی باشد');
        }
        $existsMobile = User::where('mobile_number', $request->mobile_number)->first();
        if ($existsMobile) {
            return back()->with('msg', 'شماره موبایل وارد شده تکراری است');
        }
        $user = User::create([
            'mobile_number' => $request->mobile_number,
            'password' => encrypt($request->password),
            'email' => $request->email,
            'invite_code' => Str::random(8),
            'sms_code' => rand(123456, 999999),
            "random_register" => Str::random(20),
            "last_sms_code" => Carbon::now(),
        ]);

        global $User;
        $User = $user;
        Cookie::queue('User', encrypt($request->mobile_number), 1000000);

        $request->session()->put('User', $user);
        return redirect()->route('user.dashboard');
    }

    public function showMobileVerification($uuid)
    {
        $user = User::where('random_register', $uuid)->first();
        if (!$user) {
            return redirect()->route('user.login')->with('msg', 'کاربری با اطلاعات ارسالی یافت نشد');
        }
        if ($user->mobile_verified == true) {
            return redirect()->route('user.dashboard')->with('msg', 'شماره همراه تایید شده است');

        }
        sendSms($user->mobile_number, $user->sms_code, 'register_sms_key');
        $mobile = $user->mobile_number;
        $user_id = $user->id;
        return view('user.auth.verify_mobile', compact(['user_id', 'mobile', 'uuid']));
    }

    public function verifyMobileNumber(Request $request, $uuid)
    {
        $user = User::where('random_register', $uuid)->first();
        if (!$user) {
            return back()->with('msg', 'کاربری با اطلاعات ارسالی یافت نشد');
        }

        if ($user->sms_code == $request->code) {
            if (Carbon::parse($user->last_sms_code)->addMinutes(2)->isBefore(Carbon::now())) {
                $user->sms_code = rand(123456, 999999);
                $user->last_sms_code = Carbon::now();
                $user->save();
                sendSms($user->mobile_number, $user->sms_code, 'register_sms_key');
                return view('user.auth.verify_mobile', compact(['user_id' => $user->id, 'mobile' => $user->mobile_number, 'uuid']))->with('msg', 'کد وارد شده منقضی شده است');

            }
            $user->mobile_verified = true;
            $user->save();
            return redirect('user/dashboard');
        } else {
            return view('user.auth.verify_mobile', ['user_id' => $user->id, 'mobile' => $user->mobile_number, 'uuid'=>$uuid])
                ->with('msg', 'کد وارد شده صحیح نمی باشد');
        }

    }

    public function logout(Request $request)
    {
        $request->session()->forget('Admin');
        Cookie::queue('Admin', '', -1);
        return redirect('/user/login');
    }
    #################### User ####################

    ################# Dashboard ################
    public function loadDashboard()
    {

        global $User;
        if ($User->mobile_verified == false) {
            return redirect()->route('user.verify.mobile', [$User->random_register])->with('msg', 'جهت ادامه ، شماره همراه خود را تایید کنید');
        }

        return view('user.dashboard', ['user' => $User]);
    }
}

