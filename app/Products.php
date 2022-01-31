<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //


    public function treatment_products(){
        return $this->hasMany("App\TreatmentProducts", "product_id",'id')->whereNull('deleted_at')->orderBy('id','DESC');
    }
    public function patients(){
        return $this->belongsToMany('App\Patients','medication_patients','pre_medical_id','patient_id');
    }

    public function medication_categories(){
        return $this->hasOne("App\MedicationCategories", "id",'category_id');
    }

    public function medication_sub_categories(){
        return $this->hasOne("App\MedicationCategories", "id",'sub_category_id');
    }

    public function medication_brands(){
        return $this->hasOne("App\MedicationBrands", "id",'brand_id');
    }

    public function product_purchases(){
        return $this->hasMany("App\ProductPurchases", "product_id",'id')->whereNull('deleted_at')->orderBy('id','DESC');
    }

    public function session_items(){
        return $this->hasMany('App\SessionItems','product_id','id')->whereNull('deleted_at')->orderBy('id','DESC');;
    }
}
