<?php

namespace App\Http\Controllers\admin;

use App\Models\Kota;
use App\Models\Jemput;
use App\Models\Wisata;
use Illuminate\Http\Request;
use App\Models\admin\AdminKota;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;


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

        $data = Kota::with('wisata')->latest();

        if(request('search')){
            $data->where('nama_kota', 'like', '%'.request('search').'%')->orWhere('harga','like','%'.request('search').'%');
        }
        
        return view('admin.kota.index',[
            'data' => $data->paginate(16),
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
                $extension=$file->getClientOriginalName();
                $name = hash('sha256', time()) . '.' . $extension;

                $file->move('image',$name);
                $image[]=$name;
            }
        }
        /*Insert your data*/
    
       $proses = Kota::create( [
            'image'=>  implode("|",$image),
            'nama_kota' => $validasi['nama'],
            'harga' => $validasi['harga']
            //you can put other insertion here
        ]);

        if($proses){
            return redirect('/admin/kota')->with('success', 'berhasil menambah kota');

        }else{
            return redirect('/admin/kota')->with('warning', 'gagal menambah kota');

        }
    
    
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
        $validasi = $request->validate([
            'image' => 'max:2048',
            'nama' => 'required',
            'harga' => 'required'
        ]);     

        $image=array();
        $img = Kota::where('id', $id)->pluck('image')->first();

        if($files=$request->file('image')){
            foreach($files as $file){
                $extension=$file->getClientOriginalName();
                $name = hash('sha256', time()) . '-' . $extension;

                $up = $file->move('image',$name);
                $image[]=$name;
            }

            if($up){
                $data_img = explode('|', $img);

                foreach($data_img as $imgs){
                    $storage = public_path('image/'.$imgs);

                    if(File::exists($storage)){
                        unlink($storage);
                    }
                }
            }
        }else{
            $image[] = $img;
        }
       
    
        Kota::find($id)->update( [
            'image'=>  implode("|",$image),
            'nama_kota' => $validasi['nama'],
            'harga' => $validasi['harga']
        ]);

        return redirect('/admin/kota')->with('success', 'Update Succes');

    
    
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
        $img = Kota::where('id', $id)->pluck('image')->first();

        $proses = Kota::find($id)->delete();

        if($proses){
            $storage = public_path('image/'.$img);

            if(File::exists($storage)){
                unlink($storage);
            }

        return redirect('/admin/kota')->with('success', 'Delete Succes');

        }

    }

    public function titik_jemput($id){

        return view('admin.kota.addJemput', [
            'tittle' => 'Kelola Kota',
            'data' => Jemput::where('kota_id', $id)->get(),
            'kota' => Kota::where('id', $id)->pluck('nama_kota')->first(),
            'id_kota' => $id
        ]);
    }


}
