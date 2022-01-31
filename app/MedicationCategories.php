<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicationCategories extends Model
{
    //
    public function medication_categories(){
        return $this->belongsTo(self::class, 'parent_id','id');
    }

    public function sub_categories()
    {
        return $this->hasMany(MedicationCategories::class,'parent_id','id')->with('medication_categories');
    }


}
