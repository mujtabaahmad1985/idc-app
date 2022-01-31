<?php

namespace App\Http\Controllers;

use App\Activities;
use App\LoginActivities;
use Illuminate\Http\Request;
use Auth;

class LoginActivity extends Controller
{
    //

    public function user_activities(){

        $user_activities = Activities::where('user_id',Auth::Id())->orderBy('created_at')->paginate(100);

        return view('activities.user-activities',['user_activities'=>$user_activities]);
    }

    public function get_activities($id){
        return view('activities.activities',['id'=>$id]);
    }

    public function get_user_login_activities($id){
        $login_activities = LoginActivities::where('user_id',$id)->paginate(1000);

        return view('activities.login-activities',['login_activities'=>$login_activities]);
    }
}
