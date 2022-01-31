<?php

namespace App\Http\Controllers;

use App\Helpers\CommonMethods;
use App\MedicationCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MedicationCategory extends Controller
{
    //
    public function save_category(Request $request){
        $id = $request->id;
        $parent_id = $request->category_id;

        if(!empty($id))
            $category = MedicationCategories::find($id);
        else
            $category = new MedicationCategories();
        if(!empty($parent_id))
            $category->parent_id = $parent_id;
        $category->name = $request->category_name;
        $category->cuser             = Auth::id();
        $category->hospital_id   = CommonMethods::getHopsitalID();
        $category->save();
        $c_id = $category->id;
        if($c_id) {
            if(empty($id))
                echo json_encode(array('type' => 'success', 'message' => 'Category is saved successfully.', 'id' => $id, 'name' => $request->category_name));
            else
                echo json_encode(array('type' => 'update', 'message' => 'Category is updated successfully.', 'id' => $id, 'name' => $request->category_name));
        }
        else
            echo json_encode(array('type' => 'error','message'=>'There is something wrong, try again'));
    }

    public function get_categories(){
        $categories = MedicationCategories::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->where('parent_id',0)->get();

        return view('medication-categories.categories-list',['categories'=>$categories]);
    }

    public function get_sub_categories($id){
        $categories = MedicationCategories::whereNull('deleted_at')->where('parent_id',$id)->where('hospital_id',CommonMethods::getHopsitalID())->get();
        if(isset($categories) && $categories->count() > 0){
            $c = [];
            foreach($categories as $category){
                $c[] = array(
                    'id' => $category->id,
                    'name' => $category->name
                );
            }
            echo json_encode($c);
        }else{
            echo json_encode([]);
        }
    }
}
