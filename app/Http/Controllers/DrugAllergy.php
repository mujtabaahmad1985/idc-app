<?php

namespace App\Http\Controllers;

use App\DrugAllergies;
use App\Helpers\CommonMethods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DrugAllergy extends Controller
{
    //

    public function add(Request $request){


        $name = $request->name;

        $drug = new DrugAllergies();
        $drug->name = $name;
        $drug->cuser             = Auth::id();
        $drug->hospital_id       = CommonMethods::getHopsitalID();
        $drug->save();

        $id = $drug->id;

        if ($id > 0) {
            echo json_encode(array(
                'type' => 'success',
                'message' => 'Drug allergy is added.',
                'id' => $id,
                'name' => $request->name
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in allergy submitting, try again.'
            ));
        }
    }

    public function allergies(){

        return view('crm-configuration.drug-allergies.drug-allergies');
    }
    public function all_allergies(){
        $drug_allergies = DrugAllergies::orderBy('id','DESC')->where('hospital_id',CommonMethods::getHopsitalID())->paginate(30);
        return view('crm-configuration.drug-allergies.get-allergies',['drug_allergies'=>$drug_allergies]);
    }

    public function update_allergy(Request $request){
        $id = $request->id;
        $name = $request->name;

        $drug = DrugAllergies::find($id);
        $drug->name = $name;

        $drug->save();
    }

    public function delete_allergy($id){


        $drug = DrugAllergies::find($id);
        $drug->delete();


    }

    public function get_allergy($id){


        $drug = DrugAllergies::find($id);
        return $drug->toJson(JSON_PRETTY_PRINT);


    }


    public function save_allergy(Request $request){

        $name = $request->name;


        $id = $request->id;

        if(empty($id))
            $drug = new DrugAllergies();
        else
            $drug = DrugAllergies::find($id);


        $drug->name = $name;

        $drug->save();

        $id = $drug->id;

        if ($id > 0) {
            echo json_encode(array(
                'type' => 'success',
                'message' => 'Drug allergy is added.',
                'id' => $id,
                'name' => $request->name
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in allergy submitting, try again.'
            ));
        }
    }
}
