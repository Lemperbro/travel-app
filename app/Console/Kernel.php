<?php

namespace App\Console;

use App\Models\Notification;
use Carbon\Carbon;
use App\Models\Pemesanan;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->call(function(){
            $DateNotifDelete = Carbon::now()->subDays(10)->toDateTimeString();
            $date = Carbon::now()->format('Y-m-d');
            

                    Pemesanan::where('payment_status','PAID')->where('departure','<',$date)->update([
                        'status' => 'done'
                    ]);

                    Pemesanan::where('payment_status', 'PENDING')->where('expired', '<',$date)->update([
                        'payment_status' => 'EXPIRED'
                    ]);

                    Notification::whereDate('created_at','<', $DateNotifDelete)->where('status', 'dibuka')->delete();

        })->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
