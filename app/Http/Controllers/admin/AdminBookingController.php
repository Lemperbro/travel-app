<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Guide;
use App\Models\Supir;
use App\Models\Kendaraan;
use App\Models\Pemesanan;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

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
        $data =  Pemesanan::with('wisata','user')->where('status', 'menunggu')->get();
        $driver = Supir::where('status', 0)->get();
        $vehicle = Kendaraan::where('status', 0)->get();
        $guide = Guide::where('status', 0)->get();

        return view('admin.booking.confirmation', [
            'data' => $data,
            'driver' => $driver,
            'vehicle' => $vehicle,
            'guide' => $guide
        ]);
    }

    public function confirm(Request $request, $id){
        $validasi = $request->validate([
            'driver' => 'numeric',
            'vehicle' => 'numeric',
            'guide' => 'numeric',
        ],[
            'driver.numeric' => 'please select the driver first',
            'vehicle.numeric' => 'please select the vehicle first',
            'guide.numeric' => 'please select the guide first'
        ]);
        $konfirm = Pemesanan::where('id', $id)->update([
            'driver_id' => $request->driver,
            'vehicle_id' => $request->vehicle,
            'guide_id' => $request->guide,
            'status' => 'dikonfirmasi'
        ]);

        if($konfirm){
            // Supir::where('id', $request->driver)->update([
            //     'status' => 1
            // ]);
            // Kendaraan::where('id', $request->vehicle)->update([
            //     'status' => 1
            // ]);
            // Guide::where('id', $request->guide)->update([
            //     'status' => 1
            // ]);
            Notification::where('pemesanan_id', $id)->update([
                'status' => 'dibuka'
            ]);
            $pemesanan = Pemesanan::with('wisata')->where('id', $id)->first();

            Notification::create([
                'judul' => $pemesanan->wisata->nama_wisata.' has been successfully confirmed by the admin, please make a payment',
                'tipe' => 'confirmation',
                'user_id' => $pemesanan->user_id,
                'pemesanan_id' => $pemesanan->id,
                'url' => '/admin/booking',
            ]);

            return redirect()->back()->with('toast_success', 'success confirmation');
        }

        return redirect()->back()->with('toast_error', 'failed confirmation');
    }


    public function cancel($id){
        Pemesanan::where('id', $id)->update([
            'status' => 'ditolak'
        ]);

        return redirect()->back()->with('success', 'Order Was Successfully Rejected');
    }
}
