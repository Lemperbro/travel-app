<?php

namespace App\Http\Controllers\wisata;

use App\Models\Faq;
use App\Models\Kota;
use App\Models\Testi;
use App\Models\Wisata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWisataRequest;
use App\Http\Requests\UpdateWisataRequest;


class WisataController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $wisata = Wisata::latest();
        if(request('search')){
            $wisata->where('nama_wisata', 'like', '%' . request('search') . '%')->where('status', true)
            ->orWhere('deskripsi', 'like', '%' . request('search') . '%')
            ->orWhere('long_tour', 'like', '%' . request('search') . '%')
            ->orWhere('tour_type', 'like', '%'. request('search'). '%');
            

        }

        return view('wisata.wisata', [
            'data' => $wisata->where('status', true)->paginate(9)
        ]);
    }


    public function perfect()
    {
        //
        $wisata = Wisata::latest();
        if(request('perfect_place')){
            $wisata->where('status', true)->orderBy('diboking', 'DESC');
            

        }

        return view('wisata.wisata', [
            'data' => $wisata->where('status', true)->paginate(25)
        ]);
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
     * @param  \App\Http\Requests\StoreWisataRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWisataRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function show(Wisata $id)
    {
        //
        $data = Wisata::where('kota_id', $id->id)->get();
        $wisata = $data->count();
        
        if($wisata > 0){
            $data = Wisata::where('kota_id', $id->id)->get();

        }else if($wisata < 1){
            $data = 'kosong';
            return $data;
        }

        
        
        return view('wisata.view',[
            "data" => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function edit(Wisata $wisata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWisataRequest  $request
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWisataRequest $request, Wisata $wisata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wisata $wisata)
    {
        //
    }

    public function showDestination(Request $request, $slug){
        $kota = Kota::where('slug', $slug)->first();


        if($kota === null){
            return redirect('/');

        }else{
            return view('wisata.destination',[
                'kota' =>  $kota,
                'wisata' => Wisata::where('kota_id', $kota->id)->get()
            ]);

        }


    }


    public function type(Request $request, $type){
        $wisata = Wisata::where('tour_type', $type);

        if(request('search')){
            $wisata->where('nama_wisata', 'like', '%' . request('search') . '%')
            ->where('status', true)->orWhere('deskripsi', 'like', '%' . request('search') . '%');
        }
        return view('wisata.type', [
            "data" => $wisata->where('status', true)->paginate(9),
            'type' => $type
        ]);
    }


    public function isi($slug){
        $wisata = Wisata::with('fasilitas','equipment', 'itenerary')->where('slug', $slug)->get();


        $faq = Faq::where('wisata', $slug)->get();
        $comment = Testi::with('user')->where('wisata_id', $slug)->paginate(6);
        if($wisata->count() > 0){

            $best = Wisata::where('kota_id', $wisata->first()->kota_id)->where('status', true)->paginate(10);

            return view('wisata.isi', [

                'data' => $wisata,
                'best' => $best,
                'comment' => $comment,
                'faq' => $faq
            ]);
        }else{
            return Redirect('/');
        }
    }
}
