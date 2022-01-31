<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Crypt;
use Str;
use App\ApiTokens;
use Illuminate\Support\Facades\Auth;

Class CommonMethods
{

    public static function getHopsitalID(){
       // return 110;
        if(Auth::user()->role=='hospital-administrator')
            return Auth::id();
        else
            return Auth::user()->hospital_id;

    }
    public static function fileSize($bytes)
    {
        $kb = 1024;
        $mb = $kb * 1024;
        $gb = $mb * 1024;
        $tb = $gb * 1024;
        if (($bytes >= 0) && ($bytes < $kb)) {
            return $bytes . ' B';
        } elseif (($bytes >= $kb) && ($bytes < $mb)) {
            return ceil($bytes / $kb) . ' KB';
        } elseif (($bytes >= $mb) && ($bytes < $gb)) {
            return ceil($bytes / $mb) . ' MB';
        } elseif (($bytes >= $gb) && ($bytes < $tb)) {
            return ceil($bytes / $gb) . ' GB';
        } elseif ($bytes >= $tb) {
            return ceil($bytes / $tb) . ' TB';
        } else {
            return $bytes . ' B';
        }
    }

    public static function generateRandomCode($length = 4)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function invoiceFormatID($id)
    {
        return str_pad($id, 6, 0, STR_PAD_LEFT);
    }

    public static function formatDate($date = "")
    {
        if (empty($date))
            $date = now();
        return date('d.m.Y', strtotime($date));
    }

    public static function formatDateTime($date = "")
    {
        if (empty($date))
            $date = now();
        return date('d.m.Y H:i:s', strtotime($date));
    }

    public static function encrypt($id)
    {
        return Crypt::encryptString($id);
    }

    public static function decrypt($string)
    {
        return Crypt::decryptString($string);
    }

    public static function generateRequestID($user_id)
    {
        return date('Ymdhis') . '-' . $user_id;
    }

    public static function authenticate_token($token)
    {
        $user = ApiTokens::where('api_token', $token)->first();

        return $user;
    }

    public static function sendResponse($result, $message)
    {
        $response = [
            'type' => "success",
            'data' => $result,
            'message' => $message,
        ];


        return response()->json($response, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public static function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'type' => 'error',
            'message' => $error,
            'code' => $code
        ];


        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }


        return response()->json($response, 400);
    }

    public static function timingMessages()
    {
        $greetings = "";

        /* This sets the $time variable to the current hour in the 24 hour clock format */
        $time = date("H");


        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");

        /* If the time is less than 1200 hours, show good morning */
        if ($time < "12") {
            $greetings = "Good morning";
        } else

            /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
            if ($time >= "12" && $time < "17") {
                $greetings = "Good afternoon";
            } else

                /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
                if ($time >= "17" && $time < "19") {
                    $greetings = "Good evening";
                } else

                    /* Finally, show good night if the time is greater than or equal to 1900 hours */
                    if ($time >= "19") {
                        $greetings = "Good night";
                    }
                    return $greetings;
    }
}
