<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class RegisterController extends Controller
{
    //

    public function create(){
        return view('Auth.register');
    }

    public function store(Request $request){
        $validasi = $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|confirmed|min:5|max:255',
            'no_tlpn' => 'required|min:11',
            'alamat' => 'required',
        ]);


        $validasi['password'] = bcrypt($validasi['password']); 

        $proses = User::create([
            'username' => $validasi['username'],
            'email' => $validasi['email'],
            'password' => $validasi['password'],
            'no_tlpn' => $validasi['no_tlpn'],
            'alamat' => $validasi['alamat']
        ]);

        if($proses){
            return redirect('/login')->with('toast_success', 'Registration successfull !!');

        }else{
            return redirect()->back()->with('warning', 'Registrasi Gagal');
        }
 
    }

    
}
