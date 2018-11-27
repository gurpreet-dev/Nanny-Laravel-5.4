<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        '\App\Console\Commands\getRecurringProfileStatus',
        '\App\Console\Commands\generateInvoice',
        '\App\Console\Commands\InvoiceDueDate',
        '\App\Console\Commands\checkOrderEndDate',
        '\App\Console\Commands\expirePinchRequest'
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('getRecurringProfileStatus:sendMail')
        //          ->daily()->sendOutputTo('cron_logs/getRecurringProfileStatus-sendMail.txt');

        $schedule->command('invoice:generateInvoice')
                 ->daily()->sendOutputTo('cron_logs/generateInvoice.txt');

        $schedule->command('invoice:InvoiceDueDate')
                 ->daily()->sendOutputTo('cron_logs/InvoiceDueDate.txt');    

        $schedule->command('order:checkOrderEndDate')
                 ->everyMinute()->sendOutputTo('cron_logs/checkOrderEndDate.txt');  

        $schedule->command('request:expirePinchRequest')
                 ->everyMinute()->sendOutputTo('cron_logs/expirePinchRequest.txt');                  

                 
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
