<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientSessions extends Model
{
    //
    public function areas(){
        return $this->belongsToMany('App\Areas','area_sessions','session_id','area_id');

    }

    public function session_descriptions(){
        return $this->hasMany("App\SessionDescriptions", "session_id",'id');
    }
}
