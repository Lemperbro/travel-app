<?php

namespace App\Http\Controllers\admin;

use App\Models\Team;
use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;


class AdminAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.about.index', [
            'data' => About::first(),
        ]);
    }


    public function index_client()
    {
        //

        return view('about', [
            'data' => About::first(),
            'team' => Team::get()
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
     * @param  \App\Http\Requests\StoreAboutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        if($files=$request->file('image')){
            $extension=$files->getClientOriginalExtension();
            $name = hash('sha256',time()) . '.' . $extension;
            $files->move('about',$name);

        }

        About::create([
            'isi' => $request->isi,
            'image' => $name
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAboutRequest  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        //

        $validasi = $request->validate([
            'image' => 'max:2048',
            'isi' => 'required'
        ]);

        $img = About::pluck('image')->first();

        if($files=$request->file('image')){
            $extension=$files->getClientOriginalExtension();
            $name = hash('sha256',time()) . '.' . $extension;
            $up = $files->move('about',$name);

            if($up){
                $storage = public_path('about/'.$img);
                if(File::exists($storage)){
                    unlink($storage);
                }
            }

        }else {
            $name = $img;
        }

        $proses = About::first()->update([
            'isi' => $validasi['isi'],
            'image' => $name
        ]);

        if($proses){
            return redirect()->back()->with('success', 'About Berhasil Di update');
        }else{
            return redirect()->back()->with('warning', 'About Gagal Untuk Di Update');
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
