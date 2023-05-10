<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Kota;
use App\Models\Testi;
use App\Models\Wisata;
use App\Models\Pemesanan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
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
        //
        $wisata = Wisata::where('slug', $slug)->first();
        $kota = Kota::where('slug', request('kota'))->first();
        $kota_pickup = explode(',', $request->kota);
        $count = $wisata->harga + $kota_pickup[1];

        $secret_key = 'Basic '.config('xendit.key_auth');
        $external_id = Str::random(10);

        $data_request = Http::withHeaders([
            'Authorization' => $secret_key
        ])->post('https://api.xendit.co/v2/invoices', [
            'external_id' => $external_id,
            'amount' => $count
        ]);
        $response = $data_request->object();


        $proses = Pemesanan::create([
            'invoice_id' => $response->id,
            'wisata_id' => $wisata->id,
            'user_id' => auth()->user()->id,
            'doc_no' => $external_id,
            'pickup_kota' => $request->kota,
            'pickup_point' => $request->pickup,
            'drop_kota' => $request->drop_kota,
            'drop_point' => $request->dropout,
            'amount' => $count,
            'description' => $request->note,
            'payment_status' => $response->status,
            'payment_link' => $response->invoice_url,
            'expired' => $response->expiry_date
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
    public function show($slug)
    {
        //
        

        return view('checkout',[
            'wisata' => Wisata::where('slug', $slug)->first(),
            'kota' => Kota::get(),
            'drop' => Kota::get(),
            'firstpricePickup' => Kota::pluck('harga')->first(),
            'slug' => $slug
        ]);
        
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

        return view('tagihan',[
            'data' => Pemesanan::with('wisata','user','vehicle', 'driver', 'guide')->where('user_id', Auth()->user()->id)->where('payment_status', 'PENDING')->get(),
        ]);
    }

    public function booking(){
        $data = Pemesanan::with('wisata','user')->where('user_id', Auth()->user()->id)->where('payment_status', 'PAID')->get();


        return view('booking',[
            'data' => $data,
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
            return view('tiket', [
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
