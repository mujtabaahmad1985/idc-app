<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentSessions extends Model
{
    //

    public function session_items(){
        return $this->hasMany('App\SessionItems','appointment_session_id','id')->orderBy('id');
    }

    public function materials(){
        return $this->hasOne('App\Materials','id','material_id');
    }

    public function labs(){
        return $this->hasOne('App\Labs','id','lab_id');
    }

    public function doctors(){
        return $this->hasOne('App\Doctors','id','doctor_by');
    }

    public function appointments(){
        return $this->hasOne('App\Appointments','id','appointment_id');
    }
}
