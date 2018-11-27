<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Twilio\Rest\Client;

class Config extends Model
{

    public static function sms($to, $message){

        $account_sid = env('TWILIO_ACCOUNT_SID', '');
        $auth_token = env('TWILIO_AUTH_TOKEN', '');
        $twilio_number = env('TWILIO_NUMBER', '');
        $country_code = env('TWILIO_COUNTRY_CODE', '');

        $client = new Client($account_sid, $auth_token);

        $client->messages->create(
            $country_code.''.$to,
            array(
                'from' => $twilio_number,
                'body' => $message
            )
        );
    }

    public static function serviceCharge(){

        $service_charge = env('SERVICE_CHARGE', '');

        return $service_charge;
    }

}
