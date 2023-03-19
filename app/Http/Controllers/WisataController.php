<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Wisata;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWisataRequest;
use App\Http\Requests\UpdateWisataRequest;
use Illuminate\Http\Request;


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
            $wisata->where('nama_wisata', 'like', '%' . request('search') . '%')
            ->orWhere('deskripsi', 'like', '%' . request('search') . '%')
            ->orWhere('long_tour', 'like', '%' . request('search') . '%')
            ->orWhere('tour_type', 'like', '%'. request('search'). '%');
            

        }

        return view('wisata', [
            'data' => $wisata->paginate(9)
        ]);
    }


    public function perfect()
    {
        //
        $wisata = Wisata::latest();
        if(request('perfect_place')){
            $wisata->orderBy('diboking', 'DESC');
            

        }

        return view('wisata', [
            'data' => $wisata->paginate(25)
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

        
        
        return view('view',[
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
            return view('destination',[
                'kota' =>  $kota,
                'wisata' => Wisata::where('kota_id', $kota->id)->get()
            ]);

        }


    }


    public function type(Request $request, $type){
        $wisata = Wisata::where('tour_type', $type);

        if(request('search')){
            $wisata->where('nama_wisata', 'like', '%' . request('search') . '%')
            ->orWhere('deskripsi', 'like', '%' . request('search') . '%');
        }
        return view('type', [
            "data" => $wisata->paginate(9),
            'type' => $type
        ]);
    }
}
