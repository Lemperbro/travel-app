<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreNotificationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNotificationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNotificationRequest  $request
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update_client($id)
    {
        //

        $notification = Notification::with('user','pemesanan')->where('id', $id)->first();


        $proses = Notification::where('id', $id)->update([
            'status' => 'dibuka'
        ]);

        if($proses){


            if($notification->pemesanan !== null && $notification->tipe == 'pemesanan' && $notification->pemesanan->payment_status == 'PAID')
            {
                return redirect('/booking');
            }else if($notification->pemesanan !== null && $notification->tipe == 'confirmation' && $notification->pemesanan->status == 'dikonfirmasi'){
                return redirect('/tagihan');
            }else{
                return redirect()->back()->with('toast_error', 'nothing');
            }

        }
    }


    public function update_admin($id)
    {
        //

        $notification = Notification::with('user','pemesanan')->where('id', $id)->first();
        $proses = Notification::where('id', $id)->update([
            'status' => 'dibuka'
        ]);

        if($proses){


            if($notification->pemesanan !== null && $notification->tipe == 'req_pemesanan')
            {
                return redirect('/admin/booking/confirmation');
            }else if($notification->pemesanan !== null && $notification->tipe == 'pemesanan'){
                return redirect('/admin/booking');
            }else if ($notification->tipe == 'coment'){
                return redirect($notification->url);
            }else{
                return redirect()->back()->with('toast_error', 'nothing');
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
