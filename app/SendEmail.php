<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;

class SendEmail extends Model
{
    //

    public static  function send_credentials($name, $email, $password,$user_id){


        /*  Mail::send('mails.login-credentials', ['user_id'=>$user_id,'name' => $name, 'email' => $email, 'password' => $password], function ($message) use ($email)
          {

              $message->from('noreply@idcapp.net', 'IDCSG CRM');

              $message->to($email)->subject('Login Credentials | IDCSG CRM')->bcc('mujtabaahmad1985@gmail.com');;

          });*/

        //  return response()->json(['message' => 'Request completed']);

    }

    public static  function send_credentials_approve_account($name, $email, $password,$user_id){


        /*  Mail::send('mails.login-credentials-approval-account', ['user_id'=>$user_id,'name' => $name, 'email' => $email, 'password' => $password], function ($message) use ($email)
          {

              $message->from('noreply@idcapp.net', 'IDCSG CRM');

              $message->to($email)->subject('Login Credentials | IDCSG CRM')->bcc('mujtabaahmad1985@gmail.com');;

          });*/

        //  return response()->json(['message' => 'Request completed']);

    }

    public static  function reset_password( $email){


        /* Mail::send('mails.reset-password', [ 'email' => $email ], function ($message) use ($email)
         {

             $message->from('noreply@idcapp.net', 'IDCSG CRM');

             $message->to($email)->subject('Reset Credentials | IDCSG CRM')->bcc('mujtabaahmad1985@gmail.com');;

         });*/

        //  return response()->json(['message' => 'Request completed']);

    }

    public static  function reset_account_credentials( $email,$password){


        /*  Mail::send('mails.login-credentials-reset-account', [ 'email' => $email, 'password' => $password], function ($message) use ($email)
          {

              $message->from('noreply@idcapp.net', 'IDCSG CRM');

              $message->to($email)->subject('New Credentials | IDCSG CRM')->bcc('mujtabaahmad1985@gmail.com');;

          }); */

        //  return response()->json(['message' => 'Request completed']);

    }


    public static  function leave_status($name, $email,$message,$status){


        /* Mail::send('mails.leave-status', [ 'name'=>$name,'email' => $email, 'message' => $message,'status'=>$status,'reason_of_rejection'=>$message], function ($message) use ($email)
         {

             $message->from('noreply@idcapp.net', 'IDCSG CRM');

             $message->to($email)->subject('Leave Status | IDCSG CRM')->bcc('mujtabaahmad1985@gmail.com');;

         }); */

        //  return response()->json(['message' => 'Request completed']);

    }

    public static  function thanks_you_email($name, $email){


        /*  Mail::send('mails.login-credentials', ['name' => $name, 'email' => $email], function ($message) use ($email)
          {

              $message->from('noreply@idcapp.net', 'IDCSG CRM');

              $message->to($email)->subject('Thanks you for signing up | IDCSG CRM');;

          }); */

        //  return response()->json(['message' => 'Request completed']);

    }

    public static  function send_message($sender_name,$sender_email, $receiver_name ,$receiver_email,$content,$subject){

        $data = array(
            'sender_name' => $sender_name,
            'sender_email' => $sender_email,
            'content'=>$content,
            'receiver_name' => $receiver_name,
            'receiver_email' => $receiver_email,
            'subject'       => $subject
        );

        /*Mail::send('mails.send-message', $data, function ($message) use ($data)
        {

            $message->from('noreply@idcapp.net', 'IDCSG CRM');

            $message->to($data['receiver_email'])->subject($data['sender_name'].' sent you message | IDCSG CRM')->bcc('mujtabaahmad1985@gmail.com');;;;

        }); */

        //  return response()->json(['message' => 'Request completed']);

    }

    public static  function send_secure_link($name,$link,$email){
        $email = env('DEFAULT_EMAIL');
        $data = array(
            'name' => $name,
            'content' => $link,
            'email' => $email
        );

        Mail::send('mails.send-secure-link', $data, function ($message) use ($data)
        {

            $message->from('noreply@idcapp.net', 'IDCSG CRM');

            $message->to($data['email'])->subject('Secure Link for Authentication | IDCSG CRM')->bcc('mujtabaahmad1985@gmail.com');;;;

        });

        //  return response()->json(['message' => 'Request completed']);

    }

    public static  function send_profile_link($name,$user_id,$email,$patient_id){
        $email = env('DEFAULT_EMAIL');
        $data = array(
            'name' => $name,
            'user_id'=>$user_id,
            'patient_id'=>$patient_id,
            'email' => $email
        );
        //dd($data);

        /*  Mail::send('mails.send-profile-link', $data, function ($message) use ($data)
          {

              $message->from('noreply@idcapp.net', 'IDCSG CRM');

              $message->to($data['email'])->subject('Update Profile | IDCSG CRM')->bcc('mujtabaahmad1985@gmail.com');;;;

          }); */

        //  return response()->json(['message' => 'Request completed']);

    }

    public static  function sendBookAppointmentEmail($name,$email,$patient_id){
        $email = env('DEFAULT_EMAIL');
        $data = array(
            'name' => $name,
            'patient_id'=>$patient_id,
            'email' => $email
        );
        //dd($data);

          Mail::send('mails.book-appointment', $data, function ($message) use ($data)
          {

              $message->from('noreply@idcapp.net', 'IDCSG CRM');

              $message->to($data['email'])->subject('Booked appointment | IDCSG CRM')->bcc('mujtabaahmad1985@gmail.com');;;;
              $message->attach(env('APP_URL').'uploads/qrcode/appointment.pdf', array(
                      'as' => 'appointment.pdf',
                      'mime' => 'application/pdf')
              );

          });

        //  return response()->json(['message' => 'Request completed']);

    }

    public static  function sendReminderEmail($name,$email,$patient_id,$appointment_id=NULL){

        $email = env('DEFAULT_EMAIL');

        $data = array(
            'name' => $name,
            'patient_id'=>$patient_id,
            'email' => $email,
            'appointment_id' => $appointment_id
        );
        //dd($data);

        Mail::send('mails.reminder-appointment', $data, function ($message) use ($data)
        {

            $message->from('noreply@idcapp.net', 'IDCSG CRM');

            $message->to($data['email'])->subject('Appointment Reminder | IDCSG CRM')->bcc('mujtabaahmad1985@gmail.com');;;;
           /* $message->attach(env('APP_URL').'uploads/qrcode/appointment.pdf', array(
                    'as' => 'appointment.pdf',
                    'mime' => 'application/pdf')
            );*/

        });

          return response()->json(['message' => 'Request completed','type'=>'success']);

    }
}
