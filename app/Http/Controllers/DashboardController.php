<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Review;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        // dd(request('search'));

        $wisata = Wisata::latest();

        if(request('search')){
            $wisata->where('nama_wisata', 'like', '%' . request('search') . '%')
            ->orWhere('deskripsi', 'like', '%' . request('search') . '%');
        }

        return view('dashboard', [

            // 'best' => Wisata::orderBy('diboking', 'DESC')->limit(3)->get(),
            // 'best_kota' => Kota::orderBy('popularitas', 'DESC')->limit(3)->get(),
            'best' => Wisata::with(['kota' => function($query){
                $query->orderBy('popularitas', 'DESC')->limit(20)->get();
            }])->orderBy('diboking', 'DESC')->paginate(3),
            'kota' => Kota::limit(4)->get(),
            'latest' => $wisata->get()
        
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function review(Request $request){

        Review::create([
            'user_id' => Auth()->user()->id,
            'description' => $request->description
        ]);

        return redirect('/testimoni');
    }

    public function testi_store(){
        return view('/testimoni', [
            'data' => Review::with('user')->get()
        ]);
    }


      
      
}
