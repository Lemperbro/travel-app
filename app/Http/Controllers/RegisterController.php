<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class RegisterController extends Controller
{
    //

    public function create(){
        return view('register');
    }

    public function store(Request $request){
        $validasi = $request->validate([
            'image' => 'required',
            'username' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:5|max:255',
            'no_tlpn' => 'required|min:11',
            'alamat' => 'required',
        ]);


        $validasi['password'] = bcrypt($validasi['password']); 

        $extension = $request->file('image')->getClientOriginalExtension();
        $image = hash('sha256', time()) .'.' . $extension;
        $request->file('image')->move('ft_user/', $image);

        User::create([
            'image' => $image,
            'username' => $validasi['username'],
            'email' => $validasi['email'],
            'password' => $validasi['password'],
            'no_tlpn' => $validasi['no_tlpn'],
            'alamat' => $validasi['alamat']
        ]);
        $request->session()->flash('success', 'Registration successfull! Please login');
 
        return redirect('/login');
    }
}
