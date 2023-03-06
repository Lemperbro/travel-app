<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Wisata;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Http;
use PDF;

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
        $count = $wisata->harga + $kota->harga;

        $secret_key = 'Basic '.config('xendit.key_auth');
        $external_id = Str::random(10);

        $data_request = Http::withHeaders([
            'Authorization' => $secret_key
        ])->post('https://api.xendit.co/v2/invoices', [
            'external_id' => $external_id,
            'amount' => $count
        ]);
        $response = $data_request->object();


        Pemesanan::create([
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
            'payment_link' => $response->invoice_url
        ]);

        return redirect('/tagihan');

    }

    public function callback(){
        $data = request()->all();
        $status = $data['status'];
        $external_id = $data['external_id'];
        Pemesanan::where('doc_no', $external_id)->first()->update([
            'payment_status' => $status
        ]);
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
            'data' => Pemesanan::with('wisata','user')->where('user_id', Auth()->user()->id)->where('payment_status', 'PENDING')->get(),
        ]);
    }

    public function booking(){


        return view('booking',[
            'data' => Pemesanan::with('wisata','user')->where('user_id', Auth()->user()->id)->where('payment_status', 'PAID')->get(),
        ]);
    }

    public function ticket($doc_no){

        $data = Pemesanan::where('doc_no', $doc_no)->first();

        $pdf = PDF::loadview('tiket', [
            'data' => $data
        ]);
        $pdf->set_paper([0,0,300,500], 'landscape');

        $pdf->set_option('margin-top', '0mm');
        $pdf->set_option('margin-right', '0mm');
        $pdf->set_option('margin-bottom', '0mm');
        $pdf->set_option('margin-left', '0mm');

        //500 tinggi , 1000 lebar
       return $pdf->download('coba.pdf');

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
