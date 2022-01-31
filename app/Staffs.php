<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staffs extends Model
{
    //
    public function users(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function folders(){
        return $this->hasMany("App\Folders", "staff_id",'id')->whereNull('deleted_at')->orderBy('id','DESC');
    }
}
