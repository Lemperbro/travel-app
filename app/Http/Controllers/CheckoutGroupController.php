<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCheckoutGroupRequest;
use App\Http\Requests\UpdateCheckoutGroupRequest;
use App\Models\CheckoutGroup;

class CheckoutGroupController extends Controller
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
     * @param  \App\Http\Requests\StoreCheckoutGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCheckoutGroupRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CheckoutGroup  $checkoutGroup
     * @return \Illuminate\Http\Response
     */
    public function show(CheckoutGroup $checkoutGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CheckoutGroup  $checkoutGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(CheckoutGroup $checkoutGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCheckoutGroupRequest  $request
     * @param  \App\Models\CheckoutGroup  $checkoutGroup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCheckoutGroupRequest $request, CheckoutGroup $checkoutGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CheckoutGroup  $checkoutGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckoutGroup $checkoutGroup)
    {
        //
    }
}
