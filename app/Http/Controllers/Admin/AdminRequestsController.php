<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 

use Illuminate\Http\Request;

use App\FamilyRequest;
use App\RequestInterest;
use App\RequestService;
use App\Admin;
use App\OrderAdmin;
use App\Config;

use DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;

class AdminRequestsController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function requests($id){

        $type = DB::table('types')->where('id', $id)->first();

        $requests = FamilyRequest::with(['dates', 'user'])->where('type_id', $id)->orderBy('id', 'desc')->get();

        return view('admin.requests.requests', ['requests' => $requests, 'type' => $type]);

    }

    public function pinchRequests(){

        $requests = FamilyRequest::with(['dates', 'user'])->where('type', 'in a pinch')->orderBy('id', 'desc')->get();

        return view('admin.requests.pinch', ['requests' => $requests]);

    }

    public function getInterestedNanniesForRequest($id){

        $request = FamilyRequest::with(['dates', 'user', 'recommendedadmin'])->where(['id' => $id])->first();
        $interests = RequestInterest::with(['interestednanny'])->where(['request_id' => $id])->get();
        $services = RequestService::with(['service'])->where(['request_id' => $id])->get();

        $nannies = Admin::where('role', 'nanny')->orderby('id', 'desc')->get();

        //dd($request);

        return view('admin.requests.interests', ['interests' => $interests, 'request' => $request, 'services' => $services, 'nannies' => $nannies]);

    }

    public function assignNannyToRequest($id, $nanny){

        $requests = DB::table('request_dates')->where('request_id', $id)->get();

        $dates = [];
        $min_date = '';
        $max_date = '';

        if(count($requests) > 0){
            foreach($requests as $req){
                $start_dates[] = strtotime($req->date.' '.$req->start_time);
                $end_dates[] = strtotime($req->date.' '.$req->end_time);
            }
            $min_date = date('m/d/Y H:i:s', min($start_dates));
            $max_date = date('m/d/Y H:i:s', max($end_dates));
        }

        /***********************/
        
        $request = FamilyRequest::with(['dates', 'user'])->where(['id' => $id])->first();

        /***********************/

        $request_order_data = [
            'request_id'    =>  $id,
            'admin_id'      =>  $nanny,
            'user_id'       =>  $request->user_id,
            'start_date'    =>  $min_date,
            'end_date'      =>  $max_date,  
            'status'        =>  1,
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'   =>  \Carbon\Carbon::now()->toDateTimeString()
        ];

        $order_insert = DB::table('orders')->insertGetId($request_order_data);        

        /***********************/

        if($order_insert){

            $order_admin = new OrderAdmin();
            $order_admin->order_id = $order_insert;
            $order_admin->admin_id = $nanny;
            $order_admin->created_at = \Carbon\Carbon::now()->toDateTimeString();
            $order_admin->updated_at = \Carbon\Carbon::now()->toDateTimeString();
            $order_admin->save();

            $request_data = [
                'assigned_admin'    =>  $nanny,
                'assign_date'       =>  \Carbon\Carbon::now()->toDateTimeString(),
                'status'       =>  1
            ];
    
            $update = FamilyRequest::where('id', $id)->update($request_data);

            $nanny_data = DB::table('admins')->where('id', $nanny)->first();

            $logo = URL::to('/').'/images/website/logo.png';

            Mail::send('emails.nanny_assigned_to_request', ['logo' => $logo, 'type' => 'nanny'], function ($message) use($nanny_data)
            {
                $message->to($nanny_data->email, 'Nanny')->subject('Assigned you for family');
                $message->from('kuldeepjha@avainfotech.com','Nanny Portland');
            
            });

            Mail::send('emails.nanny_assigned_to_request', ['logo' => $logo, 'type' => 'user'], function ($message) use($request)
            {
                $message->to($request->user->email, 'Nanny')->subject('Nanny assigned');
                $message->from('kuldeepjha@avainfotech.com','Nanny Portland');
            
            });

            /**********************/

            Config::sms($request->user->mobile1, 'Nanny has been assigned to you. Your Booking ID is: '.$order_insert); // sms to user

            $message = 'You have been assigned to a family. || Booking ID: '.$order_insert.' || User Name: '.$request->user->first_name1.' || Address: '.$request->user->address_1.' || City: '.$request->user->city.' || State: '.$request->user->state.' || Zipcode: '.$request->user->zip.'.';

            Config::sms($nanny_data->mobile, $message); // sms to nanny

            /**********************/

            return redirect('/admin/requests/interests/'.$id)->with('success', 'A nanny has been successfully assigned to family');

        }else{
            return redirect('/admin/requests/interests/'.$id)->with('error', 'Error in assigning nanny to family');

        }
    }

    public function unassignNannyFromRequest($id){
        $post = [
            'assigned_admin'    =>  null,
            'assign_date'       =>  null,
            'status'       =>  2
        ];

        $update = FamilyRequest::where('id', $id)->update($post);

        if($update){

            DB::table('orders')->where('request_id', $id)->delete();

            $nanny = DB::table('admins')->where('id', $id)->first();

            // Mail::send('emails.nanny_assigned_to_request.blade', [], function ($message) use($nanny)
            // {
            //     $message->to($nanny->email, 'Nanny')->subject('Assigned you for family');
            //     $message->from('kuldeepjha@avainfotech.com','Nanny Portland');
            
            // });

            return redirect('/admin/requests/interests/'.$id)->with('success', 'A nanny has been successfully unassigned from family');

        }else{
            return redirect('/admin/requests/interests/'.$id)->with('error', 'Error in unassigning nanny to family');

        }
    }

}
