<?php

namespace App\Http\Controllers\admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        return view('admin.wisata.event.event', [
            'id' => $id,
            'datas' => Event::where('wisata_id', $id)->get(),
            'min_harga' => Event::where('wisata_id', $id)->where('tipe', 'min_harga')->first(),
            'min_jumlah' => Event::where('wisata_id', $id)->where('tipe', 'min_jumlah')->first(),
            'aktif' => Event::where('wisata_id', $id)->where('tipe', 'aktif')->first(),
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

    public function active(){

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $tipe)
    {
        //

        if($tipe !== 'min_jumlah' && $tipe !== 'min_harga' && $tipe !== 'aktif'){
            return redirect()->back()->with('toast_warning', $tipe.' not found');
        }
        return view('admin.wisata.event.edit', [
            'id' => $id,
            'tipe' => $tipe,
            'data' => Event::where('wisata_id', $id)->where('tipe', $tipe)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $tipe)
    {
        //
        $min_harga = null;
        $min_jumlah = null; 

        if($request->min_harga !== null){
            $min_harga = $request->min_harga;
        }elseif($request->min_jumlah !== null){
            $min_jumlah = $request->min_jumlah;
        }

        $validasi = $request->validate([
            'judul' => 'required',
            'potongan' => 'required'
        ]);
          
        $event = Event::where('wisata_id',$id)->where('tipe', $tipe)->get();
        $potongan = str_replace('%', '',$request->potongan);

        if($event->count() == null){
            $proses = Event::create([
                'judul' => $request->judul,
                'wisata_id' => $id,
                'tipe' => $tipe,
                'min_harga' => $min_harga,
                'min_jumlah' => $min_jumlah,
                'potongan' => $potongan
            ]);

            if($proses){
                return redirect('/event/'.$id)->with('toast_success', 'successfuly action');
            }
        }elseif($event->count() !== null){
            $event_id = Event::where('wisata_id',$id)->where('tipe', $tipe)->first();
            $proses = Event::where('id', $event_id->id)->update([
                'judul' => $request->judul,
                'wisata_id' => $id,
                'tipe' => $tipe,
                'min_harga' => $min_harga,
                'min_jumlah' => $min_jumlah,
                'potongan' => $potongan
            ]);

            if($proses){
                return redirect('/event/'.$id)->with('toast_success', 'successfuly action');
            }
        }


        
    }

    public function aktif($id , $tipe){

        if($tipe !== 'min_jumlah' && $tipe !== 'min_harga' && $tipe !== 'aktif'){
            return redirect()->back()->with('toast_warning', $tipe.' not found');
        }

        $judul = Event::where('wisata_id', $id)->where('tipe', $tipe)->pluck('judul')->first();
        $proses = Event::where('wisata_id', $id)->where('tipe', $tipe)->update([
            'status' => true
        ]);

        if($proses){
            return redirect()->back()->with('toast_success', 'successfuly activated for '.$judul);
        }else{
            return redirect()->back()->with('toast_error', 'failed activated for '.$judul);
        }
        
    }

    public function nonaktif($id , $tipe){

        if($tipe !== 'min_jumlah' && $tipe !== 'min_harga' && $tipe !== 'aktif'){
            return redirect()->back()->with('toast_warning', $tipe.' not found');
        }

        $judul = Event::where('wisata_id', $id)->where('tipe', $tipe)->pluck('judul')->first();
        $proses = Event::where('wisata_id', $id)->where('tipe', $tipe)->update([
            'status' => false
        ]);

        if($proses){
            return redirect()->back()->with('toast_success', 'successfuly non activated for '.$judul);
        }else{
            return redirect()->back()->with('toast_error', 'failed non activated for '.$judul);
        }
        
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
