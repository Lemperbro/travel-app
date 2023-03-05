<?php

namespace App\Http\Controllers\admin;

use App\Models\Kota;
use App\Models\Wisata;
use Illuminate\Http\Request;
use App\Models\admin\AdminKota;
use App\Models\Jemput;
use Illuminate\Routing\Controller;

class AdminKotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $kota = Kota::get();
        // $id = [];
        // foreach($kota as $data_id){
        //     $id = $kota->id;
        // }
        
        return view('admin.kota.index',[
            'data' => Kota::with('wisata')->get(),
            'tittle' => 'Kelola Kota'
            // 'best' => Kota::with('wisata')->join('wisatas', 'wisatas.kota_id', '=', 'kotas.id')->orderBy('wisatas.diboking', 'DESC')->get(),
            // 'best' => Wisata::where('kota_id')->orderBy('diboking', 'DESC')->limit(1)->get()
            // 'best' => Wisata::where('kota_id', )
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validasi = $request->validate([
            'image' => 'required|max:2048',
            'nama' => 'required',
            'harga' => 'required'
        ]);
        $image=array();
        if($files=$request->file('image')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('image',$name);
                $image[]=$name;
            }
        }
        /*Insert your data*/
    
        Kota::create( [
            'image'=>  implode("|",$image),
            'nama_kota' => $validasi['nama'],
            'harga' => $validasi['harga']
            //you can put other insertion here
        ]);
    
    
        return redirect('/admin/kota');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminKota  $adminKota
     * @return \Illuminate\Http\Response
     */
    public function show(AdminKota $adminKota)
    {
        //
        return view('admin.kota.add',[
            'tittle' => 'Kelola Kota'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminKota  $adminKota
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminKota $adminKota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminKota  $adminKota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $gambar = Kota::findOrFail($id);     
        $input=$request->all();

        $image=array();

        if($files=$request->file('image')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('image',$name);
                $image[]=$name;
            }
        }else{
            $image[] = $gambar->image;
        }
       
    
        Kota::find($id)->update( [
            'image'=>  implode("|",$image),
            'nama_kota' => $input['nama'],
            'harga' => $input['harga']
            //you can put other insertion here
        ]);
    
    
        return redirect('/admin/kota');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminKota  $adminKota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Kota::find($id)->delete();

        return redirect('/admin/kota');
    }

    public function titik_jemput($id){

        return view('admin.kota.addJemput', [
            'tittle' => 'Kelola Kota',
            'data' => Jemput::where('kota_id', $id)->get(),
            'kota' => Kota::where('id', $id)->pluck('nama_kota')->first(),
            'id_kota' => $id
        ]);
    }

    public function addPickup(Request $request, $id){
        $validasi = $request->validate([
            'location' => 'required',
            'price' => 'required'

        ]);


        Jemput::create([
            'kota_id' => $id,
            'lokasi' => $validasi['location'],
            'harga' => $validasi['price']
        ]);

        return redirect('/kota/kelola/'.$id);
    }

    public function editPickup(Request $request, $id){
        $validasi = $request->validate([
            'location' => 'required',
            'price' => 'required'

        ]);

        Jemput::where('id', $id)->update([
            'lokasi' => $validasi['location'],
            'harga' => $validasi['price']
        ]);

        $kota_id = Jemput::find($id)->pluck('kota_id')->first();

        return redirect('/kota/kelola/'.$kota_id);

    }

    public function deletePickup($id){
        $kota_id = Jemput::find($id)->pluck('kota_id')->first();
        Jemput::find($id)->delete();

        return redirect('/kota/kelola/'.$kota_id);
    }
}
