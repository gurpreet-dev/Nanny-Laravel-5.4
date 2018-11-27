<?php

namespace App\Console\Commands;
use App\User;
use Illuminate\Console\Command;

use App\Review;
use App\Order;
use App\Invoice;
use App\Config;

use DB;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class InvoiceDueDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:InvoiceDueDate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate and update due date and price of invoice';

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

        $invoices = Invoice::with(['user'])->where('status', 0)->get();

        $current_date = time();

        $invoices = json_decode(json_encode($invoices), true);

        foreach($invoices as $invoice){

            $created_at =  strtotime($invoice['created_at']);  // if today :2013-05-23

            $due_date = date('d-m-Y', strtotime('+5 days', $created_at));

            if(strtotime($due_date) < $current_date){

                $due_price = $invoice['due_price'] + 5;

                Invoice::where('id', $invoice['id'])->update(['due_price' => $due_price]);

                $logo = URL::to('/').'/images/website/logo.png';

                Mail::send('emails.invoice_user_alert', ['url' => $logo, 'invoice' => $invoice], function ($message) use($invoice)
                {
                    $message->to($invoice['user']['email'], $invoice['user']['first_name1'])->subject('Invoice Pending');
                    $message->from('kuldeepjha@avainfotech.com','Nanny Portland');
                
                });

                Config::sms($invoice['user']['mobile1'], 'Your invoice with ID: '.$invoice['id'].' is pending. There will be late charges incurred daily of $5.');

            }

        }
        
    }
}
