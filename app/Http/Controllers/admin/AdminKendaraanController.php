<?php

namespace App\Http\Controllers\admin;

use App\Models\Supir;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use App\Models\admin\AdminWisata;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class AdminKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = Kendaraan::latest()->where('status', 0);

        if(request('search')){
            $data->where('status', 0)->where('merek', 'like', '%'. request('search').'%');
        }
        return view('admin.kendaraan.index',[
           'data' => $data->get(),
        ]);
    }

    public function onDuty(){
        $data = Kendaraan::where('status', 1)->latest();

        if(request('search')){
            $data->where('status', 1)->where('merek', 'like', '%'. request('search').'%');
        }
        return view('admin.kendaraan.onDuty',[
           'data' => $data->paginate(15),
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
            'merek' => 'required|max:255',
            'kapasitas' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'plat' => 'required',
            'image' => 'required'
            
        ]);
        if($files=$request->file('image')){
            $extension=$files->getClientOriginalExtension();
            $img = hash('sha256', time()) .'.' . $extension;
            $files->move('vehicle',$img);

        }

        Kendaraan::create([
            'merek' => $request->merek,
            'kapasitas' => $request->kapasitas,
            'jumlah' => $request->jumlah,
            'plat' => $request->plat,
            'harga' => $request->harga,
            'image' => $img
        ]);
        return redirect('/kendaraan')->with('success', 'successful additional to the Vehicle');

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
    public function update(Request $request, AdminWisata $adminWisata, $id)
    {
        //


        $validasi = $request->validate([
            'merek' => 'required|max:255',
            'kapasitas' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'plat' => 'required'
            
        ]);


        $old = Kendaraan::where('id', $id)->pluck('image')->first();

        if($files=$request->file('image')){
            $extension=$files->getClientOriginalExtension();
            $img = hash('sha256', time()) .'.' . $extension;
            $up = $files->move('vehicle',$img);
            if($up){
                $storage = public_path('vehicle/'.$old);
                if(File::exists($storage)){
                    unlink($storage);
                }
            }

        }else{
            $img = $old;
        }

        Kendaraan::where('id', $id)->update([
            'merek' => $request->merek,
            'kapasitas' => $request->kapasitas,
            'jumlah' => $request->jumlah,
            'plat' => $request->plat,
            'harga' => $request->harga,
            'image' => $img
        ]);

        return redirect('/kendaraan')->with('success', 'update successful to the Vehicle');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminWisata  $adminWisata
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Kendaraan::find($id)->delete();

        return redirect('/kendaraan')->with('success', 'delete successful to the Vehicle');
    }
}
