<?php

namespace App\Http\Controllers;

use App\Helpers\CommonMethods;
use App\Manufactures;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use File;

class Manufacture extends Controller
{
    //

    public function manufactures_list(){
        $manufactures = Manufactures::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        return view('products.manufactures',['manufactures'=>$manufactures]);
    }

    public function save_manufactures(Request $request){
        $id = $request->id;

        if(empty($id))
            $manufature = new Manufactures();
        else
            $manufature = Manufactures::find($id);

        $manufature->name = $request->name;
        $manufature->phone_number = $request->phone;
        $manufature->email = $request->email;
        $manufature->address = $request->address;
        $manufature->cuser             = Auth::id();
        $manufature->hospital_id = CommonMethods::getHopsitalID();
        if($request->hasFile('logo')){
            $logo = $request->file('logo');



            $file_name = "manufature-".Str::slug($request->name)."-logo".'-'.time();
            $extension = $logo->getClientOriginalExtension();



            Storage::disk('manufacture_logo')->put($file_name.'.'.$extension,  File::get($logo));





            $manufature->logo = $file_name.'.'.$extension;



            //$resto->text =
        }

        $manufature->save();

        $id = $manufature->id;

        if ($id > 0) {

            echo json_encode(array(
                'type' => 'success',
                'message' => 'Manufacture information is added successfully. you can view in listing.'
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in manufacture submitting, try again.'
            ));
        }
    }

    public function edit_manufactures($id){
        $manufacture = Manufactures::find($id);
        return $manufacture->toJSON();
    }

    public function delete_manufactures($id){
        $manufacture = Manufactures::find($id);
        $manufacture->deleted_at = date('Y-m-d H:i:s');
        $manufacture->save();
    }
}
