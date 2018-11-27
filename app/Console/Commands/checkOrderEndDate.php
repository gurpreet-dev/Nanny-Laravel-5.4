<?php

namespace App\Console\Commands;
use App\User;
use Illuminate\Console\Command;

use App\Review;
use App\Order;
use App\Invoice;
use App\Price;
use App\Config;

use DB;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class checkOrderEndDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:checkOrderEndDate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check order end date and set that order expired';

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

        /*********  Generate Invoice   **********/

        $orders = Order::with(['last_invoice', 'attendence', 'nanny', 'user', 'request', 'services' => function($query){
            $query->with(['service']);
        }])->where('status', '1')->get();
        
        $current_date = date('d-m-Y');

        $orders = json_decode(json_encode($orders), true);

        foreach($orders as $order){



            if(time() > strtotime($order['end_date'])){
                Order::where('id', $order['id'])->update(['status' => '2']);

                Config::sms(User::admin('mobile'), 'The Booking with ID: '.$order["id"].' is now complete.'); // Admin SMS
                Config::sms($order['user']['mobile1'], 'Your Booking with ID: '.$order["id"].' is now complete.'); // User SMS

            }
        
        }


        /****************************/

        
    }
}
