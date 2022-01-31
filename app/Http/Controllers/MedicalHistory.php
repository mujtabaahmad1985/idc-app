<?php

namespace App\Http\Controllers;

use App\MedicalHistories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Patients;
use App\Medicals;

class MedicalHistory extends Controller
{
    //
    public function save_medical_history(Request $request){

        $patient_id = $request->patient_id;
        $illness = implode(',',$request->illness);

        $medical_history = new MedicalHistories();

        $medical_history->date_of_history = date('Y-m-d');
        $medical_history->medical_history_text = $request->description;
        $medical_history->illness = $illness;
        $medical_history->patient_id = $patient_id;
        $medical_history->cuser = Auth::id();
        $medical_history->save();
        $id = $medical_history->id;




        if($id > 0)
            echo json_encode(array('type' => 'success', 'message' => "Medical history is saved successfully."));
        else
            echo json_encode(array('type' => 'error', 'message' => "Some issue has been occured, try again!"));



    }


    public function get_medical_history($id){
        $medical_history = Patients::find($id)->medical_histories()->paginate(5);
        return view('patient.medical-history',['medical_history'=>isset($medical_history[0])?$medical_history:NULL]);
    }

    public function get_medical_history_by_id_for_profile_page($id){
        $medical_history = Patients::find($id)->medical_histories()->paginate(5);
        return view('patient.medical-history-for-profile-page',['medical_history'=>isset($medical_history[0])?$medical_history:NULL]);
    }

    public function get_medical_history_by_id($id){
        $medical_history = MedicalHistories::find($id);
        $result = array('illness_db'=>$medical_history->illness,'text'=>$medical_history->medical_history_text,'illness'=>str_replace('_',' ',ucwords($medical_history->illness)));
        echo json_encode($result) ;
    }

    public function edit_medical_history($id){

    }
    public function delete_medical_history($id){
        $medical_history = MedicalHistories::find($id);
        $medical_history->deleted_at = date('Y-m-d H:i:s');
        $medical_history->save();
    }
}
