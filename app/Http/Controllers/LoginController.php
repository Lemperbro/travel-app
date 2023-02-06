<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class LoginController extends Controller
{
    //

    public function index(){
        return view('masuk',[
        'tittle' => 'login'
    ]);
    }

}
