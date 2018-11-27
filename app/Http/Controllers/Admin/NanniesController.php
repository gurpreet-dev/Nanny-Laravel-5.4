<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\FamilyRequest;
use App\Order;
use App\Checkin;
use App\RequestService;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class NanniesController extends Controller
{


    public function __construct(){
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $nannies = DB::table('admins')->where('role', 'nanny')->orderBy('id', 'desc')->get();
        
        foreach($nannies as $nanny){
            $nanny->hours = Admin::nannyWeeklyHours($nanny->id);
        }

        return view('admin.nannies.nannies', ['nannies' => $nannies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email'             => 'required|email|max:255|unique:admins'
        ]);
    }



    public function create()
    {
        return view('admin.nannies.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validator($request->all())->validate();

        $file = $request->file('image');
        
        $imageName = time().$file->getClientOriginalName();

        $upload = $file->move(public_path('/images/users/'), $imageName); 
        
        if($upload){

            $post = $request->all();
            $post['image'] = $imageName;
            $post['role'] = 'nanny';
            $post['password'] = bcrypt($request->password);
            $insert = Admin::create($post);

            if($insert){
                return redirect('/admin/nannies')->with('success','Nanny has been added successfully!');
            } else {
                return back()
                           ->with('error','Error in adding nanny');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $user = Auth::user();

        if(Auth::user()->role == 'nanny'){
            if($user->id != $id){
                return redirect('/admin/dashboard');
            }
        }

        if($request->isMethod('post')){
            
            $post = request()->except(['_token']);
            //$this->validator($request->all())->validate();
            if(isset($post['image'])){

                $user_info = Admin::where('id', $id)->first();

                if($user_info->image != ''){
                    if(file_exists(public_path('/images/users/'.$user_info->image))){
                        unlink(public_path('/images/users/'.$user_info->image));
                    }
                }
                
                $file = $request->file('image');
                $imageName = time().$file->getClientOriginalName();
                $upload = $file->move(public_path('/images/users/'), $imageName); 
                $post['image'] = $imageName;
            }

            $update = Admin::where('id', $id)->update($post);

            if($update){
                if($user->id != $id){
                    return redirect('/admin/nannies')->with('success','Profile has been updated successfully');
                }else{
                    return redirect('/admin/viewnanny/'.$id)->with('success','Profile has been updated successfully');
                }
            } else {
                return back()
                           ->with('error','Error in updating nanny');
            }

        }

        $data = Admin::find($id);

        return view('admin.nannies.edit', ['user' => $data]);
    }

    public function view($id){
        $nanny = Admin::with(['unavailabilities'])->where(['id' => $id])->first();
        return view('admin.nannies.view', ['user' => $nanny]);
    }

    public function changepassword(Request $request, $id){
        
        $user = Auth::user();

        if(Auth::user()->role == 'nanny'){
            if($user->id != $id){
                return redirect('/admin/dashboard');
            }
        }

        if($request->isMethod('post')){

            $post = request()->except(['_token']);

            unset($post['npassword']);

            $post['password'] = bcrypt($post['password']);

            $update = Admin::where('id', $id)->update($post);

            if($update){
                return back()->with('success','Password has been changed successfully');
            } else {
                return back()
                           ->with('error','Error in updating nanny');
            }
        }

        $nanny = Admin::where('id', $id)->first();

        return view('admin.nannies.changepassword', ['user' => $nanny]);
    }

    public function delete($id){

        $nanny = Admin::where('id', $id)->first();

        if($nanny->image != ''){
            if(file_exists(public_path('/images/users/'.$nanny->image))){
                unlink(public_path('/images/users/'.$nanny->image));
            }
        }
        
        $delete = Admin::where('id', $id)->delete();

        if($delete){
            return redirect('/admin/nannies')->with('success','Nanny has been deleted successfully');
        } else {
            return redirect('/admin/nannies')->with('error','Error in deleting nanny');
        }
    }

    public function schedule($id){

        /****** Attendence *******/

        $dates = Checkin::where('admin_id', $id)->get();

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

        /********************/

        /********* Bookings *********/

        $dates2 = FamilyRequest::with(['dates'])->where('assigned_admin', $id)->get();

        $data2 = [];

        foreach($dates2 as $date2){

            foreach($date2->dates as $date){

                $ddate = date('Y-m-d', strtotime($date->date));

                $datetime1 = date_create($ddate.' '.$date->start_time);
                $datetime2 = date_create($ddate.' '.$date->end_time);
                $interval = date_diff($datetime1, $datetime2);
                $difference =  $interval->format('%H:%I');

                $data2[] = [
                    'start_time'    =>  date('H:i', strtotime($ddate.' '.$date->start_time)),
                    'end_time'    =>  date('H:i', strtotime($ddate.' '.$date->end_time)),
                    'start_date'    =>  date('c', strtotime($date->date.' '.$date->start_time)),
                    'end_date'    =>  date('c', strtotime($date->date.' '.$date->end_time)),
                    'difference'    =>  $difference
                ];

            }
        }

        /*****************************/

        /******** Unavailabilities ********/

        $unavailabilies = DB::table('nanny_unavailabilities')->where('admin_id', $id)->get();

        $data3 = [];

        foreach($unavailabilies as $date){

            $ddate = date('Y-m-d', strtotime($date->date));

            $datetime1 = date_create($ddate.' 00:00:00');
            $datetime2 = date_create($ddate.' 23:59:00');
            $interval = date_diff($datetime1, $datetime2);
            $difference =  $interval->format('%H:%I');

            $data3[] = [
                'start_time'    =>  date('H:i', strtotime($ddate.' 00:00:00')),
                'end_time'    =>  date('H:i', strtotime($ddate.' 23:59:00')),
                'start_date'    =>  date('c', strtotime($date->date.' 00:00:00')),
                'end_date'    =>  date('c', strtotime($date->date.' 23:59:00')),
                'difference'    =>  $difference
            ];
        }

        return view('admin.nannies.schedule', ['attendence' => $data, 'dates' => $data2, 'unavailabilies' => $data3]);
    }

    public function availabilities(Request $request){

        $user = Auth::user();

        if($request->isMethod('post')){
            $post = $request->all();
            
            $delete = DB::table('nanny_unavailabilities')->where('admin_id', $user->id)->delete();

            $dates = explode(',', $post['dates']);

            foreach($dates as $date){
                if($date != ''){
                    DB::table('nanny_unavailabilities')->insert(['admin_id' => $user->id, 'date' => $date]);
                }
            }

            return redirect('/admin/availability')->with('success','Availabilities has been Updated successfully');

        }

        $availabilities = DB::table('nanny_unavailabilities')->where(['admin_id' => $user->id])->get();

        return view('admin.nannies.availabilities', ['availabilities' => json_decode(json_encode($availabilities), true)]);
    }


    /***************************************************/


    public function requests(){

        $user = Auth::user();

        //$requests = FamilyRequest::with(['dates', 'user'])->where(['status' => '1'])->get();

        $user = Auth::user();

        $requests = FamilyRequest::with(['dates', 'user', 'type', 'interests' => function ($query) use ($user) {
            $query->where('admin_id', $user->id);
        }])->where('type_id', '!=', '2')->orderBy('id', 'desc')->get();

        //dd($requests);

        return view('admin.nannies.requests', ['requests' => $requests]);
    }

    public function requestView($id){

        $user = Auth::user();

        $request = FamilyRequest::with(['dates', 'user'])->where(['id' => $id])->first();

        $services = RequestService::with(['service'])->where(['request_id' => $id])->get();

        $interest =  DB::table('request_interests')->where(['admin_id' => $user->id, 'request_id' => $id])->get();

        return view('admin.nannies.request_view', ['data' => $request, 'interest' => $interest, 'services' => $services]);
    }

    public function requestAction($id){

        $user = Auth::user();

        $check = DB::table('request_interests')->where(['admin_id' => $user->id, 'request_id' => $id])->get();

        //echo count($check); exit;

        if(count($check) > 0){
            DB::table('request_interests')->where(['admin_id' => $user->id, 'request_id' => $id])->delete();
        }else{

            $post = [
                'admin_id' => $user->id,
                'request_id' => $id,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ];

            DB::table('request_interests')->insert($post);
        }

        if(!isset($_GET['action'])){
            return redirect('/admin/nanny/requests')->with('success', 'Thanks for showing interest to this request');;
        }else{
            return redirect('/admin/nanny/requestview/'.$id)->with('success', 'Thanks for showing interest to this request');
        }
    }

    /*******************************************/

    public function orders(){

        $user = Auth::user();

        $orders = Order::with(['request' => function($query) {
            $query->with(['user']);
        }])->where('admin_id', $user->id)->orderby('id', 'desc')->get();

        //dd($orders);

        return view('admin.nannies.orders', ['orders' => $orders]);

    }

    public function orderView($id){

        $id = base64_decode($id);
        
        $order = Order::with(['request' => function($query) {
            $query->with(['user', 'dates']);
        }])->where('id', $id)->first();

        $services = RequestService::with(['service'])->where('request_id', $order->request_id)->get();

        return view('admin.nannies.order_view', ['data' => $order, 'services' => $services]);
    }

    public function orderAttendence(Request $request, $id){
        $id = base64_decode($id);

        $order = Order::where(['id' => $id])->first();

        $checkin = DB::table('checkins')->select('*')->where('order_id', '=', $id)->where('admin_id', '=', $order->admin_id)->where('created_at', 'like',"%".date('Y-m-d').'%')->first();
        
        if($request->isMethod('post')){

            if($_POST['type']=="checkin"){

                $Checkin = new Checkin;                    
                $Checkin->order_id =    $id;
                $Checkin->admin_id =    Auth::id();
                $Checkin->start_time =  \Carbon\Carbon::now()->toDateTimeString(); 
                $Checkin->created_at =  \Carbon\Carbon::now()->toDateTimeString();  

                if($Checkin->save())
                    return redirect('/admin/nanny/order/attendence/'.base64_encode($id))->with('success', trans("Your timer has been started successfully."));
                else
                    return redirect('/admin/nanny/order/attendence/'.base64_encode($id))->with('error', trans("Something went wrong. Please Try again."));  
                                   
            }

            if($_POST['type']=="checkout"){

                $Checkin = Checkin::find($_POST['id']);
                $Checkin->end_time  =   \Carbon\Carbon::now()->toDateTimeString();
                if($Checkin->save())
                    return redirect('/admin/nanny/order/attendence/'.base64_encode($id))->with('success', trans("Your timer has been stopped successfully."));
                else
                    return redirect('/admin/nanny/order/attendence/'.base64_encode($id))->with('error', trans("Something went wrong. Please Try again."));                 
            }

        }

        $minutes = Admin::nannyWeeklyHours($order->admin_id);

        return view('admin.nannies.attendence', ['checkin' => $checkin, 'order' => $order, 'minutes' => $minutes]);        

    }

    public function manualCheckin(Request $request, $id){

        $id = base64_decode($id);

        if($request->isMethod('post')){

            $checkin = date('Y-m-d').' '.$request->checkin;
            $checkout = date('Y-m-d').' '.$request->checkout;

            if(strtotime($checkin) > strtotime($checkout)){
                return redirect('/admin/nanny/order/attendence/'.base64_encode($id))->with('error', trans("Please choose 'End time' greater than 'Start time'"));  
            }else{
                $Checkin = new Checkin;                    
                $Checkin->order_id =    $id;
                $Checkin->admin_id =    Auth::id();
                $Checkin->start_time =  $checkin;
                $Checkin->end_time =  $checkout; 
                $Checkin->created_at =  \Carbon\Carbon::now()->toDateTimeString();  
                $Checkin->updated_at =  \Carbon\Carbon::now()->toDateTimeString();  

                if($Checkin->save())
                    return redirect('/admin/nanny/order/attendence/'.base64_encode($id))->with('success', trans("Your timings has been saved successfully."));
                else
                    return redirect('/admin/nanny/order/attendence/'.base64_encode($id))->with('error', trans("Something went wrong. Please Try again."));  
            }



        }
    }

    public function monthlyAttendence($id = null){

        $user = Auth::user();

        if($user->role == 'nanny'){
            $id = Auth::id();
        }

        $dates = Checkin::where('admin_id', $id)->get();

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

        return view('admin.nannies.monthly_attendence', ['dates' => $data]); 
    }

    public function changeStatus($nanny_id, $status){
        $nanny = Admin::find($nanny_id);
        $nanny->status = $status;

        if($nanny->save()){

            $logo = URL::to('/').'/images/website/logo.png';

            $nanny = Admin::find($nanny_id);

            Mail::send('emails.status_changed_nanny', ['url_prefix' => URL::to('/'), 'logo' => $logo, 'status' => $status, 'nanny' => $nanny], function ($message) use($nanny)
            {
                $message->to($nanny->email, $nanny->first_name)->subject('Approval');
                $message->from('kuldeepjha@avainfotech.com','Nanny Portland');
            
            });

            

            return redirect('/admin/nannies')->with('success', "Status has been changed successfully.");
        }else{
            return redirect('/admin/nannies')->with('error', "Error in changing status. Please try again later");
        }
    }

}
