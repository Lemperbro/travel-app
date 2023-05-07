<?php

namespace App\Providers;

use App\Models\Notification;
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

        view()->composer('admin.partials.sidebar', function($req_booking) use ($booking){
            $req_booking->with([
                'req_booking' => $booking->get(),
            ]);
        });

        view()->composer('admin.partials.navbar', function($notif) {
            $notif->with([
                'notification' => Notification::whereIn('tipe', ['pemesanan','req_pemesanan','coment'])->latest()->limit(15)->get(),
                'count' => Notification::whereIn('tipe', ['pemesanan','req_pemesanan','coment'])->where('status', 'belum dibuka')->latest()->limit(15)->get()
                
            ]);
        });


        view()->composer('partials.navbar', function($notif) {
            $notif->with([
                'notification' => Notification::with('user','pemesanan')->where('user_id', Auth()->user()->id)->whereIn('tipe', ['pemesanan', 'confirmation'])->latest()->limit(15)->get(),
                'count' => Notification::where('user_id', Auth()->user()->id)->whereIn('tipe', ['pemesanan', 'confirmation'])->where('status', 'belum dibuka')->latest()->limit(15)->get()
                
            ]);
        });



        
    }
}
