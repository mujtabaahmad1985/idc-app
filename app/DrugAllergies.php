<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrugAllergies extends Model
{
    //
    public function products(){
        return $this->belongsToMany('App\Patie','treatment_products','treatment_id','product_id')->orderBy('name','ASC');;
    }
}
