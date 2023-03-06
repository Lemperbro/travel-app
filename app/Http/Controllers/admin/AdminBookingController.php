<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminBookingController extends Controller
{
    //

    public function index(){
    return view('admin.booking.booking', [
        'tittle' => 'booking'
    ]);

    }
}
