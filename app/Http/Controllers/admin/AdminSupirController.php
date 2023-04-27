<?php

namespace App\Http\Controllers\admin;

use App\Models\Supir;
use Illuminate\Http\Request;
use App\Models\admin\AdminWisata;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class AdminSupirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = Supir::latest();

        if(request('search')){
            $data->where('nama', 'like', '%'. request('search') .'%');
        }
        return view('admin.supir.index',[
           'data' => $data->get(),
            'tittle' => 'Kelola Supir'
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
            'nama' => 'required|max:255',
            'image' => 'required',
            'no_tlpn' => 'required|min:11',
            'alamat' => 'required',
            'umur' => 'required',
        ]);

        if($files=$request->file('image')){
            $extension=$files->getClientOriginalExtension();
            $name = hash('sha256', time()) . '.' . $extension;
            $files->move('image',$name);
    }

        Supir::create([
            'nama' => $validasi['nama'],
            'image' => $name,
            'no_tlpn' => $validasi['no_tlpn'],
            'alamat' => $validasi['alamat'],
            'umur' => $validasi['umur']
        ]);

            return redirect('/supir')->with('success', 'successful additional to the Driver');
            

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
        return view('admin.wisata.add');
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

            'nama' => 'required|max:255',
            'image' => 'max:2048',
            'no_tlpn' => 'required',
            'alamat' => 'required',
            'umur' => 'required'
        ]);

        $img = Supir::where('id', $id)->pluck('image')->first();

        if($files=$request->file('image')){
            $extension=$files->getClientOriginalExtension();
            $name = hash('sha256',time()) . '.'  . $extension;
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


        Supir::find($id)->update([
            'nama' => $request['nama'],
            'image' => $name,
            'no_tlpn' => $request['no_tlpn'],
            'alamat' => $request['alamat'],
            'umur' => $request['umur']
        ]);


        return redirect('/supir')->with('success', 'update successful to the Driver');


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
        $data = Supir::where('id', $id)->pluck('image')->first();  
        
        $delete = Supir::find($id)->delete();
        if($delete){
            $storage = public_path('image/'.$data);
            unlink($storage);

        }   

        {
            return redirect('/supir')->with('success', 'delete successful to the Driver');
            


        }

        
        

    }
}
