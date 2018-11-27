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

class generateInvoice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:generateInvoice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate invoice after 15 days for nanny booking';

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
        }])->get();
        
        $current_date = date('d-m-Y');

        $orders = json_decode(json_encode($orders), true);

        foreach($orders as $order){

            /********  Calculation Price per hour  **********/

            $price_per_hour = 0;

            // foreach($order['services'] as $service){

            //     $prices = Price::with(['child_prices' => function($query) use ($order){
            //         $query->where('child', $order['request']['childs'])->first();
            //     }])->where(['service_id' => $service['service']['id'], 'type_id' => $order['request']['type']])->first();

            //     $prices = json_decode(json_encode($prices), true);

            //     $price_per_hour = $price_per_hour + $prices['child_prices'][0]['price'];

            // }

            $request_services = DB::table('request_services')->where('request_id', $order['request_id'])->get();

            foreach($request_services as $rs){
                $price_per_hour = $price_per_hour + $rs['price'];
            }

            /*************************************************/

            $last_date = strtotime($order['end_date']);

            $date = date('d-m-Y',strtotime('+1 days', $last_date));

            //if($current_date == $date || (strtotime($current_date) > strtotime($date) && $order['last_invoice'] == '') ){
            echo $current_date.'=='.$date;
            if($current_date == $date){    
                if(!empty($order['attendence'])){

                    $price = 0;
                    $total_hours    =   0;

                    foreach($order['attendence'] as $attendence){
                        if(strtotime($attendence['start_time']) <= strtotime($date)){
                            if($attendence['end_time'] != ''){
                                $start_time = strtotime($attendence['start_time']);
                                $end_time = strtotime($attendence['end_time']);
                                //$minutes = round(abs($end_time - $start_time) / 60,2);
                                $hours = round(abs($end_time - $start_time) / 3600,2);
                                $price = $price + ($hours * $price_per_hour);

                                $total_hours = $total_hours + $hours;
                            }
                        }    
                    }

                    /*************************/

                    $prev_services = DB::table('user_service_months')->where('user_id', $order['user_id'])->get();
                    $prev_months = [];
                    foreach($prev_services as $prev){
                        $prev_months[] = $prev->month;
                    }

                    /*************************/

                    $start = date('Y-m-d', strtotime($order['start_date']));
                    $end = date('Y-m-d', strtotime($order['end_date']));

                    $start = $start=='' ? time() : strtotime($start);
                    $end = $end=='' ? time() : strtotime($end); 
                    $months = array();
                    
                    for ($i = $start; $i <= $end; $i = strtotime('+1 months', strtotime(date('Y-m-01', $i)))) {
                        if(!in_array(date('Ym', $i), $prev_months)){
                            $months[] = date('Ym', $i);
                        }     
                    }

                    /*************************/


                    $invoice = [
                        'order_id'      =>  $order['id'],
                        'user_id'      =>  $order['user_id'],
                        'time'          =>  $total_hours,
                        'price_per_hour'          =>  $price_per_hour,
                        'price'         =>  $price,
                        'service_charge' => count($months) * Config::serviceCharge(),
                        'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
                    ];

                    $insert_id = Invoice::create($invoice)->id;

                    if($insert_id){

                        foreach($months as $mon){
                            $service_months = [
                                'user_id'      =>  $order['user_id'],
                                'invoice_id'    =>  $insert_id,
                                'month' =>  $mon,
                                'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
                            ];

                            DB::table('user_service_months')->insert($service_months);

                        } 


                        Order::where('id', $order['id'])->update(['last_invoice' => $insert_id, 'updated_at'   =>  \Carbon\Carbon::now()->toDateTimeString()]);

                        $invoice = Invoice::where('id', $insert_id)->first();

                        $data = array();

                        $logo = URL::to('/').'/images/website/logo.png';

                        Mail::send('emails.new_invoice_alert', ['url' => $logo, 'order' => $order, 'invoice' => $invoice], function ($message) use($order)
                        {
                            $message->to($order['user']['email'], $order['user']['first_name1'])->subject('New Request arrived');
                            $message->from('kuldeepjha@avainfotech.com','Nanny Portland');
                        
                        });

                        /**************/    

                        $message = 'New invoice has been generated for your booking ID: '.$order['id'].'. Please check all invoice details by logging into to your account.';

                        Config::sms($order['user']['mobile1'], $message); // sms to user
                        Config::sms(User::admin('mobile'), 'New invoice has been generated for your booking ID: '.$order['id']); // sms to admin

                        /**************/

                    }

                }    

            }
        
        }

    }
}
