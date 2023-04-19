<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Testi;
use App\Models\Wisata;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class IsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        // $cobaa = Wisata::with(['fasilitas','equipment', 'itenerary', 'jemput' => function($query) use ($id){
        //     $query->where('wisata_id' , $id)->get();
        // }])->where('id', $id)->get();

            // $wisata = Wisata::where('slug', $slug)->first();
            
            // $id = $wisata->id;
            $wisata = Wisata::with('fasilitas','equipment', 'itenerary')->where('slug', $slug)->get();


            $faq = Faq::where('wisata', $slug)->get();
            $comment = Testi::with('user')->where('wisata_id', $slug)->paginate(6);
            if($wisata->count() > 0){

                $best = Wisata::where('kota_id', $wisata->first()->kota_id)->where('status', true)->paginate(10);

                return view('isi', [

                    'data' => $wisata,
                    'best' => $best,
                    'comment' => $comment,
                    'faq' => $faq
                ]);
            }else{
                return Redirect('/');
            }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
