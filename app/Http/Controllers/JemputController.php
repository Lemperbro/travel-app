<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJemputRequest;
use App\Http\Requests\UpdateJemputRequest;
use App\Models\Jemput;

class JemputController extends Controller
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
     * @param  \App\Http\Requests\StoreJemputRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJemputRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jemput  $jemput
     * @return \Illuminate\Http\Response
     */
    public function show(Jemput $jemput)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jemput  $jemput
     * @return \Illuminate\Http\Response
     */
    public function edit(Jemput $jemput)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJemputRequest  $request
     * @param  \App\Models\Jemput  $jemput
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJemputRequest $request, Jemput $jemput)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jemput  $jemput
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jemput $jemput)
    {
        //
    }
}
