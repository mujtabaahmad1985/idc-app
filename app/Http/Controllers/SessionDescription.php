<?php

namespace App\Http\Controllers;

use App\SessionDescriptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionDescription extends Controller
{
    //
    public function new_description($id){
        return view('patient.add-description',['session_id'=>$id]);
    }

    public function save_session_description(Request $request){
        $session_id = $request->session_id;

        $d = SessionDescriptions::where('session_id',$session_id)->delete();
        $description = $request->description;

        $session_description = new SessionDescriptions();
        $session_description->session_id = $session_id;
        $session_description->description = $description;
        $session_description->cuser = Auth::id();
        $session_description->save();

        $id  = $session_description->id;

        if ($id > 0) {
            echo json_encode(array(
                'type' => 'success',
                'message' => 'Description is saved successfully with selected session.',

            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in description submitting, try again.'
            ));
        }
    }
}
