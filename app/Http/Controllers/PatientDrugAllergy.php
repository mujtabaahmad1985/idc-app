<?php

namespace App\Http\Controllers;

use App\DrugAllergies;
use App\PatientDrugAllergies;
use DoctrineTest\InstantiatorTestAsset\PharAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PatientDrugAllergy extends Controller
{
    //

    public function add(Request $request){
        //dd($request->all());
        $patient_id = $request->patient_id;
        $drugs = $request->drugs;



      /*  $p_d = PatientDrugAllergies::where('patient_id',$patient_id)->get();

        if($p_d->isNotEmpty()){

            $p_d = PatientDrugAllergies::where('patient_id',$patient_id)->delete();
        }*/




            $a_d = PatientDrugAllergies::where('drug_id',$drugs)->where('patient_id',$patient_id)->get();

            if(!isset($a_d[0])){

                $patient_drug = new PatientDrugAllergies();
                $patient_drug->patient_id = $patient_id;
                $patient_drug->drug_id = $drugs;
                $patient_drug->cuser = Auth::id();
                $patient_drug->save();
                $id = $patient_drug->id;
                echo json_encode(array('type'=>'success','message'=>'Drug allergy are added.','id'=>$id,'created_at'=>date('d.m.Y H:i:s',strtotime($patient_drug->created_at))));
                exit;
            }

        echo json_encode(array('type'=>'error','message'=>'Drug allergy is already added.'));




    }

    public function delete_drug_allergy($id){
        $patient_drug = PatientDrugAllergies::find($id);
        $patient_drug->delete();
    }

    public function save(Request $request){

    }
}
