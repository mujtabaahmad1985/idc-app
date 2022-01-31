<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    //
            public function clinicalDetails(){
                return $this->hasOne('App\ClinicalDetails','id','location_id');
            }
}
