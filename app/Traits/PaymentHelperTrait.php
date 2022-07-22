<?php

namespace App\Traits;

use App\Models\Factor;
use Illuminate\Support\Facades\Http;

trait PaymentHelperTrait
{
    function payByCrypto(Factor $factor, $description): string
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.nowpayments.io/v1/invoice',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
  "price_amount": ' . $factor->price . ',
  "price_currency": "usd",
  "order_id": ' . $factor->id . ',
  "order_description": "' . $description . '",
  "ipn_callback_url": "https://test.com/paycallback",
  "success_url": "https://test.com/paycallback",
  "cancel_url": "https://test.com/failed"
}

',
            CURLOPT_HTTPHEADER => array(
                'x-api-key: ' . getValue('crypto_payment_key'),
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $factor->mode = 'tether';
        $factor->payment_id = json_decode($response)->id;
        $factor->save();
        return json_decode($response)->invoice_url;
    }

    function payByRial(Factor $factor, $description): string
    {

        $apiURL = 'https://ipg.vandar.io/api/v3/send';
        $postInput = [
            'api_key' => getValue('vendar_payment_key'),
            'amount' => $factor->price,
            'callback_url' => 'http://127.0.0.1/verify/rial'
        ];
        $response = Http::post($apiURL, $postInput);

        dd( json_decode($response));
        $factor->payment_id = json_decode($response)->id;
        $factor->save();
        return json_decode($response)->invoice_url;
    }


}
