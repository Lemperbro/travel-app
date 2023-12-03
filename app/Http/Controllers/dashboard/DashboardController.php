<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Kota;
use App\Models\Guide;
use App\Models\Review;
use App\Models\Wisata;
use App\Models\Article;
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

        $wisata = Wisata::with('kota', 'event');
        $price = ['id', 'desc'];

        if (request('filter') == 'private trip' || request('filter') == 'open trip' || request('filter') == 'single trip') {
            $wisata->where('status', true)->where('tour_type', request('filter'));
        } elseif (request('filter') == 'termurah' || request('filter') == 'mahal') {
            if (request('filter') == 'termurah') {
                $price = ['harga', 'asc'];
            } elseif (request('filter') == 'mahal') {
                $price = ['harga', 'desc'];
            }
        }


        $article =  Article::paginate(8);

        $guide = Guide::latest()->get();

        $carouselFile = public_path('carousel/carousel.json');
        $carousel = json_decode(file_get_contents($carouselFile), true);
        return view('Dashboard.dashboard', [

            // 'best' => Wisata::orderBy('diboking', 'DESC')->limit(3)->get(),
            // 'best_kota' => Kota::orderBy('popularitas', 'DESC')->limit(3)->get(),
            'best' => Wisata::with('kota')->where('status', true)->orderBy('diboking', 'DESC')->paginate(4),
            'kota' => Kota::get(),
            'latest' => $wisata->where('status', true)->orderBy($price[0], $price[1])->get(),
            'article' => $article,
            'guide' => $guide,
            'carousel' => $carousel
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

    public function review(Request $request)
    {

        $testi = Review::where('user_id', Auth()->user()->id)->first();
        $validasi = $request->validate([
            'description' => 'required'
        ]);

        if ($testi === null) {

            Review::create([
                'user_id' => Auth()->user()->id,
                'description' => $request->description
            ]);

            return redirect('/testimoni')->with('toast_success', 'Successfuly Add Testimonial');
        } else {

            return redirect()->back()->with('toast_error', 'You Have Already Made a Testimony');
        }
    }

    public function testi_store()
    {
        $user_id = Auth()->user()->id;
        return view('/testimoni', [
            'data' => Review::with('user')->orderByRaw("user_id = {$user_id} desc")->get()
        ]);
    }
}
