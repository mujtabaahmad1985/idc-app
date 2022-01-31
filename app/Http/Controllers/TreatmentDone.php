<?php

namespace App\Http\Controllers;

use App\TreatmentDones;
use Illuminate\Http\Request;

class TreatmentDone extends Controller
{
    //

    public function save_treatment_done(Request $request){

        $id = $request->id;
        if(empty($id))
            $treatment_done = new TreatmentDones();
        else
            $treatment_done = TreatmentDones::find($id);

        $treatment_done->patient_id = $request->patient_id;
        $treatment_done->appointment_id = $request->appointment_id;
        $treatment_done->treatment_description = $request->treatment_done;

        $treatment_done->save();

        $id = $treatment_done->id;

        if($id > 0){
            $all_treatment_done = TreatmentDones::whereNull('deleted_at')->where('patient_id',$request->patient_id)->where('appointment_id',$request->appointment_id)->get();
            $data = array(
                'type'=>'success',
                'message' => 'Treatment description is added.',
                'existing_records'=>$all_treatment_done
            );
            echo json_encode(['data'=>$data]);
        }else{

        }
    }

    public function delete_treatment_done($id){
        $t = TreatmentDones::find($id);
        $t->deleted_at = date('Y-m-d H:i:s');
        $t->save();
    }
}
