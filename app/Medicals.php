<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicals extends Model
{
    //

    public function patietns(){
      //  return $this->be("App\Medicals", "patient_id",'id')->orderBy('id','DESC');
        return $this->belongsTo('App\Patients','patient_id','id');
    }
}
