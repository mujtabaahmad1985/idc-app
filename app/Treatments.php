<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatments extends Model
{
    //

    public function treatmentproducts(){
        return $this->hasMany("App\TreatmentProducts", "treatment_id",'id')->whereNull('deleted_at')->orderBy('id','DESC');
    }
    public function products(){
        return $this->belongsToMany('App\Products','treatment_products','treatment_id','product_id');
    }
}
