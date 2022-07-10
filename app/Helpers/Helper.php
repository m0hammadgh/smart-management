<?php

use App\Models\AppSetting;
use App\Models\Bank;
use App\Models\User;
use Kavenegar\KavenegarApi;

function sendSms($mobile, $text, $template_key, $secondValue = null, $thirdValue = null)
{
    $api = new KavenegarApi(getValue('kavenegar_key'));
    $res = $api->VerifyLookup($mobile, $text, $secondValue, $thirdValue, getValue($template_key));

}

function getValue($key): ?string
{
    $appSetting = AppSetting::where('key', $key)->first();
    if ($appSetting) {
        return $appSetting->value;
    }
    return null;
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
    }else if ($status == 'email_verification') {
        return '<label class="badge badge-info"> تایید ایمیل </label>';
    } else if ($status == 'block') {
        return '<label class="badge badge-info"> مسدود</label>';
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
        }
        return '<img height="50px" width="50px" src="/uploads/' . $path . '/' . $image . '"/>';
    }
}

function getUserInfo($id)
{

    $user = User::find($id);

    return '<label class="badge badge-info" >' . $user->name . ' ' . $user->last_name . '</label>';
}

function getBankInfo($id)
{

    $bank = Bank::find($id);
    return '<label class="badge badge-secondary" >' . $bank->title . '</label>';
}
