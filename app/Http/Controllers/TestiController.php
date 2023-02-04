<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestiRequest;
use App\Http\Requests\UpdateTestiRequest;
use App\Models\Testi;

class TestiController extends Controller
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
     * @param  \App\Http\Requests\StoreTestiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testi  $testi
     * @return \Illuminate\Http\Response
     */
    public function show(Testi $testi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testi  $testi
     * @return \Illuminate\Http\Response
     */
    public function edit(Testi $testi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTestiRequest  $request
     * @param  \App\Models\Testi  $testi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestiRequest $request, Testi $testi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testi  $testi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testi $testi)
    {
        //
    }
}
