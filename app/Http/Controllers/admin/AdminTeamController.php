<?php

namespace App\Http\Controllers\admin;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class AdminTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $data = Team::latest();

        if(request('search')){
            $data->where('nama', 'like', '%'. request('search') .'%');
        }
        return view('admin.team.about',[
            'data' => $data->get(),
            'tittle' => 'Kelola Team'
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
            'image' => 'required',
            'jabatan' => 'required',
            'profile' => 'required',
        ]);

        $image=array();
    

        if($files=$request->file('image')){
            $extension=$files->getClientOriginalExtension();
            $name = hash('sha256',time()) . '.' . $extension;
            $files->move('image',$name);
            $image[]=$name;

        }

        Team::create([
            'nama' => $validasi['nama'],
            'image' => implode("|",$image),
            'jabatan' => $validasi['jabatan'],
            'profile' => $validasi['profile']
        ]);

        return redirect('/team')->with('success', 'Upload Succes');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team, $id)
    {
        //

        $validasi = $request->validate([

            'nama' => 'required|max:255',
            'image' => 'max:2048',
            'jabatan' => 'required|max:255',
            'profile' => 'required|max:255',

        ]);

        $img = Team::where('id', $id)->pluck('image')->first();

        if($files=$request->file('image')){
            $extension=$files->getClientOriginalExtension();
            $name = hash('sha256',time()) . '.'  . $extension;
            $up = $files->move('image',$name);

            if($up){
                $storage = public_path('image/'.$img);
                if(File::exists($storage)){
                    unlink($storage);
                }
            }
        }else{
            $name = $img;
        }


        Team::find($id)->update([
            'nama' => $request['nama'],
            'image' => $name,
            'jabatan' => $request['jabatan'],
            'profile' => $request['profile'],

        ]);


        return redirect('/team')->with('success', 'Update Team Succes');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team, $id)
    {
        //

        $data = Team::where('id', $id)->pluck('image')->first();

        $delete = Team::find($id)->delete();
        if($delete){
            $storage = public_path('image/'.$data);
            unlink($storage);
        }   

        return redirect('/team')->with('success', 'Delete Succes');
    }
}
