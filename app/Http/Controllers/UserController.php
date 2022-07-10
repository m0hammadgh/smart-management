<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Bank;
use App\Models\BankAccount;
use App\Models\DocumentVerificationRequest;
use App\Models\SubscriptionPlan;
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
                $user_id = $user->id;
                $mobile = $user->mobile_number;
                return view('user.auth.verify_mobile', compact(['user_id', 'mobile', 'uuid']))->with('msg', 'کد وارد شده منقضی شده است');

            }
            $user->mobile_verified = true;
            $user->save();
            return redirect('user/dashboard');
        } else {
            return view('user.auth.verify_mobile', ['user_id' => $user->id, 'mobile' => $user->mobile_number, 'uuid' => $uuid])
                ->with('msg', 'کد وارد شده صحیح نمی باشد');
        }

    }

    public function showEmailVerification()
    {
        return view('user.auth.verify_email');
    }

    public function verifyEmailAddress(Request $request)
    {
        global $User;
        $user = User::find($User->id);
        if (!isset($request->code)) {
            return back()->with('msg', "کد را وارد کنید");
        }
        if ($user->sms_code == $request->code) {
            $user->email_verified = true;
            $user->status = 'review_document';
            $user->save();
            DocumentVerificationRequest::create(["user_id" => $user->id, "type" => "national_card", "file" => $user->national_card]);
            return redirect()->route('user.dashboard')->with('msg', 'حساب شما پس از تایید مدارک توسط کارشناسان فعال خواهد شد');
        } else {
            return back()->with('msg', 'کد وارد شده صحیح نمی باشد');
        }


    }

    public function showProfile()
    {
        $subscriptionPLan=SubscriptionPlan::all();

        return view('user.profile.profile',compact('subscriptionPLan'));
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
    ################# Dashboard ################

    ################# User ################
    public function completeProfileInfo()
    {
        return view('user.profile.fill_info');
    }

    public function submitInformation(Request $request)
    {
        if (!isset($request->name) || !isset($request->last_name) || !isset($request->national_id)) {
            return back()->with('msg', 'اطلاعات وارد شده اشتباه است');
        }
        if ($request->national_card_file != null) {
            $imageName = time() . Str::random(5) . '.' . $request->national_card_file->extension();
            $request->national_card_file->move(public_path('uploads/verification'), $imageName);
            $request->request->add(['national_card' => "uploads/verification/" . $imageName]);
        }
        $request->request->add(['status' => "email_verification"]);
        $request->request->add(['sms_code' => rand(123456, 999999)]);
        global $User;
        $user = $User;
        $user->update($request->except('_token'));
        return redirect()->route('user.email_verification')->with('msg', 'ایمیل خود را تایید کنید');


    }

    ################# User ################
    ################# Document Review Requests ################
    public function listRequests()
    {
        global $User;
        $list = DocumentVerificationRequest::where('user_id', $User->id)->paginate(50);
        return view('user.requests.list', compact('list'));
    }
    ################# Document Review Requests ################


    ################# Bank Card Account ################
    public function listUserCreditCards()
    {
        global $User;
        $banks=Bank::all();
        $list = BankAccount::where('user_id', $User->id)->paginate(10);
        return view('user.credit-card.list', compact('list','banks',));
    }

    public function storeCreditCard(Request $request)
    {
        global $User;
        $request->request->add(['user_id' => $User->id]);
         BankAccount::create($request->all());
        return redirect()->route('user.card.list');
    }
    ################# Bank Card Account ################

    public function loadRobotStatistics()
    {
        return view('user.robot.index');
    }

    public function loadAccountant()
    {
        return view('user.accountant.index');
    }


}

