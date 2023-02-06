<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RegisterController extends Controller
{
    //

    public function create(){
        return view('register');
    }

    public function store(Request $request){
        $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:5|max:255',
            'no_tlpn' => 'required|min:11',
            'alamat' => 'required'
        ]);
    }
}
