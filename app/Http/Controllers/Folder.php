<?php

namespace App\Http\Controllers;

use App\Folders;
use Illuminate\Http\Request;
use App\Activities;
use Illuminate\Support\Str;
use Auth;

class Folder extends Controller
{
    //

    public function create_folder(Request $request){
        $id = $request->folder_id;

        $staff_id = isset($request->staff_id)?$request->staff_id:NULL;
        $patient_id = isset($request->patient_id)?$request->patient_id:NULL;
        $add_new_folder = $request->add_new_folder;
        $slug = Str::slug($add_new_folder);
        if(empty($id))
        $folder = new Folders();
        else
            $folder = Folders::find($id);
        $folder->folder_name = $add_new_folder;
        $folder->slug = $slug;
        $folder->staff_id = $staff_id;
        $folder->patient_id = $patient_id;
        $folder->save();

        $id =  $folder->id;

        if ($id > 0) {

            $activity = new Activities();



            $activity->activity_title = 'Directory creation';
            $activity->activity_description =  'Directory name <strong>'.$add_new_folder.'</strong>';
            $activity->created_by = Auth::id();

            $activity->save();
            if(!empty($patient_id))
            $folders = Folders::whereNull('deleted_at')->where('patient_id',$patient_id)->orderBy('folder_name')->get();

            if(!empty($staff_id))
                $folders = Folders::whereNull('deleted_at')->where('staff_id',$staff_id)->get();

            echo json_encode(array(
                'type' => 'success',
                'message' => 'Folder is added successfully.',
                'data'=> $folders->toArray()
                )
            );
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in folder creation, try again.'
            ));
        }
    }
    public function create_directory(Request $request){
        $patient_id = $request->patient_id;
        $add_new_folder = $request->add_new_folder;
        $slug = str_slug($add_new_folder);
        $folder = new Folders();

        $folder->folder_name = $add_new_folder;
        $folder->slug = $slug;
        $folder->patient_id = $patient_id;

        $folder->save();

        $id =  $folder->id;

        if ($id > 0) {

            $activity = new Activities();



            $activity->activity_title = 'Directory creation';
            $activity->activity_description =  'Directory name <strong>'.$add_new_folder.'</strong>';
            $activity->created_by = Auth::id();

            $activity->save();

            echo json_encode(array(
                'type' => 'success',
                'message' => 'Folder is added successfully.',
                'data' => array('id'=>$id,'name'=>$add_new_folder )
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in folder creation, try again.'
            ));
        }
    }
    public function delete_folder($id){
        $folder = Folders::find($id);
        $folder->deleted_at = date('Y-m-d H:i:s');
        $folder->save();
}
}
