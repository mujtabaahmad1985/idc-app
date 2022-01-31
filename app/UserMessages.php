<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMessages extends Model
{
    //
    public function senders(){
        return $this->belongsTo("App\User", "sender_id",'id');
    }

    public function receivers(){
        return $this->belongsTo("App\User", "receiver_id",'id');
    }

    public function patients(){
        return $this->belongsTo("App\Patients", "sender_id",'user_id');
    }
    public function staffs(){
        return $this->belongsTo("App\Staffs", "sender_id",'user_id');
    }

    public function doctors(){
        return $this->belongsTo("App\Doctors", "sender_id",'doctor_id');
    }

    public function patient_reciever(){
        return $this->belongsTo("App\Patients", "receiver_id",'user_id');
    }

    public function doctor_reciever(){
        return $this->belongsTo("App\Doctors", "receiver_id",'user_id');
    }

    public function staff_users(){
        return $this->belongsTo("App\Staffs", "receiver_id",'user_id');
    }
}
