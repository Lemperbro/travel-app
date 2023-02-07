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
            'username' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:5|max:255',
            'no_tlpn' => 'required|min:11',
            'alamat' => 'required'
        ]);

        $validasi['password'] = bcrypt($validasi['password']);  

        User::create($validasi);
        $this->$request->session()->flash('success', 'Registration successfull! Please login');
 
        return redirect('/login');
    }
}
