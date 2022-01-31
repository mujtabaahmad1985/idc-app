<?php

namespace App\Http\Controllers;

use App\SaveItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaveItem extends Controller
{
    //

    public function get_saved_item($id){

        $items = SaveItems::where('patient_id',$id)->paginate('5');

        return view('patient.saved-items',['saved_items'=>isset($items[0])?$items:NULL]);

    }

    public function get_saved_item_data($id){
        $item = SaveItems::find($id);
        return view('patient.item-data',['saved_item'=>$item]);
    }

    public function save_item(Request $request){

            $patient_id = $request->patient_id;
            $item_id = $request->item_id;
            $notes = $request->notes;

            if(empty($item_id))
            $items = new SaveItems();
            else
            $items = SaveItems::find($item_id);

            $items->patient_id = $patient_id;
            $items->notes = $notes;


        if ($request->hasFile('saved_item_document')) {
            if ($request->file('saved_item_document')->isValid()) {
                //
                $file = $request->file('saved_item_document');
                $size = $file->getSize() * 1.024;




                $filen = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $document_name =  str_slug($filen).'.'. $file->getClientOriginalExtension();
                $type = $file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/saved-item/', $document_name);


                $items->file_name = $document_name;



            }
        }
        $items->cuser = Auth::id();
        $items->save();
       // dd($request->all());
        $id = $items->id;
        if($id > 0 ){
            echo json_encode(array(
                'type' => 'success',
                'message' => 'Item has been saved successfully.',

            ));
        }else{
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Something wrong!, try again.',

            ));
        }

    }

    public function edit_saved_item_data($id){
        $item = SaveItems::find($id);
        return json_encode(array('id'=>$item->id,'file_name'=>$item->file_name,'notes'=>$item->notes));
    }
}
