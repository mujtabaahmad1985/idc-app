<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leaves extends Model
{
    //

    public function users(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
