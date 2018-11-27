<?php

namespace App\Http\Controllers;

use App\User;
use App\FamilyRequest;
use App\Invoice;
use App\Review;
use App\Order;
use App\Price;
use App\Checkin;
use App\Type;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Hash;

use App\Mail\serviceCancelled;
use Illuminate\Support\Facades\Mail;
use Response;
use Illuminate\Support\Facades\URL;

class UsersController extends Controller
{   

    public function __construct(){
        $this->middleware('auth');
    }


    public function profile(User $user)
    {   
        $user = Auth::user();

        $user = DB::table('users')->where('id', $user->id)->first();

        return view('user.profile', ['user' => $user]);
    }


    public function editProfile(Request $request)
    {
        $user_info = User::where('id', Auth::id())->first();

        if($request->isMethod('post')){

            $user               = User::find(Auth::id());

            $post = $request->all();

            if(isset($post['image'])){

                if($user_info->image != ''){
                    if(file_exists(public_path('/images/users/'.$user_info->image))){
                        unlink(public_path('/images/users/'.$user_info->image));
                    }
                }
                
                $file = $request->file('image');
                $imageName = time().$file->getClientOriginalName();
                $upload = $file->move(public_path('/images/users/'), $imageName); 
                $user->image  = $imageName;
            }

            $user->first_name1  = $request->first_name1;
            $user->last_name1   = $request->last_name1;
            $user->mobile1      = $request->mobile1;
            $user->address_1    = $request->address_1;
            $user->childs       = $request->childs;
            $user->ages         = json_encode($request->ages);

            if($user->save()){
                return redirect('user/profile')->with('success', 'Profile updated successfully');
            }else{
                return redirect('user/editprofile')->with('error', 'Error in profile updation. Please try again later.');
            }

        }

        return view('user.edit_profile', ['user' => $user_info]);
    }

    public function changePassword(Request $request){

        $user = Auth::user();

        if ($request->isMethod('post')) {
            
            if(!Hash::check($request->opassword, $user->password)){ // Matching old password
                return back()
                            ->with('error','The specified password does not match the database password');
            }else{

                $password = Hash::make($request->cpassword); // Encrypting new password

                User::where('id', $user->id)->update(['password' => $password]);

                return back()
                           ->with('success','Password changed successfully');
            }
        }

        return view('user.changepassword');
    }


    public function editCard(Request $request){

        if ($request->isMethod('post')) {
        }

        return view('user.editcard');
    }


    public function payments(){

        $pending_invoices = Invoice::with(['user', 'order' => function($query) {
            $query->with(['nanny']);
        }])->where(['user_id' => Auth::id(), 'status' => 0])->get();

        $complete_invoices = Invoice::with(['user', 'order' => function($query) {
            $query->with(['nanny']);
        }])->where(['user_id' => Auth::id(), 'status' => 1])->get();
        
        //dd($pending_invoices);

        return view('user.payments', ['pending_invoices' => $pending_invoices, 'complete_invoices' => $complete_invoices]);
    }


    public function paypalaftersignup(){

        $send = 'METHOD=SetExpressCheckout';
        $send.= '&VERSION=86';
        $send.= '&USER=' . urlencode('rupak1-facilitator_api1.avainfotech.com');
        $send.= '&PWD=' . urlencode('EVEWX6U5PK3J3BQK');
        $send.= '&SIGNATURE=' . urlencode('AFcWxV21C7fd0v3bYYYRCpSSRl31AJ3TX24pQaWBAPkAB.iQZWeE0YRT');
        $send.= '&L_BILLINGTYPE0=' .'RecurringPayments';
        $send.= '&L_BILLINGAGREEMENTDESCRIPTION0=' . 'WebsiteUsageFee';
        $send.= '&cancelUrl=' . url("/").'/cancel';
        $send.= '&returnUrl=' . url("/").'/after/payment';

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
        $json = array();
        if (($response_info['ACK'] == 'Success')){
            return redirect()->away('https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token='.$response_info['TOKEN']);
        }else{
            die('Error');
        }

        exit;

    }


    public function signuppayment(Request $request){

        $user = Auth::user();

        $send = 'METHOD=GetExpressCheckoutDetails';
        $send.= '&VERSION=86';
        $send.= '&USER=' . urlencode('rupak1-facilitator_api1.avainfotech.com');
        $send.= '&PWD=' . urlencode('EVEWX6U5PK3J3BQK');
        $send.= '&SIGNATURE=' . urlencode('AFcWxV21C7fd0v3bYYYRCpSSRl31AJ3TX24pQaWBAPkAB.iQZWeE0YRT');
        $send.= '&TOKEN=' .$request->cc_token;

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
        $json = array();
        if (($response_info['ACK'] == 'Success')){
            

        /****************/


            $payment_type = 'Authorization';
            $amount = 13.00;

            $send = 'METHOD=CreateRecurringPaymentsProfile';
            $send.= '&VERSION=86';
            $send.= '&USER=' . urlencode('rupak1-facilitator_api1.avainfotech.com');
            $send.= '&PWD=' . urlencode('EVEWX6U5PK3J3BQK');
            $send.= '&SIGNATURE=' . urlencode('AFcWxV21C7fd0v3bYYYRCpSSRl31AJ3TX24pQaWBAPkAB.iQZWeE0YRT');
            $send.= '&CUSTREF=' . (int)$user->id;
            $send.= '&PAYMENTACTION=' . $payment_type;
            $send.= '&INITAMT='. $amount;
            $send.= '&AMT=' . $amount;
            $send.= '&BILLINGPERIOD=' . 'Month';
            $send.= '&BILLINGFREQUENCY=' . '1';
            $send.= '&PROFILESTARTDATE='.gmdate("Y-m-d\TH:i:s\Z");
            $send.= '&DESC='.'WebsiteUsageFee';
            $send.= '&TOKEN='.$response_info['TOKEN'];
            $send.= '&PAYERID='.$response_info['PAYERID'];
            $send.= '&CREDITCARDTYPE=' . $request->cc_type;
            $send.= '&ACCT=' . urlencode(str_replace(' ', '', $request->cc_number));
            $send.= '&EXPDATE=' . urlencode($request->cc_expire_date_month . $request->cc_expire_date_year);
            $send.= '&CVV2=' . urlencode($request->cvv);

            $send.= '&CURRENCYCODE=' . 'USD';

            $send.= '&FIRSTNAME=' . urlencode('Rupak');
            $send.= '&LASTNAME=' . urlencode('s');
            $send.= '&EMAIL=' . urlencode('rupak@avainfotech.com');
            $send.= '&PHONENUM=' . urlencode('8865867270');
            $send.= '&IPADDRESS=' . urlencode($_SERVER['REMOTE_ADDR']);
            $send.= '&STREET=' . urlencode('Chandigarh');
            $send.= '&CITY=' . urlencode('Chandigarh');
            $send.= '&STATE=' . urlencode('Chandigarh');
            $send.= '&ZIP=' . urlencode('160047');
            $send.= '&COUNTRYCODE=' . urlencode('IN');


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

            $json = array();
            if (($response_info['ACK'] == 'Success') || ($response_info['ACK'] == 'SuccessWithWarning')) {

                $message = '';

                if (isset($response_info['PROFILEID'])) {
                    $message.= 'PROFILEID: ' . $response_info['PROFILEID'] . "\n";
                    $trx_id = $response_info['PROFILEID'];
                    
                    $post                       =   request()->except(['_token']);

                    $post['start_date']         =   date('d M, Y h:i a', time());
                    $post['end_date']           =   date('d M, Y h:i a', strtotime('+1 months'));
                    $post['amount']             =   '13.00';
                    $post['subscribed']         =   1;
                    $post['payment_status']     =   $response_info['ACK'];
                    $post['profile_id']     =   $trx_id;

                    if(isset($request->save_card)){

                    	unset($post['cc_name']);
                    	unset($post['cvv']);
                    	unset($post['cc_token']);
                    	unset($post['save_card']);

                        User::where('id', $user->id)->update($post);

                    }else{
                        $post                       =   array();
                        $post['start_date']         =   date('Y-m-d H:i:s', time());
                        $post['end_date']           =   date('Y-m-d H:i:s', strtotime('+1 months'));
                        $post['amount']             =   '13.00';
                        $post['payment_status']     =   $response_info['ACK'];
                        $post['profile_id']         =   $trx_id;
                        $post['subscribed']         =   1;

                        User::where('id', $user->id)->update($post);
                    }

                    $post2						 = 	array();
                    $post2['user_id']            =   $user->id;
                    $post2['start_date']         =   date('Y-m-d H:i:s', time());
                    $post2['end_date']           =   date('Y-m-d H:i:s', strtotime('+1 months'));
                    $post2['amount']             =   '5.00';
                    $post2['payment_status']     =   $response_info['ACK'];
                    $post2['profile_id']         =   $trx_id;
                    $post2['created_at']			= \Carbon\Carbon::now()->toDateTimeString();
                    $post2['updated_at']			=  \Carbon\Carbon::now()->toDateTimeString();

                    $insert = DB::table('subscriptions')->insert($post2);
                }

                $json['success'] = 'Payment success , Profile Id :- ' . $response_info['PROFILEID'];
            }
            else {
                $json['error'] = $response_info['L_LONGMESSAGE0'];
            }
        }else{
            $json['error'] = $response_info['L_LONGMESSAGE0'];
        }    

        echo json_encode($json);
        exit;
    }

    public function notsubscribed(){
        return view('user.not_subscribed');
    }


    /***************************************/
    


    public function requestCare(Request $request, $type){

        // 1: maintained
        // 2: pinch
        // 3: hotel

        $user = Auth::user();

        if(isset($_GET['nanny'])){
            $nanny_id = base64_decode($_GET['nanny']);
        }

        $type = Type::getTypeBySlug($type);

        if(count($type) == 0){
            exit;
        }

        if($request->isMethod('post')){

            $post = $request->all();

            $post1 = [
                'user_id'   =>  $user->id,
                'childs'    =>  $user->childs,
                'type_id'      =>  $type->id,
                'comment'  =>  isset($post['comment']) ? $post['comment'] : '',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ];

            /*******  Recommended  ********/

            if(isset($nanny_id)){

                $recommended_nanny = DB::table('admins')->where('id', $nanny_id)->first();

                if($recommended_nanny){
                    $post1['recommended']   =   1;
                    $post1['recommended_admin']   =   $nanny_id;

                    $recommended = 1;

                }else{
                    $recommended = 0;
                }    

            }else{
                $recommended = 0;
            }

            /******************************/


            $last_insert_id = DB::table('requests')->insertGetId($post1);
            
            if($last_insert_id){

                if ($post['timings'] != 'undefined') {

                    $delete = DB::table('request_dates')->where('request_id', $last_insert_id)->delete();

                    $timings = json_decode($post['timings']);

                    foreach ($timings as $timing) {

                        $post2 = [
                            'request_id'    =>  $last_insert_id,
                            'date'          =>  $timing->date,
                            'start_time'    =>  date("H:i:s", strtotime($timing->start_time)),
                            'end_time'      =>  date("H:i:s", strtotime($timing->end_time)),
                            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                        ];

                        DB::table('request_dates')->insert($post2);


                    }

                    foreach ($post['services'] as $service) {
                        if(isset($service['id'])){
                            $post3 = [
                                'request_id'        =>  $last_insert_id,
                                'service_id'        =>  $service['id'],
                                'title'             =>  $service['title'],
                                'price'             =>  $service['price'],
                                'created_at' => \Carbon\Carbon::now()->toDateTimeString()
                            ];

                            DB::table('request_services')->insert($post3);
                        }


                    }

                    $nannies = DB::table('admins')->where('role', 'nanny')->get();

                    $logo = URL::to('/').'/images/website/logo.png';

                    /**********   Email   **********/

                    if($recommended == 0){

                        foreach($nannies as $nanny){

    	                    Mail::send('emails.request_care_to_nanny', ['logo' => $logo], function ($message) use($nanny)
    	                    {
    	                        $message->to($nanny->email, 'Nanny')->subject('New Request arrived');
    	                        $message->from('kuldeepjha@avainfotech.com','Nanny Portland');
    	                    
    	                    });

    	                }

                        Mail::send('emails.request_care_to_admin', ['logo' => $logo], function ($message) use($nanny)
                        {
                            $message->to(User::admin('email'), User::admin('first_name'))->subject('New Request arrived');
                            $message->from(User::admin('email'),'Nanny Portland');
                        
                        });

                        Mail::send('emails.request_care_to_user', ['logo' => $logo], function ($message) use($nanny)
                        {
                            $message->to(Auth::user()->email, 'Nanny')->subject('New Request arrived');
                            $message->from('kuldeepjha@avainfotech.com','Nanny Portland');
                        
                        });

                    }else{

                        Mail::send('emails.request_care_to_nanny', ['logo' => $logo, 'recommended' => 'recommended'], function ($message) use($recommended_nanny)
                        {
                            $message->to($recommended_nanny->email, 'Nanny')->subject('New Request arrived');
                            $message->from('kuldeepjha@avainfotech.com','Nanny Portland');
                        
                        });

                    }    

                    /****************************/

                }   
                
                if($type->id != 2){
                    $response['msg']    =   'Your request has been sent successfully. We will begin working on your match right away!”';
                }else{
                    $response['msg']    =   'Your request has been sent successfully. Nanny will be assigned to you within 6 hours';
                }
                $response['isSuccess']  =  'true';


            }else{
                $response['msg']    =   'Your request has been approved yet. Please try again later.';
                $response['isSuccess']  =  'false';
            }

            return Response::json(array(
                'success' => true,
                'data'   => $response
            )); 

        }

        $user = Auth::user();

        $services1 = Price::with(['service' => function($query){
            $query->where(['status' => 1, 'checked' => 1]);
        }, 'child_prices' => function($query) use ($user){
            $query->where('child', $user->childs);
        }])->where('type_id' , $type->id)->get();

        $services2 = Price::with(['service' => function($query){
            $query->where(['status' => 1, 'checked' => 0]);
        }, 'child_prices' => function($query) use ($user){
            $query->where('child', $user->childs);
        }])->where('type_id', $type->id)->get();

        //dd($services);

        $url = $request->fullUrl();

        $invoice = Invoice::where(['user_id' => Auth::id(), 'status' => 0])->get();

        if(count($invoice) > 0){
            $pending = 1;
        }else{
            $pending = 0;
        }
        
        return view('user2.request_care', ['services1' => $services1, 'services2' => $services2, 'url' => $url, 'pending'    =>  $pending, 'type' => $type]);
    }

    public function requestCarePinch(Request $request){

        $user = Auth::user();

        if(isset($_GET['nanny'])){
            $nanny_id = base64_decode($_GET['nanny']);
        }

        if($request->isMethod('post')){

            $post = $request->all();

            $post1 = [
                'user_id'   =>  $user->id,
                'childs'    =>  $user->childs,
                'type'      =>  'in a pinch',
                'comment'  =>  isset($post['comment']) ? $post['comment'] : '',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ];

            /*******  Recommended  ********/

            if(isset($nanny_id)){

                $recommended_nanny = DB::table('admins')->where('id', $nanny_id)->first();

                if($recommended_nanny){
                    $post1['recommended']   =   1;
                    $post1['recommended_admin']   =   $nanny_id;

                    $recommended = 1;

                }else{
                    $recommended = 0;
                }    

            }else{
                $recommended = 0;
            }

            /******************************/


            $last_insert_id = DB::table('requests')->insertGetId($post1);
            
            if($last_insert_id){

                if ($post['timings'] != 'undefined') {

                    $delete = DB::table('request_dates')->where('request_id', $last_insert_id)->delete();

                    $timings = json_decode($post['timings']);

                    foreach ($timings as $timing) {

                        $post2 = [
                            'request_id'    =>  $last_insert_id,
                            'date'          =>  $timing->date,
                            'start_time'    =>  date("H:i:s", strtotime($timing->start_time)),
                            'end_time'      =>  date("H:i:s", strtotime($timing->end_time)),
                            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                        ];

                        DB::table('request_dates')->insert($post2);


                    }

                    foreach ($post['services'] as $service_id) {

                        $post3 = [
                            'request_id'    =>  $last_insert_id,
                            'service_id'          =>  $service_id,
                            'created_at' => \Carbon\Carbon::now()->toDateTimeString()
                        ];

                        DB::table('request_services')->insert($post3);


                    }

                    $nannies = DB::table('admins')->where('role', 'nanny')->get();

                    $logo = URL::to('/').'/images/website/logo.png';

                    /**********   Email   **********/

                    if($recommended == 0){

                        foreach($nannies as $nanny){

                            Mail::send('emails.request_care_to_nanny', ['logo' => $logo], function ($message) use($nanny)
                            {
                                $message->to($nanny->email, 'Nanny')->subject('New Request arrived');
                                $message->from('kuldeepjha@avainfotech.com','Nanny Portland');
                            
                            });

                        }

                    }else{

                        Mail::send('emails.request_care_to_nanny', ['logo' => $logo, 'recommended' => 'recommended'], function ($message) use($recommended_nanny)
                        {
                            $message->to($recommended_nanny->email, 'Nanny')->subject('New Request arrived');
                            $message->from('kuldeepjha@avainfotech.com','Nanny Portland');
                        
                        });

                    }    

                    /****************************/

                }   
                
                $response['msg']    =   'Your request has been sent successfully. Nanny will be assigned to you within 6 hours';
                $response['isSuccess']  =  'true';


            }else{
                $response['msg']    =   'Your request has been approved yet. Please try again later.';
                $response['isSuccess']  =  'false';
            }

            return Response::json(array(
                'success' => true,
                'data'   => $response
            )); 

        }

        $user = Auth::user();

        $services = Price::with(['service' => function($query){
            $query->where('status', 1);
        }, 'child_prices' => function($query) use ($user){
            $query->where('child', $user->childs);
        }])->where('type', 'in a pinch')->get();

        //dd($services);

        $url = $request->fullUrl();

        $invoice = Invoice::where(['user_id' => Auth::id(), 'status' => 0])->get();

        if(count($invoice) > 0){
            $pending = 1;
        }else{
            $pending = 0;
        }


        return view('user2.request_care_pinch', ['services' => $services, 'url' => $url, 'pending' => $pending]);
    }

    public function requests(){

        $requests = FamilyRequest::with(['type', 'services' => function($query){
            $query->with(['service']);
        }])->where('user_id', Auth::id())->orderBy('id', 'desc')->get();
      
        $requests = json_decode(json_encode($requests), true);


        return view('user.requests', ['requests' => $requests]);
    }

    public function cancelRequest(Request $request){
        if($request->isMethod('post')){
            $post = $request->all();

            $update = FamilyRequest::where('id', $post['id'])->update(['status' => 0]);

            if($update){
                return redirect('/user/requests')->with('success', 'Your request to nanny has been cancelled successfully');
            }else{
                return redirect('/user/requests')->with('error', 'Error in cancellation. Please try again');
            }

        }
    }

    /**************************************/

    public function addreview(Request $request){

        if($request->isMethod('post')){
            
            $post = $request->except('_token');

            $post['user_id']    =   Auth::id();
            $post['created_at'] = \Carbon\Carbon::now()->toDateTimeString();
            $post['updated_at'] = \Carbon\Carbon::now()->toDateTimeString();

            DB::table('reviews')->insert($post);

            echo 'success';

        }

    }

    /****************************************/

    public function invoice($id = null){


        $id = base64_decode($id);

        $invoice = Invoice::with(['months', 'user', 'order' => function($query){
            $query->with(['nanny', 'request']);
        }])->where('id', $id)->first();

        $invoice = json_decode(json_encode($invoice), true);

        if(!empty($invoice)){
            if($invoice['status'] == 1){
                return redirect('/user/payments');
            }
        }

        return view('user.invoice', ['invoice' => $invoice]);
    }

    public function invoicePayment(Request $request, $id){

        $id = base64_decode($id);

        $invoice = Invoice::where('id', $id)->first();

        if(!empty($invoice)){
            if($invoice->status == 1){
                return redirect('/user/payments');
            }
        }

        $json = [];

        if($request->isMethod('post')){
            //dd($request->all());

            $payment_type = 'Sale';
            $amount = $invoice->price + $invoice->due_price + $invoice->service_charge;


            $send = 'VERSION=51.0';
            $send.= '&USER=' . urlencode('ashutosh-facilitator_api1.avainfotech.com');
            $send.= '&PWD=' . urlencode('1373722163');
            $send.= '&SIGNATURE=' . urlencode('AFcWxV21C7fd0v3bYYYRCpSSRl31A-HOEfVX-2cPjDD3RQQ0tu6PqTOu');
            $send.= '&METHOD=DoDirectPayment';
            $send.= '&PAYMENTACTION=' . $payment_type;
            $send.= '&IPADDRESS=' . urlencode($_SERVER['REMOTE_ADDR']);
            $send.= '&AMT=' . $amount;
            $send.= '&CREDITCARDTYPE=' . $request->cc_type;
            $send.= '&ACCT=' . urlencode(str_replace(' ', '', $request->cc_number));
            $send.= '&EXPDATE=' . urlencode($request->cc_expire_date_month . $request->cc_expire_date_year);
            $send.= '&CVV2=' . urlencode($request->cvv);
            $send.= '&FIRSTNAME=' . urlencode('Rupak');
            $send.= '&LASTNAME=' . urlencode('s');
            $send.= '&EMAIL=' . urlencode('rupak@avainfotech.com');
            $send.= '&PHONENUM=' . urlencode('8865867270');
            $send.= '&STREET=' . urlencode('Chandigarh');
            $send.= '&CITY=' . urlencode('Chandigarh');
            $send.= '&STATE=' . urlencode('Panjab');
            $send.= '&ZIP=' . urlencode('160047');
            $send.= '&COUNTRYCODE=' . urlencode('IND'); 
            $send.= '&CUSTREF=' . (int)$id;

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

            $json = array();
            if (($response_info['ACK'] == 'Success') || ($response_info['ACK'] == 'SuccessWithWarning')) {

                // $post = [
                //     'cc_number'         =>  $request->cc_number,
                //     'transaction_id'    =>  $response_info['TRANSACTIONID'],
                //     'payment_status'    =>  $response_info['ACK'],
                //     'payment_gateway'   =>  'Credit card - Paypal',
                //     'payment_date'      =>  \Carbon\Carbon::now()->toDateTimeString(),
                //     'status'            =>  1,
                //     'updated_at'        =>  \Carbon\Carbon::now()->toDateTimeString()
                // ];

                $invoice = Invoice::find($id);
                $invoice->cc_number         = $request->cc_number;
                $invoice->transaction_id    = $response_info['TRANSACTIONID'];
                $invoice->amount_paid       = $response_info['AMT'];
                $invoice->payment_status    = $response_info['ACK'];
                $invoice->payment_gateway   = 'Credit card - Paypal';
                $invoice->payment_date      = \Carbon\Carbon::now()->toDateTimeString();
                $invoice->status            = '1';
                $invoice->updated_at        = \Carbon\Carbon::now()->toDateTimeString();

                if($invoice->save()){
                    $json['isSuccess']      =   'true';
                    $json['transaction_id'] =   $response_info['TRANSACTIONID'];
                }else{
                    $json['isSuccess']      =   'false';
                    $json['error']          =   'Unable to update Data';
                }
            }else{
                $json['isSuccess']      =   'false';
                $json['error']          =   $response_info['L_LONGMESSAGE0'];
            }   

            echo json_encode($json);

            exit;
        }
        
    }

    public function invoicePaymentPaypal($id){
        $id = base64_decode($id);

        $invoice = Invoice::with(['user'])->where('id', $id)->first();

        if(!empty($invoice)){
            if($invoice->status == 1){
                return redirect('/user/payments');
            }
        }

        $amount = $invoice->price + $invoice->due_price;

        $success = URL::to('/').'/payment/confirmation';
        $email = $invoice->user->email;

        echo ".<form name=\"_xclick\" action=\"https://www.sandbox.paypal.com/cgi-bin/webscr\" method=\"post\">
        <input type=\"hidden\" name=\"cmd\" value=\"_xclick\">
        <input type=\"hidden\" name=\"email\" value=\"$email\">
        <input type=\"hidden\" name=\"business\" value=\"rupak1-facilitator@avainfotech.com\">
        <input type=\"hidden\" name=\"currency_code\" value=\"USD\">
        <input type=\"hidden\" name=\"custom\" value=\"$invoice->id\">
        <input type=\"hidden\" name=\"amount\" value=\"$amount\">
        <input type=\"hidden\" name=\"return\" value=\"$success\">
        </form>";
        echo "<script>document._xclick.submit();</script>";

    }

    public function paymentConfirmation(){

        $data = [];

        if(isset($_REQUEST['tx'])){
            $invoice                    =   Invoice::find($_REQUEST['cm']);
            $invoice->transaction_id    =   $_REQUEST['tx'];
            $invoice->payment_status    =   $_REQUEST['st'];
            $invoice->amount_paid       =   $_REQUEST['amt'];
            $invoice->payment_gateway   =   'Paypal';
            $invoice->payment_date      =   \Carbon\Carbon::now()->toDateTimeString();
            $invoice->status            =   '1';
            $invoice->updated_at        =   \Carbon\Carbon::now()->toDateTimeString();

            $invoice->save();

            $data['type']               =   'success';
            $data['transaction_id']     =   $_REQUEST['tx'];
            $data['invoice_id']         =   base64_encode($_REQUEST['cm']);

            $invoice = Invoice::with(['user'])->where('id', $_REQUEST['cm'])->first();

            $logo = URL::to('/').'/images/website/logo.png';

            Mail::send('emails.invoice_payment_confirmation_user', ['logo' => $logo, 'type' => 'success', 'invoice' => $invoice, 'data' => $_REQUEST], function ($message) use($invoice)
            {
                $message->to($invoice->user->email, 'Nanny')->subject('Invoice Confimation');
                $message->from('kuldeepjha@avainfotech.com','Nanny Portland');
            
            });
            
        }else{

            $invoice = Invoice::with(['user'])->where('id', $_REQUEST['cm'])->first();

            $data['type']               =   'error';
            $data['transaction_id']     =   '';
            $data['invoice_id']         =   base64_encode($_REQUEST['cm']);

            Mail::send('emails.invoice_payment_confirmation_user', ['logo' => $logo, 'type' => 'error', 'invoice' => $invoice, 'data' => $_REQUEST], function ($message) use($invoice)
            {
                $message->to($invoice->user->email, 'Nanny')->subject('Invoice Confimation');
                $message->from('kuldeepjha@avainfotech.com','Nanny Portland');
            
            });

        }

        return view('user/payment_confirmation', ['data' => $data]);

    }

    public function bookings(){

        $orders = Order::with(['user', 'nanny'])->where('user_id', Auth::id())->orderby('id', 'desc')->get();

        return view('user/bookings', ['bookings' => $orders]);

    }

    public function getBooking($id){
        $id = base64_decode($id);

        $dates = Checkin::where('order_id', $id)->get();

        $data = [];

        foreach($dates as $date){

            $datetime1 = date_create($date->start_time);
            $datetime2 = date_create($date->end_time);
            $interval = date_diff($datetime1, $datetime2);
            $difference =  $interval->format('%H:%I');

            $data[] = [
                'start_time'    =>  date('H:i', strtotime($date->start_time)),
                'end_time'    =>  date('H:i', strtotime($date->end_time)),
                'start_date'    =>  date('c', strtotime($date->start_time)),
                'end_date'    =>  date('c', strtotime($date->end_time)),
                'difference'    =>  $difference
            ];
        }

        /*********************/

        $order = Order::with(['request' => function($query){
            $query->with(['services' => function($query){
                $query->with(['service']);
            }]);
        }])->where('id', $id)->first();


        return view('user.booking_view', ['dates' => $data, 'order' => $order]);

    }

}
