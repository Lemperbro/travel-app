<?php

namespace App\Http\Controllers\admin;

use App\Models\Kota;
use App\Models\User;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\admin\AdminDashboard;
use App\Models\Pemesanan;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        return view('admin.index',[
            'tittle' => 'Dashboard',
            'wisata' => Wisata::count(),
            'terlaris' => Wisata::where('status', true)->orderBy('diboking', 'DESC')->first(),
            'kota' => Kota::count(),
            'user' => User::where('posisi', 0)->count(),
            'latest_booking' => Pemesanan::with('user', 'wisata')->limit(10)->get(),
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
     * @param  \App\Models\AdminDashboard  $adminDashboard
     * @return \Illuminate\Http\Response
     */
    public function show(AdminDashboard $adminDashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminDashboard  $adminDashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminDashboard $adminDashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminDashboard  $adminDashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminDashboard $adminDashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminDashboard  $adminDashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminDashboard $adminDashboard)
    {
        //
    }
}
