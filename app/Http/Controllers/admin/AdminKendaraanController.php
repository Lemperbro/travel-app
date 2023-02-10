<?php

namespace App\Http\Controllers\admin;

use App\Models\Supir;
use Illuminate\Http\Request;
use App\Models\admin\AdminWisata;
use App\Models\Kendaraan;
use Illuminate\Routing\Controller;

class AdminKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.kendaraan.index',[
           'data' => Kendaraan::all(),
            'tittle' => 'Kelola Kendaraan'
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
            'merek' => 'required|max:255',
            'kapasitas' => 'required',
            'jumlah' => 'required',
        ]);

        Kendaraan::create($validasi);
        return redirect('/kendaraan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminWisata  $adminWisata
     * @return \Illuminate\Http\Response
     */
    public function show(AdminWisata $adminWisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminWisata  $adminWisata
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminWisata $adminWisata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminWisata  $adminWisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminWisata $adminWisata, $id)
    {
        //

        Kendaraan::find($id)->update([
            'merek' => $request['merek'],
            'kapasistas' => $request['kapasitas'],
            'jumlah' => $request['jumlah']
        ]);

        return redirect('/kendaraan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminWisata  $adminWisata
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Kendaraan::find($id)->delete();

        return redirect('/kendaraan');
    }
}
