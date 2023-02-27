<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Wisata;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

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
    public function store(Request $request)
    {
        //

        $secret_key = 'Basic '.config('xendit.key_auth');
        $external_id = Str::random(10);
        $data_request = Http::withHeaders([
            'Authorization' => $secret_key
        ])->post('https://api.xendit.co/v2/invoices', [
            'external_id' => $external_id,
            'amount' => request('amount')
        ]);
        $response = $data_request->object();

        
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
        
        dd($coba[1]);

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
