<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class TreatmentProducts extends Model
{
    //

    public function get_treatment_product($treatment_id){
        return DB::table('treatment_products as treatment_products')
            ->select('product.product_title as product_title','product.id as product_id','product.product_code as product_code','treatment_products.id as t_p_id','treatment_products.original_price as original_price','treatment_products.discount as discount','treatment_products.quantity as quantity','treatment_products.price_charged as price_charged')
            ->join('products as product','product.id','=','treatment_products.product_id')
            ->where('treatment_products.treatment_id',$treatment_id)
            ->get();
    }
}
