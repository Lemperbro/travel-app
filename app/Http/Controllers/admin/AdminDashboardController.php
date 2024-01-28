<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Kota;
use App\Models\User;
use App\Models\Wisata;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\admin\AdminDashboard;

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

        $data = Pemesanan::latest();
        $year = Carbon::now()->format('Y'); // Tahun yang ingin Anda hitung
        $pemesananPerBulan = Pemesanan::select(DB::raw('MONTH(departure) as bulan'), DB::raw('COUNT(*) as jumlah_pemesanan'))
        ->whereYear('departure', $year)
        ->groupBy(DB::raw('MONTH(departure)'))
        ->get();

        $labels = ['January', 'February','March','April','May','June','July','August','September','October','November','December'];
        $data = [0,0,0,0,0,0,0,0,0,0,0,0];
    
        foreach ($pemesananPerBulan as $pemesanan) {
            $bulan = date('F', mktime(0, 0, 0, $pemesanan->bulan, 1)); // Mengubah nomor bulan menjadi nama bulan
            $index = $pemesanan->bulan - 1;
            $jumlahPemesanan = $pemesanan->jumlah_pemesanan;
    
            $labels[$index] = $bulan;
            $data[$index] = $jumlahPemesanan;
        }
        

        return view('admin.dashboard.index',[
            'tittle' => 'Dashboard',
            'wisata' => Wisata::count(),
            'terlaris' => Wisata::where('status', true)->orderBy('diboking', 'DESC')->first(),
            'kota' => Kota::count(),
            'user' => User::where('posisi', 0)->count(),
            'latest_booking' => Pemesanan::with('user', 'wisata')->limit(10)->get(),
            'labels' => $labels,
            'dataChart' => $data,
            'year' => $year,
            'date' => Carbon::now()->format('Y_m_d')
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
