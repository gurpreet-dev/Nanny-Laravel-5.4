<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Review;
use App\Order;
use App\Invoice;
use App\Price;

use App\Config;

use DB;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

use Twilio\Rest\Client;

class GuestsController extends Controller
{   

    public function welcome(){

        $reviews = Review::with(['user'])->get();

        return view('welcome', ['reviews' => $reviews]);
    }

    public function getRecurringProfileStatus(){

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
                $send.= '&PROFILEID=' .'I-XCT49JUFLLHA';

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

                    if($response_info['STATUS'] != 'Active'){

                        User::where('id', $user->id)->update(['subscribed' => '0']);

                        Mail::send('emails.service_cancelled', ['name' => $user->first_name1], function ($message) use($user)
                        {
                            $message->to($user->email, $user->first_name1)->subject('Website Usage Service cancelled');
                            $message->from('kuldeepjha@avainfotech.com','Nanny Portland');
                        
                        });

                    }

                }
                
            }    

        }

        exit;
    }


    public function reviews(){

        $reviews = Review::with(['user'])->orderby('id', 'desc')->get();

        return view('reviews', ['reviews' => $reviews]);
    }

    public function yelpReviews(){

        return view('yelp_reviews');
    }

    public function contact(Request $request){

        if($request->isMethod('post')){
            $post = $request->except('_token');

            $post['created_at'] = \Carbon\Carbon::now()->toDateTimeString();

            $insert = DB::table('contacts')->insert($post);
            
            if($insert){

                $admin = DB::table('admins')->where('id', 1)->first();

                $logo = URL::to('/').'/images/website/logo.png';

                Mail::send('emails.contact_to_admin', ['data' => $post, 'url' => $logo], function ($message) use($admin)
                {
                    $message->to($admin->email, $admin->first_name)->subject('Contact us query recieved');
                    $message->from($admin->email,'Nanny Portland');
                
                });

                return redirect('contact')->with('success', 'Your query has been submitted to our support. We will contact you soon.');
            }else{
                return redirect('contact')->with('error', 'Error in submitting a query. Please try again');
            }
        }

        return view('contact');
    }

    public function test(){

        Mail::send('emails.test', [], function ($message)
        {
            $message->to('prateek@avainfotech.com', 'nanny')->subject('Approval');
            $message->from('kuldeepjha@avainfotech.com','Nanny Portland');
        
        });

    	return view('test');
    }

    public function generateInvoice(){

        $orders = Order::with(['last_invoice', 'attendence', 'nanny', 'user'])->where('status', '1')->get();
        
        $current_date = date('d-m-Y');

        $orders = json_decode(json_encode($orders), true);

        foreach($orders as $order){

            if(!empty($order['last_invoice'])){
     
                $last_invoice_date =  strtotime($order['last_invoice']['created_at']);  // if today :2013-05-23

                $date = date('d-m-Y', strtotime('+15 days', $last_invoice_date));

            }else{

                $start_date = strtotime($order['start_date']);

                $date = date('d-m-Y',strtotime('+15 days', $start_date));

            }
             

            //if($current_date == $date){
                if(!empty($order['attendence'])){
                    $price = 0;
                    $total_hours    =   0;

                    foreach($order['attendence'] as $attendence){
                        if($attendence['end_time'] != ''){
                            $start_time = strtotime($attendence['start_time']);
                            $end_time = strtotime($attendence['end_time']);
                            //$minutes = round(abs($end_time - $start_time) / 60,2);
                            $hours = round(abs($end_time - $start_time) / 3600,2);
                            $price = $price + ($hours * 20);

                            $total_hours = $total_hours + $hours;
                        }    
                    }
                    
                    $invoice = [
                        'order_id'      =>  $order['id'],
                        'user_id'      =>  $order['user_id'],
                        'time'          =>  $total_hours,
                        'price'         =>  $price,
                        'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
                    ];

                    $insert_id = Invoice::create($invoice)->id;

                    if($insert_id){

                        Order::where('id', $order['id'])->update(['last_invoice' => $insert_id, 'updated_at'   =>  \Carbon\Carbon::now()->toDateTimeString()]);

                        $invoice = Invoice::where('id', $insert_id)->first();

                        $data = array();

                        $logo = URL::to('/').'/images/website/logo.png';

                        Mail::send('emails.new_invoice_alert', ['url' => $logo, 'order' => $order, 'invoice' => $invoice], function ($message) use($order)
                        {
                            $message->to($order['user']['email'], $order['user']['first_name1'])->subject('New Request arrived');
                            $message->from('kuldeepjha@avainfotech.com','Nanny Portland');
                        
                        });

                    }

                }    

            //}
        
        }
        
        exit;

    }

    public function pricings(){
        return view('pricings');
    }

    public function getPageBySlug($slug){
        $page = DB::table('static_pages')->where('slug', $slug)->first();
        return view('page', ['page' => $page]);
    }

}
