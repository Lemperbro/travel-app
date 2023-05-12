<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\returnSelf;

class LoginController extends Controller
{
    //

    public function index(){
        return view('Auth.masuk',[
        'tittle' => 'login'
    ]);
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(auth()->user()->posisi == 1){
            return redirect()->intended('admin');

            } elseif(auth()->user()->posisi == 0){
            return redirect()->intended('/');

            }
 
        }
 
        return back()->with('LoginError', 'Login Failed!');
    }

    public function logout(Request $request)
    {
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/login');
    }


}
