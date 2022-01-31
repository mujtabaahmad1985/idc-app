<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AppointmentActivities extends Model
{
    //

    public static function add_appointment_activity($appointment_id,$status){
        $activity = new AppointmentActivities();

        $activity->appointment_id = $appointment_id;
        $activity->user_id = Auth::id();
        $activity->status = $status;
        $activity->save();
    }

    public function users(){
        return $this->hasOne('App\User','id','user_id');
    }
}
