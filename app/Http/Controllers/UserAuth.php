<?php

namespace App\Http\Controllers;

use App\Doctors;
use App\Patients;
use App\SendEmail;
use App\Staffs;
use App\User;
use Auth;
use Illuminate\Http\Request;

class UserAuth extends Controller
{
    //
    public function send_link(Request $request){
        $email = $request->email;

        $user = User::where('email',$email)->where('status','approved')->get();
        if($user->isEmpty()){
           echo json_encode(array(
                'type'=>'error',
                'message'=>'Email address not found in IDC Database.'
           ));
        }else{
         //   $time =
            $code = bcrypt(time());
            $user_id = $user[0]->id;
            $u = User::find($user_id);
            $u->secure_link_token = $code;
            $u->save();

            $name = "";
            if($user[0]->role=="administrator")
                $name ="Administrator";

            if($user[0]->role=="patient"){
                $patient = Patients::where('user_id',$user_id)->get();
                if($patient->isNotEmpty())
                    $name = $patient[0]->patient_name;
            }

            if($user[0]->role=="doctor"){
                $doctors = Doctors::where('doctor_id',$user_id)->get();
                if($doctors->isNotEmpty())
                    $name = $doctors[0]->fname.' '.$doctors[0]->lname;
            }
            if($user[0]->role=="staff"){
                $staff = Staffs::where('user_id',$user_id)->get();
                if($staff->isNotEmpty())
                    $name = $staff[0]->fname.' '.$staff[0]->lname;
            }

            $link = url('/').'/validate/secure/link?email='.$email.'&q='.$code.'&u='.$user_id;

            SendEmail::send_secure_link($name,$link,$email);


            echo json_encode(array(
                'type'=>'success',
                'message'=>'Secure Link Sent, Check Inbox.'
            ));
        }
    }

    public function validate_link(){
        $email = isset($_GET['email'])?$_GET['email']:"";
        $code = isset($_GET['q'])?$_GET['q']:"";
        $user_id = isset($_GET['u'])?$_GET['u']:"";
        $error = [];
        if(empty($email) || empty($code) || empty($user_id))
            $error[] = 'No valid link is found!';
        else{
            if(!empty($user_id)){
                $u = User::find($user_id);
                if(!empty($u)){


                $u_code = $u->secure_link_token;
                $u_email = $u->email;
                if($u_code==$code && $u_email==$email ){
                    $u->secure_link_token = null;

                    Auth::loginUsingId($user_id);
                    // -- OR -- //
                   // Auth::login($u,true);
                    $u->save();
                   return redirect()->intended('/dashboard');
                }else{
                    if($u_code!=$code || $u_code==""){
                        $error[] = 'Linked is expired please retry.';
                    }
                }
                }else{
                    $error[] = 'No valid link is found!';
                }
            }
        }


        return view('validate-secure-link',['errors'=>$error]);
    }
}
