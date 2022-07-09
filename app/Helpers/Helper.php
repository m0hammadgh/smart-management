<?php

use App\Models\AppSetting;
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
    }
    elseif ($status == 'new') {
        return '<label class="badge badge-warning">درانتظار تایید </label>';
    }
    else
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
    } else if ($status == 'block') {
        return '<label class="badge badge-info"> مسدود</label>';
    } else
        return '<label class="badge badge-warning"> غیر فعال</label>';

}
