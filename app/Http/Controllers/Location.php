<?php

namespace App\Http\Controllers;

use App\Helpers\CommonMethods;
use App\Locations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Location extends Controller
{
    //

    public function get_locations(){
        $locations = Locations::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        return view('setup.locations',['locations'=>$locations]);
    }

    public function add_location(Request $request){

        $location = new Locations();

        $location->name = $request->name;
        $location->zip_code = $request->zip_code;
        $location->address = $request->address;
        $location->color_show = $request->color_show;
        $location->notes = $request->notes;
        $location->cuser             = Auth::id();
        $location->hospital_id       = CommonMethods::getHopsitalID();
        $location->save();

        $id = $location->id;

        if ($id > 0) {


            echo json_encode(array(
                'type' => 'success',
                'message' => 'Location is added successfully. you can view in listing.',
                'id' => $id,
                'name' => $request->name

            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in user submitting, try again.'
            ));
        }

    }

    public function edit_location(Request $request){
        $id = $request->id;
        $location = Locations::find($id);

        $location->name = $request->name;
        $location->zip_code = $request->zip_code;
        $location->address = $request->address;
        $location->color_show = $request->color_show;
        $location->notes = $request->notes;
        $location->save();

        $id = $location->id;

        if ($id > 0) {
            echo json_encode(array(
                'type' => 'success',
                'message' => 'Location is updated successfully. you can view in listing.'
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in user submitting, try again.'
            ));
        }

    }
    public function get_location($id){
        $location = Locations::where('id','=',$id)->get();

        $array = array(
            'name' => $location[0]->name,
            'zip_code' => $location[0]->zip_code,
            'address' => $location[0]->address,
            'notes' => $location[0]->notes
        );

        echo json_encode($array);
    }

    public function delete_location($id){
        $location = Locations::find($id);
        $location->deleted_at = date('Y-m-d H:i:s');

        $location->save();
    }
}
