<?php

namespace App\Http\Controllers\admin;

use App\Models\Kota;
use App\Models\Jemput;
use App\Models\Wisata;
use Illuminate\Http\Request;
use App\Models\admin\AdminWisata;
use App\Models\Equipment;
use App\Models\Fasilitas;
use App\Models\Itenerary;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;

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
            'data' => Wisata::with('kota')->get(),
            
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
        
        // $jajal2 = str_replace('>', '',$request->itenerary);
        // $jajal = preg_split('/\n|\r\n?/',$jajal2);
        // dd($jajal);



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
            'deskripsi' => 'required',
            'inclusion' => 'required',
            'exclusions' => 'required',
            
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


            $jumlah = count($request->titik_jemput);
            for($i = 0 ; $i < $jumlah; $i++){
                Jemput::create([
                    'wisata_id' => $wisata->id,
                    'lokasi' => $request->titik_jemput[$i],
                    'harga' => $request->harga[$i]
                ]);
            }

            $inclusions = array();
            if($inclusion = $request->inclusion){
                foreach($inclusion as $inclusion){
                    $inclusions[] = $inclusion;
                }
            }
            
            $exclusions = array();
            if($inclusion = $request->exclusion){
                foreach($inclusion as $inclusion){
                    $exclusions[] = $inclusion;
                }
            }

            Fasilitas::create([
                'wisata_id' => $wisata->id,
                'inclusion' => implode("|", $inclusions),
                'exclusions' => implode("|", $exclusions)
            ]);


            $jumlah_agenda = count($request->agenda);
            for($i = 0 ; $i < $jumlah_agenda; $i++){
                Itenerary::create([
                    'wisata_id' => $wisata->id,
                    'agenda' => $request->agenda[$i],
                    'deskripsi' => $request->itenerary[$i]
                ]);
            }


            $images=array();
            if($files=$request->file('images')){
                foreach($files as $file){
                    $name=$file->getClientOriginalName();
                    $file->move('image',$name);
                    $images[]=$name;
                }
            }

            $jumlah_equipment = count($request->equipment);
            for($i = 0 ; $i < $jumlah_equipment; $i++){
                Equipment::create([
                    'wisata_id' => $wisata->id,
                    'image' => $images[$i],
                    'name' => $request->equipment[$i]
                ]);
            }
            





            // $jumlah_inclusion = count($request->inclusion);
            // for($i = 0 ; $i < $jumlah; $i++){
            //     Jemput::create([
            //         'wisata_id' => $wisata->id,
            //         'lokasi' => $request->titik_jemput[$i],
            //         'harga' => $request->harga[$i]
            //     ]);
            // }


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
        $request->session()->flash('success', 'Success Upload Data');

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
        // Itenerary::with('fasilitas','jemput')->where('wisata_id', $id)->delete();
        return redirect('/admin/wisata');
    }
}
