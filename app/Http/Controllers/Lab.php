<?php

namespace App\Http\Controllers;

use App\Helpers\CommonMethods;
use App\Labs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Lab extends Controller
{
    //

    public function get_labs(){
            $labs = Labs::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        return view('setup.labs',['labs'=>$labs]);
    }

    public function save_lab(Request $request){
        $id = $request->id;

        if(empty($id))
            $lab = new Labs();
        else
            $lab = Labs::find($id);

        $lab->name = $request->name;
        $lab->registration_number = $request->registration_number;
        $lab->bank_account = $request->bank_account;
        $lab->phone_number = $request->phone_number;
        $lab->email = $request->email;
        $lab->address = $request->address;
        $lab->cuser = Auth::id();
        $lab->hospital_id = CommonMethods::getHopsitalID();
        $lab->save();
        $lab_id = $lab->id;

        if ($lab_id > 0) {
            $type = empty($id)?"success":"update";
            echo json_encode(array(
                'type' => $type,
                'message' => 'Lab is saved successfully. you can view in listing.'
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in lab submitting, try again.'
            ));
        }
    }


    public function get_lab_by_id($id){
        $lab = Labs::find($id);

        echo json_encode(array(
            'id' => $lab->id,
            'name' => $lab->name,
            'registration_number' => $lab->registration_number,
            'bank_account' => $lab->bank_account,
            'phone_number' => $lab->phone_number,
            'email' => $lab->email,
            'address' => $lab->address,
        ));
    }

    public function delete_lab($id){
        $lab = Labs::find($id);

        $lab->deleted_at = date('Y-m-d H:i:s');
        $lab->save();
    }
}
