<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
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
        $session = Session::where('wisata_id', $wisata->id)->where('type', 'session')->get();
        return view('admin.wisata.session.index', [
            'data' => $session,
            'slug' => $slug,
            'wisata' => $wisata,
            'weekend' => Session::where('wisata_id', $wisata->id)->where('type', 'weekend')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug,$type)
    {
        //  
        if($type !== 'session' && $type !== 'weekend'){
            return redirect()->back()->with('toast_error', 'error');
        }

        return view('admin.wisata.session.add',[
            'slug' => $slug,
            'type' => $type
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSessionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$slug,$type)
    {
        //
        $wisata = Wisata::where('slug', $slug)->first();
    if($type == 'session'){
            $validasi = $request->validate([
            'startDate' => 'required',
            'price' => 'required'
        ]);

        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $valStartDate = Session::where('wisata_id', $wisata->id)->where('startDate', '<=',$request->startDate)->where('endDate', '>=',$request->startDate)->get();
        $valEndDate = Session::where('wisata_id', $wisata->id)->where('startDate', '<=',$request->endDate)->where('endDate', '>=',$request->endDate)->get();
        if($valStartDate->count() > 0 || $valEndDate->count() > 0){
            return redirect()->back()->with('toast_error', 'Date have been ready !');
        }


    }else if($type == 'weekend'){
        $validasi = $request->validate([
            'price' => 'required'
        ]);

        $hitung = Session::where('wisata_id',$wisata->id)->where('type', $type)->get();
        if($hitung->count() == 1){
            return redirect()->back()->with('toast_error', 'price weekend already');
        }
        $startDate = null;
        $endDate = null;
    }else{
        return redirect()->back()->with('toast_error', 'error');
    }



        $proses =  Session::create([
            'wisata_id' => $wisata->id,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'price' => $request->price,
            'price_child' => $request->price_child,
            'type' => $type
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
    public function edit(Session $session,$slug,$type)
    {
        //
        if($type !== 'session' && $type !== 'weekend'){
            return redirect()->back()->with('toast_error', 'error');
        }
        $wisata = Wisata::where('slug',$slug)->pluck('id')->first();
        $data = Session::where('wisata_id', $wisata)->where('type',$type)->first();

        return view('admin.wisata.session.edit',[
            'slug' => $slug,
            'type' => $type,
            'data' => $data
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSessionRequest  $request
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session,$slug,$type,$id)
    {
        //
        $wisata = Wisata::where('slug', $slug)->first();
        if($type == 'session'){
                $validasi = $request->validate([
                'startDate' => 'required',
                'price' => 'required'
            ]);
    
            $startDate = $request->startDate;
            $endDate = $request->endDate;
    
            $valStartDate = Session::where('wisata_id', $wisata->id)->where('startDate', '<=',$request->startDate)->where('endDate', '>=',$request->startDate)->whereNotIn('id',[$id])->get();
            $valEndDate = Session::where('wisata_id', $wisata->id)->where('startDate', '<=',$request->endDate)->where('endDate', '>=',$request->endDate)->whereNotIn('id',[$id])->get();
            if($valStartDate->count() > 0 || $valEndDate->count() > 0){
                return redirect()->back()->with('toast_error', 'Date have been ready !');
            }
    
    
        }else if($type == 'weekend'){
            $validasi = $request->validate([
                'price' => 'required'
            ]);
    

            $startDate = null;
            $endDate = null;
        }else{
            return redirect()->back()->with('toast_error', 'error');
        }

        $proses =  Session::where('wisata_id', $wisata->id)->where('type', $type)->update([
            'wisata_id' => $wisata->id,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'price' => $request->price,
            'price_child' => $request->price_child,
            'type' => $type
        ]);

        if($proses){
            return redirect('/admin/wisata/'.$slug.'/session')->with('toast_success', 'Successful add Height Session');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$type)
    {
        //
        if($type !== 'session' && $type !== 'weekend'){
            return redirect()->back()->with('toast_error', 'error');
        }
        Session::where('id',$id)->where('type', $type)->delete();

        return redirect()->back()->with('toast_success', 'Success Delete this Session');
    }
}
