<?php

namespace App\Http\Controllers;

use App\Areas;
use App\AreaSessions;
use Illuminate\Http\Request;

class Area extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function new_area($id){
        $areas = Areas::all();

        return view('patient.add-area',['session_id'=>$id,'areas'=>$areas->isNotEmpty()?$areas:NULL]);
    }

    public function save_session_area(Request $request){
       $areas = $request->areas;
       $session_id = $request->session_id;


       $d = AreaSessions::where('session_id',$session_id)->delete();

       foreach($areas as $a){
           $area_session = new AreaSessions();
           $area_session->session_id = $session_id;
           $area_session->area_id = $a;

           $area_session->save();
           $id = $area_session->id;
       }

        if ($id > 0) {
            echo json_encode(array(
                'type' => 'success',
                'message' => 'Area is saved successfully with selected session.',

            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in user submitting, try again.'
            ));
        }
    }
    
    public function save_area(Request $request){
        $name = $request->area;

        $area = new Areas();
        $area->name = $name;
        $area->save();

        $id = $area->id;

        if ($id > 0) {
            echo json_encode(array(
                'type' => 'success',
                'message' => 'Area is added.',
                'id' => $id,
                'name' => $name
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in user submitting, try again.'
            ));
        }
    }
}
