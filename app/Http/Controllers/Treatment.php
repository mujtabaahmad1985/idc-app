<?php

namespace App\Http\Controllers;

use App\Appointments;
use App\AppointmentSessions;
use App\AssignedFlags;
use App\Consents;
use App\DigitalImages;
use App\Folders;
use App\Helpers\CommonMethods;
use App\Labs;
use App\Materials;
use App\MediaFiles;
use App\PatientFlags;
use App\Patients;
use App\Permissions;
use App\PreMedicals;
use App\Products;
use App\SaveItems;
use App\SessionItems;
use App\Treatments;
use App\User;
use Illuminate\Http\Request;
use App\DrugAllergies;
use App\MedicalConditions;
use App\Medicals;
use App\Doctors;
use App\ToothAreas;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PDF;

class Treatment extends Controller
{
    //
    public function save_treatment(Request $request){

        $id = $request->treatment_id;

         if(empty($id)){

             $treatment = new Treatments();
         }else{
             $treatment = Treatments::find($id);
         }
         if(!empty($request->patient_id))
        $treatment->patient_id         = $request->patient_id;
        $treatment->appointment_id         = $request->appointment_id;
        $treatment->treatment_done         = $request->treatments_done;
        $treatment->complaint          = $request->complaint;
        $treatment->finding            = $request->finding;
        $treatment->x_rays         = $request->x_rays;
        $treatment->advice         = $request->advice;
        $treatment->pre_med         = $request->pre_med;
        $treatment->recall         = $request->recall;
        $treatment->medication         = $request->medication;
        $treatment->post_treatment_advice         = $request->post_treatment_advice;
        $treatment->cuser = Auth::id();
        $treatment->save();

        echo $treatment->id;
    }

    public function get_treatment($id){
      //  $id = 22;
       // echo $id; exit;
        $patient = Patients::find($id);
        $treatment = Patients::find($id)->treatments;
        $address = Patients::find($id)->addresses;
        $appointments = Patients::find($id)->appointments;
       // dd($appointments);
        $addresss = isset($address[0])?$address[0]->address:"";
        return view('partials.timeline',['treatments'=>$treatment,'patient'=>$patient,'address'=>$addresss,'appointments'=>$appointments[0]]);
    }

    public function treatment_detail($id){
        $treatment = Treatments::find($id);

        return view('partials.treatment',['treatment'=>$treatment]);
    }

    public function get_search_treatment_card_data(){
        $type = $_GET['type'];
        $keyword = $_GET['search'];
        $patient_id = $_GET['patient_id'];
        $keyword = trim(htmlspecialchars($keyword));
        if($type=="pre-meds"){
            $pre_med = PreMedicals::select('id','name as text')->where('name', 'LIKE', '%'.$keyword. '%')->get()->toArray();
            echo json_encode(array('results'=>$pre_med));
        }

        if($type=="consent"){
            $columns = ['consent_for','procedures','medications'];
            $query = Consents::select(DB::raw("id,CONCAT(procedures,'-',created_at) AS text"));

            foreach($columns as $column)
            {

                $query->orWhere($column, 'LIKE', '%'.$keyword. '%');

            }

            $consents = $query->get();

            echo json_encode(array('results'=>$consents));
        }

        if($type=="xrays"){
            $conditional_keywords = $keyword;
            $digital_images = DigitalImages::select(DB::raw("CONCAT(title,'-',lcase(file_name)) AS text"),'id')->where('patient_id',$patient_id)
                ->where( function($query) use ($conditional_keywords){
                    $query->where('title', 'LIKE', '%'.$conditional_keywords. '%')
                      ->orWhere('file_name','LIKE','%'.$conditional_keywords. '%');
                })
           // dd($digital_images);
                ->get()->toArray();
            echo json_encode(array('results'=>$digital_images));
        }

        if($type=="recall"){
            echo json_encode(array('results'=>array(
                    array('id'=>'SMS','text'=>'SMS'),
                    array('id'=> 'Email','text'=>'Email'),
                    array('id'=> 'Post', 'text'=>'Post'))
            ));
        }

        if($type=="saved-items"){
            $conditional_keywords = $keyword;
            $saved_items = SaveItems::select(DB::raw("lcase(file_name) AS text"),'id')->where('patient_id',$patient_id)
                ->where( function($query) use ($conditional_keywords){
                    $query->where('notes', 'LIKE', '%'.$conditional_keywords. '%')
                        ->orWhere('file_name','LIKE','%'.$conditional_keywords. '%');
                })
                // dd($digital_images);
                ->get()->toArray();
            echo json_encode(array('results'=>$saved_items));
        }

        if($type=="referral"){
            $conditional_keywords = $keyword;


            $patients = Patients::select(DB::raw('CONCAT(patient_unique_id,"-",patient_name) AS text'),'id')->whereNull('deleted_at')
                ->where(function($query) use ($conditional_keywords){
                    $query->where('patient_name','LIKE','%'.$conditional_keywords.'%')->orWhere('patient_unique_id','LIKE','%'.$conditional_keywords.'%') ;
                })
                ->get();
            echo json_encode(array('results'=>$patients));
        }

    }

    public function save_treatement_description(Request $request){

        $title = $request->title;
        $description = $request->description;

        return view('partials.save-treatment-description',['title'=>$title,'description'=>$description]);

    }

    public function load_treatment_card($id){
        $treatments = isset(Patients::find($id)->treatments)?Patients::find($id)->treatments:NULL;
        $referral = isset(Patients::find($id)->patients)?Patients::find($id)->patients:NULL;
        $doctors        = Doctors::with('users')
            ->whereNull('deleted_at')->get();
        $medical = Medicals::where('patient_id',$id)->get();
        $patient = Patients::find($id);
        $patient_flag_ids = isset($patient->patient_assigned_flags)?$patient->patient_assigned_flags->pluck('id')->toArray():[];
        $patient_flag = isset($patient->patient_assigned_flags)?$patient->patient_assigned_flags:[];

        $allergies = [];
        $allergies_name = [];
		$allergies_data = [];
		if(isset($patient->drug_allergies)) {
            foreach ($patient->drug_allergies as $d) {
                $original = ($d->getOriginal());

                $allergies[] = $d->id;
                //$allergies[date('d.m.Y',strtotime($original['pivot_created_at']))][] = $d->name;
                $allergies_data[] = array('id' => $original['pivot_id'], 'name' => $d->name, 'created_at' => date('d.m.Y H:i:s', strtotime($original['pivot_created_at'])));

            }
            //  dd($allergies);
        }
        $address = Patients::find($id)->addresses;
        $history = Patients::find($id)->medical_histories()->paginate(1);

        $drug_allergy = DrugAllergies::all();
        $patient_drug_allergies = Patients::find($id)->drug_allergies->pluck('name')->all();
        $referral = Patients::find($id)->patients;
        $sessions =  Patients::find($id)->patient_sessions()->paginate(4);
        $flags = PatientFlags::all();
        $pre_medication = PreMedicals::all();
        $tooth_area = ToothAreas::all();
        $flags = PatientFlags::all();



        $medical_conditions = MedicalConditions::all();
        return view('patient.treatment-records.treatment-record',[
            'pre_medications'=>$pre_medication,
            'allergies_data'=>$allergies_data,
            'allergies_name'=>$allergies_name,
            'flags'=>$flags,
            'patient_flags_ids'=>$patient_flag_ids,
            'patient_flags'=>$patient_flag,
            'doctors'=>$doctors,
            'allergies'=>$allergies,
            'medical_conditions'=>$medical_conditions,
            'sessions'=>isset($sessions) && isset($sessions[0])?$sessions:NULL,
            'referral'=>!is_null($referral)?$referral:NULL,
            'patient_drug_allergies'=>isset($patient_drug_allergies) && count($patient_drug_allergies) > 0?$patient_drug_allergies:NULL,
            'drug_allergies'=>isset($drug_allergy[0])?$drug_allergy:NULL,
            'referral'=>!is_null($referral)?$referral:NULL,
            'history'=>isset($history[0])?$history[0]->illness:NULL,
            'treatments'=>isset($treatments[0])?$treatments:NULL,
            'medical'=>isset($medical[0])?$medical[0]:NULL,
            'patient'=>$patient,
            'addresses'=>isset($address[0])?$address:"",
             'tooth_areas'=>isset($tooth_area[0])?$tooth_area:"",
            ]
        );
    }

    public function view_treatment_card($id){
        $treatments = isset(Patients::find($id)->treatments)?Patients::find($id)->treatments:NULL;
        $referral = isset(Patients::find($id)->patients)?Patients::find($id)->patients:NULL;
        $doctors        = Doctors::with('users')
            ->whereNull('deleted_at')->get();
        $medical = Medicals::where('patient_id',$id)->get();
        $patient = Patients::find($id);
        $patient_flag_ids = isset($patient->patient_assigned_flags)?$patient->patient_assigned_flags->pluck('id')->toArray():[];
        $patient_flag = isset($patient->patient_assigned_flags)?$patient->patient_assigned_flags:[];

        $allergies = [];
        $allergies_name = [];
        $allergies_data = [];
        if(isset($patient->drug_allergies)) {
            foreach ($patient->drug_allergies as $d) {
                $original = ($d->getOriginal());

                $allergies[] = $d->id;
                //$allergies[date('d.m.Y',strtotime($original['pivot_created_at']))][] = $d->name;
                $allergies_data[] = array('id' => $original['pivot_id'], 'name' => $d->name, 'created_at' => date('d.m.Y H:i:s', strtotime($original['pivot_created_at'])));

            }
            //  dd($allergies);
        }
        $address = Patients::find($id)->addresses;
        $history = Patients::find($id)->medical_histories()->get();


        $drug_allergy = DrugAllergies::all();
        $patient_drug_allergies = Patients::find($id)->drug_allergies->pluck('name')->all();
        $referral = Patients::find($id)->patients;
        $sessions =  Patients::find($id)->patient_sessions()->paginate(4);
        $flags = PatientFlags::all();
        $pre_medication = PreMedicals::all();
        $tooth_area = ToothAreas::all();
        $folders = Folders::whereNull('deleted_at')->where('patient_id',$id)->orderBy('folder_name')->get();
        $media = MediaFiles::when($id,function($query) use ($id){
            if(!empty($id))
                return $query->where('patient_id',$id);
        })->get();
        $media = isset($media[0])?$media:NULL;



        $medical_conditions = MedicalConditions::all();
        return view('patient.treatment-records.view-treatment-card',[
                'pre_medications'=>$pre_medication,
                'allergies_data'=>$allergies_data,
                'allergies_name'=>$allergies_name,
                'flags'=>$flags,
                'patient_flags_ids'=>$patient_flag_ids,
                'patient_flags'=>$patient_flag,
                'doctors'=>$doctors,
                'allergies'=>$allergies,
                'medical_conditions'=>$medical_conditions,
                'sessions'=>isset($sessions) && isset($sessions[0])?$sessions:NULL,
                'referral'=>!is_null($referral)?$referral:NULL,
                'patient_drug_allergies'=>isset($patient_drug_allergies) && count($patient_drug_allergies) > 0?$patient_drug_allergies:NULL,
                'drug_allergies'=>isset($drug_allergy[0])?$drug_allergy:NULL,
                'referral'=>!is_null($referral)?$referral:NULL,
                'history'=>isset($history[0])?$history[0]->illness:NULL,
                'patient_medical_history'=>$history,
                'treatments'=>isset($treatments[0])?$treatments:NULL,
                'medical'=>isset($medical[0])?$medical[0]:NULL,
                'patient'=>$patient,
                'addresses'=>isset($address[0])?$address:"",
                'tooth_areas'=>isset($tooth_area[0])?$tooth_area:"",
                'patient_folders'=>$folders,
                'medias'=>$media
            ]
        );
    }



    public function get_patient_medical_histories($id){
        $history = Patients::find($id)->medical_histories()->get();

        return view('patient.treatment-records.medical-histories',['patient_medical_history'=>$history]);
    }


    public function get_treatment_items($tab){

        if($tab=="drug-allergies"){
            $drug_allergies = DrugAllergies::orderBy('name','ASC')->paginate(5);
            return view('crm-configuration.drug-allergies.get-allergies',['drug_allergies'=>$drug_allergies]);
        }

        if($tab=="medications"){
            $pre_medicals = PreMedicals::orderBy('name','ASC')->paginate(5);
            return view('crm-configuration.pre-medicals.get-pre-medicals',['pre_medicals'=>$pre_medicals]);
        }

        if($tab=="tooth-area"){
            $tooth_areas = ToothAreas::orderBy('name','ASC')->paginate(5);
            return view('crm-configuration.tooth-area.get-tooth-areas',['tooth_areas'=>$tooth_areas]);
        }


    }

    public function save_flags_with_patient(Request $request){
        AssignedFlags::where('patient_id',$request->patient_id)->delete();
        foreach($request->flags as $f){
            $assign_flags = new AssignedFlags();
            $assign_flags->patient_id = $request->patient_id;
            $assign_flags->flag_id = $f;

            $assign_flags->save();
        }

    }

    public function save_current_medications(Request $request){
        $pre_medicals_id = $request->id;
        $patient_id = $request->patient_id;

        $patient     = Patients::find($patient_id);
        $patient->products()->detach();
        //exit;

        foreach($pre_medicals_id as $id){
            $pre_medicals     = Products::find($id);



            $pre_medicals->patients()->save($patient);

        }

    }

    public function get_session_by_appointment(Request $request){
        $appointment_id = $request->appointment_id;
        $patient_id = $request->patient_id;
        $patient = Patients::find($patient_id);
        $tooth_area = ToothAreas::all();
        $meterials = Materials::whereNull('deleted_at')->get();
        $labs = Labs::whereNull('deleted_at')->get();
        return view('patient.treatment-records.session',['patient'=>$patient, 'tooth_areas'=>isset($tooth_area[0])?$tooth_area:"",'materails'=>$meterials,'labs'=>$labs]);
    }



    public function load_session(Request $request){
        $appointment_id = $request->appointment_id;
        $patient_id = $request->patient_id;
        $appointment = Appointments::find($appointment_id);

        return view('patient.treatment-records.view-session',['appointment'=>$appointment]);
    }

    public function load_items(Request $request){
        $items = $request->items;
        $products = [];
        if(!empty($items) && count($items) > 0)
        $products = Products::whereIn('id',$items)->get();


        return view('patient.treatment-records.items',['products'=>$products,'session_id'=>$request->session_id,'patient_id'=>$request->patient_id,'appointment_id'=>$request->appointment_id]);
    }

    public function check_existing_items($session_id){
        $existing_items = SessionItems::where('appointment_session_id',$session_id)->get();

        if(!empty($existing_items) && $existing_items->count() > 0){
            foreach($existing_items as $item){
                $products[] = array(
                    'id'=>$item->products->id,
                    'text' => $item->products->product_title
                    );
            }
            echo json_encode($products);
        }else{
            echo json_encode([]);
        }
    }

    public function generate_treatment_card_pdf($id){

        $medical = Medicals::where('patient_id',$id)->get();
        $patient = Patients::find($id);
        $patient_flag_ids = isset($patient->patient_assigned_flags)?$patient->patient_assigned_flags->pluck('id')->toArray():[];
        $patient_flag = isset($patient->patient_assigned_flags)?$patient->patient_assigned_flags:[];

        $allergies = [];
        $allergies_name = [];
        $allergies_data = [];
        if(isset($patient->drug_allergies)) {
            foreach ($patient->drug_allergies as $d) {
                $original = ($d->getOriginal());

                $allergies[] = $d->id;
                //$allergies[date('d.m.Y',strtotime($original['pivot_created_at']))][] = $d->name;
                $allergies_data[] = array('id' => $original['pivot_id'], 'name' => $d->name, 'created_at' => date('d.m.Y H:i:s', strtotime($original['pivot_created_at'])));

            }
            //  dd($allergies);
        }
        $address = Patients::find($id)->addresses;
        $history = Patients::find($id)->medical_histories()->get();


        $drug_allergy = DrugAllergies::all();
        $patient_drug_allergies = Patients::find($id)->drug_allergies->pluck('name')->all();
        $referral = Patients::find($id)->patients;
        $sessions =  Patients::find($id)->patient_sessions()->paginate(4);
        $flags = PatientFlags::all();
        $pre_medication = PreMedicals::all();
        $tooth_area = ToothAreas::all();
        $folders = Folders::whereNull('deleted_at')->where('patient_id',$id)->orderBy('folder_name')->get();
        $medical_conditions = MedicalConditions::all();
        $treatments = isset(Patients::find($id)->treatments)?Patients::find($id)->treatments:NULL;
        $d = [
            'pre_medications'=>$pre_medication,
            'allergies_data'=>$allergies_data,
            'allergies_name'=>$allergies_name,
            'flags'=>$flags,
            'patient_flags_ids'=>$patient_flag_ids,
            'patient_flags'=>$patient_flag,

            'allergies'=>$allergies,
            'medical_conditions'=>$medical_conditions,
            'sessions'=>isset($sessions) && isset($sessions[0])?$sessions:NULL,
            'referral'=>!is_null($referral)?$referral:NULL,
            'patient_drug_allergies'=>isset($patient_drug_allergies) && count($patient_drug_allergies) > 0?$patient_drug_allergies:NULL,
            'drug_allergies'=>isset($drug_allergy[0])?$drug_allergy:NULL,
            'referral'=>!is_null($referral)?$referral:NULL,
            'history'=>isset($history[0])?$history[0]->illness:NULL,
            'patient_medical_history'=>$history,
            'treatments'=>isset($treatments[0])?$treatments:NULL,
            'medical'=>isset($medical[0])?$medical[0]:NULL,
            'patient'=>$patient,
            'addresses'=>isset($address[0])?$address:"",
            'tooth_areas'=>isset($tooth_area[0])?$tooth_area:"",
            'patient_folders'=>$folders,
            'patient'=>$patient
        ];

        $medical_conditions = MedicalConditions::all();
      // return view('pdf.treatment-card-pdf',$d);
        $pdf = PDF::loadView('pdf.treatment-card-pdf',$d);
        return $pdf->download("treatment-card-".Str::slug($patient->patient_name).'-'.date('YmdHis').'.pdf');
    }
    public function generate_treatment_card_hashed_pdf(Request $request){
        $token = $request->get('token');
        $user = CommonMethods::authenticate_token($token);
        $patient = Patients::where('user_id',$user['user_id'])->first();
        $id = $patient->id;
        $medical = Medicals::where('patient_id',$id)->get();
        $patient = Patients::find($id);
        $patient_flag_ids = isset($patient->patient_assigned_flags)?$patient->patient_assigned_flags->pluck('id')->toArray():[];
        $patient_flag = isset($patient->patient_assigned_flags)?$patient->patient_assigned_flags:[];

        $allergies = [];
        $allergies_name = [];
        $allergies_data = [];
        if(isset($patient->drug_allergies)) {
            foreach ($patient->drug_allergies as $d) {
                $original = ($d->getOriginal());

                $allergies[] = $d->id;
                //$allergies[date('d.m.Y',strtotime($original['pivot_created_at']))][] = $d->name;
                $allergies_data[] = array('id' => $original['pivot_id'], 'name' => $d->name, 'created_at' => date('d.m.Y H:i:s', strtotime($original['pivot_created_at'])));

            }
            //  dd($allergies);
        }
        $address = Patients::find($id)->addresses;
        $history = Patients::find($id)->medical_histories()->get();


        $drug_allergy = DrugAllergies::all();
        $patient_drug_allergies = Patients::find($id)->drug_allergies->pluck('name')->all();
        $referral = Patients::find($id)->patients;
        $sessions =  Patients::find($id)->patient_sessions()->paginate(4);
        $flags = PatientFlags::all();
        $pre_medication = PreMedicals::all();
        $tooth_area = ToothAreas::all();
        $folders = Folders::whereNull('deleted_at')->where('patient_id',$id)->orderBy('folder_name')->get();
        $medical_conditions = MedicalConditions::all();
        $treatments = isset(Patients::find($id)->treatments)?Patients::find($id)->treatments:NULL;
        $d = [
            'pre_medications'=>$pre_medication,
            'allergies_data'=>$allergies_data,
            'allergies_name'=>$allergies_name,
            'flags'=>$flags,
            'patient_flags_ids'=>$patient_flag_ids,
            'patient_flags'=>$patient_flag,

            'allergies'=>$allergies,
            'medical_conditions'=>$medical_conditions,
            'sessions'=>isset($sessions) && isset($sessions[0])?$sessions:NULL,
            'referral'=>!is_null($referral)?$referral:NULL,
            'patient_drug_allergies'=>isset($patient_drug_allergies) && count($patient_drug_allergies) > 0?$patient_drug_allergies:NULL,
            'drug_allergies'=>isset($drug_allergy[0])?$drug_allergy:NULL,
            'referral'=>!is_null($referral)?$referral:NULL,
            'history'=>isset($history[0])?$history[0]->illness:NULL,
            'patient_medical_history'=>$history,
            'treatments'=>isset($treatments[0])?$treatments:NULL,
            'medical'=>isset($medical[0])?$medical[0]:NULL,
            'patient'=>$patient,
            'addresses'=>isset($address[0])?$address:"",
            'tooth_areas'=>isset($tooth_area[0])?$tooth_area:"",
            'patient_folders'=>$folders,
            'patient'=>$patient
        ];

        $medical_conditions = MedicalConditions::all();
        // return view('pdf.treatment-card-pdf',$d);
        $pdf = PDF::loadView('pdf.treatment-card-pdf',$d);
        return $pdf->download("treatment-card-".Str::slug($patient->patient_name).'-'.date('YmdHis').'.pdf');
    }

}
