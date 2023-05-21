<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Terms;
use Illuminate\Http\Request;

class AdminTermsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.terms.index', [
            'data' => Terms::first(),
        ]);

    }

    public function index_client()
    {
        return view('terms', [
            'data' => Terms::first(),   
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
            'terms' => 'required'
        ]);


        $proses = Terms::create([
            'terms' => $request->terms,
        ]);

        if($proses){
            return redirect()->back()->with('success', 'successful additional to the About');
        }else{
            return redirect()->back()->with('warning', 'Failed additional to the About ');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Terms  $terms
     * @return \Illuminate\Http\Response
     */
    public function show(Terms $terms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Terms  $terms
     * @return \Illuminate\Http\Response
     */
    public function edit(Terms $terms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Terms  $terms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Terms $terms)
    {
        //


        $validasi = $request->validate([
            'terms' => 'required'
        ]);

        $proses = Terms::first()->update([
            'terms' => $validasi['isi'],
        ]);

        if($proses){
            return redirect()->back()->with('success', 'update successful to the About');
        }else{
            return redirect()->back()->with('warning', 'failed update to the About');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Terms  $terms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Terms $terms)
    {
        //
    }
}
