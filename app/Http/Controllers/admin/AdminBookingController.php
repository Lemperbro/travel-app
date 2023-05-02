<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminBookingController extends Controller
{
    //

    public function index(){

        $data = Pemesanan::with('wisata','user');
        $user = User::where('username', 'like', '%'.request('search').'%')->get();

        if(request('search') && request('status')){
            $data->where('payment_status', 'like' , '%' . request('status') . '%')
            ->Where('doc_no', 'like' , '%' . request('search') . '%');

            if($user->count() > 0){
                foreach($user as $user){

                $data = Pemesanan::with('wisata','user')->where('payment_status', 'like' , '%' . request('status') . '%')->Where('user_id', 'like' , '%' . $user->id . '%');
            }

            }
        }
        elseif(request('search')){
            $data->where('payment_status', 'like' , '%' . request('search') . '%')
            ->orWhere('doc_no', 'like' , '%' . request('search') . '%');

            if($user->count() > 0){
                foreach($user as $user){

                $data->orWhere('user_id', 'like' , '%' . $user->id . '%');
            }

            }
        }
        

    return view('admin.booking.booking', [
        'tittle' => 'booking',
        'data' => $data->paginate(10)

    ]);

    }

    public function confirmation(){
        $data =  Pemesanan::where('status', 'menunggu')->get();

        return view('admin.booking.confirmation', [
            'data' => $data,
        ]);
    }
}
