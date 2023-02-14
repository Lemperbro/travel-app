<?php

namespace App\Http\Controllers\admin;

use App\Models\Kota;
use App\Models\Jemput;
use App\Models\Wisata;
use Illuminate\Http\Request;
use App\Models\admin\AdminWisata;
use Illuminate\Routing\Controller;

class AdminWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.wisata.index',[
            'tittle' => 'Kelola Wisata',
            'data' => Wisata::with('kota')->get()
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
        return view('admin.wisata.add',[
            'tittle' => 'Kelola Wisata',
            'kota' => Kota::all() 
        ]);

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
        $validasi = $request->validate([
            'image' => 'required',
            'nama' => 'required',
            'departure' => 'required',
            'long_tour' => 'required',
            'type' => 'required',
            'kota' => 'required',
            'location' => 'required',
            'titik_jemput' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required'
        ]);       

        
        $image=array();
        if($files=$request->file('image')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('image',$name);
                $image[]=$name;
            }
        }



        $wisata = Wisata::create([
            'image'=>  implode("|",$image),
            'nama_wisata' => $validasi['nama'],
            'tanggal' => $validasi['departure'],
            'long_tour' => $validasi['long_tour'],
            'tour_type' => $validasi['type'],
            'kota_id' => $validasi['kota'],
            'location' => $validasi['location'],
            'deskripsi' => $validasi['deskripsi'],
        ]);

        // Jemput::create([
        //     'wisata_id' => $wisata->id,
        //     'lokasi' => $validasi['titik_jemput'],
        //     'harga' => $validasi['harga']
        // ]);
            $coba=([
                "titik_jemput" => $validasi['titik_jemput'],
                "harga" => $validasi['harga']
            ]);

            $jumlah = count($request->titik_jemput);
            for($i = 0 ; $i < $jumlah; $i++){
                Jemput::create([
                    'wisata_id' => $wisata->id,
                    'lokasi' => $request->titik_jemput[$i],
                    'harga' => $request->harga[$i]
                ]);
            }


        // foreach($coba as $row){
        //     foreach($row as $jemput){

        //         dd($coba);
        //         Jemput::create([
        //         'wisata_id' => $wisata->id,
        //         'lokasi' => $jemput['titik_jemput'],
        //         'harga' => $jemput['harga']
        //     ]);
        // }
            
        // }

        return redirect('/admin/kota');


    }

    public function addJemput(Request $request, $id){

        $validasi = $request->validate([
            'titik_jemput' => 'required',
            'harga' => 'required'
        ]);
        Jemput::find($id)->create([
            'wisata_id' => $id,
            'lokasi' => $validasi['titik_jemput'],
            'harga' => $validasi['harga']
        ]);
        return redirect('/admin/wisata');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminWisata  $adminWisata
     * @return \Illuminate\Http\Response
     */
    public function show(AdminWisata $adminWisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminWisata  $adminWisata
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminWisata $adminWisata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminWisata  $adminWisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminWisata $adminWisata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminWisata  $adminWisata
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminWisata $adminWisata, $id)
    {
        //
        Wisata::find($id)->delete();
        return redirect('/admin/wisata');
    }
}
