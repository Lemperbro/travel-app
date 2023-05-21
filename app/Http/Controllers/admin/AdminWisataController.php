<?php

namespace App\Http\Controllers\admin;

use App\Models\Faq;
use App\Models\Kota;
use App\Models\Jemput;
use App\Models\Wisata;
use App\Models\Equipment;
use App\Models\Fasilitas;
use App\Models\Itenerary;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\admin\AdminWisata;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $wisata = Wisata::latest();
        $kota = Kota::where('slug', request('pilihDaerah'))->first();

        if(request('pilihDaerah')){
            $wisata->where('kota_id', $kota->id);
        }

        return view('admin.wisata.index',[
            'tittle' => 'Kelola Wisata',
            'data' => $wisata->paginate(8),
            'kota' => Kota::get()
            
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
        return view('admin.wisata.add',[
            'tittle' => 'Kelola Wisata',
            'kota' => Kota::all() 
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $jajal2 = str_replace('>', '',$request->itenerary);
        // $jajal = preg_split('/\n|\r\n?/',$jajal2);
        // dd($jajal);
        

        $validasi = $request->validate([
            'image' => 'required|max:2048',
            'images' => 'required|max:2048',
            'nama' => 'required',
            'long_tour' => 'required',
            'kota' => 'required',
            'type' => 'required',
            'harga' => 'required',
            'location' => 'required',
            'deskripsi' => 'required',
            'inclusion' => 'required',
            'exclusion' => 'required',
            
        ]);       

        
        $image=array();
        $no = 1;

        if($files=$request->file('image')){
            foreach($files as $file){
                $extension=$file->getClientOriginalExtension();
                $name = hash('sha256', time()) .$no++.'.' . $extension;
                $file->move('image',$name);
                $image[]=$name;
            }
        }
        


        $wisata = Wisata::create([
            'image'=>  implode("|",$image),
            'nama_wisata' => $validasi['nama'],
            'long_tour' => $validasi['long_tour'],
            'room_type' => $request->room_type,
            'nama_hotel' => $request->nama_hotel,
            'tour_type' => $validasi['type'],
            'harga' => $validasi['harga'],
            'kota_id' => $validasi['kota'],
            'location' => $validasi['location'],
            'deskripsi' => $validasi['deskripsi'],
        ]);



            $inclusions = array();
            if($inclusion = $request->inclusion){
                foreach($inclusion as $inclusion){
                    $inclusions[] = $inclusion;
                }
            }
            
            $exclusions = array();
            if($inclusion = $request->exclusion){
                foreach($inclusion as $inclusion){
                    $exclusions[] = $inclusion;
                }
            }

            Fasilitas::create([
                'wisata_id' => $wisata->id,
                'inclusion' => implode("|", $inclusions),
                'exclusions' => implode("|", $exclusions)
            ]);


            $jumlah_agenda = count($request->agenda);
            for($i = 0 ; $i < $jumlah_agenda; $i++){
                Itenerary::create([
                    'wisata_id' => $wisata->id,
                    'agenda' => $request->agenda[$i],
                    'startTime' => $request->startTime[$i],
                    'endTime' => $request->endTime[$i],
                    'deskripsi' => $request->itenerary[$i]
                ]);
            }




            if($files=$request->file('images')){
                    $extension=$files->getClientOriginalExtension();
                    $name = hash('sha256', time()) . '.' . $extension;
                    $files->move('image',$name);
            }
            Equipment::create([
                'wisata_id' => $wisata->id,
                'image' => $name,
            ]);


            // $jumlah_equipment = count($request->equipment);
            // for($i = 0 ; $i < $jumlah_equipment; $i++){
            //     Equipment::create([
            //         'wisata_id' => $wisata->id,
            //         'image' => $images[$i],
            //         'name' => $request->equipment[$i]
            //     ]);
            // }
            


        return redirect('/admin/wisata')->with('success', 'successful addition to the tour');


    }

    public function addJemput(Request $request, $id){

        $validasi = $request->validate([
            'titik_jemput' => 'required',
            'harga' => 'required'
        ]);
        Jemput::find($id)->create([
            'wisata_id' => $id,
            'lokasi' => $validasi['titik_jemput'],
            'harga' => $validasi['harga']
        ]);
        return redirect('/admin/wisata');

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
    public function edit(AdminWisata $adminWisata, $id)
    {
        //

        $wisata = Wisata::with(['kota','equipment', 'fasilitas', 'itenerary'  => function($query) use ($id){
            $query->where('wisata_id', $id)->get();
        }])->where('id', $id)->get();

        foreach($wisata as $wisatas){

        foreach($wisatas->fasilitas as $fasilitas){

            $inclusion = explode('|', $fasilitas->inclusion);
            $exclusion = explode('|', $fasilitas->exclusions);
            
        }



    }

        return view('admin.wisata.edit', [
            'data' => $wisata,
            'inclusion' => $inclusion,
            'exclusion' => $exclusion,
            'tittle' => 'Kelola Wisata',
            'kota' => Kota::all(),

        ]);
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
        $validasi = $request->validate([
            'nama' => 'required',
            'long_tour' => 'required',
            'type' => 'required',
            'kota' => 'required',
            'harga' => 'required',
            'location' => 'required',
            'deskripsi' => 'required',
            'inclusion' => 'required',
            'exclusion' => 'required',
            'image' => 'max:2048',
            'images' => 'max:2048',



        ]);
        

        if($request->hasFile('image') && $request->image != ''){


           

            $image=array();
            $no = 1;
            foreach($request->image as $file){
                $extension=$file->getClientOriginalExtension();
                $name = hash('sha256', time()) .$no++.'.' . $extension;
                $storage2 = public_path("image/".$name);

                while(File::exists($storage2)){

                $name = $no+2;

                }
                $up = $file->move('image',$name);
                $image[]=$name;
                if($up){
                    $images_db = Wisata::where('id', $id)->pluck('image');
                    $img_explode = explode('|', $images_db);
                    $potong_img = str_replace(['[', '"', ']'], '', $img_explode);
        
                    foreach($potong_img as $img){
                        $storage = public_path("image/".$img);
                        if(File::exists($storage)){
                            unlink($storage);                       
                        }
                    }   
                }
            }
        }else{
            $image=array();

            $images_db = Wisata::where('id', $id)->pluck('image');
            $img = explode("|", $images_db);
            $potong_img = str_replace(['[', '"', ']'], '', $img);
            $image = $potong_img;
        }
        $W = Wisata::where('id', $id)->pluck('slug')->first();


        $wisata = Wisata::find($id)->update([
            'image'=>  implode("|",$image),
            'nama_wisata' => $validasi['nama'],
            'long_tour' => $validasi['long_tour'],
            'room_type' => $request->room_type,
            'nama_hotel' => $request->nama_hotel,
            'tour_type' => $validasi['type'],
            'harga' => $validasi['harga'],
            'kota_id' => $validasi['kota'],
            'location' => $validasi['location'],
            'deskripsi' => $validasi['deskripsi'],
            'slug' => SlugService::createSlug(Wisata::class, 'slug' , $request->nama)
        ]);

        $U = Wisata::where('id', $id)->pluck('slug')->first();
        
        if($wisata){
            Faq::where('wisata', $W)->update([
                'wisata' => $U
            ]);


        }


            $inclusions = array();
            if($inclusion = $request->inclusion){
                foreach($inclusion as $inclusion){
                    $inclusions[] = $inclusion;
                }
            }
            
            $exclusions = array();
            if($inclusion = $request->exclusion){
                foreach($inclusion as $inclusion){
                    $exclusions[] = $inclusion;
                }
            }

            Fasilitas::where('wisata_id', $id)->update([
                'wisata_id' => $id,
                'inclusion' => implode("|", $inclusions),
                'exclusions' => implode("|", $exclusions)
            ]);



            $jumlah_agenda = count($request->agenda);
            $itenerary_count = Itenerary::where('wisata_id', $id)->count();

            if ($jumlah_agenda > $itenerary_count){
                for($i = 0 ; $i < $jumlah_agenda; $i++){
                    Itenerary::where('wisata_id', $id)->updateOrCreate([
                        'wisata_id' => $id,
                        'agenda' => $request->agenda[$i],
                        'startTime' => $request->startTime[$i],
                        'endTime' => $request->endTime[$i],
                        'deskripsi' => $request->itenerary[$i]
                    ]);
                }
            } else if($jumlah_agenda <= $itenerary_count){
                for($i = 0 ; $i < $jumlah_agenda; $i++){
                    Itenerary::where('wisata_id', $id)->where('id', $request->id_itenerary[$i])->update([
                        'wisata_id' => $id,
                        'agenda' => $request->agenda[$i],
                        'startTime' => $request->startTime[$i],
                        'endTime' => $request->endTime[$i],
                        'deskripsi' => $request->itenerary[$i]
                    ]);
                }
            }




            if($files=$request->file('images')){
                    $extension=$files->getClientOriginalExtension();
                    $img = hash('sha256', time()) .'.' . $extension;
                    $files->move('image',$img);

            }else{
                $equipment = Equipment::where('wisata_id', $id)->pluck('image')->first();
                $img = $equipment;
            }

            Equipment::where('wisata_id', $id)->update([
                'wisata_id' => $id,
                'image' => $img
            ]);


            return redirect('/admin/wisata')->with('success', 'update successful to the tour');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminWisata  $adminWisata
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminWisata $adminWisata, $id)
    {

        $img = Wisata::where('id', $id)->pluck('image')->first();
        //
       $proses = Wisata::find($id)->delete();

       if($proses){
            $data = explode('|',$img);

            foreach($data as $datas){
                $storage = public_path('image/'.$datas);

                if(File::exists($storage)){
                    unlink($storage);

                }
            }
            return redirect('/admin/wisata')->with('success', 'delete successful to the tour');

       }
        // Itenerary::with('fasilitas','jemput')->where('wisata_id', $id)->delete();
        return redirect('/admin/wisata')->with('warning', 'failed delete to the tour');
    }


    public function destroy_itenerary($id){
        Itenerary::where('id', $id)->delete();

        return response()->json([
            'success' => true
        ]);


    }
    public function delete(Request $request){
            $id = $request->id;
            
            Jemput::find($id)->delete();


            return response()->json(['status'=>'200']);

    }



    public function faq($slug){
        $faq = Faq::where('wisata', $slug)->get();


        return view('admin.wisata.faq', [
            'tittle' => 'Kelola Wisata',
            'slug' => $slug,
            'faq' => $faq
        ]);
    }

    public function addFaq(Request $request, $slug){
        $faq = Faq::where('wisata', $slug)->get();

        if($request->question < 1 && $request->answer < 1){
            return redirect('/admin/wisata');
        }else if($request->question > 0 && $request->answer > 0){

            $hitung_request = count($request->question);
            
            if($hitung_request > $faq->count()){

                if($faq->count() < 5){

                for($i = 0 ; $i < $hitung_request; $i++){


               $add = Faq::where('wisata', $slug)->updateOrCreate([
                    'wisata' => $slug,
                    'question' => $request->question[$i],
                    'answer' => $request->answer[$i],
                ]);

                }
                return redirect()->back()->with('success', 'successful additional to the FAQ');

            }else if($faq->count() >= 5){
                return redirect()->back()->with('warning', '
                FAQ Reached limit');
            }

                    
            }else if($hitung_request <= $faq->count()){
                for($i = 0 ; $i < $hitung_request; $i++){


                    Faq::where('wisata', $slug)->where('id', $request->id[$i])->update([
                        'wisata' => $slug,
                        'question' => $request->question[$i],
                        'answer' => $request->answer[$i],
                    ]);



                    }
                    

                    
            }

        }


        return redirect('/admin/wisata/faq/'.$slug);
    }

    public function deleteFaq($id){
        Faq::where('id', $id)->delete();


        return response()->json([
            'success' => true,
        ]);
    }

    public function aktif($id){
        
        $wisata = Wisata::where('id', $id)->first();
        $proses = Wisata::where('id', $id)->update([
            'status' => true
        ]);

        if($proses){
            return redirect()->back()->with('success', $wisata->nama_wisata.' activated successfully');
        }else{
            return redirect()->back()->with('warning', $wisata->nama_wisata.' failed to activate');

        }
    }


    public function nonaktif($id){
        
        $wisata = Wisata::where('id', $id)->first();
        $proses = Wisata::where('id', $id)->update([
            'status' => false
        ]);

        if($proses){
            return redirect()->back()->with('success', $wisata->nama_wisata.' deactivated successfully');
        }else{
            return redirect()->back()->with('warning', $wisata->nama_wisata.' failed to deactivate');

        }
    }
}
