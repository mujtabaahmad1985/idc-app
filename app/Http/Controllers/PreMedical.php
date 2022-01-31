<?php

namespace App\Http\Controllers;

use App\Helpers\CommonMethods;
use App\Products;
use Illuminate\Http\Request;
use App\PreMedicals;
use Illuminate\Support\Facades\Auth;

class PreMedical extends Controller
{
    //
    public function pre_medicals(){

        return view('crm-configuration.pre-medicals.pre-medicals');
    }
    public function all_pre_medicals(){
        $pre_medicals = PreMedicals::orderBy('name','ASC')->where('hospital_id',CommonMethods::getHopsitalID())->paginate(30);
        return view('crm-configuration.pre-medicals.get-pre-medicals',['pre_medicals'=>$pre_medicals]);
    }

    public function update_pre_medicals(Request $request){
        $id = $request->id;
        $name = $request->value;

        $pre_medicals = PreMedicals::find($id);
        $pre_medicals->name = $name;

        $pre_medicals->save();
    }

    public function delete_pre_medicals($id){


        $pre_medicals = PreMedicals::find($id);
        $pre_medicals->delete();


    }

    public function get_medications(Request $request){
        $id = $request->id;

        $pre_medicals = PreMedicals::find($id);
        return $pre_medicals->toJson(JSON_PRETTY_PRINT);


    }
    public function save_pre_medicals(Request $request){

        $name = $request->name;
        $id = $request->id;

        if(empty($id))
        $pre_medicals = new PreMedicals();
        else
        $pre_medicals = PreMedicals::find($id);
        $pre_medicals->name = $name;
        $pre_medicals->cuser = Auth::id();
        $pre_medicals->hospital_id = CommonMethods::getHopsitalID();
        $pre_medicals->save();

        $id = $pre_medicals->id;

        if ($id > 0) {
            echo json_encode(array(
                'type' => 'success',
                'message' => 'Medications is added.',
                'id' => $id,
                'name' => $request->name
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in medications submitting, try again.'
            ));
        }
    }

    public function get_pre_medicals_by_name($name){
       // dd($name);
        $pre_medications = Products::where('product_title','LIKE','%'.$name.'%')->get();
//dd($pre_medications);
        $array = [];

        if($pre_medications->count() > 0){
            foreach($pre_medications as $medication){
                $array[] = array(
                    'id'=>$medication->id,
                    'text'=>$medication->product_title
            );
            }

        }

        if(!is_null($array))
            $array1['results'] = $array;
        else
            $array1['results'] = array();
        echo json_encode($array1);
    }

}
