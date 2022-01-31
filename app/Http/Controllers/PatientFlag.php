<?php

namespace App\Http\Controllers;

use App\Helpers\CommonMethods;
use App\PatientFlags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientFlag extends Controller
{
    //
    public function save_flag(Request $request){
        $id = $request->id;
        if(empty($id))
        $flag = new PatientFlags();
        else
            $flag = PatientFlags::find($id);

        $flag->name = $request->name;
        $flag->color = $request->color;
        $flag->cuser = Auth::id();
        $flag->hospital_id = CommonMethods::getHopsitalID();
        $flag->save();

        $id = $flag->id;
        if ($id > 0) {


            echo json_encode(array(
                'type' => 'success',
                'message' => 'Flag is added successfully. you can view in listing.',

            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in form submitting, try again.'
            ));
        }
    }

    public function delete_flag($id){
        $flag = PatientFlags::find($id);
        $flag->delete();

    }

    public function get_flag($id){
        $flag = PatientFlags::find($id);
        return $flag->toJson(JSON_PRETTY_PRINT);

    }

    public function save_new_flag(Request $request){


        $flag = new PatientFlags();

        $flag->name = $request->value;
        $flag->color = $request->color;
        $flag->hospital_id = CommonMethods::getHopsitalID();

        $flag->save();

        $id = $flag->id;

        echo json_encode(array('id'=>$id,'name'=>$request->name));

    }
}
