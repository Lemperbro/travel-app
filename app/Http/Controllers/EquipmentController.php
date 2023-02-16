<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreequipmentRequest;
use App\Http\Requests\UpdateequipmentRequest;
use App\Models\equipment;

class EquipmentController extends Controller
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
     * @param  \App\Http\Requests\StoreequipmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreequipmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(equipment $equipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(equipment $equipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateequipmentRequest  $request
     * @param  \App\Models\equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateequipmentRequest $request, equipment $equipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(equipment $equipment)
    {
        //
    }
}
