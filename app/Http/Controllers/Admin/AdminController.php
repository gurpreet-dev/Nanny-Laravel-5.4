<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 

use Illuminate\Http\Request;

use App\FamilyRequest;
use App\Subscription;
use App\Invoice;
use DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Validator;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){

        $users = DB::Table('users')->get();
        $nannies = DB::Table('admins')->where('role', 'nanny')->get();
        $orders = DB::Table('orders')->get();
        $services = DB::Table('admin_services')->get();

        /**************/

        $ongoing_orders = DB::Table('orders')->where(['admin_id'=> Auth::id(), 'status' => 1])->get();
        $finished_orders = DB::Table('orders')->where(['admin_id'=> Auth::id(), 'status' => 2])->get();
        $nrequests = DB::Table('requests')->where('status', 2)->get();
        
        return view('admin.dashboard', [
            'admin' => [
                'users'     => $users,
                'nannies'   => $nannies,
                'orders'    => $orders,
                'services'  => $services
            ],
            'nanny' =>  [
                'ongoing_orders'    =>  $ongoing_orders,
                'requests'          =>  $nrequests,
                'finished_orders'   =>  $finished_orders
            ]
        ]);
    }

    /**************************/

    public function contacts(){

    	$contacts = DB::table('contacts')->orderby('id', 'desc')->get();

    	return view('admin.contacts', ['contacts' => $contacts]);

    }

    public function editContact(Request $request, $id){

    	if($request->isMethod('post')){
    		$post = $request->except('_token');

    		$update = DB::table('contacts')->where('id', $id)->update($post);
            
            if($update){

                $logo = URL::to('/').'/images/website/logo.png';

                Mail::send('emails.contact_to_user', ['data' => $post, 'url' => $logo], function ($message) use($post)
                {
                    $message->to($post['email'], $post['name'])->subject('Contact us query answered');
                    $message->from('kuldeepjha@avainfotech.com','Nanny Portland');
                
                });

                return redirect('admin/contacts')->with('success', 'A query has been answered successfully.');
            }else{
                return redirect('admin/contacts/edit/'.$id)->with('error', 'Error in answering a query. Please try again');
            }
    	}

    	$contact = DB::table('contacts')->where('id', $id)->orderby('id', 'desc')->first();

    	return view('admin.edit_contact', ['contact' => $contact]);

    }

    /**************************/

    public function servicePayments(){

        $payments = Subscription::with(['user'])->orderby('id', 'desc')->get();

        return view('admin.service_payments', ['payments' => $payments]);

    }

    public function orderPayments(){

        $payments = Invoice::with(['user', 'order' => function($query){
            $query->with(['nanny']);
        }])->orderby('id', 'desc')->get();

        return view('admin.order_payments', ['payments' => $payments]);

    }

    /****************************/

    public function pages(){
        $pages = DB::table('static_pages')->orderby('sort_order', 'asc')->get();

        return view('admin.pages.pages', ['pages' => $pages]);
    }

    public function addPage(Request $request){

        if($request->isMethod('post')){

            $validator = Validator::make($request->all(), [
                'title' => 'required|unique:static_pages|max:255',
                'sort_order' => 'required|unique:static_pages'
            ]);

            if ($validator->fails()) {
                return redirect(route('addpage'))
                            ->withErrors($validator)
                            ->withInput();
            }

            $post = $request->except('_token');
            $post['slug']   =   strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $post['title']));

            $insert = DB::table('static_pages')->insert($post);

            if($insert){
                return redirect('admin/pages')->with('success', 'Page has been added successfully');
            }else{
                return redirect(route('addpage'))->with('error', 'Error in adding page. please try again later');
            }
        }

        return view('admin.pages.add');
    }

    public function editPage(Request $request, $id){


        $page = DB::table('static_pages')->where('id', $id)->first();

        if($request->isMethod('post')){

            $post = $request->except('_token');

            if($page->title != $post['title']){

                $validator = Validator::make($request->all(), [
                    'title' => 'required|unique:static_pages|max:255'
                ]);

                if ($validator->fails()) {
                    return redirect(route('editpage', ['id' => $id]))
                                ->withErrors($validator)
                                ->withInput();
                }
            }

            $post['slug']  =   strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $post['title']));

            $insert = DB::table('static_pages')->where('id', $id)->update($post);

            if($insert){
                return redirect('admin/pages')->with('success', 'Page has been added successfully');
            }else{
                return redirect(route('addpage'))->with('error', 'Error in adding page. please try again later');
            }
        }

        return view('admin.pages.edit', ['page' => $page]);
    }

    public function deletePage($id){

        $delete = DB::table('static_pages')->where('id', $id)->delete();

        if($delete){
            return redirect('admin/pages')->with('success', 'Page has been deleted successfully');
        }else{
            return redirect('admin/pages')->with('error', 'Error in deleting page. please try again later');
        }

    }

}
