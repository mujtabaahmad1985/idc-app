<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientDrugAllergies extends Model
{
    //
    public function drug_allergies(){
        return $this->belongsTo('App\DrugAllergies','drug_id','id');
    }
}
