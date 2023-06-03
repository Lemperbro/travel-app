<?php

namespace App\Providers;

use App\Models\Notification;
use Illuminate\Support\ServiceProvider;
use App\Models\Pemesanan;
use App\Models\Testi;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

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

        view()->composer('admin.partials.sidebar', function($req_booking){
            $req_booking->with([
                'req_booking' => Pemesanan::where('status', 'menunggu'),
                'cancel' => Pemesanan::where('status', 'cancel')
            ]);
        });

        view()->composer('admin.partials.navbar', function($notif) {
            $notif->with([
                'notification' => Notification::whereIn('tipe', ['pemesanan','req_pemesanan','coment','cancel'])->latest()->limit(15)->get(),
                'count' => Notification::whereIn('tipe', ['pemesanan','req_pemesanan','coment','cancel'])->where('status', 'belum dibuka')->latest()->limit(15)->get()
                
            ]);
        });
        


            
            view()->composer('partials.navbar', function($notif){
            if(Auth()->user() !== null){

                $notif->with([
                    'notification' => Notification::with('user','pemesanan')->where('user_id', Auth()->user()->id)->whereIn('tipe', ['pemesanan', 'confirmation','refund'])->latest()->limit(15)->get(),
                    'count' => Notification::where('user_id', Auth()->user()->id)->whereIn('tipe', ['pemesanan', 'confirmation','refund'])->where('status', 'belum dibuka')->latest()->limit(15)->get(),
                    
                ]);
            }

            });
            


        
    }
}
