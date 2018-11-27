<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Checkin;
use App\Admin;
use App\OrderAdmin;
use App\FamilyRequest;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use App\Config;

class AdminOrdersController extends Controller
{

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $orders = Order::with(['nanny'])->orderby('id', 'desc')->get();

        return view('admin.orders', ['orders' => $orders]);

    }

    public function bookingAttendence($order_id){

    	$user = Auth::user();

    	$order_id = base64_decode($order_id);

        $dates = Checkin::where('order_id', $order_id)->get();

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

        return view('admin.order_attendence', ['dates' => $data]); 
    }

    public function nannies($order_id){

        $nannies = Admin::where(['status' => 1, 'role' => 'nanny'])->orderby('id', 'desc')->get();

        $order = Order::with(['nanny'])->where('id', $order_id)->first();

        $previous_nannies = OrderAdmin::with(['nanny'])->where('order_id', $order_id)->orderby('id', 'desc')->get();

        return view('admin.orders.nannies', ['nannies' => $nannies, 'order' => $order, 'previous_nannies' => $previous_nannies]); 
    }

    public function changeNanny($order_id, $nanny_id){

        $prev_order = Order::with(['nanny'])->where('id', $order_id)->first();

        $order_admin = new OrderAdmin();
        $order_admin->order_id = $order_id;
        $order_admin->admin_id = $nanny_id;
        $order_admin->created_at = \Carbon\Carbon::now()->toDateTimeString();
        $order_admin->updated_at = \Carbon\Carbon::now()->toDateTimeString();

        if($order_admin->save()){

            $order = Order::find($order_id);
            $order->admin_id = $nanny_id;
            $order->save();

            $request = FamilyRequest::find($order->request_id);
            $request->assigned_admin = $nanny_id;
            $request->save();

            /******************/

            $order_data = Order::with(['user'])->where('id', $order_id)->first();

            $nanny = Admin::find($nanny_id);

            $logo = URL::to('/').'/images/website/logo.png';

            /********** SMS notification **********/

            $to = $nanny->mobile;
            $message = 'You have been assigned to a family. || Booking ID: '.$order_data->id.' || User Name: '.$order_data->user->first_name1.' || Address: '.$order_data->user->address_1.' || City: '.$order_data->user->city.' || State: '.$order_data->user->state.' || Zipcode: '.$order_data->user->zip.'.';

            Config::sms($to, $message);

            $to = $order_data->user->mobile1;
            $message = 'Nanny has been changed for your booking ID '.$order_data->id.'. And new nanny assigned is "'.$nanny->first_name.' '.$nanny->last_name.'".';

            Config::sms($to, $message);

            $message = 'A new Nanny has been assigned in place of you for booking ID '.$order_data->id.'.';
            Config::sms($prev_order->nanny->mobile, $message);

            /******** Send Mail *********/


            Mail::send('emails.nanny_changed_user', ['logo' => $logo, 'order_data' => $order_data, 'nanny' => $nanny], function ($message) use($order_data)
            {
                $message->to($order_data->user->email, 'Nanny')->subject('Nanny changed');
                $message->from('kuldeepjha@avainfotech.com','Nanny Portland');
            
            });

            Mail::send('emails.nanny_changed_nanny', ['logo' => $logo, 'order_data' => $order_data, 'nanny' => $nanny], function ($message) use($nanny)
            {
                $message->to($nanny->email, 'Nanny')->subject('Nanny changed');
                $message->from('kuldeepjha@avainfotech.com','Nanny Portland');
            
            });

            Mail::send('emails.nanny_changed_prev_nanny', ['logo' => $logo, 'order_data' => $order_data, 'nanny' => $nanny], function ($message) use($nanny)
            {
                $message->to($prev_order->nanny->email, 'Nanny')->subject('Nanny changed');
                $message->from('kuldeepjha@avainfotech.com','Nanny Portland');
            
            });


            return redirect('/admin/bookings/nannies/'.$order_id)->with('success', 'A nanny has been changed succesfully');

        }else{
            return redirect('/admin/bookings/nannies/'.$order_id)->with('error', 'Error in changing nanny. Please try again later');
        }    

    }

}
