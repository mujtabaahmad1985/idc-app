<?php

namespace App\Http\Controllers;

use App\Products;
use App\TreatmentProducts;
use Illuminate\Http\Request;

class TreatmentProduct extends Controller
{
    //
    public function save_product_treatment(Request $request){
        $product_id = $request->product_id;
        $treatment_id = $request->treatment_id;

        $product = Products::find($product_id);
        if($product->quantity > 0) {

            $price = $product->price;

            $treamnt_product = new TreatmentProducts();

            $treamnt_product->product_id = $product_id;
            $treamnt_product->treatment_id = $treatment_id;
            $treamnt_product->quantity = 1;
            $treamnt_product->discount = 0;
            $treamnt_product->original_price = $price;
            $treamnt_product->price_charged = $price;

            $treamnt_product->save();
            if ($treamnt_product->id) {
                $product->quantity = $product->quantity - 1;
                $product->save();
            }
        }

        $treamnt_product = new TreatmentProducts();
        $treamnt_product = $treamnt_product->get_treatment_product($treatment_id);
       // dd($treamnt_product);

        return view('partials.treatment_product',['treatment_product'=>$treamnt_product]);
    }
    public function update_product_treatment(Request $request){

        $treatment_id = $request->treatment_id;
        $product_quantity = $request->product_quantity;
        $product_discount = $request->product_discount;
        $product_discount_price = $request->product_discount_price;

            foreach($treatment_id as $key=>$id){
                $treatment = TreatmentProducts::find($id);


                $treatment->price_charged = ($treatment->original_price * $product_quantity[$key]) - $product_discount[$key];
                $treatment->discount = $product_discount[$key];
                $treatment->quantity = $product_quantity[$key];

                $treatment->save();

            }
    }
}
