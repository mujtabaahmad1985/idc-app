<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SessionItems extends Model
{
    //
    public function products(){
        return $this->hasOne('App\Products','id','product_id');
    }

    public function patients(){
        return $this->hasOne('App\Patients','id','patient_id');
    }

    public function appointments(){
        return $this->hasOne('App\Appointments','id','appointment_id');
    }

    public static function getSessionPaidAmount($appointment_id,$session_id){
        $amount = SessionItems::where('appointment_id',$appointment_id)->where('appointment_session_id',$session_id)->pluck('item_price')->toArray();
        $amount = array_sum($amount);
        return $amount;
    }

    public static function getSessionDiscountAmount($appointment_id,$session_id){
        $discount = SessionItems::where('appointment_id',$appointment_id)->where('appointment_session_id',$session_id)->pluck('item_discount')->toArray();
        $discount = array_sum($discount);
        return $discount;
    }
}
