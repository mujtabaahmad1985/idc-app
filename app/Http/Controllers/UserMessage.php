<?php

namespace App\Http\Controllers;

use App\Doctors;
use App\Patients;
use App\SendEmail;
use App\Staffs;
use App\UserMessages;
use Illuminate\Http\Request;
use App\User;
use Auth;

class UserMessage extends Controller
{
    //
    public function get_user_messages(){

        $messages = UserMessages::where('receiver_id',Auth::id())->orderBy('created_at','DESC')->get();



        return view('messages.user-messages',['messages'=>$messages]);
    }

    public function read_messages($id){

        $message = UserMessages::find($id);
        $user_message = $message;
        $message->status = 'read';
        $message->save();
        return view('messages.read',['user_message'=>$user_message]);
    }

    public function compose_messages(){
    return view('messages.compose');
    }

    public function send_message(Request $request)
    {


        $recipients = $request->recipients;
        $email_content = $request->email_content;
        $subject = $request->subject;

        $message = new UserMessages();



        $not_available = [];

        $email_addresses = explode(',', $recipients);

        foreach ($email_addresses as $email) {
            $user = User::where('email', $email)->get();

            if ($user->isEmpty()) {
                $not_available[] = $email;
            } else {

                $sender_id = Auth::id();
                $sender_email = Auth::User()->email;
                $sender_name = "";

                //////// SENDER USER INFO

                if(Auth::User()->role=="administrator")
                    $sender_name ="Administrator";

                if(Auth::User()->role=="patient"){
                    $patient = Patients::where('user_id',Auth::id())->get();
                    $sender_name = $patient[0]->patient_name;
                }

                if(Auth::User()->role=="doctor"){
                    $doctors = Doctors::where('doctor_id',Auth::id())->get();
                    $sender_name = $doctors[0]->fname.' '.$doctors[0]->lname;
                }
                if(Auth::User()->role=="staff"){
                    $staff = Staffs::where('user_id',Auth::id())->get();
                    $sender_name = $staff[0]->fname.' '.$staff[0]->lname;
                }
                ////////////////////////// END ///////////////////////////
                /////////////////// RECEIVER USER INFO ///////////////////
                $receiver_name = "";
                if($user[0]->role=="administrator")
                    $receiver_name ="Administrator";

                if($user[0]->role=="patient"){
                    $patient = Patients::where('user_id',$user[0]->user_id)->get();
                    if($patient->isNotEmpty())
                    $receiver_name = $patient[0]->patient_name;
                }

                if($user[0]->role=="doctor"){
                    $doctors = Doctors::where('doctor_id',$user[0]->user_id)->get();
                    if($doctors->isNotEmpty())
                    $receiver_name = $doctors[0]->fname.' '.$doctors[0]->lname;
                }
                if($user[0]->role=="staff"){
                    $staff = Staffs::where('user_id',$user[0]->user_id)->get();
                    if($staff->isNotEmpty())
                    $receiver_name = $staff[0]->fname.' '.$staff[0]->lname;
                }
                //////////////////////////// END ////////////////////////
                ///
                $reciever_id = $user[0]->id;
                $reciever_email = $email;
                $content = $email_content;

                $user_message = new UserMessages();

                $user_message->sender_id = $sender_id;
                $user_message->receiver_id = $reciever_id;
                $user_message->email_content = $content;
                $user_message->subject = $subject;
                $user_message->status = 'unread';
                $user_message->message_folder_id = 0;

                $user_message->save();
                $id = $user_message->id;

                if($id > 0)
                SendEmail::send_message($sender_name, $sender_email, $receiver_name, $reciever_email, $content,$subject);

            }





        }
        if (count($not_available) > 0) {

            if(count($email_addresses)==count($not_available)){
                echo json_encode(array('type'=>'error','message'=>'Email addresses are not found in database.'));
                return;
            }else{
                echo json_encode(array('type'=>'partial','message'=>'Email sent except '.implode(',',$not_available).', said email address are not found in database.'));
                return;
            }


        }else{
            echo json_encode(array('type'=>'success','message'=>'Email sent successfully.'));
            return;
        }
    }

    public function reply_message($id){
        $id = $_GET['id'];
        $user_message = UserMessages::find($id);
         $sender_name  = "";
         $sender_email =$user_message->senders->email;
         $sender_id = $user_message->senders->id;
        
        if($user_message->senders->role=="administrator")
             $sender_name  = $user_message->senders->name;
        elseif($user_message->senders->role=="staff")
              $sender_name  =  $user_message->staffs->name  ;
        elseif($user_message->senders->role=="doctor")
          $sender_name  = $user_message->doctors->name  ;
        elseif($user_message->senders->role=="patient")
          $sender_name  = $user_message->patients->patient_name  ;
                                       
        $data = array(
            'person_to_reply' =>  ucwords($sender_name),
            'person_to_email' => $sender_email,
            'person_to_id'    => $sender_id,
            'person_from_id'  => Auth::id(),
            'email_content'  => $user_message->email_content,
            'subject'       => "Re:".$user_message->subject
        );

        return view('messages.compose',$data);
    }

    public function load_messages(Request $request){
        $type = $request->message_type;

        if($type=="inbox"){
            $messages = UserMessages::where('receiver_id',Auth::id())->orderBy('created_at','DESC')->get();
            return view('messages.inbox',['messages'=>$messages]);
        }

        if($type=="sent"){
            $messages = UserMessages::where('sender_id',Auth::id())->orderBy('created_at','DESC')->get();
            return view('messages.sent',['messages'=>$messages]);
        }

        if($type=="compose"){
            return view('messages.compose');
        }

        if($type=="reply"){
            $id = $request->message_id;
            $user_message = UserMessages::find($id);
            $sender_name  = "";
            $sender_email =$user_message->senders->email;
            $sender_id = $user_message->senders->id;

            if($user_message->senders->role=="administrator")
                $sender_name  = $user_message->senders->name;
            elseif($user_message->senders->role=="staff")
                $sender_name  =  $user_message->staffs->name  ;
            elseif($user_message->senders->role=="doctor")
                $sender_name  = $user_message->doctors->name  ;
            elseif($user_message->senders->role=="patient")
                $sender_name  = $user_message->patients->patient_name  ;

            $data = array(
                'person_to_reply' =>  ucwords($sender_name),
                'person_to_email' => $sender_email,
                'person_to_id'    => $sender_id,
                'person_from_id'  => Auth::id(),
                'email_content'  => $user_message->email_content,
                'subject'       => "Re:".$user_message->subject
            );

            return view('messages.compose',$data);
        }


    }

}
