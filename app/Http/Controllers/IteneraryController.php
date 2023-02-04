<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIteneraryRequest;
use App\Http\Requests\UpdateIteneraryRequest;
use App\Models\Itenerary;

class IteneraryController extends Controller
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
     * @param  \App\Http\Requests\StoreIteneraryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIteneraryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Itenerary  $itenerary
     * @return \Illuminate\Http\Response
     */
    public function show(Itenerary $itenerary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Itenerary  $itenerary
     * @return \Illuminate\Http\Response
     */
    public function edit(Itenerary $itenerary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIteneraryRequest  $request
     * @param  \App\Models\Itenerary  $itenerary
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIteneraryRequest $request, Itenerary $itenerary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Itenerary  $itenerary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Itenerary $itenerary)
    {
        //
    }
}
