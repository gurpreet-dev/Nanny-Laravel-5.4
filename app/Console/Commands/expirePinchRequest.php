<?php

namespace App\Console\Commands;
use App\User;
use Illuminate\Console\Command;

use App\Review;
use App\Order;
use App\Invoice;
use App\Price;
use App\FamilyRequest;
use App\Config;
use DB;
use DateTime;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class expirePinchRequest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'request:expirePinchRequest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Expire request automatically after 6 hrs of inactivity';

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

       $requests = FamilyRequest::with(['user'])->where(['type_id' => '2', 'status' => 2])->get();

       foreach($requests as $request){

            $datetime1 = new DateTime($request->created_at);
            $datetime2 = new DateTime();
            $interval = $datetime1->diff($datetime2);

            if($interval->format('%h') > 6){

                $update = FamilyRequest::find($request->id);
                $update->status = 0;

                if($update->save()){

                    $logo = URL::to('/').'/images/website/logo.png';

                    Mail::send('emails.pinch_request_expired', ['url' => $logo, 'request' => $request], function ($message) use($request)
                    {
                        $message->to($request->user->email, $request->user->first_name1)->subject('Pinch request cancelled');
                        $message->from('kuldeepjha@avainfotech.com','Nanny Portland');
                    
                    });

                    Config::sms($request->user->mobile1, 'Your Pinch request with ID: '.$request->id.' has been expired. We are unable to assign nanny for your request.'); // sms to user
                    Config::sms(User::admin('mobile'), 'A Pinch request with ID: '.$request->id.' has been expired.'); // sms to user

                }

            }

       }
        
    }
}
