<?php

namespace App\Http\Controllers\Api;
use App\ApiTokens;
use App\Helpers\CommonMethods;
use App\MobileCodes;
use App\Patients;
use App\Settings;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use mysql_xdevapi\Session;
Use Redirect;
use Log;
use App\User;

class Authentication extends Controller
{
    //
    public function login(Request $request)
    {
        $email = $request->email;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            return CommonMethods::sendError('Invalid email address is entered!',null,'X002');

        $user = User::where('email',$email)->where('role','patient')->where('status','approved')->first();

        if ($user) {


            $token = new ApiTokens();
            $api_token =  $token->generateToken($user->id);

            $patient = Patients::where('user_id',$user->id)->get();
            $name = $patient[0]->patient_name;


            Log::info('Request From: '.$request->fullUrl());
            Log::info('Request Info: ',['Request ID'=>CommonMethods::generateRequestID($user->id),'IP: '.$request->getClientIp()]);
            $code = CommonMethods::generateRandomCode();
            $c = new MobileCodes();
            $c->user_id = $user->id;
            $c->code = $code;
            $c->save();

         //   Session()->put('access_token',$api_token);
            return CommonMethods::sendResponse(array('access_token'=>$api_token,'code'=>$code,'name'=>$name),'Data found');

        }else{
            return CommonMethods::sendError('Email address is not found in database!',null,'X003');
        }

        //  return $this->sendFailedLoginResponse($request);
    }
}
