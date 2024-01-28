<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Guide;
use App\Models\Supir;
use App\Models\Kendaraan;
use App\Models\Pemesanan;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Refund;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Console\Scheduling\Schedule;

class AdminBookingController extends Controller
{
    //

    public function index()
    {

        $data = Pemesanan::with('wisata', 'user');
        $user = User::where('username', 'like', '%' . request('search') . '%')->get();

        if (request('search')) {
            $data->Where('doc_no', 'like', '%' . request('search') . '%');

            if ($user->count() > 0) {
                foreach ($user as $user) {

                    $data = Pemesanan::with('wisata', 'user')->Where('user_id', 'like', '%' . $user->id . '%');
                }
            }
        }

        if (in_array(request('filter'), ['PAID', 'PENDING', 'EXPIRED'])) {
            $data->where('payment_status', request('filter'));
            if(request('filter') == 'PENDING'){
                $data->where('status', 'dikonfirmasi');
            }elseif(request('filter') == 'PAID'){
                $data->where('status', 'dikonfirmasi');
            }
        } elseif (in_array(request('filter'), ['done', 'cancel', 'refund'])) {
            $data->where('status', request('filter'));
        }



        return view('admin.booking.booking', [
            'tittle' => 'booking',
            'data' => $data->paginate(10)

        ]);
    }

    public function confirmation()
    {
        $data =  Pemesanan::with('wisata', 'user')->where('status', 'menunggu')->orderBy('created_at', 'DESC')->get();
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

    public function confirm(Request $request, $id)
    {



        $validasi = $request->validate([
            'driver' => 'numeric',
            'vehicle' => 'numeric',
            'guide' => 'numeric',
        ], [
            'driver.numeric' => 'please select the driver first',
            'vehicle.numeric' => 'please select the vehicle first',
            'guide.numeric' => 'please select the guide first'
        ]);



        if ($request->time == null) {
            $konfirm = Pemesanan::where('id', $id)->update([
                'driver_id' => $request->driver,
                'vehicle_id' => $request->vehicle,
                'guide_id' => $request->guide,
                'status' => 'dikonfirmasi'
            ]);
        } elseif ($request->time !== null) {
            $pemesanan_departure = explode(' ', Pemesanan::where('id', $id)->pluck('departure')->first());
            $konfirm = Pemesanan::where('id', $id)->update([
                'driver_id' => $request->driver,
                'vehicle_id' => $request->vehicle,
                'guide_id' => $request->guide,
                'status' => 'dikonfirmasi',
                'departure' => $pemesanan_departure[0].' '.$request->time
            ]);
        }


        if ($konfirm) {
            $pemesanan =  Pemesanan::with('wisata', 'guide', 'driver', 'vehicle')->where('id', $id)->first();
            $user = User::where('id', $pemesanan->user_id)->first();
            $data = array(
                'to' => $user->email,
                'name' => $user->username,
                'wisata' => $pemesanan->wisata->nama_wisata,
                'departure' => Carbon::parse($pemesanan->departure)->format('d m Y'),
                'guide' => $pemesanan->guide->nama,
                'driver' => $pemesanan->driver->nama,
                'vehicle' => $pemesanan->vehicle->merek,
                'url' => url('/tagihan'),
                'email_growin' => config('services.layanan.email')
            );

            $send = Mail::send('admin.booking.email', $data, function ($message) use ($data) {

                $message->from($data['email_growin'], 'To ' . $data['name']);

                $message->to($data['to'])->subject('Confrimation Booking');
            });


            Notification::where('pemesanan_id', $id)->update([
                'status' => 'dibuka'
            ]);
            $pemesanan = Pemesanan::with('wisata')->where('id', $id)->first();

            Notification::create([
                'judul' => $pemesanan->wisata->nama_wisata . ' has been successfully confirmed by the admin, please make a payment',
                'tipe' => 'confirmation',
                'user_id' => $pemesanan->user_id,
                'pemesanan_id' => $pemesanan->id,
                'url' => '/admin/booking',
            ]);

            return redirect()->back()->with('toast_success', 'success confirmation');
        }

        return redirect()->back()->with('toast_error', 'failed confirmation');
    }


    public function cancel()
    {
        // $data =  Pemesanan::with('wisata','user')->where('status', 'cancel')->where('payment_status', 'PAID')->get();

        $data = Refund::with(['pemesanan.wisata', 'pemesanan.user'])->where('status', 'waiting')->get();
        // dd($data);

        return view('admin.booking.cancel', [
            'data' => $data,
        ]);
    }


    public function cancel_action($id)
    {
        $pemesanan = Pemesanan::with('wisata', 'user')->where('id', $id)->first();
        $refund = Refund::where('pemesanan_id', $pemesanan->id)->where('doc_no', $pemesanan->doc_no)->where('invoice_id', $pemesanan->invoice_id)->first();
        $proses =  Pemesanan::where('id', $id)->update([
            'status' => 'refund'
        ]);

        if ($proses) {
            Refund::where('pemesanan_id', $pemesanan->id)->where('doc_no', $pemesanan->doc_no)->where('invoice_id', $pemesanan->invoice_id)->update([
                'status' => 'success'
            ]);
            Notification::create([
                'judul' => 'Admin has made a refund for Bromo tour bookings ' . $pemesanan->wisata->nama_wisata,
                'tipe' => 'refund',
                'user_id' => $pemesanan->user_id,
                'pemesanan_id' => $pemesanan->id,
                'url' => '/admin/booking'
            ]);


            $data = array(
                'to' => $pemesanan->user->email,
                'name' => $pemesanan->user->username,
                'wisata' => $pemesanan->wisata->nama_wisata,
                'departure' => Carbon::parse($pemesanan->departure)->format('d m Y'),
                'payment_vendor' => $refund->payment_vendor,
                'refund_amount' => $refund->refund_amount,
                'payment_channel' => $refund->payment_channel,
                'email_growin' => config('services.layanan.email')

            );

            $send = Mail::send('admin.booking.emailRefund', $data, function ($message) use ($data) {

                $message->from($data['email_growin'], 'To ' . $data['name']);

                $message->to($data['to'])->subject('Refund Confirmation For' . $data['wisata']);
            });
        }

        return redirect()->back()->with('toast_success', 'success refund');
    }

    public function tolak($id)
    {
        Pemesanan::where('id', $id)->update([
            'status' => 'ditolak'
        ]);

        return redirect()->back()->with('success', 'Order Was Successfully Rejected');
    }


    public function reschedule(Request $request, $doc_no)
    {

        $request->validate([
            'date' => 'required'
        ]);
        $pemesanan = Pemesanan::with('wisata', 'user')->where('doc_no', $doc_no)->first();
        $proses = Pemesanan::where('doc_no', $doc_no)->update([
            'departure' => $request->date
        ]);

        if ($proses) {

            $data = array(
                'to' => $pemesanan->user->email,
                'name' => $pemesanan->user->username,
                'wisata' => $pemesanan->wisata->nama_wisata,
                'email_growin' => config('services.layanan.email')

            );

            $send = Mail::send('admin.booking.emailReschedule', $data, function ($message) use ($data) {

                $message->from($data['email_growin'], 'To ' . $data['name']);

                $message->to($data['to'])->subject('Reschedule Confirmation For' . $data['wisata']);
            });

            return redirect()->back()->with('toast_success', 'Successful Reschedule');
        } else {
            return redirect()->back()->with('toast_error', 'Failed Reschedule');
        }
    }
}
