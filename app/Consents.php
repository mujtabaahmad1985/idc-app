<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consents extends Model
{
    //
    public function getFullProceduresConsent(){
        return $this->procedures.' '.date('m.y.Y',strtotime($this->created_at));
    }

    public function doctors(){
        return $this->hasOne('App\Doctors','id','doctor_id');
    }

    public function patients(){
        return $this->hasOne('App\Patients','id','patient_id');
    }
    public function consent_forms(){
        return $this->hasOne('App\ConsentForms','id','consent_form_id');
    }



}
