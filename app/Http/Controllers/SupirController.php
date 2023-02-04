<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupirRequest;
use App\Http\Requests\UpdateSupirRequest;
use App\Models\Supir;

class SupirController extends Controller
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
     * @param  \App\Http\Requests\StoreSupirRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupirRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supir  $supir
     * @return \Illuminate\Http\Response
     */
    public function show(Supir $supir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supir  $supir
     * @return \Illuminate\Http\Response
     */
    public function edit(Supir $supir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSupirRequest  $request
     * @param  \App\Models\Supir  $supir
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupirRequest $request, Supir $supir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supir  $supir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supir $supir)
    {
        //
    }
}
