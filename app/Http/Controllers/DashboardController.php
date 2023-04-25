<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Kota;
use App\Models\Review;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

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

        $wisata = Wisata::with('kota');
        $price = ['id','desc'];
        if(request('search')){
            $wisata->where('status', true)->where('nama_wisata', 'like', '%' . request('search') . '%')
            ->orWhere('deskripsi', 'like', '%' . request('search') . '%');
        }elseif(request('type') && request('price')){

            if(request('price') === 'termurah'){
                $price = ['harga','asc'];
            }elseif(request('price') === 'termahal'){
                $price = ['harga','desc'];
            }
            $wisata->where('status', true)->where('tour_type', 'like', '%' . request('type') . '%');
        }
        $article =  Article::paginate(8);
        return view('dashboard', [

            // 'best' => Wisata::orderBy('diboking', 'DESC')->limit(3)->get(),
            // 'best_kota' => Kota::orderBy('popularitas', 'DESC')->limit(3)->get(),
            'best' => Wisata::with(['kota' => function($query){
                $query->orderBy('popularitas', 'DESC')->limit(25)->get();
            }])->where('status', true)->orderBy('diboking', 'DESC')->paginate(3),
            'kota' => Kota::limit(4)->get(),
            'latest' => $wisata->where('status', true)->orderBy($price[0],$price[1])->get(),
            'article' => $article
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

        $testi = Review::where('user_id', Auth()->user()->id)->first();
        $validasi = $request->validate([
            'description' => 'required'
        ]);

        if($testi === null){

            Review::create([
                'user_id' => Auth()->user()->id,
                'description' => $request->description
            ]);
    
            return redirect('/testimoni');
        }else{

            return redirect('/');
            


        }

    }

    public function testi_store(){
        return view('/testimoni', [
            'data' => Review::with('user')->get()
        ]);
    }


      
      
}
