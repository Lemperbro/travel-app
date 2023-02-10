<?php

namespace App\Http\Controllers\admin;

use App\Models\Supir;
use Illuminate\Http\Request;
use App\Models\admin\AdminWisata;
use Illuminate\Routing\Controller;

class AdminSupirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.supir.index',[
           'data' => Supir::all(),
            'tittle' => 'Kelola Supir'
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
            'nama' => 'required|max:255',
            'no_tlpn' => 'required|min:11',
            'alamat' => 'required',
            'umur' => 'required',
        ]);

        Supir::create($validasi);
        return redirect('/supir');

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
        return view('admin.wisata.add');
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

        Supir::find($id)->update([
            'nama' => $request['nama'],
            'no_tlpn' => $request['no_tlpn'],
            'alamat' => $request['alamat'],
            'umur' => $request['umur']
        ]);

        return redirect('/supir');

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

        Supir::find($id)->delete();

        return redirect('/supir');
    }
}
