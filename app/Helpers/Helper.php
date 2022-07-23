<?php

use App\Models\AppSetting;
use App\Models\Bank;
use App\Models\OwnerBankAccount;
use App\Models\User;
use App\Models\UserPlan;
use Carbon\Carbon;
use Kavenegar\KavenegarApi;
use Morilog\Jalali\Jalalian;

function sendSms($mobile, $text, $template_key, $secondValue = null, $thirdValue = null)
{
    $api = new KavenegarApi(getValue('kavenegar_key'));
    $template = getValue($template_key);
    $res = $api->VerifyLookup($mobile, $text, $secondValue, $thirdValue, $template);

}

function getValue($key): ?string
{
    $appSetting = AppSetting::where('key', $key)->first();
    if ($appSetting) {
        return $appSetting->value;
    }
    return null;
}

function getOwnerBank()
{
    return OwnerBankAccount::first();
}

function getAdminAccess($active)
{
    if ($active == 1) {
        return '<label class="badge badge-success"> فعال</label>';
    } else
        return '<label class="badge badge-warning"> غیر فعال</label>';

}

function getDocumentVerificationType($type)
{
    return '<label class="badge badge-success"> تایید مدارک هویتی - کارت ملی</label>';


}

function getDocumentVerificationStatus($status)
{
    if ($status == 'confirm') {
        return '<label class="badge badge-success"> تایید شده</label>';
    } elseif ($status == 'new') {
        return '<label class="badge badge-warning">درانتظار تایید </label>';
    } else
        return '<label class="badge badge-danger">عدم تایید</label>';


}

function getUserStatus($status)
{
    if ($status == 'active') {
        return '<label class="badge badge-success"> فعال</label>';
    } else if ($status == 'new') {
        return '<label class="badge badge-info"> جدید</label>';
    } else if ($status == 'mobile_verification') {
        return '<label class="badge badge-info"> تایید موبایل</label>';
    } else if ($status == 'document_verification') {
        return '<label class="badge badge-info"> تایید مدارک</label>';
    } else if ($status == 'fill_information') {
        return '<label class="badge badge-info"> تکمیل اطلاعات</label>';
    } else if ($status == 'email_verification') {
        return '<label class="badge badge-info"> تایید ایمیل </label>';
    } else if ($status == 'block') {
        return '<label class="badge badge-info"> مسدود</label>';
    } else if ($status == 'review_document') {
        return '<label class="badge badge-info"> فعالسازی مدارک</label>';
    } else
        return '<label class="badge badge-warning"> غیر فعال</label>';

}

function getBankAccountStatus($status)
{
    if ($status == 'confirm') {
        return '<label class="badge badge-success"> تایید شده</label>';
    } else if ($status == 'review') {
        return '<label class="badge badge-info"> در انتظار بررسی</label>';
    } else if ($status == 'reject') {
        return '<label class="badge badge-warning"> عدم تایید</label>';
    }

}

function getBankAccountType($type)
{
    if ($type == 'card') {
        return '<label class="badge badge-success"> کارت</label>';
    } elseif ($type == 'account') {
        return '<label class="badge badge-success"> حساب بانکی</label>';
    }

}

function getBladeImage($image, $type, $id = 0)
{

    $path = '';
    if ($image != null) {
        switch ($type) {
            case 'bank':
                $path = "bank";
                break;
            case 'currency':
                $path = "currency";
                break;
            case 'exchange':
                $path = "exchange";
                break;
        }
        return '<img height="50px" width="50px" src="/uploads/' . $path . '/' . $image . '"/>';
    }
}

function getUserInfo($id)
{

    $user = User::find($id);

    return '<label class="badge badge-info" >' . $user->name ??"" . ' ' . $user->last_name ??"" . '</label>';
}

function getBankInfo($id)
{

    $bank = Bank::find($id);
    return '<label class="badge badge-secondary" >' . $bank->title . '</label>';
}


function convertCreateAtToPersianDateTime($createdAt)
{
    $dateTime = Carbon::createFromFormat('Y-m-d H:i:s', $createdAt)->setTimezone('Asia/Tehran');
    $date = Jalalian::forge($dateTime)->format('Y/m/d-h:m');
    return $date;

}

function getUserSubscriptionDayRemaining($id)
{
    $userPlan = UserPlan::where('user_id', $id)->first();
    if (Carbon::now()->isAfter(Carbon::parse($userPlan->expire_time))) {
        return "منقضی شده";
    }
    return Carbon::parse($userPlan->expire_time)->diffInDays(Carbon::now());


}

function getUserSubscriptionUserProfit($id)
{
    $userPlan = UserPlan::where('user_id', $id)->first();
    if (Carbon::now()->isAfter(Carbon::parse($userPlan->expire_time))) {
        return "-";
    }
    return $userPlan->plan->user_profit;

}

function getWithdrawType($type)
{
    if ($type == "rial") {
        return "واریز به حساب";
    } else {
        return "تتر";
    }


}

function getTypeOfFactor($type)
{
    if ($type == "rial") {
        return "درگاه بانکی";
    } else if ($type == "tether") {
        return "تتر";
    } else {
        return "انتقال";
    }

}

function calculateOnlineTime($type, $date)
{
    $remaining = '';
    if ($type == "rial") {
        return Carbon::parse($date)->addHours(36)->diffInHours(Carbon::now());
    } else if ($type == "tether") {
        return Carbon::parse($date)->addHours(48)->diffInHours(Carbon::now());

    } else if ($type == "transfer") {
        return Carbon::parse($date)->addHours(48)->diffInHours(Carbon::now());
    }
    return $remaining;

}
function getFactorStatus($status)
{
    $remaining = '';
    if ($status == "waiting") {
        return "در انتظار";
    } else if ($status == "paid") {
        return "پرداخت شده";

    }
    else {
        return "لفو شده";

    }

}

function calculateOnlineTimeNote($type): string
{
    $remaining = '';
    if ($type == "rial") {
        return "36 ساعت بعد از انتقال وارد معامله می شود ";
    } else if ($type == "tether") {
        return "48 ساعت بعد از انتقال وارد معامله می شود ";

    } else if ($type == "transfer") {
        return "48 ساعت بعد از انتقال وارد معامله می شود ";
    }
    return $remaining;

}

function getWithdrawStatus($status)
{
    if ($status == "confirm") {
        return "تایید شده";
    } else if ($status == "new") {
        return "درانتظار";
    } else {
        return "رد شده";
    }
}

function getUserSubscriptionAdminProfit($id)
{
    $userPlan = UserPlan::where('user_id', $id)->first();
    if (Carbon::now()->isAfter(Carbon::parse($userPlan->expire_time))) {
        return "-";
    }
    return $userPlan->plan->admin_profit;

}
