<?php

namespace App\Http\Controllers;

use App\ConsentForms;
use App\Consents;
use App\DoctorServices;
use App\Helpers\CommonMethods;
use App\Treatments;
use App\Appointments;
use App\Doctors;
use App\Patients;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Consent extends Controller
{
    //
    public function save_consent(Request $request){

        $id = $request->treatment_id;


            $consent = Consents::where('treatment_id','=',$id)->get();

        $id = isset($consent[0])?$consent[0]->id:"";
     //   echo $id; exit;
        if(empty($id))
            $consent = new Consents();
        else
            $consent = Consents::find($id);


      //  $consent = new Consents();

        $consent->treatment_id = $request->treatment_id;
        $consent->doctor_id = $request->doctor_id;
        $consent->patient_id = $request->patient_id;
        $consent->patient_family_name = $request->family_member;
        $consent->family_contact = $request->family_contact_number;
        $consent->notes = $request->notes;

      /*  if ($request->hasFile('consent_document')) {
            if ($request->file('consent_document')->isValid()) {
                //
                $file = $request->file('consent_document');

                $original_name = $file->getClientOriginalName();
                $file->move('uploads/', $original_name);
                //  dd($file);

                $consent->file_name = $original_name;
            }
        }*/
        $consent->cuser             = Auth::id();
        $consent->save();

        $id = $consent->id;
        echo $id;
    }

    public function get_consent($treatment_id){

        $treatment = Treatments::find($treatment_id);
        $appointment_id = $treatment->appointment_id;

        $appointment = Appointments::find($appointment_id);
        $doctor = Doctors::find($appointment->doctor);

        $patient_id = $treatment->patient_id;
        $patient = Patients::find($patient_id);
        $consent = Consents::where('treatment_id','=',$treatment_id)->get();

        return view('partials.get_consent',['patient'=>$patient,'doctor'=>$doctor,'consent'=>isset($consent[0])?$consent[0]:NULL]);
    }

    public function show_consent_form($patient_id,$appointment_id){
        $doctors = Doctors::whereNull('deleted_at')->get();
        $services = DoctorServices::whereNull('deleted_at')->get();
        $consent_forms = ConsentForms::all();

        return view('patient.patient-consent-form',['doctors'=>$doctors,'patient_id'=>$patient_id,'appointment_id'=>$appointment_id,'services'=>$services,'consent_forms'=>$consent_forms]);
    }

    public function list_consent_form($patient_id,$appointment_id){
        if($appointment_id > 0)
            $consent = Appointments::find($appointment_id)->consents;
        else
            $consent = Patients::find($patient_id)->consents;
        $patient = Patients::find($patient_id);
        $consents = isset($consent[0])?$consent:NULL;
        return view('patient.consent-form-lists',['consents'=>$consents,'patient_name'=>$patient->patient_name,'id'=>$patient_id]);
    }

    public function list_consent_form_by_appointments($appointment_id){
        $appoimtment = Appointments::find($appointment_id);

        $consent = Appointments::find($appointment_id)->consents;
        $patient_id = $appoimtment->patient;
        $patient_name = "";
        if($patient_id > 0){
            $patient = Patients::find($patient_id);
            $patient_name = $patient->patient_name;
        }

        $consents = isset($consent[0])?$consent:NULL;
        return view('patient.consent-form-lists',['consents'=>$consents,'patient_name'=>$patient_name,'id'=>$patient_id,'appointment_id'=>$appointment_id]);
    }

    public function consent_save(Request $request){
        $id = $request->id;

        if(empty($id))
            $consent = new Consents();
        else
            $consent = Consents::find($id);

        $consent->consent_for = $request->consent_for;
        $consent->patient_id = $request->patient_id;
        $consent->procedures = $request->procedures;
        $consent->doctor_id = $request->doctor_id;
        $consent->consent_form_id = $request->consent_form_id;
        $consent->appointment_id = $request->appointment_id;
        $consent->treatment_id = $request->treatment_id;
        $consent->addtional_procedures = is_array($request->addtional_procedures)?implode(',',$request->addtional_procedures):NULL;
        $consent->medications = implode(',',$request->medications);
        $consent->alternative_options = $request->alternative_options;
        $filename = "";
        if(!empty($request->patient_signature)):
            $img = str_replace('data:image/png;base64,', '', $request->patient_signature);

            $img = str_replace(' ', '+', $img);
            $fileData = base64_decode($img);

            $filename = date('dmYHi');
            $fileName = public_path().'/uploads/consent-signature/'.$filename.'.jpg';
            file_put_contents($fileName, $fileData);
            $consent->patient_signature = $filename.'.jpg';
        endif;



        $consent->save();

        echo $consent->id;


    }
    public function consent_print(Request $request){
        $patient_id = $request->patient_id;
        $consent_for = $request->consent_for;
        $doctor = Doctors::find($request->doctor_id);
        $patient = Patients::find($patient_id);
        $fileName = "";
        if(!empty($request->patient_signature)):
        $img = str_replace('data:image/png;base64,', '', $request->patient_signature);

        $img = str_replace(' ', '+', $img);
        $fileData = base64_decode($img);

        $filename = date('dmYHi');
        $fileName = public_path().'/uploads/consent-signature/'.$filename.'.jpg';
        file_put_contents($fileName, $fileData);
        endif;
        $array = array(
                            'consent_for' => $consent_for,
                            'doctor_name' => $request->doctor_id > 0 ? $doctor->fname.' '.$doctor->lname:"",
                            'procedures'   => $request->procedures,
                            'addtional_procedures' => $request->addtional_procedures,
                            'medications'         => $request->medications,
                            'alternative_options' => $request->alternative_options,
                            'patient_name'        => $patient->patient_name,
                            'patient_signature'     => $fileName
        );




        $pdf = PDF::loadView('pdf.consent-form', ['array'=>$array]);


        $consent_file_name = $patient->patient_name.'-'.$patient_id.'-'.date('dmYHis').'-'.$request->consent_for.'';
        $consent_file_name = Str::slug($consent_file_name).'.pdf';
        return $pdf->download($consent_file_name);
    }

    public function get_detail($id){
        $consent = Consents::find($id);
        $doctor = Doctors::find($consent->doctor_id);
        $patient = Patients::find($consent->patient_id);
        $array = array(
            'consent_for' => $consent->consent_for,
            'doctor_name' => $consent->doctor_id > 0 ? $doctor->fname.' '.$doctor->lname:"",
            'procedures'   => $consent->procedures,
            'addtional_procedures' => $consent->addtional_procedures,
            'medications'         => explode(',',$consent->medications),
            'alternative_options' => $consent->alternative_options,
            'patient_name'        => $patient->patient_name,
            'patient_signature'     => public_path().'/uploads/consent-signature/'.$consent->patient_signature
        );

        $pdf = PDF::loadView('pdf.consent-form', ['array'=>$array]);

        //echo "s".$pdf;
        if(file_exists(public_path().'/view-consent.pdf'))
        unlink(public_path().'/view-consent.pdf');

         $save =  $pdf->save(public_path().'/view-consent.pdf');
         $object = '<div class="center">
                        <object data="'.url('/').'/view-consent.pdf'.'" type="application/pdf" width="700" height="1000">
                            alt : <a href="'.url('/').'/view-consent.pdf'.'">view-consent.pdf</a>
                        </object>
                    </div>';
         echo $object;
    }

    public function delete_consent($id){
        $consent = Consents::find($id);
        $consent->deleted_at  = Carbon::now();
        $consent->save();
    }

    public function search_consent_form_by_patient($name){
        $patient_id = $_GET['patient_id'];
        echo $patient_id;
    }

    public function show_saved_form($id){
        $id = CommonMethods::decrypt($id);
        $form = Consents::find($id);

        return view('patient.show-consent-form',['form'=>$form]);
    }

    public function edit_consent_form(Request $request){
        $id = $request->id;
        $form = Consents::find($id);

        $doctors = Doctors::whereNull('deleted_at')->get();
        $services = DoctorServices::whereNull('deleted_at')->get();
        $consent_forms = ConsentForms::all();

        return view('patient.patient-consent-form',[
            'doctors'=>$doctors,
            'patient_id'=>$form->patient_id,
            'appointment_id'=>$form->appointment_id,
            'services'=>$services,
            'consent_forms'=>$consent_forms,
            'consent_form'     => $form
        ]);
    }

    public function print_pdf_consent_form($id){
        $id = CommonMethods::decrypt($id);

        $consent_form = Consents::find($id);
        $name = $consent_form->consent_forms->name;


        $pdf = PDF::loadView('pdf.'.Str::slug($name),['data'=>$consent_form]);

        $consent_file_name = $consent_form->patients->patient_name.'-'.$consent_form->patient_id.'-'.date('dmYHis').'-'.$consent_form->consent_for.'';
        $consent_file_name = Str::slug($consent_file_name).'.pdf';
        return $pdf->download($consent_file_name);
    }

    public function delete_consent_form(Request $request){
        $id =$request->id;
        $consent_form = Consents::find($id);
        $consent_form->deleted_at = date('Y-m-d H:i:s');
        $consent_form->save();

    }

}
