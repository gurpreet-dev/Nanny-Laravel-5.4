<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Facades\Mail;


class getRecurringProfileStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getRecurringProfileStatus:sendMail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check user service payment status after month and send mail to user if payment incomplete';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::where('subscribed', '1')->get();

        $current_date = date('d/m/Y');


        foreach($users as $user){

            $end_date = date('d/m/Y', strtotime("+2 day",strtotime($user->end_date)));

            if($current_date == $end_date){

                $send = 'METHOD=GetRecurringPaymentsProfileDetails';
                $send.= '&VERSION=86';
                $send.= '&USER=' . urlencode('rupak1-facilitator_api1.avainfotech.com');
                $send.= '&PWD=' . urlencode('EVEWX6U5PK3J3BQK');
                $send.= '&SIGNATURE=' . urlencode('AFcWxV21C7fd0v3bYYYRCpSSRl31AJ3TX24pQaWBAPkAB.iQZWeE0YRT');
                $send.= '&PROFILEID=' .$user->profile_id;

                $curl = curl_init('https://api-3t.sandbox.paypal.com/nvp');
                curl_setopt($curl, CURLOPT_PORT, 443);
                curl_setopt($curl, CURLOPT_HEADER, 0);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_FORBID_REUSE, 1);
                curl_setopt($curl, CURLOPT_FRESH_CONNECT, 1);
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $send);
                $response = curl_exec($curl);
                curl_close($curl);
                if (!$response) {
                    $json['DoDirectPayment failed'] = curl_error($curl);
                }

                $response_info = array();
                parse_str($response, $response_info);

                if(!empty($response_info)){

                    if($response_info['STATUS'] == 'Active'){

                        $data               =   User::find($user->id);
                        $data->start_date   =   $user->end_date;
                        $data->end_date     =   date('Y-m-d H:i:s', strtotime("+1 month", strtotime($user->end_date)));
                        $data->subscribed   =   1;
                        $data->profile_id   =   $response_info['PROFILEID'];

                        $data->save();

                        $logo = URL::to('/').'/images/website/logo.png';

                        Mail::send('emails.service_renewed', ['name' => $user->first_name1, 'url' => $logo], function ($message) use($user)
                        {
                            $message->to($user->email, $user->first_name1)->subject('Website Usage fee recurred');
                            $message->from('kuldeepjha@avainfotech.com','Nanny Portland');
                        
                        });

                    }else{

                        User::where('id', $user->id)->update(['subscribed' => '0']);

                        $logo = URL::to('/').'/images/website/logo.png';

                        Mail::send('emails.service_cancelled', ['name' => $user->first_name1, 'url' => $logo], function ($message) use($user)
                        {
                            $message->to($user->email, $user->first_name1)->subject('Website Usage Service cancelled');
                            $message->from('kuldeepjha@avainfotech.com','Nanny Portland');
                        
                        });
                    }

                }
                
            }    

        }
    }
}
