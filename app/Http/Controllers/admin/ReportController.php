<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    //

    public function index()
    {

        // dd(request('month'));
        $data = Pemesanan::with('wisata', 'user','guide')->latest();

        // if(request('year') && request('month') && request('status')){
        //     $data->whereYear('departure',request('year'))->whereMonth('departure',request('month'))->where('status',request('status'));
        // }elseif(request('year') && request('month')){
        //     $data->whereYear('departure',request('year'))->WhereMonth('departure',request('month'));
        // }elseif(request('status')){
        //     $data->where('status',request('status'));
        // }

        if (request('year')) {
            $data->whereYear('departure', request('year'));
        }

        if (request('month')) {
            $data->whereMonth('departure', request('month'));
        }

        if (in_array(request('status'), ['refund', 'cancel', 'done'])) {
            $data->where('payment_status', 'PAID')->where('status', request('status'));
        } else if (in_array(request('status'), ['PAID', 'PENDING', 'EXPIRED'])) {
            $data->where('payment_status', request('status'));
        }

        return view('admin.report.index', [
            'date' => Carbon::now()->format('Y_m_d'),
            'year_now' => Carbon::now()->format('Y'),
            'datas' => $data->paginate(30)
        ]);
    }
}
