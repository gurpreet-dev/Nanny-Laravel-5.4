<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Review;
use App\Order;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $reviews = Review::with(['user'])->get();

        /***********/

        $orders = Order::with(['nanny'])->where(['user_id' => Auth::id(), 'status' => 2])->get();

        $nannies = DB::table('admins')->where(['role'=> 'nanny', 'status' => 1])->get();

        return view('home', ['reviews' => $reviews, 'orders' => $orders, 'nannies' => $nannies]);
    }

    public function payment_after_signup(){
        if(!isset($_GET['token'])){
            return view('auth.payment_after_signup');
        }else{
            return view('auth.payment_after_signup', ['token' => $_GET['token']]);
        }
    }
}
