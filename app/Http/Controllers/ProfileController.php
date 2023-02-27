<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Rules\DifferentPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;




class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('profile', [
            'data' => auth()->user(),
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $validasi = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'username' => 'required',
            'email' => 'required|email',
            'no_tlpn' => 'required|min:11',
            'alamat' => 'required',
        ]);


        if($request->image){
            $extension = $validasi['image']->getClientOriginalExtension();
            $image = hash('sha256', time()) .'.' . $extension;
            $up = $validasi['image']->move('ft_user/', $image);
            if($up){
                $img = auth()->user()->image;
                $storage = public_path("ft_user/".$img);
                if(File::exists($storage)){
                    unlink($storage);                       
                }

            }
        }else{
            $img = auth()->user()->image;
            $image = $img;

        }

        User::where('id', auth()->user()->id)->update([
            'image' => $image,
            'username' => $validasi['username'],
            'email' => $validasi['email'],
            'no_tlpn' => $validasi['no_tlpn'],
            'alamat' => $validasi['alamat']
        ]);


        return redirect('/profile');
    }

    public function changePassword(Request $request){


        if($request->password){
            $request->validate([
                'current_password' => ['required', new MatchOldPassword],
                'password' => ['required', 'confirmed', 'min:8', new DifferentPassword],
            ]);
        
            User::find(auth()->user()->id)->update(['password' => Hash::make($request->password)]);
        }

        return view('changePassword');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
