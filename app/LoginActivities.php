<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginActivities extends Model
{
    //
    public function users(){
        return $this->hasOne('App\User','id','user_id');
    }
}
