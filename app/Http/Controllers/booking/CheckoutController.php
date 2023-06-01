<?php

namespace App\Http\Controllers\booking;

use PDF;
use App\Models\Kota;
use App\Models\Event;
use App\Models\Testi;
use App\Models\Wisata;
use App\Models\Pemesanan;
use Illuminate\Support\Str;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        $validasi = $request->validate([
            'kota' => 'required',
            'pickup' => 'required',
            'drop_kota' => 'required',
            'dropout' => 'required',
            'agree' => 'required',

        ]);
        
        if($request->agree !== null){
            $agree = true;
        }else if($request->agree == null){
            $agree = false;
        }
        
        $extra_price = 0;
        if($request->extra !== null){
            $extra_array = array();
            foreach($request->extra as $extras){
                $explode_extra = explode(',', $extras);
                $extra_array[] = $explode_extra[0];
                $harga_extra = $explode_extra[1];
                $extra_price += intval($harga_extra);
            }
            
            $extra_id = implode(',', $extra_array);
            
            
            
        }elseif($request->extra == null){
            $extra_id = null;
        }
        
        
        
        $wisata = Wisata::where('slug', $slug)->first();
        $event = Event::where('wisata_id',$wisata->id)->where('status',1)->get();
        $kota = Kota::where('slug', request('kota'))->first();
        $kota_pickup = explode(',', $request->kota);
        if($request->adult > 0 || $request->child > 0){
            $total_pesan = $request->adult + $request->child;
            $priceWisata = $wisata->harga * $request->adult + $wisata->price_child * $request->child;
        }else {
            $total_pesan = 1;
            $priceWisata = $wisata->harga;
        }
        $extra_price = $extra_price * $total_pesan;
        // $count_3 = $priceWisata + $kota_pickup[1];

        // dd($event);
        //logic event start
        if($event->count() > 0){
            $count_4 = $priceWisata;
            $count_3 = $priceWisata;
            if($event->where('tipe', 'min_jumlah')->count() > 0){
                $min_jumlah = Event::where('wisata_id', $wisata->id)->where('tipe', 'min_jumlah')->first();
                if($total_pesan >= $min_jumlah->min_jumlah){
                    $count_3 = $priceWisata - ($priceWisata * $min_jumlah->potongan/100);
                }
                
            }
            
            if($event->where('tipe', 'min_harga')->count() > 0){
                $min_harga = Event::where('wisata_id', $wisata->id)->where('tipe', 'min_harga')->first();
                if($count_4 >= $min_harga->min_harga){
                    $count_3 = $count_3 - ($count_3 * $min_harga->potongan/100);
                }
            }

            if($event->where('tipe', 'aktif')->count() > 0){
                $event_aktif = Event::where('wisata_id', $wisata->id)->where('tipe', 'aktif')->first();
                $count_3 = $count_3 - ($count_3 * $event_aktif->potongan/100);

            }
        }
        //logic event end
        $count_3 = $count_3 + $extra_price;
        $count_3 = $count_3 + $kota_pickup[1];

        //logic dp start
        $price_diskon = null;
        if($request->payment_type == 'dp'){
            $price_diskon = $count_3 - ($count_3 * 50/100);
        }
        //logic dp end
   




        $secret_key = 'Basic '.config('xendit.key_auth');
        $external_id = Str::random(10);

        if($request->payment_type == 'dp'){

            $data_request = Http::withHeaders([
                'Authorization' => $secret_key
                ])->post('https://api.xendit.co/v2/invoices', [
                    'external_id' => $external_id,
                    'amount' => $price_diskon
                ]);
        }elseif($request->payment_type == 'full'){

            $data_request = Http::withHeaders([
                'Authorization' => $secret_key
                ])->post('https://api.xendit.co/v2/invoices', [
                    'external_id' => $external_id,
                    'amount' => $count_3
                ]);
        }

        $response = $data_request->object();


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
            'extra_id' => $extra_id,
            'child' => $request->child,
            'adult' => $request->adult
        ]);
        
        if($proses){
            $pemesanan = Pemesanan::with('wisata','user')->where('invoice_id', $response->id)->where('doc_no', $external_id)->first();

            Notification::create([
                'judul' => 'New Confirmation Request From '.$pemesanan->user->username,
                'tipe' => 'req_pemesanan',
                'user_id' => Auth()->user()->id,
                'pemesanan_id' => $pemesanan->id,
                'url' => '/admin/booking/confirmation',
            ]);

            return redirect('/tagihan')->with('toast_success', 'order is successful, please wait for confirmation from admin');
        }else{
            return redirect('/tagihan')->with('toast_error', 'order is failed');
        }


    }

    public function callback(){
        $data = request()->all();
        $status = $data['status'];
        $external_id = $data['external_id'];
        $pemesanan = Pemesanan::with('wisata','user')->where('doc_no', $external_id)->first();
        $count_wisata = $pemesanan->wisata->diboking + 1;
        $count_kota = $pemesanan->wisata->kota->popularitas + 1;

        $proses = Pemesanan::where('doc_no', $external_id)->first()->update([
            'payment_status' => $status
        ]);

        if($proses){
            Wisata::where('id', $pemesanan->wisata_id)->first()->update([
                'diboking' => $count_wisata,
            ]);

            Kota::where('id', $pemesanan->wisata->kota->id)->first()->update([
                'popularitas' => $count_kota,
            ]);

            Notification::where('pemesanan_id', $pemesanan->id)->update([
                'status' => 'dibuka'
            ]);
            Notification::create([
                'judul' => 'New Booking From '.$pemesanan->user->username.'To '.$pemesanan->wisata->nama_wisata,
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
        if($request->all() == null){
            return redirect('/wisata/'.$slug);
        }
        
        $request->validate([
            'tanggal' => 'required'
        ]);
        
        $wisata = Wisata::with('extra','event')->where('slug', $slug)->first();


        return view('booking.checkout',[
            'wisata' => $wisata,
            'kota' => Kota::get(),
            'drop' => Kota::get(),
            'firstpricePickup' => Kota::pluck('harga')->first(),
            'slug' => $slug,
            'adult' => $request->adult,
            'child' => $request->child,
            'tanggal' => $request->tanggal,
        ]);
        
    }


    public function cancel($doc_no){
        $pemesanan = Pemesanan::where('doc_no',$doc_no)->first();
        if($pemesanan->payment_status == 'PENDING'){
            Pemesanan::where('doc_no',$doc_no)->delete();
            return redirect()->back()->with('toast_success','success cancel this destination');
        }elseif($pemesanan->payment_status == 'PAID'){
            Pemesanan::where('doc_no',$doc_no)->update([
                'status' => 'cancel'
            ]);
            return redirect()->back()->with('toast_success','success cancel this destination');
        }
    }


    public function payment(Request $request, $slug){
            
        $coba = explode("," , $request->kota);
        

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

    public function tagihan(){

        return view('booking.tagihan',[
            'data' => Pemesanan::with('wisata','user','vehicle', 'driver', 'guide')->where('user_id', Auth()->user()->id)->where('payment_status', 'PENDING')->get(),
        ]);
    }

    public function booking(){
        $data = Pemesanan::with('wisata','user')->where('user_id', Auth()->user()->id)->where('payment_status', 'PAID')->latest();

        if(request('filter')){
            $data->where('status', request('filter'));
        }


        return view('booking.booking',[
            'data' => $data->get(),
        ]);
    }

    // public function ticket($doc_no){

    //     $data = Pemesanan::where('doc_no', $doc_no)->first();

    //     $pdf = PDF::loadview('tiket', [
    //         'data' => $data
    //     ]);
    //     $pdf->set_paper([0,0,300,500], 'landscape');

    //     $pdf->set_option('margin-top', '0mm');
    //     $pdf->set_option('margin-right', '0mm');
    //     $pdf->set_option('margin-bottom', '0mm');
    //     $pdf->set_option('margin-left', '0mm');

    //     //500 tinggi , 1000 lebar
    //    return $pdf->download('coba.pdf');

    // }


    public function ticket($doc_no){

        $data = Pemesanan::with('wisata', 'user')->where('doc_no', $doc_no)->first();

        if($data){
            return view('booking.tiket', [
                'data' => $data,
            ]);
        }else{
            return Redirect('/booking');
        }





    }



    public function Sendtesti(Request $request,$doc_no){
        $pemesanan = Pemesanan::with('wisata', 'user')->where('doc_no', $doc_no)->first();

        $validasi = request()->validate([
            'testi' => 'required',
        ]);

        if($pemesanan){
           $proses = Testi::create([
                'user_id' => $pemesanan->user->id,
                'wisata_id' => $pemesanan->wisata->slug,
                'doc_no' => $doc_no,
                'deskripsi' => $validasi['testi'],
            ]);

            Pemesanan::where('doc_no', $doc_no)->update([
                'comment' => true,
            ]);

            if($proses){
                Notification::create([
                    'judul' => 'new comment from '.$pemesanan->user->username.' for tour '.$pemesanan->wisata->nama_wisata,
                    'tipe' => 'coment',
                    'user_id' => Auth()->user()->id,
                    'url' => '/wisata/'.$pemesanan->wisata->slug,
                ]);
            }


            return Redirect('/wisata/'.$pemesanan->wisata->slug);

        }else{
            return redirect('/booking');
        }


        
        
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
