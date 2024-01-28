<?php

namespace App\Http\Controllers\booking;

use PDF;
use Xendit\Cards;
use Carbon\Carbon;
use Xendit\Xendit;
use Xendit\Invoice;
use App\Models\Kota;
use App\Models\Event;
use App\Models\Hotel;
use App\Models\Terms;
use App\Models\Testi;
use App\Models\Refund;
use App\Models\Wisata;
use App\Models\Session;
use App\Models\Kendaraan;
use App\Models\Pemesanan;
use Illuminate\Support\Str;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug)
    {

        // dd($request->all());
        //rumus perhitungan diskon dinamis
        // hargaTotal - (hargaTotal * diskon / 100)

        $wisata = Wisata::where('slug', $slug)->first();

        $validasi = $request->validate([
            'kota' => 'required',
            'pickup' => 'required',
            'drop_kota' => 'required',
            'dropout' => 'required',
            'agree' => 'required',
            'departure' => 'required'

        ]);


        //agreement start
        if ($request->agree !== null) {
            $agree = true;
        } else if ($request->agree == null) {
            $agree = false;
        }
        //agreement end

        //price extra start
        $extra_price = 0;
        if ($request->extra !== null) {
            $extra_array = array();
            foreach ($request->extra as $extras) {
                $explode_extra = explode(',', $extras);
                $extra_array[] = $explode_extra[0];
                $harga_extra = $explode_extra[1];
                $extra_price += intval($harga_extra);
            }

            $extra_id = implode('', $extra_array);
            $split_extra = str_split($extra_id);
            $extra_id_fix = implode(',', $split_extra);
        } elseif ($request->extra == null) {
            $extra_id_fix = null;
        }



        //extra kendaraan dan hotels start
        if ($request->kendaraan !== null || $request->hotels !== null) {
            $kendaraan_explode = explode(",", $request->kendaraan);
            $kendaraan = intval($kendaraan_explode[0]);

            $hotels_explode = explode(",", $request->hotels);
            $hotels = intval($hotels_explode[0]);
        } else {
            $kendaraan = null;
            $hotels = null;
        }
        //extra kendaraan dan hotels end


        $event = Event::where('wisata_id', $wisata->id)->where('status', 1)->get();
        $kota = Kota::where('slug', request('kota'))->first();
        $kota_pickup = explode(',', $request->kota);

        $session = Session::where('wisata_id', $wisata->id)->where('startDate', '<=', $request->departure)->where('endDate', '>=', $request->departure)->where('type', 'session')->first();
        $weekend = Session::where('wisata_id', $wisata->id)->where('type', 'weekend')->first();
        $day = Carbon::now()->format('l');
        $day_departure = Carbon::parse($request->departure)->format('l');


        //logic session start
        if ($session !== null) {
            $harga = $session->price;
            $harga_child = $session->price_child;
            if ($session->price_child == null) {
                $harga_child = $wisata->price_child;
            }
        } elseif ($session == null) {
            if ($weekend !== null) {

                if ($day_departure == 'Saturday' || $day_departure == 'Sunday') {
                    $harga = $weekend->price;
                    $harga_child = $weekend->price_child;
                } else {
                    $harga = $wisata->harga;
                    $harga_child = $wisata->price_child;
                }
            } else {
                $harga = $wisata->harga;
                $harga_child = $wisata->price_child;
            }
        }
        //logic session end


        //count quantity order start
        if ($request->adult > 0 || $request->child > 0) {
            $total_pesan = $request->adult + $request->child;
            $priceWisata = $harga * $request->adult + $harga_child * $request->child;
        } else {
            $total_pesan = 1;
            $priceWisata = $harga;
        }
        //count quantity order start


        $extra_price = $extra_price * $total_pesan;

        //logic event start
        $count_3 = $priceWisata;
        if ($event->count() > 0) {
            $count_4 = $priceWisata;
            if ($event->where('tipe', 'min_jumlah')->count() > 0) {
                $min_jumlah = Event::where('wisata_id', $wisata->id)->where('tipe', 'min_jumlah')->first();
                if ($total_pesan >= $min_jumlah->min_jumlah) {
                    $count_3 = $priceWisata - ($priceWisata * $min_jumlah->potongan / 100);
                }
            }

            if ($event->where('tipe', 'min_harga')->count() > 0) {
                $min_harga = Event::where('wisata_id', $wisata->id)->where('tipe', 'min_harga')->first();
                if ($count_4 >= $min_harga->min_harga) {
                    $count_3 = $count_3 - ($count_3 * $min_harga->potongan / 100);
                }
            }

            if ($event->where('tipe', 'aktif')->count() > 0) {
                $event_aktif = Event::where('wisata_id', $wisata->id)->where('tipe', 'aktif')->first();
                $count_3 = $count_3 - ($count_3 * $event_aktif->potongan / 100);
            }
        }
        //logic event end

        $count_3 = $count_3 + $extra_price;
        $count_3 = $count_3 + $kota_pickup[1];

        //logic dp start
        $price_diskon = null;
        if ($request->payment_type == 'dp') {
            $price_diskon = $count_3 - ($count_3 * 50 / 100);
        }
        //logic dp end




        //payment api start
        $secret_key = 'Basic ' . config('xendit.key_auth');
        $external_id = Str::random(10) . Carbon::now()->format('ymd');
        if ($request->payment_type == 'dp') {

            $data_request = Http::withHeaders([
                'Authorization' => $secret_key
            ])->post('https://api.xendit.co/v2/invoices', [
                'external_id' => $external_id,
                'amount' => $price_diskon,
            ]);
        } elseif ($request->payment_type == 'full') {

            $data_request = Http::withHeaders([
                'Authorization' => $secret_key
            ])->post('https://api.xendit.co/v2/invoices', [
                'external_id' => $external_id,
                'amount' => $count_3,
            ]);
        }


        $response = $data_request->object();
        //payment api end

        $proses = Pemesanan::create([
            'invoice_id' => $response->id,
            'wisata_id' => $wisata->id,
            'user_id' => auth()->user()->id,
            'doc_no' => $external_id,
            'pickup_kota' => $kota_pickup[0],
            'pickup_point' => $request->pickup,
            'drop_kota' => $request->drop_kota,
            'drop_point' => $request->dropout,
            'amount' => $count_3,
            'agree' => $agree,
            'note' => $request->note,
            'dp' => $price_diskon,
            'departure' => $request->departure,
            'description' => $request->note,
            'payment_status' => $response->status,
            'payment_link' => $response->invoice_url,
            'expired' => $response->expiry_date,
            'extra_id' => $extra_id_fix,
            'hotel_id' => $hotels,
            'kendaraan_id' => $kendaraan,
            'child' => $request->child,
            'adult' => $request->adult
        ]);

        if ($proses) {
            $pemesanan = Pemesanan::with('wisata', 'user')->where('invoice_id', $response->id)->where('doc_no', $external_id)->first();

            Notification::create([
                'judul' => 'New Confirmation Request From ' . $pemesanan->user->username,
                'tipe' => 'req_pemesanan',
                'user_id' => Auth()->user()->id,
                'pemesanan_id' => $pemesanan->id,
                'url' => '/admin/booking/confirmation',
            ]);

            return redirect('/tagihan')->with('toast_success', 'order is successful, please wait for confirmation from admin');
        } else {
            return redirect('/tagihan')->with('toast_error', 'order is failed');
        }
    }

    public function callback()
    {
        $data = request()->all();
        $status = $data['status'];
        $external_id = $data['external_id'];


        $proses = Pemesanan::where('doc_no', $external_id)->update([
            'payment_status' => $status,
            'payment_channel' => $data['payment_method']
        ]);



        if ($proses) {
            $pemesanan = Pemesanan::with('wisata', 'user',)->where('doc_no', $external_id)->first();
            $wisata = Wisata::where('id', $pemesanan->wisata_id)->first();
            $kota = Kota::where('id', $wisata->kota_id)->first();
            $count_wisata = $wisata->diboking + 1;
            $count_kota = $kota->popularitas + 1;

            Wisata::where('id', $pemesanan->wisata_id)->update([
                'diboking' => $count_wisata,
            ]);

            Kota::where('id', $wisata->kota_id)->update([
                'popularitas' => $count_kota,
            ]);

            Notification::where('pemesanan_id', $pemesanan->id)->where('tipe', 'confirmation')->update([
                'status' => 'dibuka'
            ]);
            Notification::create([
                'judul' => 'New Booking From ' . $pemesanan->user->username . 'To ' . $pemesanan->wisata->nama_wisata,
                'tipe' => 'pemesanan',
                'user_id' => Auth()->user()->id,
                'pemesanan_id' => $pemesanan->id,
                'url' => '/admin/booking',
            ]);
        }
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        //
        if ($request->all() == null) {
            return redirect('/wisata/' . $slug);
        }

        $request->validate([
            'tanggal' => 'required'
        ]);

        $wisata = Wisata::with('extra', 'event')->where('slug', $slug)->first();
        $weekend = Session::where('wisata_id', $wisata->id)->where('type', 'weekend')->first();
        $session = Session::where('wisata_id', $wisata->id)->where('type', 'session')->where('startDate', '<=', $request->tanggal)->where('endDate', '>=', $request->tanggal)->first();
        $day = Carbon::now()->format('l');
        $departure = $request->tanggal.' '.$wisata->time_departure;


        return view('booking.checkout', [
            'wisata' => $wisata,
            'kota' => Kota::get(),
            'drop' => Kota::get(),
            'firstpricePickup' => Kota::pluck('harga')->first(),
            'slug' => $slug,
            'adult' => $request->adult,
            'child' => $request->child,
            'tanggal' => $departure,
            'day_departure' => Carbon::parse($request->tanggal)->format('l'),
            'session' => $session,
            'weekend' => $weekend,
            'day' => $day,
            'terms' => Terms::first()
        ]);
    }


    public function cancel(Request $request, $doc_no)
    {
        $pemesanan = Pemesanan::with('wisata')->where('doc_no', $doc_no)->first();
        if ($pemesanan->payment_status == 'PENDING') {
            Pemesanan::where('doc_no', $doc_no)->delete();
            return redirect()->back()->with('toast_success', 'success cancel this destination');
        } elseif ($pemesanan->payment_status == 'PAID') {

            $secret_key = 'Basic ' . config('xendit.key_auth');

            $data_request = Http::withHeaders([
                'Authorization' => $secret_key
            ])->get('https://api.xendit.co/transactions?reference_id=' . $pemesanan->doc_no);


            $data_transaksi = collect($data_request->json()['data'])->firstOrFail();
            // dd($data_transaksi);
            if ($pemesanan->payment_channel == 'RETAIL_OUTLET') {
                $request->validate([
                    'number_refund' => 'required',
                    'payment_vendor' => 'required'
                ]);

                $number_refund = $request->number_refund;
                $payment_vendor = $request->payment_vendor;
            } else {
                $number_refund = $data_transaksi['account_identifier'];
                $payment_vendor = $data_transaksi['channel_code'];
            }


            if ($pemesanan->dp == null) {
                $amount = $pemesanan->amount;
            } else {
                $amount = $pemesanan->dp;
            }






            $proses = Pemesanan::where('doc_no', $doc_no)->update([
                'status' => 'cancel'
            ]);

            if ($proses) {
                Refund::create([
                    'pemesanan_id' => $pemesanan->id,
                    'doc_no' => $data_transaksi['reference_id'],
                    'invoice_id' => $pemesanan->invoice_id,
                    'payment_channel' => $data_transaksi['channel_category'],
                    'payment_vendor' => $payment_vendor,
                    'refund_amount' => $amount,
                    'number_refund' => $number_refund
                ]);
                Notification::create([
                    'judul' => Auth()->user()->username . ' canceled the booking for the tour ' . $pemesanan->wisata->nama_wisata,
                    'tipe' => 'cancel',
                    'user_id' => Auth()->user()->id,
                    'pemesanan_id' => $pemesanan->id,
                    'url' => '/admin/booking/cancel'
                ]);
                    return redirect()->back()->with('toast_success', 'success cancel this destination');

            }
            return redirect()->back()->with('toast_error', 'Failed cancel this destination');

        }
    }


    public function payment(Request $request, $slug)
    {

        $coba = explode(",", $request->kota);


        $validasi = $request->validate([
            'kota' => 'required',
            'pickup' => 'required'
        ]);

        $kota = Kota::where('slug', $validasi['kota'])->first();
        $wisata = Wisata::where('slug', $slug)->first();

        $total = $wisata->harga + $kota->harga;

        return view('coba', [
            'kota' => $kota,
            'wisata' => $wisata,
            'total' => $total,
            'jemput' => $validasi['pickup']
        ]);
    }

    public function tagihan()
    {

        return view('booking.tagihan', [
            'data' => Pemesanan::with('wisata', 'user', 'vehicle', 'driver', 'guide')->where('user_id', Auth()->user()->id)->where('payment_status', 'PENDING')->orderBy('id', 'desc')->get(),
        ]);
    }

    public function booking()
    {
        $data = Pemesanan::with('wisata', 'user')->where('user_id', Auth()->user()->id)->whereIN('payment_status', ['PAID', 'EXPIRED'])->latest();

        if (request('filter')) {
            $data->where('status', request('filter'));
        }



        return view('booking.booking', [
            'data' => $data->get(),
        ]);
    }




    public function ticket($doc_no)
    {

        $data = Pemesanan::with('wisata', 'user')->where('doc_no', $doc_no)->first();

        if ($data) {
            return view('booking.ticket', [
                'data' => $data,
                'hotel' => Hotel::where('wisata_id', $data->wisata_id)->where('id', $data->hotel_id)->first(),
                'mobil' => Kendaraan::where('id', $data->kendaraan_id)->first()
            ]);
        } else {
            return Redirect('/booking');
        }
    }



    public function Sendtesti(Request $request, $doc_no)
    {
        $pemesanan = Pemesanan::with('wisata', 'user')->where('doc_no', $doc_no)->first();

        $validasi = request()->validate([
            'testi' => 'required',
        ]);

        if ($pemesanan) {
            $proses = Testi::create([
                'user_id' => $pemesanan->user->id,
                'wisata_id' => $pemesanan->wisata->slug,
                'doc_no' => $doc_no,
                'deskripsi' => $validasi['testi'],
            ]);

            Pemesanan::where('doc_no', $doc_no)->update([
                'comment' => true,
            ]);

            if ($proses) {
                Notification::create([
                    'judul' => 'new comment from ' . $pemesanan->user->username . ' for tour ' . $pemesanan->wisata->nama_wisata,
                    'tipe' => 'coment',
                    'user_id' => Auth()->user()->id,
                    'url' => '/wisata/' . $pemesanan->wisata->slug,
                ]);
            }


            return Redirect('/wisata/' . $pemesanan->wisata->slug);
        } else {
            return redirect('/booking');
        }
    }


    public function reschedule($doc_no)
    {

        if (request('date') == null) {
            return redirect()->back()->with('toast_error', 'Please Input Date Reschedule');
        }
        $pemesanan = Pemesanan::with('wisata')->where('doc_no', $doc_no)->where('user_id', Auth()->user()->id)->first();
        $text = 'Hello, I want to apply for a rescheduling for my ' . $pemesanan->wisata->nama_wisata . ' tour booking.
Order Code :' . $pemesanan->doc_no . ',
Reschedule Date : ' . request('date') . '';
        $number_phone = config('services.layanan.number_phone');


        $whatsappLink = 'https://api.whatsapp.com/send?phone=+62'.$number_phone.'&text=' . urlencode($text);

        return redirect()->away($whatsappLink);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
