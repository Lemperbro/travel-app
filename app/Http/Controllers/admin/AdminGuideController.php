<?php

namespace App\Http\Controllers\admin;

use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Ramsey\Uuid\Guid\Guid;

class AdminGuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = Guide::latest()->where('status', 0);

        if(request('search')){
            $data->where('status', 0)->where('nama', 'like', '%'. request('search') .'%');
        }
        return view('admin.guide.index',[
           'data' => $data->get(),
           'tittle' => 'manage guide'
        ]);
    }

    public function onDuty(){
        $data = Guide::where('status', 1)->latest();

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
            'image' => 'required|max:2048',
            'no_tlpn' => 'required',
            'alamat' => 'required',
        ]);

        if($files=$request->file('image')){
            $extension=$files->getClientOriginalExtension();
            $name = hash('sha256',time()) . '.' . $extension;
            $files->move('image',$name);

        }

        Guide::create([
            'nama' => $validasi['nama'],
            'image' => $name,
            'no_tlpn' => $validasi['no_tlpn'],
            'alamat' => $validasi['alamat']
        ]);

        return redirect('/guide')->with('success', 'successful additional to the Guide');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function show(Guide $guide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function edit(Guide $guide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guide $guide, $id)
    {
        //
        $validasi = $request->validate([
            'nama' => 'required|max:255',
            'image' => 'max:2048',
            'no_tlpn' => 'required',
            'alamat' => 'required',
        ]);

        $img = Guide::where('id', $id)->pluck('image')->first();

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

        Guide::find($id)->update([
            'nama' => $request['nama'],
            'image' => $name,
            'no_tlpn' => $request['no_tlpn'],
            'alamat' => $request['alamat'],
            'umur' => $request['umur']
        ]);

        return redirect('/guide')->with('success', 'Update successful to the Guide');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guide $guide, $id)
    {
        //
        $data = Guide::where('id', $id)->pluck('image')->first();

        $delete = Guide::find($id)->delete();
        if($delete){
            $storage = public_path('image/'.$data);
            unlink($storage);
        }   

        return redirect('/guide')->with('success', 'Delete successful to the Guide');


    }
}
