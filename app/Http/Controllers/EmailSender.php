<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class EmailSender extends Controller
{
    //
    public function send_credentials(Request $request){

            $title = "Test";
            $content = "Email";
            echo bcrypt(str_random(12));exit;

            Mail::send('mails.login-credentials', ['title' => $title, 'content' => $content], function ($message)
            {

                $message->from('noreply@idcapp.net', 'IDCSG CRM');

                $message->to('mujtabaahmad1985@gmail.com')->subject('Login Credentials | IDCSG CRM');;;

            });

            return response()->json(['message' => 'Request completed']);

    }
}
