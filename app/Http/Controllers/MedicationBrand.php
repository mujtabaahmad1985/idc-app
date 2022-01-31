<?php

namespace App\Http\Controllers;

use App\Helpers\CommonMethods;
use App\MedicationBrands;
use Google\Service\CloudIAP\Brand;
use Illuminate\Http\Request;
use Auth;
class MedicationBrand extends Controller
{
    //
    public function save_brand(Request $request){

        $id = $request->id;

        if(empty($id))
            $brand = new MedicationBrands();
        else
            $brand = MedicationBrands::find($id);

        $brand->brand_name = $request->brand_name;
        $brand->cuser             = Auth::id();
        $brand->hospital_id = CommonMethods::getHopsitalID();
        $brand->save();
        $b_id = $brand->id;
        if($b_id) {
            if(empty($id))
                echo json_encode(array('type' => 'success', 'message' => 'Brand is saved successfully.', 'id' => $id, 'name' => $request->brand_name));
            else
                echo json_encode(array('type' => 'update', 'message' => 'Brand is updated successfully.', 'id' => $id, 'name' => $request->brand_name));
        }
        else
            echo json_encode(array('type' => 'error','message'=>'There is something wrong, try again'));
    }

    public function get_brands()
    {
        $brands = MedicationBrands::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        return view('brands.brands-lists',['brands'=>$brands]);


    }




}
