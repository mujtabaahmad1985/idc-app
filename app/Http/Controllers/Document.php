<?php

namespace App\Http\Controllers;

use App\Documents;
use App\Folders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class Document extends Controller
{
    //

    public function delete_document($id)
    {

        $document = Documents::find($id);
        if(file_exists($_SERVER['DOCUMENT_ROOT'].'/public/uploads/documents/'.$document->document))
        unlink($_SERVER['DOCUMENT_ROOT'].'/public/uploads/documents/'.$document->document);
        $document->delete();
    }

    public function upload_document(Request $request){
       $title = $request->document_title;
        $documents = new Documents();
        $folder_id = $request->folder_id;

        if ($request->hasFile('document_file')) {
            if ($request->file('document_file')->isValid()) {
                //
                $file = $request->file('document_file');
                $size = $file->getSize() * 1.024;




                $filen = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $document_name =  Str::slug($filen).'.'. $file->getClientOriginalExtension();
                $type = $file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/documents/', $document_name);
                $documents->document = $document_name;
                $documents->document_type = 'document';
                $documents->user_type = isset($request->user_type)?$request->user_type:'staff';
                $documents->folder_id = $folder_id;
                $documents->document_title = $title;
                $documents->cuser             = Auth::id();
                //  dd($file);
                $documents->save();

                echo json_encode(array(
                    'id' => $documents->id,
                    'document_name' => $document_name,
                    'document_path' =>  url('/').'/uploads/documents/'.$documents->document,
                    'file_size' => $size,
                    'file_type' => $type
                ));

            }
        }
    }


    public function upload_documents(Request $request){

        $documents = new Documents();
        $folder_id = $request->folder_id;

        if ($request->hasFile('file')) {
            if ($request->file('file')->isValid()) {
                //
                $file = $request->file('file');
                $size = $file->getSize() * 1.024;




                $filen = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $document_name =  Str::slug($filen).'.'. $file->getClientOriginalExtension();
                $type = $file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/documents/', $document_name);
                $documents->document = $document_name;
                $documents->document_type = 'document';
                $documents->user_type = 'patient';
                $documents->folder_id = $folder_id;
                $documents->user_id = $request->patient_id;
                $documents->document_title = $document_name;

                //  dd($file);
                $documents->save();

                echo json_encode(array(
                    'id' => $documents->id,
                    'document_name' => $document_name,
                    'document_path' =>  url('/').'/uploads/documents/'.$documents->document,
                    'file_size' => $size,
                    'file_type' => $type
                ));

            }
        }
    }
    public function get_patient_documents($id){

        $folders = Folders::whereNull('deleted_at')->where('patient_id',$id)->orderBy('folder_name')->get();

        return view('documents.patient-documents',['folderss'=>$folders]);
    }
    public function get_document_by_folder(Request $request){

        $folder_id = $request->folder_id;
        $folder = Folders::find($folder_id);



        return view('documents.files',['folder'=>$folder]);
    }

    public function delete_file($id){
        $document = Documents::find($id);
        if(file_exists($_SERVER['DOCUMENT_ROOT'].'/public/uploads/documents/'.$document->document))
            unlink($_SERVER['DOCUMENT_ROOT'].'/public/uploads/documents/'.$document->document);
        $document->delete();
    }
}
