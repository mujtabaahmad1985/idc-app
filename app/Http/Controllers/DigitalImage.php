<?php

namespace App\Http\Controllers;

use App\DigitalImages;
use App\Patients;
use Illuminate\Http\Request;
use Validator;

class DigitalImage extends Controller
{
    //
    public  function save_image(Request $request){



        $patient_id = $request->patient_id;
        $title = $request->title;

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'file' => 'required|max:1024',
        ]);

        if ($validator->fails()) {

            $error = $validator->errors()->all();
            echo json_encode(array('type' => 'error', 'message' => $error));
            exit;
        }else {



            if ($request->hasFile('file')) {
                foreach($request->file('file') as $image):
                if ($image->isValid()) {
                    $images = new DigitalImages();

                    $images->patient_id = $patient_id;
                    $images->title = $title;
                    //
                    $file = $image;
                    $size = $file->getSize() * 1.024;


                    $filen = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                    $document_name = str_slug($filen) . '.' . $file->getClientOriginalExtension();
                    $type = $file->getClientOriginalExtension();
                    $file->move(public_path() . '/uploads/digital-imaging/patient-'. $patient_id, $document_name);


                    $images->file_name = $document_name;
                    $images->save();


                }
                endforeach;
            }


            // dd($request->all());
            $id = $images->id;
            if ($id > 0) {
                echo json_encode(array(
                    'type' => 'success',
                    'message' => 'Digital Images has been saved successfully.',

                ));
            } else {
                echo json_encode(array(
                    'type' => 'error',
                    'message' => 'Something wrong!, try again.',

                ));
            }
        }
    }

    public function get_image($id){
        $titles = DigitalImages::select('title')->where('patient_id',$id)->groupBy('title')->get();
        $titles = $titles->isNotEmpty()?$titles:NULL;
        return view('patient.digital-imaging',['titles'=>$titles,'patient_id'=>$id]);
    }

    public function get_image_by_title($title,$id){
       $digital = DigitalImages::where('title',$title)->where('patient_id',$id)->get();

        $digital = $digital->isNotEmpty()?$digital:NULL;

        return view('patient.digital-image-detail',['digitals'=>$digital,'patient_id'=>$id]);
    }
}
