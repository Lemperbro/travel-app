<?php

namespace App\Http\Controllers\admin;

use App\Models\Wisata;
use App\Models\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSessionRequest;
use App\Http\Requests\UpdateSessionRequest;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        //
        $wisata = Wisata::where('slug', $slug)->first();
        $session = Session::where('wisata_id', $wisata->id)->get();
        return view('admin.wisata.session.index', [
            'data' => $session,
            'slug' => $slug
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        //

        return view('admin.wisata.session.add',[
            'slug' => $slug
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSessionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$slug)
    {
        //
        $validasi = $request->validate([
            'startDate' => 'required|unique:sessions,startDate,',
            'endDate' => 'unique:sessions,endDate,',
            'price' => 'required'
        ]);

        $wisata = Wisata::where('slug', $slug)->first();
        $valStartDate = Session::where('wisata_id', $wisata->id)->where('startDate', '<=',$request->startDate)->where('endDate', '>=',$request->startDate)->get();
        $valEndDate = Session::where('wisata_id', $wisata->id)->where('startDate', '<=',$request->endDate)->where('endDate', '>=',$request->endDate)->get();
        if($valStartDate->count() > 0 || $valEndDate->count() > 0){
            return redirect()->back()->with('toast_error', 'Date have been ready !');
        }

        $proses =  Session::create([
            'wisata_id' => $wisata->id,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'price' => $request->price,
            'price_child' => $request->price_child
        ]);

        if($proses){
            return redirect('/admin/wisata/'.$slug.'/session')->with('toast_success', 'Successful add Height Session');
        }
    }

    public function delete_all($slug){
        $wisata = Wisata::where('slug', $slug)->first();

        Session::where('wisata_id',$wisata->id)->delete();

        return redirect()->back()->with('toast_success', 'Success Delete Session');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSessionRequest  $request
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSessionRequest $request, Session $session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Session::where('id',$id)->delete();

        return redirect()->back()->with('toast_success', 'Success Delete this Session');
    }
}
