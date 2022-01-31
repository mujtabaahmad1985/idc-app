<?php

namespace App\Http\Controllers;

use App\Helpers\CommonMethods;
use App\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Room extends Controller
{
    //
    public function search_rooms(){
        $name = $_GET['q'];
        header('Content-Type: application/json');


        $rooms = Rooms::whereNull('deleted_at')->where('name','LIKE','%'.$name.'%')->orWhere('short_name','LIKE','%'.$name.'%')

            ->where('hospital_id',CommonMethods::getHopsitalID())->get();
        //echo "<pre>"; print_r($patients);
        $array = NULL;
        foreach($rooms as $room){
            $array[] = array(
                'id' => $room->id,
                'text' => $room->name,
                'short_name' => $room->short_name,

                'searched_data_type'=> 'Room'
            );
            //$array[] = $patient->patient_name;
        }

        // if(is_null($array))

        //   $array[] = array('id'=>0,'name'=>'Add patient');
        $array1['data']['rooms'] = $array;
        echo json_encode($array1);
    }
    public function get_rooms(){

        $rooms = Rooms::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();

        return view('setup.rooms',['rooms'=>$rooms]);
    }

    public function add_room(Request $request){

        $room = new Rooms();

        $room->name = $request->name;
        $room->short_name = $request->short_name;
        $room->color        = $request->color;
        $room->cuser = Auth::id();
        $room->cuser = CommonMethods::getHopsitalID();
        $room->hospital_id = CommonMethods::getHopsitalID();
        $room->save();

        $id = $room->id;

        if ($id > 0) {
            echo json_encode(array(
                'type' => 'success',
                'message' => 'Room is added successfully. you can view in listing.'
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in user submitting, try again.'
            ));
        }
    }

    public function edit_room(Request $request){
        $id = $request->id;
        $room = Rooms::find($id);

        $room->name         = $request->name;
        $room->short_name   = $request->short_name;
        $room->color        = $request->color;
        $room->hospital_id  = CommonMethods::getHopsitalID();
        $room->save();

        $id = $room->id;

        if ($id > 0) {
            echo json_encode(array(
                'type' => 'success',
                'message' => 'Room is updated successfully. you can view in listing.'
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in user submitting, try again.'
            ));
        }
    }

    public function get_room($id){
        $room = Rooms::where('id','=',$id)->get();

        $array = array(
            'name' => $room[0]->name,
            'short_name' => $room[0]->short_name
        );

        echo json_encode($array);
    }

    public function delete_room($id){
        $room = Rooms::find($id);
        $room->deleted_at = date('Y-m-d H:i:s');
        $room->save();
    }
}
