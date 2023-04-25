<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use SendinBlue\Client\Configuration;
use SendinBlue\Client\Model\SendSmtpEmail;
use SendinBlue\Client\Api\TransactionalEmailsApi;

class ContactController extends Controller
{
    //

    public function index(){
        return view('contact');
    }



    public function sendEmail(Request $request)
    {
        
            $data = array(
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'pesan' => $request->message
            );
            $send = Mail::send('email.index', $data, function($message) use ($data){

                $message->from($data['email'], 'To Grow In Travel Indonesia');

                $message->to('sihdobleh@gmail.com')->subject($data['subject']);
            });

            if($send){
            return redirect()->back()->with('toast_success', 'successfully sent');

            }else{
            return redirect()->back()->with('toast_error', 'failed to send');
            }

            return redirect()->back();


    }
}
