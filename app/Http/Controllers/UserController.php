<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Bank;
use App\Models\BankAccount;
use App\Models\ComparePrice;
use App\Models\CurrencyCompare;
use App\Models\DocumentVerificationRequest;
use App\Models\Exchange;
use App\Models\Factor;
use App\Models\SubscriptionPlan;
use App\Models\TradeHistory;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserPlan;
use App\Traits\PaymentHelperTrait;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Kavenegar\KavenegarApi;

class UserController extends Controller
{
    use PaymentHelperTrait;

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
                $user->expire_time = Carbon::now()->addDays(getValue('new_user_trial_day'));
                $user->save();
                sendSms($user->mobile_number, $user->sms_code, 'register_sms_key');
                $user_id = $user->id;
                $mobile = $user->mobile_number;
                return view('user.auth.verify_mobile', compact(['user_id', 'mobile', 'uuid']))->with('msg', 'کد وارد شده منقضی شده است');

            }
            $user->mobile_verified = true;
            $user->save();
            $factor = Factor::create([
                'user_id' => $user->id,
                'price' => 0,
                'status' => "paid",
                'description' => "فعالسازی طرح آزمایشی",

            ]);
            UserPlan::create([
                "user_id" => $user->id,
                "plan_id" => 4,
                "expire_time" => Carbon::now()->addDays(SubscriptionPlan::find(4)->duration),
                "purchased_time" => Carbon::now(),
                "factor_id" => $factor->id,
            ]);
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
        global $User;

        $subscriptionPLan = SubscriptionPlan::all();
        $plan = UserPlan::where('user_id', $User->id)->first();
        $bankAccounts = BankAccount::where('user_id', $User->id)->where('status', 'confirm')->get();
        return view('user.profile.profile', compact('subscriptionPLan', 'plan', 'bankAccounts'));
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
        $tradeHistories = TradeHistory::where('user_id', $User->id)->whereDate('created_at', '>', Carbon::now()->subDays(7))->orderBy('id', 'DESC')->paginate(30);
        $compares = CurrencyCompare::all();
        $exchanges = Exchange::count();
        $activeBalance = $User->active_balance;
        $profit = $User->profit;
        $todayTradesCalculation = TradeHistory::whereDate('created_at', Carbon::today())->where('success', 1)->get();
        $todayTrades = TradeHistory::whereDate('created_at', Carbon::today())->where('user_id', $User->id)->count();
        $averageProfit = 0;
        $sumProfit = 0;
        foreach ($todayTradesCalculation as $todayTrade) {
            $sumProfit += $todayTrade->profit;
        }
        $averageProfit = $todayTrades == 0 ? 0 : $sumProfit / $todayTrades;
        $stackedAmount = ($User->active_balance / $exchanges) * $todayTrades;
        $totalProfit = $User->profit * $stackedAmount;
        return view('user.dashboard', ['user' => $User, 'tradeHistories' => $tradeHistories, 'compares' => $compares], compact('exchanges', 'todayTrades', 'stackedAmount', 'activeBalance', 'profit', 'totalProfit', 'averageProfit', 'User'));
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
        sendSms(getValue('admin_number'), $user->mobile_number, 'admin_user_completed_profile');

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
        $banks = Bank::all();
        $list = BankAccount::where('user_id', $User->id)->paginate(10);
        return view('user.credit-card.list', compact('list', 'banks',));
    }

    public function storeCreditCard(Request $request)
    {
        global $User;
        $request->request->add(['user_id' => $User->id]);
        BankAccount::create($request->all());
        sendSms(getValue('admin_number'), $User->name, 'admin_new_credit_card');

        return redirect()->route('user.card.list');
    }

    ################# Bank Card Account ################

    public function loadRobotStatistics()
    {
        global $User;
        $plan = UserPlan::where('user_id', $User->id)->first();
        $exchanges = Exchange::count();
        $activeBalance = $User->active_balance;
        $profit = $User->profit;
        $todayTradesCalculation = TradeHistory::whereDate('created_at', Carbon::today())->where('success', 1)->get();
        $todayTrades = TradeHistory::whereDate('created_at', Carbon::today())->where('user_id', $User->id)->count();
        $averageProfit = 0;
        $sumProfit = 0;
        foreach ($todayTradesCalculation as $todayTrade) {
            $sumProfit += $todayTrade->profit;
        }
        $averageProfit = $todayTrades == 0 ? 0 : $sumProfit / $todayTrades;
        $stackedAmount = ($User->active_balance / $exchanges) * $todayTrades;
        $totalProfit = $User->profit * $stackedAmount;
        $userProfit = $totalProfit - (($totalProfit * $plan->plan->user_profit) / 100);
        $siteProfit = $totalProfit - (($totalProfit * $plan->plan->admin_profit) / 100);
        return view('user.robot.index', compact('plan', 'userProfit', 'siteProfit', 'averageProfit', 'stackedAmount', 'User', 'todayTrades', 'totalProfit', 'exchanges'));
    }

    public function loadAccountant()
    {
        return view('user.accountant.index');
    }

    public function payWithTrc20(Request $request)
    {
        global $User;
        $factor = Factor::create([
            "user_id" => $User->id,
            "type" => 'balance',
            "price" => $request->number,
            "status" => "waiting",
            "description" => 'افزایش موجودی از طریق تتر',
            "token" => Str::random(8) . Carbon::now()->timestamp,
        ]);
        return Redirect::to($this->payByCrypto($factor, 'افزایش موجودی حساب از طریق تتر'));
    }

    public function payWithRial(Request $request)
    {
        global $User;
        $factor = Factor::create([
            "user_id" => $User->id,
            "type" => 'balance',
            "price" => $request->number,
            "status" => "waiting",
            "description" => 'افزایش موجودی از طریق ریال',
            "mode" => 'rial',
            "token" => Str::random(8) . Carbon::now()->timestamp,

        ]);

        $apiURL = 'https://ipg.vandar.io/api/v3/send';
        $postInput = [
            'api_key' => getValue('vendar_payment_key'),
            'amount' => $factor->price,
            'callback_url' => env('BASE_URL')."/verifyRial"
        ];
        $response = Http::post($apiURL, $postInput);

        if (json_decode($response)->status == 0) {
            return json_decode($response)->errors[0];
        }
        $factor->payment_id = json_decode($response)->token;
        $factor->save();
        return Redirect::to('https://ipg.vandar.io/v3/' . json_decode($response)->token);
//        return  Redirect::to($this->payByRial($factor,'افزایش موجودی حساب از طریق ریال')) ;
    }

    public function payWithTransfer(Request $request)
    {
        global $User;
        $factor = Factor::create([
            "user_id" => $User->id,
            "type" => 'balance',
            "price" => $request->number,
            "status" => "waiting",
            "transfer_type" => $request->transfer_type,
            "description" => 'افزایش موجودی از طریق انتقال',
            "mode" => 'transfer',
            "token" => Str::random(8) . Carbon::now()->timestamp,
        ]);
        if ($request->image != null) {
            $imageName = time() . Str::random(5) . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/transfer'), $imageName);
            $factor->image=$imageName;
            $factor->save();
        }
        return back()->with('msg','درخواست واریز ثبت شد و پس از تایید به حساب شما افزوده خواهد شد');
    }

    public function verifyVendar(Request $request)
    {
        global $User;
        $user = User::find($User->id);
        if ($request->get('payment_status ') == 'OK') {
            $factor = Factor::where('payment_id', $request->get('token'))->first();
            if ($factor) {
                $apiURL = 'https://ipg.vandar.io/api/v3/transaction';
                $postInput = [
                    'api_key' => getValue('vendar_payment_key'),
                    'token' => $factor->payment_id,
                ];
                $response = Http::post($apiURL, $postInput);
                if (json_decode($response)->status == 1) {
                    $apiURLVerify = 'https://ipg.vandar.io/api/v3/verify';
                    $postInputVerify = [
                        'api_key' => getValue('vendar_payment_key'),
                        'token' => $factor->payment_id,
                    ];
                    $responseVerify = Http::post($apiURLVerify, $postInputVerify);
                    if (json_decode($responseVerify)->status == 1) {
                        $decodeResponse = json_decode($responseVerify);
                        $factor->status = "paid";
                        $user->activating_balance += $factor->price;
                        $user->save();
                        $factor->save();
                        Transaction::create(
                            [
                                "factor_id" => $factor->id,
                                "status" => "1",
                                "amount" => $decodeResponse->amount,
                                "realAmount" => $decodeResponse->realAmount,
                                "wage" => $decodeResponse->wage,
                                "transId" => $decodeResponse->transId,
                                "paymentDate" => $decodeResponse->paymentDate,
                            ]
                        );
                    }

                }
            }
        }
    }



}

