<?php

namespace App\Http\Controllers\admin;

use App\Models\Extra;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreExtraRequest;
use App\Http\Requests\UpdateExtraRequest;
use App\Models\Kendaraan;

class ExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // 
        return view('admin.wisata.extra.extra', [
            'id' => $id,
            'datas' => Extra::where('wisata_id', $id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        return view('admin.wisata.extra.add', [
            'id' => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExtraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //

        if($request->type == 'other'){

            $validasi = $request->validate([
                'image' => 'required|mimes:png,jpg,jpeg|max:2048',
                'judul' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required'
            ]);
        }elseif($request->type == 'hotel'){
            $validasi = $request->validate([
                'image' => 'required|mimes:png,jpg,jpeg|max:2048',
                'judul' => 'required',
                'deskripsi' => 'required',
                'harga_hotel' => 'required',
                'hotel' => 'required'
            ]);

            $hotel_check = Extra::where('wisata_id', $id)->where('type', 'hotel')->get();

            if($hotel_check->count() == 1){
                return redirect()->back()->with('toast_error', 'extra hotel is already there');
            }

        }elseif($request->type == 'mobil'){
            $validasi = $request->validate([
                'image' => 'required|mimes:png,jpg,jpeg|max:2048',
                'judul' => 'required',
                'deskripsi' => 'required',
            ]);

            $mobil_check = Kendaraan::get();
            $Extra_mobil_check = Extra::where('wisata_id', $id)->where('type', 'mobil')->get();

            if($mobil_check->count() == 0){
                return redirect()->back()->with('toast_error', 'please enter the car first in the car yard');
            }

            if($Extra_mobil_check->count() == 1){
                return redirect()->back()->with('toast_error', 'extra car is already there');
            }
        }else{
            return redirect()->back()->with('toast_error','error');
        }


        if($request->type == 'hotel'){
            $hotel = count($request->hotel);
            for($i = 0 ; $i < $hotel; $i++){
                Hotel::create([
                    'wisata_id' => $id,
                    'kategori_hotel' => $request->hotel[$i],
                    'harga' => $request->harga_hotel[$i]
                ]);
            }
        }

        if($files=$request->file('image')){
            $extension=$files->getClientOriginalExtension();
            $name = hash('sha256', time()) . '.' . $extension;
            $files->move('image',$name);
        }

        $proses = Extra::create([
            'wisata_id' => $id,
            'image' => $name,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'type' => $request->type,
            'harga' => $request->harga
        ]);

        if($proses){
            return redirect('/extra/'.$id)->with('toast_success', 'successful additional to the Extra');
        }else{
            return redirect('/extra/'.$id)->with('toast_error', 'Failed additional to the Extra');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function show(Extra $extra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Extra  $extra
     * @return \Illuminate\Http\Response
     */


    public function edit_redirect($id){
        return redirect('/extra/edit/'.$id);
    }

    public function edit(Extra $extra, $id)
    {
        //
        $data = Extra::where('id', $id)->first();
        return view('admin.wisata.extra.edit', [
            'data' => $data,
            'hotel' => Hotel::where('wisata_id', $data->wisata_id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExtraRequest  $request
     * @param  \App\Models\Extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Extra $extra, $id)
    {
        //

        if($request->type == 'other'){

            $validasi = $request->validate([
                'image' => 'mimes:png,jpg,jpeg|max:2048',
                'judul' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required'
            ]);
        }elseif($request->type == 'hotel'){
            $validasi = $request->validate([
                'image' => 'mimes:png,jpg,jpeg|max:2048',
                'judul' => 'required',
                'deskripsi' => 'required',
                'harga_hotel' => 'required',
                'hotel' => 'required'
            ]);
        }elseif($request->type == 'mobil'){
            $validasi = $request->validate([
                'image' => 'mimes:png,jpg,jpeg|max:2048',
                'judul' => 'required',
                'deskripsi' => 'required',
            ]);
        }else{
            return redirect()->back()->with('toast_error','error');
        }


        $image_old = Extra::where('id', $id)->pluck('image')->first(); 
        $wisata_id = Extra::where('id', $id)->pluck('wisata_id')->first(); 

        $hotel = count($request->hotel);
        $hotel_count = Hotel::where('wisata_id', $wisata_id)->count();

        if ($hotel > $hotel_count){
            for($i = 0 ; $i < $hotel; $i++){
                Hotel::where('wisata_id', $wisata_id)->updateOrCreate([
                    'wisata_id' => $wisata_id,
                    'kategori_hotel' => $request->hotel[$i],
                    'harga' => $request->harga_hotel[$i]

                ]);
            }
        } else if($hotel <= $hotel_count){
            for($i = 0 ; $i < $hotel; $i++){
                Hotel::where('wisata_id', $wisata_id)->where('id', $request->hotel_id[$i])->update([
                    'wisata_id' => $wisata_id,
                    'kategori_hotel' => $request->hotel[$i],
                    'harga' => $request->harga_hotel[$i]
                ]);
            }
        }



        if($files=$request->file('image')){
            $extension=$files->getClientOriginalExtension();
            $name = hash('sha256', time()) . '.' . $extension;
            $up = $files->move('image',$name);

            if($up){
                $storage = public_path('image/'.$image_old);
                if(File::exists($storage)){
                    unlink($storage);
                }
            }
        }else{
            $name = $image_old;
        }

        $proses = Extra::where('id', $id)->update([
            'wisata_id' => $wisata_id,
            'image' => $name,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'type' => $request->type,
            'harga' => $request->harga
        ]);

        if($proses){
            return redirect('/extra/'.$wisata_id)->with('toast_success', 'successful update to the Extra');
        }else{
            return redirect('/extra/'.$wisata_id)->with('toast_error', 'Failed update to the Extra');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Extra $extra, $id)
    {
        //

        $extra = Extra::where('id', $id)->first();
        $extra_image = Extra::where('id', $id)->pluck('image')->first();

        $delete = Extra::where('id', $id)->delete();
        if($delete){
            $storage = public_path('image/'.$extra_image);
            unlink($storage);

            if($extra->type == 'hotel'){
                Hotel::where('wisata_id',$extra->wisata_id)->delete();
            }

        }   

        return redirect()->back()->with('success', 'Delete successful to the Extra');
    }



    
}
