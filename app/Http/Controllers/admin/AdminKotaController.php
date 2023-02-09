<?php

namespace App\Http\Controllers\admin;

use App\Models\Kota;
use App\Models\Wisata;
use Illuminate\Http\Request;
use App\Models\admin\AdminKota;
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
        $input=$request->all();
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
            'nama_kota' => $input['nama'],
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
        return view('admin.kota.add');
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
        /*Insert your data*/
    
        Kota::find($id)->update( [
            'image'=>  implode("|",$image),
            'nama_kota' => $input['nama'],
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
    public function destroy(AdminKota $adminKota)
    {
        //
    }
}
