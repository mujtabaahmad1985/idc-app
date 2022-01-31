<?php

namespace App\Http\Controllers;

use App\Areas;
use App\PatientSessions;
use Illuminate\Http\Request;
use App\Patients;

class PatientSession extends Controller
{
    //
    public function get_sessions(){

        return view('patient.sessions');
    }

    public function save_session(Request $request){
       dd($request->all());
//
        $session = new PatientSessions();

        $session->patient_id    = $request->patient_id;
        $session->treatment_done    = $request->treatment_done;
        $session->session_date_time    = date('Y-m-d H:i:s', strtotime($request->session_date));

        $document_name = "";

       /* if ($request->hasFile('session_file')) {
            if ($request->file('session_file')->isValid()) {
                //




                $filen = pathinfo($request->file('session_file')->getClientOriginalName(), PATHINFO_FILENAME);
                $document_name =  str_slug($filen).'.'. $request->file('session_file')->getClientOriginalExtension();

                $file = $request->file('session_file')->move(public_path().'/uploads/patient-sessions/', $document_name);;




            }
        }
        $session->file_name = $document_name;*/
        $session->save();
        $id = $session->id;
        if($id > 0)
        echo json_encode(array('type'=>'success','message'=>'Session information saved.','id'=>$session->id));
        else
         echo json_encode(array('type'=>'error','message'=>'Session information is not saved.'));


    }

    public function get_session($id){
        $sess = Patients::find($id)->patient_sessions()->paginate(4);
        $sessions = isset($sess[0])?$sess:NULL;

        return view('patient.sessions',['sessions'=>$sessions]);
    }
}
