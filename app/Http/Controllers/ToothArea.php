<?php

namespace App\Http\Controllers;

use App\Helpers\CommonMethods;
use App\ToothAreas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToothArea extends Controller
{
    //
    public function areas(){
        return view('crm-configuration.tooth-area.tooth-area');
    }
    public function all_areas(){
        $tooth_areas = ToothAreas::orderBy('id','DESC')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        return view('crm-configuration.tooth-area.get-tooth-areas',['tooth_areas'=>$tooth_areas]);
    }
    public function update_tooth(Request $request){
        $id = $request->id;
        $name = $request->value;

        $drug = ToothAreas::find($id);
        $drug->name = $name;
        $drug->cuser = Auth::id();
        $drug->save();
    }

    public function delete_tooth($id){


        $tooth_area = ToothAreas::find($id);
        $tooth_area->delete();


    }


    public function get_area_id($id){


        $tooth_area = ToothAreas::find($id);
        return $tooth_area->toJson(JSON_PRETTY_PRINT);


    }

    public function get_tooth_by_search(){


        //$tooth_area = ToothAreas::find($id);
       // return $tooth_area->toJson(JSON_PRETTY_PRINT);


    }


    public function save_tooth(Request $request){

        $name = $request->name;

        $id = $request->id;

        if(empty($id))
            $tooth_area = new ToothAreas();
        else
            $tooth_area = ToothAreas::find($id);


        $tooth_area->name = $name;
        $tooth_area->hospital_id = CommonMethods::getHopsitalID();

        $tooth_area->save();

        $id = $tooth_area->id;

        if ($id > 0) {
            echo json_encode(array(
                'type' => 'success',
                'message' => 'Tooth Area is added.',
                'id' => $id,
                'name' => $request->name
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in tooth submitting, try again.'
            ));
        }
    }
}
