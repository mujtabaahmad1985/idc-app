<?php

namespace App\Http\Controllers;

use App\MediaFiles;
use App\Patients;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Storage;
use Illuminate\Support\Facades\Auth;

class MediaFile extends Controller
{
    //
    public function add_media(Request $request){

        return view('partials.media');
    }

    public function get_media_as_list(Request $request){
        $patient_id = $request->data['patient_id'];
        $media = MediaFiles::when($patient_id,function($query) use ($patient_id){
            if(!empty($patient_id))
                return $query->where('patient_id',$patient_id);
        })->paginate(15);
        $media = isset($media[0])?$media:NULL;
        return view('partials.get-media-list',['patient_id'=>$patient_id,'media'=>$media]);
    }

    public function get_media(Request $request){
        $patient_id = $request->data['patient_id'];
        $media = MediaFiles::when($patient_id,function($query) use ($patient_id){
            if(!empty($patient_id))
                return $query->where('patient_id',$patient_id);
        })->paginate(15);
        $media = isset($media[0])?$media:NULL;
        return view('partials.get-media',['patient_id'=>$patient_id,'media'=>$media]);
    }

    public function get_media_as_grid(Request $request){
        $patient_id = $request->data['patient_id'];
        $media = MediaFiles::when($patient_id,function($query) use ($patient_id){
            if(!empty($patient_id))
                return $query->where('patient_id',$patient_id);
        })->paginate(15);
        $media = isset($media[0])?$media:NULL;
        return view('partials.get-media-grid',['patient_id'=>$patient_id,'media'=>$media]);
    }

    public function upload_media(Request $request){

        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $file_type = $file->getClientMimeType();

        $patient = Patients::find($request->patient_id);
        $unique_id = $patient->patient_unique_id;
        $patientname = $patient->patient_name;
        $directory_name = Str::slug($unique_id.'-'.$patientname);
      //  echo $directory_name;
        $dir=  public_path().'/uploads/media/'.$directory_name.'/';
        if(!file_exists($dir.$filename)){
           // echo $filename;
          //  echo $dir;
          //  mkdir('E:\wamp64\www\idc-admin\public/uploads/media/25082193-mujtaba-ahmad/', 0777);


      $location = Storage::disk('media')->put($directory_name.'/'.$filename,file_get_contents($file));


        $media = new MediaFiles();

        $media->patient_id = $request->patient_id;
        $media->appointment_id = $request->appointment_id;
        $media->directory_name = $directory_name;
        $media->media_file_name =  $filename ;
        $media->media_file_type = $file_type;
            $media->cuser             = Auth::id();
        $media->save();

        echo $media->id;

        }
    }

    public function delete_media($id){
        $media = MediaFiles::find($id);
        $dir=  public_path().'/uploads/media/'.$media->directory_name.'/'.$media->media_file_name;
        if(file_exists($dir))
        unlink($dir);

        $media->delete();
    }
}
