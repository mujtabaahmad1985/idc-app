<?php

namespace App\Http\Controllers;

use App\Helpers\CommonMethods;
use App\Materials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Material extends Controller
{
    //

    public function get_materials(){
        $materials = Materials::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        return view('setup.materials',['materails'=>$materials]);
    }

    public function save_material(Request $request){
        $id = $request->id;

        if(empty($id))
            $material = new Materials();
        else
            $material = Materials::find($id);

        $material->name = $request->name;
        $material->price = number_format($request->price,2);
        $material->description = $request->description;
        $material->cuser             = Auth::id();
        $material->hospital_id       = CommonMethods::getHopsitalID();
        $material->save();
        $material_id = $material->id;

        if ($material_id > 0) {
            $type = empty($id)?"success":"update";
            echo json_encode(array(
                'type' => $type,
                'message' => 'Material is saved successfully. you can view in listing.'
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in material submitting, try again.'
            ));
        }
    }

    public function get_material_by_id($id){
            $material = Materials::find($id);

            echo json_encode(array(
                'id' => $material->id,
                'name' => $material->name,
                'price' => $material->price,
                'description' => $material->description
            ));
    }

    public function delete_material($id){
        $material = Materials::find($id);

        $material->deleted_at = date('Y-m-d H:i:s');
        $material->save();
    }
}
