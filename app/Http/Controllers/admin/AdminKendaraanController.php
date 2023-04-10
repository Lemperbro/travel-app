<?php

namespace App\Http\Controllers\admin;

use App\Models\Supir;
use Illuminate\Http\Request;
use App\Models\admin\AdminWisata;
use App\Models\Kendaraan;
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

        $data = Kendaraan::latest();

        if(request('search')){
            $data->where('merek', 'like', '%'. request('search').'%');
        }
        return view('admin.kendaraan.index',[
           'data' => $data->get(),
            'tittle' => 'Kelola Kendaraan'
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
            'jumlah' => 'required',
            'plat' => 'required',
            'image' => 'required'
        ]);

        if($files=$request->file('image')){
            $extension=$files->getClientOriginalExtension();
            $name = hash('sha256', time()) . '.' . $extension;
            $files->move('image',$name);
    }

        Kendaraan::create([
            'merek' => $validasi['merek'],
            'kapasitas' => $validasi['kapasitas'],
            'jumlah' => $validasi['jumlah'],
            'plat' => $validasi['plat'],
            'image' => $name

        ]);

        $request->session()->flash('success', 'Success Edit Data');

        return redirect('/kendaraan');

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
            'jumlah' => 'required',
            'plat' => 'required',
            'image' => 'max:2048'
        ]);
        $img = Kendaraan::where('id', $id)->pluck('image')->first();

        if($files=$request->file('image')){
            $extension=$files->getClientOriginalExtension();
            $name = hash('sha256', time()) . '.' . $extension;
            $up = $files->move('image',$name);

            if($up){
                $storage = public_path('image/'.$img);
                if(File::exists($storage)){
                    unlink($storage);
                }
            }
    }else{
        $name = $img;
    }

    

        Kendaraan::find($id)->update([
            'merek' => $request['merek'],
            'kapasistas' => $request['kapasitas'],
            'jumlah' => $request['jumlah'],
            'plat' => $request['plat'],
            'image' => $name
        ]);

        $request->session()->flash('success', 'Success Edit Data');


        return redirect('/kendaraan');

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
        $data = Kendaraan::where('id', $id)->pluck('image')->first();

        $delete = Kendaraan::find($id)->delete();
        if($delete){
            $storage = public_path('image/'.$data);
            unlink($storage);
        }
        return redirect('/kendaraan');
    }
}
