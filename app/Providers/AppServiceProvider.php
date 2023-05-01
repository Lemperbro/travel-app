<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Pemesanan;
use App\Models\Testi;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $booking = Pemesanan::where('status', 'menunggu');
        $new_booking = Pemesanan::where('payment_status', 'PAID')->where('status', 'dikonfirmasi');
        $comment = Testi::latest();
        view()->composer('admin.partials.sidebar', function($req_booking) use ($booking){
            $req_booking->with([
                'req_booking' => $booking->get(),
            ]);
        });

        view()->composer('admin.partials.navbar', function($notif) use ($booking, $new_booking, $comment){
            $notif->with([
                'request_booking' => $booking->latest()->limit(4)->get(),
                'new_booking' => $new_booking->latest()->limit(4)->get(),
                'comment' => $comment->limit(4)->get()
                
            ]);
        });
        
    }
}
