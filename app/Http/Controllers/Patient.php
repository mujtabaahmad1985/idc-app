<?php

namespace App\Http\Controllers;

use App\Addresses;
use App\Appointments;
use App\ArchivePatients;
use App\Countries;
use App\DrugAllergies;
use App\Folders;
use App\Helpers\CommonMethods;
use App\MedicalConditions;
use App\Medicals;
use App\PatientCommunications;
use App\PatientFlags;
use App\Patients;
use App\Phones;
use App\SendEmail;
use App\User;
use Auth;
use App\Documents;
use Carbon\Carbon;
use Request;
use App\Activities;
use Validator;
use DB;

class Patient extends Controller
{
    private $patient_tree =[];
    private $today;
    private $last_week;
    private $last_month;
    private $last_year;
    public function __construct()
    {
        $this->middleware('auth');
        $this->today =     \Carbon\Carbon::today()->format('Y-m-d');
        $this->last_week =  \Carbon\Carbon::today()->subDays(7)->format('Y-m-d');
        $this->last_month = Carbon::today()->subMonth(1)->format('Y-m-d');
        $this->last_year = Carbon::today()->subYear(1)->format('Y-m-d');
    }
    //
    public function get_recent_patient_unique_id(){
        $patient = Patients::orderBy('created_at', 'desc')->where('hospital_id',CommonMethods::getHopsitalID())->first();
        $uniqueId = isset($patient->patient_unique_id)?$patient->patient_unique_id+1:25082313;$patient = Patients::orderBy('created_at', 'desc')->where('hospital_id',CommonMethods::getHopsitalID())->first();
        $uniqueId = isset($patient->patient_unique_id)?$patient->patient_unique_id+1:25082313;
        return $uniqueId;
    }
    public function add_patient(){

        $countries = Countries::get();
        $patient = Patients::orderBy('created_at', 'desc')->where('hospital_id',CommonMethods::getHopsitalID())->first();
        $uniqueId = isset($patient->patient_unique_id)?$patient->patient_unique_id+1:25082313;
        $medical_conditions = MedicalConditions::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->orderBy('name')->get();
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        $ch = curl_init();


        // set url
        curl_setopt($ch, CURLOPT_URL, "http://ip-api.com/json/".$ipaddress);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);
       $data = json_decode($output);


      //  $details    = json_decode( $data );

        $current_country = !empty($data) && $data->status=="success"? $data->country:"";
       // dd( $current_country );


        return view('patient.add_patients',['countries'=>$countries,'current_country'=>$current_country,'unique_id'=>$uniqueId,'medical_conditions'=>$medical_conditions]);
    }

    public function create_account_patient(){
      //  exit;
        return view('register_as_patient');
    }

    public function old_add_patient(){
        return view('patient.add_patients');
    }

    public function get_all_patients($name){

        $patients = Patients::whereNull('deleted_at')->where(function($query) use($name){
            $query->where('patient_name','LIKE','%'.$name.'%');
            $query->orWhere('patient_unique_id','LIKE','%'.$name.'%');
        })

           // ->orWhere('date_of_birth','LIKE','%'.date('Y-m-d',strtotime($name)).'%')
            ->where('hospital_id',CommonMethods::getHopsitalID())
            ->get();
       // dd($patients);
        //echo "<pre>"; print_r($patients);
        $array[] = array(
            'id' => 0,
            'text' => "Add new"
        );
        foreach($patients as $patient){
            $array[] = array(
                'id' => $patient->id,
                'text' => $patient->patient_name,
                'patient_unique_id' => $patient->patient_unique_id,
                'patient_phone' => $patient->patient_phone,
                /*'patient_email' => Auth::user()->role=="administrator"?$patient->patient_email:"",
                'address' => Auth::user()->role=="administrator" && isset($patient->addresses)?$patient->addresses[0]->house_no.', '.$patient->addresses[0]->street_no.' '.$patient->addresses[0]->city :""
           */ );
        }

       // if(is_null($array))

     //   $array[] = array('id'=>0,'name'=>'Add patient');
        $array1['results'] = $array;
        echo json_encode($array1);

    }

    public function search_patient(){
  $name = $_GET['q'];

        $columns = ['patient_unique_id','first_name','last_name','patient_name','patient_phone','patient_email','date_of_birth','gender','nationality','card_type','card_number'
            ,'city','state','zipcode','address','occupation','comapny_name','referral_name','referral_code','insurance_by','insurance_number','change_of_address'];


      /*  $patients = Patients::whereNull('deleted_at')
            ->where('patient_name','LIKE','%'.$name.'%')
            ->orWhere('patient_unique_id','LIKE','%'.$name.'%')
            ->orWhere('date_of_birth','LIKE','%'.date('Y-m-d',strtotime($name)).'%')
            ->get();*/
        $query = Patients::select('*')->where('hospital_id',CommonMethods::getHopsitalID());

        foreach($columns as $column)
        {

                $query->orWhere($column, 'LIKE', '%'.trim(htmlspecialchars($name)). '%');
            $query->whereNull('deleted_at');
        }

        $patients = $query->get();




        //echo "<pre>"; print_r($patients);
    $array = NULL;
        foreach($patients as $patient){
            $array[] = array(
                'id' => $patient->id,
                'text' => $patient->patient_name,
                'patient_unique_id' => $patient->patient_unique_id,
                'patient_phone' => $patient->patient_phone,
                'searched_data_type'=> 'Patient',
                'display' => $name
            );
           //$array[] = $patient->patient_name;
        }


       // if(is_null($array))

     //   $array[] = array('id'=>0,'name'=>'Add patient');
        $array1['data']['patient'] = $array;
       // header('Content-Type: application/json');
        echo json_encode($array1);
    }

    public function search_patients(){

        $start_visited_date = "";
        $end_visited_date = "";

        $start_reg_date = "";
        $end_reg_date = "";

        $start_year="";
        $end_year="";

        $visited_range          = isset($_GET['visited_range']) && !empty($_GET['visited_range'])?$_GET['visited_range']:"";
        $registered_range       = isset($_GET['registered_range']) && !empty($_GET['registered_range'])?$_GET['registered_range']:"";
        $gender = request()->get('gender');
        $name = request()->get('patient_name');
        $unique_id = request()->get('unique_id');
        $start_age = request()->get('start_age');
        $end_age = request()->get('end_age');
        $illness = request()->get('illness');






        if(!empty($visited_range)){
            $v = (explode('to',$visited_range));
            $start_visited_date = date('Y-m-d',strtotime($v[0]));
            $end_visited_date = date('Y-m-d',strtotime($v[1]));
        }

        if(!empty($registered_range)){
            $v = (explode('to',$registered_range));
            $start_reg_date = date('Y-m-d',strtotime($v[0]));
            $end_reg_date = date('Y-m-d',strtotime($v[1]));

        }

        if(!empty($start_age)){

            $start_year = Carbon::today()->subYear($start_age)->format('Y');

        }
        if(!empty($end_age)){
            $end_year = Carbon::today()->subYear($end_age)->format('Y');
        }

        $d=[
            'start_visited_date'=>$start_visited_date,
            'end_visited_date'=>$end_visited_date,
            'start_reg_date'=>$start_reg_date,
            'end_reg_date'=>$end_reg_date,
            'gender'=>$gender,
            'name'=>$name,
            'patient_unique_id'=>$unique_id,
            'start_year'=>$start_year,
            'end_year'=>$end_year,
            'illness'=>$illness
        ];


        $patients = Patients::with('medicals')->whereHas('medicals',function($q) use($d){
            if(!empty($d['illness'])){
                   /// dd(count($d['illness']));
                /*if(count($d['illness']) > 1){
                    foreach($d['illness'] as $ill){

                        $q->Where('illness','LIKE','%'.$ill.'%');
                    }
                }else{*/
                    $q->Where('illness','LIKE','%'.$d['illness'].'%');
               // }
            }
        })->whereNull('deleted_at')->where(function($query) use($d) {
            if (!empty($d['start_reg_date'])) {
                $query->whereBetween('created_at', [$d['start_reg_date'], $d['end_reg_date']]);
            }
            if (!empty($d['gender'])) {
                $query->where('gender', $d['gender']);
            }
            if (!empty($d['name'])) {
                $query->where('patient_name', 'LIKE', '%' . $d['name'] . '%');
            }
            if (!empty($d['patient_unique_id'])) {
                $query->where('patient_unique_id', $d['patient_unique_id']);
            }

            if (!empty($d['start_year']) && empty($d['end_year'])) {
                $query->whereYear('date_of_birth', '<=', $d['start_year']);
            }

            if (!empty($d['end_year']) && empty($d['start_year'])) {
                $query->whereYear('date_of_birth', '>=', $d['end_year']);
            }

            if (!empty($d['end_year']) && !empty($d['start_year'])) {
                $query->whereYear('date_of_birth', '<=', $d['start_year']);
                $query->whereYear('date_of_birth', '>=', $d['end_year']);
            }




       // })->toSql();
       })->where('patients.hospital_id',CommonMethods::getHopsitalID())->paginate(50);
       // dd($patients);



        $age_range = isset($_GET['age_range']) && !empty($_GET['age_range'])?$_GET['age_range']:"";
        return view('patient.list_patients',['patients'=>$patients,'all_patients'=>null]);

    }




    public function save_from_web(\Illuminate\Http\Request $request){
        $patient = Patients::orderBy('created_at', 'desc')->where('hospital_id',CommonMethods::getHopsitalID())->first();
        $uniqueId = isset($patient->id)?25082313+$patient->id+1:25082313;
        $patient = Patients::where('patient_name','=',$request->first_name.' '.$request->last_name)->where('hospital_id',CommonMethods::getHopsitalID())->where('patient_phone',$request->patient_phone)->get();

        if($patient->isEmpty()){
            $user = new User();
            $user->email = $request->email;
            $user->name = strtolower($request->first_name.'-'.$request->last_name);
            $user->password =  bcrypt($request->unique_id.'.123#!');
            $user->role = 'patient';
            $user->save();
            $user_id = $user->id;

            SendEmail::thanks_you_email($request->first_name.' '.$request->last_name,$request->email);

            $patient = new Patients();

        }else{
            $user_id = $patient[0]->user_id;
        }

        $patient->user_id               = $user_id;
        $patient->salutation        = $request->salutation;
        $patient->patient_unique_id        = $uniqueId;
        $patient->patient_name             = $request->first_name.' '.$request->last_name;
        if(isset($request->contact_number))
        $patient->patient_phone            = $request->contact_number;
        $patient->code            = $request->country_area_code;
        if(isset($request->email))
        $patient->patient_email            = $request->email;
        $patient->date_of_birth            = !empty($request->date_of_birth)?date('Y-m-d',strtotime($request->date_of_birth)):NULL;
        $patient->gender                   = $request->gender;
        $patient->nationality              = $request->nationality;
        $patient->card_type                = $request->card_type;
        $patient->card_number              = $request->card_number;
        $patient->city                     = $request->city;
        $patient->state                    = $request->state;
        $patient->zipcode                  = $request->zipcode;
        // $patient->address                  = $request->address;
        $patient->occupation                  = $request->occupation;
        $patient->comapny_name                  = $request->comapny_name;

        $patient->save();

        $id = $patient->id;

        if($id > 0){
            if(!empty(trim($request->address))):
                $addresses = new Addresses();
                $addresses->address = $request->address;
                $addresses->patient_id = $id;
                $addresses->save();
            endif;
        }

        echo $id;


    }

    public function save(\Illuminate\Http\Request $request){


        $refer =  $request->headers->get('referer');


        $patient_id = $request->patient_id;
        $flag = "false";
        $flag1 = "false";

        $array_error = null;

        if(empty($request->patient_email) && (empty($request->contact_number) || count($request->contact_number) < 5) && empty($request->card_number)){
            echo json_encode(array('type' => 'error', 'message' => 'Please fill either email  , contact number or ID no for the security identification. If you do not wish to fill please press cancel to exit the registration'));
            exit;
        }

        $p_email = $request->patient_email;

        if(!empty($request->patient_email) )
            $p_email = $request->patient_email;


        if(empty($request->patient_email) && !empty($request->contact_number))
            $p_email = $request->contact_number;

        if(empty($request->patient_email) && empty($request->contact_number) && !empty($request->card_number))
            $p_email = $request->card_number;

        if(empty($patient_id)){
            $flag = "true";
            $flag1 = "true";
        }


        if(!empty($patient_id)){
            $p = Patients::whereNull('deleted_at')->where('patient_email',$request->patient_email)->where('hospital_id',CommonMethods::getHopsitalID())->get();

            if($p->isNotEmpty()){
                $u_id = $p[0]->id;

                if($patient_id != $u_id)
                    $flag = "true";
            }
        }

        if(!empty($patient_id)){
            $p = Patients::whereNull('deleted_at')->where('patient_unique_id',$request->patient_unique_id)->where('hospital_id',CommonMethods::getHopsitalID())->get();

            if($p->isNotEmpty()){
                $u_id = $p[0]->id;

                if($patient_id != $u_id)
                    $flag1 = "true";
            }
        }

        if($flag1=="true") {



            $validator = Validator::make($request->all(), [
                'patient_unique_id' => 'required|unique:patients'
            ]);

            if ($validator->fails()) {

                $error = $validator->errors()->all();
                echo json_encode(array('type' => 'error', 'message' => $error));
                exit;
            }
        }

        if($flag=="true") {

            if(!empty($request->patient_email) ) {

                $u = User::where('email',$request->patient_email)->first();

                if (!empty($u)) {


                    echo json_encode(array('type' => 'error', 'message' => 'Email is already taken'));
                    exit;
                }
            }
        }




        if(empty($patient_id)){



            $user = new User();
            $user->email = $p_email;
            $user->name = strtolower($request->first_name.'-'.$request->last_name);
            $user->password =  bcrypt($request->unique_id.'.123#!');
            $user->role = 'patient';
            $user->status = "approved";
            $user->hospital_id = CommonMethods::getHopsitalID();
            $user->save();
            $user_id = $user->id;

           // $user_id=7;



            $patient = new Patients();

        }
          else{

            $patient = Patients::find($patient_id);

            $user = User::find($patient->user_id);
            if($user->email!=$request->email){
                $user->email = $p_email;
                $user->save();
            }


              $patient_array = Patients::find($patient_id)->toArray();
              unset($patient_array['id']);
              unset($patient_array['user_id']);
              unset($patient_array['created_at']);
              unset($patient_array['updated_at']);
              unset($patient_array['deleted_at']);
              $o_address = Patients::find($patient_id)->addresses->pluck('address')->all();
              $o_phones = Patients::find($patient_id)->phones->pluck('contact_number')->all();

              $o_medical = Medicals::where('patient_id','=',$patient_id)->pluck('medication')->all();;
              $o_allegric = Medicals::where('patient_id','=',$patient_id)->pluck('allegric')->all();;
              $o_illness = Medicals::where('patient_id','=',$patient_id)->pluck('illness')->all();;

              $patient_array['patient_id'] = $patient_id;

              if(count($o_address) > 0)
              $patient_array['archive_address'] = implode(',',$o_address);

              if(count($o_medical) > 0)
              $patient_array['archive_medical_info'] = implode(',',$o_medical);

              if(count($o_illness) > 0)
                  $patient_array['archive_illness'] = implode(',',$o_illness);

              if(count($o_phones) > 0)
                  $patient_array['archive_phone'] = implode(',',$o_phones);

              ArchivePatients::insert($patient_array);
    }
    //exit;
        $date_of_birth = $request->year.'-'.$request->month.'-'.$request->day;


       if(!empty($user_id))
           $patient->user_id               = $user_id;
        $patient->salutation        = $request->salutation;
        $patient->patient_unique_id        = $request->patient_unique_id;
        $patient->patient_name             = $request->first_name.' '.$request->last_name;
        $patient->first_name             = $request->first_name;
        $patient->last_name             = $request->last_name;

        $patient->patient_phone            = $request->contact_number[0];
        $patient->code            = $request->country_area_code;
        $patient->patient_email            = $p_email;
        $patient->date_of_birth            = !empty($request->day) && !empty($request->month) ?$date_of_birth:NULL;
        $patient->gender                   = $request->gender;
        $patient->nationality              = $request->nationality;
        $patient->card_type                = $request->card_type;
        $patient->card_number              = $request->card_number;
        $patient->city                     = $request->city[0];
      //  $patient->house_no                     = $request->house_no[0];
       // $patient->street_no                     = $request->street_no[0];
      //  $patient->apartments_no                     = $request->apartments_no[0];
     //   $patient->state                    = $request->state;
     //   $patient->zipcode                  = $request->zipcode[0];
       // $patient->address                  = $request->address;
       // dd('7');
        $patient->occupation                  = $request->occupation;
        $patient->comapny_name                  = $request->comapny_name;
        $patient->reminder                      = isset($request->reminder)?implode(',',$request->reminder):NULL;
        if(!is_numeric($request->referral) || empty($request->referral))
        $patient->referral_name                  = $request->referral_id;
        else
            $patient->referral_name = NULL;
        if(!empty($request->referral))
        $patient->referral_code                  = $request->referral_code;
        else
            $patient->referral_code                  = NULL;

        $patient->insurance_by                  = $request->insurance_by;
        $patient->insurance_number                  = $request->insurance_number;
      //  $patient->change_of_address                  = $request->change_of_address;
        $patient->expiry_date                  = !empty($request->expiry_date)?date('Y-m-d', strtotime($request->expiry_date)):NULL;
        $patient->custom_code                  = $request->custom_code;
        if(!empty($request->referral) && is_numeric($request->referral))
        $patient->referral_id                  = $request->referral;
        else
            $patient->referral_id                  = NULL;
        $patient->cuser             = Auth::id();
        $patient->hospital_id = CommonMethods::getHopsitalID();
        $patient->save();

        $id = $patient->id;

        if(empty($patient_id)){

            $folders = ['Saved Items','Digital Images'];
            foreach($folders as $folder){
                $f = new Folders();
                $f->folder_name = $folder;
                $f->patient_id = $id;
                $f->hospital_id = CommonMethods::getHopsitalID();
                $f->save();
            }

            $activity = new Activities();

            $activity->user_id = $id;
            $activity->activity_type = 'patient';
            $activity->activity_title = "New patient added";
            $activity->activity_description =  $request->first_name.' '.$request->last_name.'('.$request->unique_id.')'.' is added in IDCSG CRM';
            $activity->created_by = Auth::id();
            $activity->hospital_id = CommonMethods::getHopsitalID();
            $activity->save();
        }

        if(strpos($refer,'edit')!==false){
            $updated_fields = $request->updated_field;
            if(!empty($updated_fields)):
            $activity = new Activities();

            $activity->user_id = $id;
            $activity->activity_type = 'patient';
            $activity->activity_title = 'edit field(s)';
            $activity->activity_description =  $request->first_name.' '.$request->last_name.'('.$request->unique_id.')'.' is updated in IDCSG CRM with "'.ucwords(str_replace('_',' ',$updated_fields)).'"';
            $activity->created_by = Auth::id();
                $activity->hospital_id = CommonMethods::getHopsitalID();
            $activity->save();
            endif;
        }



        if($id > 0){

            if(isset($request->new_contact_number)){

                $p = Phones::where('patient_id',$id)->delete();
                $code = $request->country_code;
                foreach($request->new_contact_number as $key=>$phone){

                    $ph = new Phones();

                    $ph->contact_number = $phone;
                    $ph->code = $code[$key];
                    $ph->patient_id = $id;

                    $ph->save();

                }
            }

            $old_address = Patients::find($id)->addresses->pluck('address')->all();


                if( isset($request->city[0]) && isset($request->city[0]) && !empty($request->city[0])){

                    $flag = true;
                    foreach($request->city  as $key=> $add){

                        $address_id = isset($request->address_id[$key])?$request->address_id[$key]:"";


                            //if(!empty(trim($request->address))):

                                if(empty($address_id))
                                $addresses = new Addresses();
                                else
                                    $addresses = Addresses::find($address_id);
                               // $addresses->address = $add;
                                $addresses->patient_id = $id;

                                $addresses->street_no                  = $request->street_no[$key];
                                $addresses->apartments_no              = $request->apartments_no[$key];
                                $addresses->house_no                   = $request->house_no[$key];
                                $addresses->zipcode                    = $request->zipcode[$key];
                                $addresses->city                       = $request->city[$key];
                                $addresses->country                    = $request->country[$key];
                                 $addresses->address                    = $request->address[$key];
                                $addresses->hospital_id = CommonMethods::getHopsitalID();
                                $addresses->save();




                    }





                }




            $medical = Medicals::where('patient_id','=',$id)->where('hospital_id',CommonMethods::getHopsitalID())->get();

            if(isset($medical[0]) && !empty($medical[0]->patient_id)){

                $medical_history = Medicals::find($medical[0]->id);

                $medical_history->is_medication = isset($request->is_medication)?"Yes":"No";
                $medical_history->is_allegric   = isset($request->is_allergic)?"Yes":"No";
                $medical_history->medication                  = $request->medication;

                $medical_history->illness                  = json_encode($request->ilnessess);
                $medical_history->others                  = $request->others;
                $medical_history->allegric                  = $request->allergic;
                $medical_history->hospital_id = CommonMethods::getHopsitalID();
                $medical_history->save();



            }
            else{
                $medical_history = new Medicals();
                $medical_history->is_medication = isset($request->is_medication)?"Yes":"No";
                $medical_history->is_allegric   = isset($request->is_allegric)?"Yes":"No";
                $medical_history->medication                  = $request->medication;
                $medical_history->allegric                  = $request->allergic;
                $medical_history->others                  = $request->others;
                $medical_history->illness                  = json_encode($request->ilnessess);
                $medical_history->patient_id                  = $id;
                $medical_history->hospital_id = CommonMethods::getHopsitalID();
                $medical_history->save();
                if(strpos($refer,'edit')!==false){
                    $activity = new Activities();
                    $updated_fields = $request->updated_field;
                    $activity->user_id = $id;
                    $activity->activity_type = 'patient';
                    $activity->activity_title = 'added medical section';
                    $activity->activity_description =  $request->first_name.' '.$request->last_name.'('.$request->unique_id.')'.' is updated in IDCSG CRM with medical section.';
                    $activity->created_by = Auth::id();
                    $activity->hospital_id = CommonMethods::getHopsitalID();
                    $activity->save();
                }
            }


            if ($request->hasFile('insurance_files')) {

                    //
                    $files = $request->file('insurance_files');
                     foreach($files as $file):
                    $size = $file->getSize() * 1.024;
                    $documents = new Documents();

                        $patient = Patients::find($id);
                        $filename = $id.'-'.$patient->patient_name.'-'.time();
                        $documents->user_id = $id;
                        $documents->user_type = 'patient';




                    $filen = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                    $document_name =  str_slug($filename.'-'.$filen).'.'. $file->getClientOriginalExtension();
                    $type = $file->getClientOriginalExtension();
                    $file->move('public/uploads/documents/', $document_name);
                    $documents->document = $document_name;
                    $documents->document_type = 'insurance';
                    //  dd($file);
                         $documents->hospital_id = CommonMethods::getHopsitalID();
                    $documents->save();

                    endforeach;


                //END Check Validity
            }

            if ($request->hasFile('medical_files')) {

                //
                $files = $request->file('medical_files');
                foreach($files as $file):
                    $size = $file->getSize() * 1.024;
                    $documents = new Documents();

                    $patient = Patients::find($id);
                    $filename = $id.'-'.$patient->patient_name.'-'.time();
                    $documents->user_id = $id;
                    $documents->user_type = 'patient';




                    $filen = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                    $document_name =  str_slug($filename.'-'.$filen).'.'. $file->getClientOriginalExtension();
                    $type = $file->getClientOriginalExtension();
                    $file->move('public/uploads/documents/', $document_name);
                    $documents->document = $document_name;
                    $documents->document_type = 'medical';
                    //  dd($file);
                    $documents->hospital_id = CommonMethods::getHopsitalID();
                    $documents->save();

                endforeach;


                //END Check Validity
            }
        }

        echo json_encode(array('type'=>'success','message'=>'Patient information saved.','id'=>$id));



    }
    public function get_listing_sub(){

        $all_patients = Patients::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->count();
        $visited_range = isset($_GET['visited_range']) && !empty($_GET['visited_range'])?$_GET['visited_range']:"";
        $age_range = isset($_GET['age_range']) && !empty($_GET['age_range'])?$_GET['age_range']:"";
        $registered_range = isset($_GET['registered_range']) && !empty($_GET['registered_range'])?$_GET['registered_range']:"";

        if(isset($_GET['unique_id']) && !empty($_GET['unique_id']))
            $_GET['keywords'] = $_GET['unique_id'];
        $data = [$registered_range,$visited_range,$age_range];
        $patients = null;
        if(isset($_GET['all_patients'])) {
            $previous_patients = $_GET['all_patients'];
            if ($previous_patients < $all_patients) {
                $columns = ['patient_unique_id', 'patient_name', 'patient_phone', 'patient_email', 'date_of_birth', 'gender', 'nationality', 'card_type', 'card_number'
                    , 'city', 'state', 'zipcode', 'address', 'occupation', 'comapny_name', 'referral_name', 'referral_code', 'insurance_by', 'insurance_number', 'change_of_address','created_at'];
                if (!isset($_GET['keywords']) || empty($_GET['keywords']))
                    $patients = Patients::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(50);
                else {
                    $query = Patients::select('*');

                    foreach ($columns as $column) {
                        if ($column == "patient_phone")
                            $query->orWhere($column, 'LIKE', '%' . str_replace(' ', '', trim(htmlspecialchars($_GET['keywords']))) . '%');
                        else
                            $query->orWhere($column, 'LIKE', '%' . trim(htmlspecialchars($_GET['keywords'])) . '%');

                    }

                    if(!empty($registered_range)){
                        $r = explode('-',$registered_range);

                    }

                    $query->whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID());

                    $patients = $query->paginate(100);
                    $patients->appends(Request::only('keywords'))->links();
                }
            }
        } else {

            $columns = ['patient_unique_id', 'patient_name', 'patient_phone', 'patient_email', 'date_of_birth', 'gender', 'nationality', 'card_type', 'card_number'
                , 'city', 'state', 'zipcode', 'address', 'occupation', 'comapny_name', 'referral_name', 'referral_code', 'insurance_by', 'insurance_number', 'change_of_address'];
            if (!isset($_GET['keywords']) || empty($_GET['keywords'])){

                $patients = Patients::whereNull('deleted_at')->where(function($q) use ($data){
                    if(!empty($data[0])){
                        $r = explode('to',$data[0]);
                        $f = date('Y-m-d',strtotime($r[0]));
                        $e = date('Y-m-d',strtotime($r[1]));
                        $q->whereBetween('created_at',[$f,$e]);
                    }
                })->orderBy('created_at', 'desc')->where('hospital_id',CommonMethods::getHopsitalID())->paginate(50);




            }

            else {
                $query = Patients::select('*');


                foreach ($columns as $column) {
                    if ($column == "patient_phone")
                        $query->orWhere($column, 'LIKE', '%' . str_replace(' ', '', trim(htmlspecialchars($_GET['keywords']))) . '%');
                    else
                        $query->orWhere($column, 'LIKE', '%' . trim(htmlspecialchars($_GET['keywords'])) . '%');

                }
                if(!empty($registered_range)){
                    $r = explode('-',$registered_range);
                    dd($r);
                }


                $query->where(function($q) use ($data){
                    if(!empty($data[0])){
                        $r = explode('to',$data[0]);
                        $f = date('Y-m-d',strtotime($r[0]));
                        $e = date('Y-m-d',strtotime($r[1]));
                        $q->whereBetween('created_at',[$f,$e]);
                    }
                });

                $query->whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID());

                $patients = $query->paginate(50);
                $patients->appends(Request::only('keywords'))->links();
            }
        }

       // $all_patients = Patients::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->count();
        $all_patients = 0;
        //return view('patient.list-patient-sub-file',['patients'=>$patients,'all_patients'=>$all_patients]);
        return view('patient.list_patients',['patients'=>$patients,'all_patients'=>$all_patients]);
    }
  /*  public function get_listing(){
        $visited_range = isset($_GET['visited_range']) && !empty($_GET['visited_range'])?$_GET['visited_range']:"";
        $age_range = isset($_GET['age_range']) && !empty($_GET['age_range'])?$_GET['age_range']:"";
        $registered_range = isset($_GET['registered_range']) && !empty($_GET['registered_range'])?$_GET['registered_range']:"";



        $all_patients = Patients::whereNull('deleted_at')->count();


        return view('patient.list_patients',['all_patients'=>$all_patients]);
    }



    public function load_more_patients(\Illuminate\Http\Request $request){
        dd($request->all());
        $all_patients = Patients::whereNull('deleted_at')->count();
        $patients = null;
        if(isset($_GET['all_patients'])) {
            $previous_patients = $_GET['all_patients'];
            if ($previous_patients < $all_patients) {
                $columns = ['patient_unique_id', 'patient_name', 'patient_phone', 'patient_email', 'date_of_birth', 'gender', 'nationality', 'card_type', 'card_number'
                    , 'city', 'state', 'zipcode', 'address', 'occupation', 'comapny_name', 'referral_name', 'referral_code', 'insurance_by', 'insurance_number', 'change_of_address'];
                if (!isset($_GET['keywords']) || empty($_GET['keywords']))
                    $patients = Patients::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(50);
                else {
                    $query = Patients::select('*');

                    foreach ($columns as $column) {
                        if ($column == "patient_phone")
                            $query->orWhere($column, 'LIKE', '%' . str_replace(' ', '', trim(htmlspecialchars($_GET['keywords']))) . '%');
                        else
                            $query->orWhere($column, 'LIKE', '%' . trim(htmlspecialchars($_GET['keywords'])) . '%');
                        $query->whereNull('deleted_at');
                    }

                    $patients = $query->paginate(50);
                    $patients->appends(Request::only('keywords'))->links();
                }
            }
        } else {
            $columns = ['patient_unique_id', 'patient_name', 'patient_phone', 'patient_email', 'date_of_birth', 'gender', 'nationality', 'card_type', 'card_number'
                , 'city', 'state', 'zipcode', 'address', 'occupation', 'comapny_name', 'referral_name', 'referral_code', 'insurance_by', 'insurance_number', 'change_of_address'];
            if (!isset($_GET['keywords']) || empty($_GET['keywords']))
                $patients = Patients::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(50);
            else {
                $query = Patients::select('*');

                foreach ($columns as $column) {
                    if ($column == "patient_phone")
                        $query->orWhere($column, 'LIKE', '%' . str_replace(' ', '', trim(htmlspecialchars($_GET['keywords']))) . '%');
                    else
                        $query->orWhere($column, 'LIKE', '%' . trim(htmlspecialchars($_GET['keywords'])) . '%');
                    $query->whereNull('deleted_at');
                }

                $patients = $query->paginate(50);
                $patients->appends(Request::only('keywords'))->links();
            }
        }



        return view('patient.list-patient-sub-file',['patients'=>$patients,'all_patients'=>$all_patients]);
    }*/

    public function edit_patient($id){
        $patient = Patients::find($id);

        $referral = Patients::find($id)->patients;
        $previous_address = Patients::find($id)->addresses;
       // dd($previous_address);
        $phones = Patients::find($id)->phones;
        $documents = Patients::find($id)->documents;
        $activity = Patients::find($id)->activities->take(15);
//dd($documents);
        $medical_conditions = MedicalConditions::whereNull('deleted_at')->orderBy('name')->get();
        $medical = Medicals::where('patient_id','=',$id)->where('hospital_id',CommonMethods::getHopsitalID())->get();

        $countries = Countries::get();
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        $ch = curl_init();


        // set url
        curl_setopt($ch, CURLOPT_URL, "http://ip-api.com/json/".$ipaddress);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);
        $data = json_decode($output);

        //  $details    = json_decode( $data );

        $current_country = !empty($data) && $data->status=="success"? $data->country:"";
        // dd( $current_country );


        return view('patient.edit_patients',['medical_conditions'=>$medical_conditions,'activities'=>$activity,'previous_address'=>$previous_address,'referral'=>$referral,'countries'=>$countries,'current_country'=>$current_country,'patient'=>$patient,'medical'=>isset($medical[0])?$medical[0]:NULL,'phones'=>isset($phones[0])?$phones:NULL, 'documents'=>isset($documents[0])?$documents:NULL]);
    }

    public function delete_patient($id){
        $patient = Patients::find($id);

        $patient->deleted_at = date('Y-m-d H:i:s');
        $patient->save();
    }

    public function get_referral($name){

        $patients = Patients::whereNull('deleted_at')->where('patient_name','LIKE','%'.$name.'%')->where('hospital_id',CommonMethods::getHopsitalID())->orWhere('patient_unique_id','LIKE','%'.$name.'%')->get();
        //echo "<pre>"; print_r($patients);
//$array[] = array('id'=>0,'text'=>'Not Found');
        $array = NULL;
        foreach($patients as $patient){
            $array[] = array(
                'id' => $patient->id,
                'text' => $patient->patient_name,
                'unique_id' => $patient->patient_unique_id
            );
        }

        // if(is_null($array))

        //   $array[] = array('id'=>0,'name'=>'Add patient');
        if(!is_null($array))
        $array1['results'] = $array;
        else
            $array1['results'] = array();
        echo json_encode($array1);
    }
    public function delete_selected_patient(\Illuminate\Http\Request $request){
       $patients = explode(',',$request->patients);
       //echo "<pre>"; print_r($patients);
        foreach($patients as $p){
            $patient = Patients::find($p);
            $patient->deleted_at = date('Y-m-d H:i:s');
            $patient->save();
        }

    }

    public function add_phone(){

        $countries = Countries::get();



        //  $details    = json_decode( $data );


        // dd( $current_country );


        return view('partials.add_phone',['countries'=>$countries]);
    }

    public function view_patient($id){

        $countries = Countries::get();
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        $ch = curl_init();


        // set url
        curl_setopt($ch, CURLOPT_URL, "http://ip-api.com/json/".$ipaddress);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);
        $data = json_decode($output);

        //  $details    = json_decode( $data );

        $current_country = !empty($data) && $data->status=="success"? $data->country:"";
            $patient = Patients::find($id);
            $address = Patients::find($id)->addresses;

            $referral = Patients::find($id)->patients;
            $medical = Medicals::where('patient_id',$id)->get();
        $phones = Patients::find($id)->phones;
        $documents = Patients::find($id)->documents;
        $activity = Patients::find($id)->activities->take(15);
        $previous_address = Patients::find($id)->addresses;
        $flags = PatientFlags::all();
        $patient_flag_ids = isset($patient->patient_assigned_flags)?$patient->patient_assigned_flags->pluck('id')->toArray():[];
        $folder_s = Patients::find($id)->folders;

        $folders = isset($folder_s[0])?$folder_s:NULL;


        $appointments = Appointments::get_all_appointments(0,$id,5);
        $appointments_pending = Appointments::get_all_appointments(0,$id,5,'pending');
        $history = Patients::find($id)->medical_histories()->paginate(1);
      ;



            return view('patient.view',['history'=>isset($history[0])?$history[0]->illness:NULL,'f_folders'=>$folders,'countries'=>$countries,'current_country'=>$current_country,
                'phones'=>isset($phones[0])?$phones:NULL, 'documents'=>isset($documents[0])?$documents:NULL,'activities'=>$activity,'previous_address'=>$previous_address,
                'pending_visits'=>count($appointments_pending),'patient_id'=>$id,'patient'=>$patient,'address'=>isset($address[0])?$address[0]->address:"",
                'referral'=>!is_null($referral)?$referral:NULL, 'medical'=>isset($medical[0])?$medical[0]:NULL,'appointments'=>isset($appointments[0])?$appointments:NULL,
                'flags' => $flags,
                'patient_flags_ids'=>$patient_flag_ids
                ]);
    }
    public function get_appointments_by_patient_id($id){
        $appointments = Appointments::get_all_appointments(0,$id,5);
        return view('patient.get-appointments',[ 'appointments'=>isset($appointments[0])?$appointments:NULL]);

    }

    public function _get_appointments_by_patient_id($id){
        $appointments = Appointments::get_all_appointments(0,$id,5,'pending');
        return view('patient.get-appointments-by-patient-id',[ 'appointments'=>isset($appointments[0])?$appointments:NULL]);

    }

    public function _get_appointments_by_patient_id_all($id){
        $appointments = Appointments::get_all_appointments(0,$id,5);
        return view('patient.get-appointment-patient-all',[ 'appointments'=>isset($appointments[0])?$appointments:NULL]);

    }

    public function get_treatment_cards_patient_id($id){
        $treatments = Patients::find($id)->treatments;

        $medical = Medicals::where('patient_id',$id)->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $patient = Patients::find($id);
        $address = Patients::find($id)->addresses;

        return view('patient.get-treatment-cards',[ 'treatments'=>isset($treatments[0])?$treatments:NULL,'medical'=>isset($medical[0])?$medical[0]:NULL,'patient'=>$patient,'address'=>isset($address[0])?$address[0]->address:""]);
    }

    public function view_treatment_cards_patient_id($id){
        $treatments = isset(Patients::find($id)->treatments)?Patients::find($id)->treatments:NULL;
        $referral = isset(Patients::find($id)->patients)?Patients::find($id)->patients:NULL;
        $medical = Medicals::where('patient_id',$id)->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $patient = Patients::find($id);
        $address = Patients::find($id)->addresses;
        $history = Patients::find($id)->medical_histories()->paginate(1);

        $drug_allergy = DrugAllergies::all();
        $patient_drug_allergies = Patients::find($id)->drug_allergies->pluck('name')->all();
        $referral = Patients::find($id)->patients;
        $sessions =  Patients::find($id)->patient_sessions()->paginate(4);

        $medical_conditions = MedicalConditions::where('hospital_id',CommonMethods::getHopsitalID())->all();
        $flags = PatientFlags::where('hospital_id',CommonMethods::getHopsitalID())->all();
        $patient_flag_ids = isset($patient->patient_assigned_flags)?$patient->patient_assigned_flags->pluck('id')->toArray():[];







        return view('patient.view-treatment-card',['medical_conditions'=>$medical_conditions,'sessions'=>isset($sessions) && isset($sessions[0])?$sessions:NULL,'referral'=>!is_null($referral)?$referral:NULL,'patient_drug_allergies'=>isset($patient_drug_allergies) && count($patient_drug_allergies) > 0?$patient_drug_allergies:NULL,'drug_allergies'=>isset($drug_allergy[0])?$drug_allergy:NULL,'referral'=>!is_null($referral)?$referral:NULL,'history'=>isset($history[0])?$history[0]->illness:NULL, 'treatments'=>isset($treatments[0])?$treatments:NULL,'medical'=>isset($medical[0])?$medical[0]:NULL,'patient'=>$patient,'addresses'=>isset($address[0])?$address:"",
            'flags'=>$flags,
            'patient_flags_ids'=>$patient_flag_ids]);
    }

    public function show_bio_data($id){
        $patient = Patients::find($id);
        $address = Patients::find($id)->addresses;

        $referral = Patients::find($id)->patients;
        $medical = Medicals::where('patient_id',$id)->get();
        $phones = Patients::find($id)->phones;
        $history = Patients::find($id)->medical_histories()->paginate(1);


        $previous_address = Patients::find($id)->addresses;


        ;



        return view('patient.view-bio-data',['history'=>isset($history[0])?$history[0]->illness:NULL,'phones'=>isset($phones[0])?$phones:NULL,'previous_address'=>$previous_address,'patient_id'=>$id,'patient'=>$patient,'address'=>isset($address[0])?$address[0]->address:"",'referral'=>!is_null($referral)?$referral:NULL, 'medical'=>isset($medical[0])?$medical[0]:NULL]);

    }


    public function get_documents_by_patient_id($id){
        $documents = Patients::find($id)->documents;

        return view('patient.get-documents',['documents'=>isset($documents[0])?$documents:NULL]);
    }

    public function check_unique_id($unique_id){

        $patient = Patients::where('patient_unique_id',$unique_id)->get();

        if($patient->isNotEmpty())
            echo json_encode(array('type' => 'error', 'data'=>$patient));
        else
            echo json_encode(array('type' => 'success', 'data'=>'Unique ID is available.'));

    }

    public function update_all_patient_name(){
        $patients = Patients::where('hospital_id',CommonMethods::getHopsitalID())->all();

        foreach($patients as $p){
            $p_id = $p->id;
            $p_name = explode(' ',$p->patient_name);

            $first_name = "";
            $last_name = "";

            if(count($p_name)==2){
                $first_name = $p_name[0];
                $last_name = $p_name[1];
            }

            if(count($p_name)==3){
                $first_name = $p_name[0].' '.$p_name[1];
                $last_name = $p_name[2];
            }
            if(count($p_name)==4){
                $first_name = $p_name[0].' '.$p_name[1];
                $last_name = $p_name[2].' '.$p_name[3];
            }


            echo "<pre>"; print_r($p_name);
            echo "Firstname: ".$first_name.'< br/>Last Name: '.$last_name.'<br />';

            $pp = Patients::find($p_id);
            $pp->first_name = $first_name;
            $pp->last_name = $last_name;
            $pp->save();
        }
    }

    public function update_address_status($id){
        $address = Addresses::find($id);
        $patient_id = $address->patient_id;

        $ad = Addresses::where('patient_id',$patient_id)->get();

        foreach($ad as $a){
            $add = Addresses::find($a->id);
            $add->set_as_main = 'No';
            $add->save();
        }

        $address->set_as_main = 'Yes';
        $address->save();
    }

    public function get_revised_data($id){
        $archive_data = ArchivePatients::where('patient_id',$id)->get();
        $archive_data = $archive_data->isNotEmpty()?$archive_data:NULL;
        return view('patient.get-revised-data',['revised' => $archive_data]);
    }
    public function get_revised_data_by_id($id){
        $archive_data = ArchivePatients::where('id',$id)->get();

        $archive_data = $archive_data->isNotEmpty()?$archive_data:NULL;
        return view('patient.get-revised-data-by-id',['revised' => $archive_data]);
    }

    public function upload_profile_picture(\Illuminate\Http\Request $request){
        $file_data = $request->image;
        $image_array_1 = explode(";", $file_data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $patient_id = $request->patient_id;
        $file_name = 'image_'.time().'_'.$patient_id.'.png'; //generating unique file name;
        $data = base64_decode($image_array_2[1]);
        if($file_data!=""){ // storing image in storage/app/public Folder
            \Storage::disk('images')->put($file_name,$data);
            $spatient = Patients::find($patient_id);
            $old_picture = $spatient->profile_picture;

            $spatient->profile_picture = $file_name;
            $spatient->save();
            \Storage::disk('images')->delete($old_picture);
        }
    }

    public function update_chunk_patient(\Illuminate\Http\Request $request){

        $patient  = Patients::find($request->patient_id);

        $patient->salutation        = $request->salutation;

        $patient->patient_name             = $request->patient_name;

        $p_name = explode(' ',$request->patient_name);

        $first_name = "";
        $last_name = "";

        if(count($p_name)==2){
            $first_name = $p_name[0];
            $last_name = $p_name[1];
        }

        if(count($p_name)==3){
            $first_name = $p_name[0].' '.$p_name[1];
            $last_name = $p_name[2];
        }
        if(count($p_name)==4){
            $first_name = $p_name[0].' '.$p_name[1];
            $last_name = $p_name[2].' '.$p_name[3];
        }

        $date_of_birth = date('Y-m-d', strtotime($request->date_of_birth));

        $patient->first_name             = $first_name;
        $patient->last_name             = $last_name;
        $patient->family            = $request->family;
        $patient->date_of_birth            = $date_of_birth;

        $patient->card_number              = $request->card_number;

        $id = $patient->save();

        if($id > 0)
            echo json_encode(array('type' => 'success', 'message'=>'Patient is updated '));
        else
            echo json_encode(array('type' => 'error', 'message'=>'Patient is not saved. '));


    }

    public function update_patient_type(\Illuminate\Http\Request $request){
        $patient_id = $request->patient_id;
        $type = $request->type;

        $patient = Patients::find($patient_id);
        $patient->patient_type = $type;
        $patient->save();
    }

    public function update_contact_patient(\Illuminate\Http\Request $request){

        $id = $request->patient_id;
        $address = Addresses::where('patient_id',$id)->get();
        $previous_address = $request->previous_address;
        $current_address = $request->current_address;

        if(!isset($address[1]) && !empty( $request->previous_address)){


            $a_id = $address[0]->id;
            $ad =  Addresses::find($a_id);
            $ad->address = $previous_address;
            $ad->save();

            $new_address = new Addresses();
            $new_address->address = $current_address;
            $new_address->patient_id = $id;
            $new_address->set_as_main = 'Yes';
            $new_address = CommonMethods::getHopsitalID();
            $new_address->save();


        }else{
            $a_id = $address[0]->id;
            $ad =  Addresses::find($a_id);
            $ad->address = $current_address;

            $ad->save();

            $a_id = $address[1]->id;
            $ad =  Addresses::find($a_id);
            $ad->address = $previous_address;
            $ad->save();
        }

        $patient = Patients::find($id);

        $patient->patient_email = $request->patient_email;
        $patient->patient_phone = $request->patient_phone;
        $result = $patient->save();

        if($result > 0)
            echo json_encode(array('type' => 'success', 'message'=>'Patient information is updated'));
        else
            echo json_encode(array('type' => 'error', 'message'=>'Patient is not saved. '));

    }

    public function add_new_address(){
        $countries = Countries::get();

        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        $ch = curl_init();


        // set url
        curl_setopt($ch, CURLOPT_URL, "http://ip-api.com/json/".$ipaddress);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);
        $data = json_decode($output);


        //  $details    = json_decode( $data );

        $current_country = !empty($data) && $data->status=="success"? $data->country:"";
        // dd( $current_country );


        return view('patient.add-new-addres',['countries'=>$countries,'current_country'=>$current_country]);
    }

    public function update_referral(\Illuminate\Http\Request $request){

        $patient = Patients::find($request->patient_id);
        if(!is_numeric($request->referral) || empty($request->referral))
            $patient->referral_name                  = $request->referral_id;
        else
            $patient->referral_name = NULL;
        if(!empty($request->referral))
            $patient->referral_code                  = $request->referral_code;
        else
            $patient->referral_code                  = NULL;

        $patient->insurance_by                  = $request->insurance_by;
        $patient->insurance_number                  = $request->insurance_number;
        $patient->expiry_date                  = date('Y-m-d', strtotime($request->expiry_date));
        if(!empty($request->referral) && is_numeric($request->referral))
            $patient->referral_id                  = $request->referral;
        else
            $patient->referral_id                  = NULL;

        $id = $patient->save();

        if($id > 0){

            echo json_encode(array('type' => 'success', 'message'=>'Referral and Insurance information is updated'));
        }

        else
            echo json_encode(array('type' => 'error', 'message'=>'Referral and Insurance information is not saved. '));


    }

    public function update_medications(\Illuminate\Http\Request $request){

        $medical = Medicals::where('patient_id',$request->patient_id)->get();

        $medicals = Medicals::find($medical[0]->id);
        $medicals->medication = $request->medication;
        $medicals->allegric = $request->allegric;


        $id = $medicals->save();

        if($id > 0){

            echo json_encode(array('type' => 'success', 'message'=>'Medication and allergies is updated'));
        }

        else
            echo json_encode(array('type' => 'error', 'message'=>'Medication and allergies  is not saved. '));




    }

    public function update_editable(\Illuminate\Http\Request $request){
        $patient_id = $request->pk;
        $name = $request->name;
        $value = $request->value;

        $patient = Patients::find($patient_id);

        switch($name){
            case "patient_name":
                $p_name = explode(' ',$value);


                $first_name = "";
                $last_name = "";
                $salulation = $patient->salutation;

                $index = 1;
                if($p_name[0] == "Mr" || $p_name[0]=="Mrs" || $p_name[0]=="Miss"){
                    $salulation = $p_name[0];
                    unset($p_name[0]);
                    $index=0;
                }




                if(count($p_name)==2){
                    $first_name = $p_name[1-$index];
                    $last_name = $p_name[2-$index];
                }

                if(count($p_name)==3){
                    $first_name = $p_name[1-$index].' '.$p_name[2-$index];
                    $last_name = $p_name[3-$index];
                }
                if(count($p_name)==4){
                    $first_name = $p_name[1-$index].' '.$p_name[2-$index];
                    $last_name = $p_name[3-$index].' '.$p_name[4-$index];
                }

                $patient->salutation        = $salulation;
                $patient->patient_name             = $first_name.' '.$last_name;
                $patient->first_name             = $first_name;
                $patient->last_name             = $last_name;

                $patient->save();

                break;
            case "date_of_birth":
                $date = date('Y-m-d',strtotime(str_replace('.','-',$value)));
                $patient->date_of_birth  = $date;
                $patient->save();
            break;
            case "patient_email":
                $patient->patient_email  = $value;
                $patient->save();
            break;

        }


    }

    public function get_refers($id){

        $patient = Patients::find($id);
        $patients = Patients::where('referral_id',$id)->get();


        /*foreach($patients as $p){
           // $this->patient_tree[$p->id] = ['patient_id'=>$p->id,'patient_name'=>$p->patient_name];
           //dd($p->childrenRecursive());

            $this->patient_tree[] = $this->get_referal_patients($p,$id);
        }
        dd($this->patient_tree);*/
        //echo json_encode($pat);
        return view('patient.referral',['patient'=>$patients,'patient_info'=>$patient]);
    }

    function get_referal_patients($patient, $referral_id){
        $patients = $patient->patient_refers;

        $pat[$patient->id]= ['patient_id'=>$patient->id,'patient_name'=>$patient->patient_name];
        if(isset($patients) && $patients->count() > 0){


            foreach($patients as $p){
                echo $patient->id."---".$referral_id."<br />";
                $this->patient_tree[$patient->id]['children'][] = ['patient_id'=>$p->id,'patient_name'=>$p->patient_name];

                $this->patient_tree[] = $this->get_referal_patients($p,$p->referral_id);
            }

            return $this->patient_tree;
        }
        return false;







    }

    public function referral_tree(){



        return view('patient.referral-tree');
    }

    public function get_patient_appointments($id){

        $patient = Patients::find($id);
        $appointments = $patient->patient_appointments;

        return view('patient.get-patient-appointments',['appointments'=>$appointments]);
    }

    public function update_patient_from_treatment_card(\Illuminate\Http\Request $request){
        $patient = Patients::find($request->patient_id);
        $date_of_birth = $request->year.'-'.$request->month.'-'.$request->day;
        $patient->salutation        = $request->salutation;
        $patient->patient_name             = $request->first_name.' '.$request->last_name;
        $patient->first_name             = $request->first_name;
        $patient->last_name             = $request->last_name;


        $patient->date_of_birth            = !empty($request->day) && !empty($request->month) ?$date_of_birth:NULL;

        $patient->card_type                = $request->card_type;
        $patient->card_number              = $request->card_number;



        $id = $patient->save();
        if($id > 0){

            echo json_encode(array('type' => 'success', 'message'=>'Patient information is updated'));
        }

        else
            echo json_encode(array('type' => 'error', 'message'=>'Patient information is not saved. '));
    }

    public function get_patient_info($id){
        $patient = Patients::find($id)->toJson();
        echo $patient;
    }

    public function past_sessions($id){
            $patient = Patients::find($id);
            $past_sessions = $patient->patient_past_sessions;
            return view('patient.past-sessions',['sessions'=>$past_sessions]);
    }

    public function patinet_pending_appointments($id){
        $patient = Patients::find($id);
        $appointments = isset($patient->patient_pending_appointments)?$patient->patient_pending_appointments:NULL;

        return view('patient.get-patient-appointments',['appointments'=>$appointments]);
    }

    public function refer_a_patient(\Illuminate\Http\Request $request){
        $id = $request->referral_id;
        $patient_id = $request->patient_select;

        $patient = Patients::find($patient_id);
        $patient->referral_id = $id;

        $result = $patient->save();



        if ($result > 0) {
            echo json_encode(array(
                'type' => 'success',
                'message' => 'Patient is referred successfully..'
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in user referring, try again.'
            ));
        }
    }

    public function patient_contact($id){
        $id = CommonMethods::decrypt($id);
        $patient = Patients::find($id);

        $data['Full Name'] = $patient->patient_name;
        $data['Email'] = $patient->patient_email;
        $data['Phone'] = $patient->patient_phone;

        $addresses = Addresses::whereNull('deleted_at')->where('patient_id',$id)->get();

        if(isset($addresses) && $addresses->count() > 0){
            foreach($addresses as $address){
                $street = !empty($address->street_no)?'Street #'.$address->street_no:"";
                $appartment = !empty($address->apartments_no)?' Appartment #'.$address->apartments_no:"";
                $house_no = !empty($address->house_no)?' House #'.$address->house_no:"";
                $city = !empty($address->city)?' '.$address->city:"";
                $country = !empty($address->country)?' '.$address->country:"";
                $zipcode = !empty($address->zipcode)?' '.$address->zipcode:"";

                $data['Address'][''] = $street.''.$appartment.''.$house_no.''.$zipcode.''.$city.''.$country;
            }
        }

        return response()->json($data);

    }

    public function patient_report_summary(){
        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];

        $last_year_month_patients = DB::table('patients')
            ->select(DB::raw(' count(id) as patients'),DB::raw('MONTHNAME(updated_at) as month_name'))
            ->where('updated_at','>=',$this->last_year)
            ->where('hospital_id',CommonMethods::getHopsitalID())
            ->groupBy(DB::raw('MONTHNAME(updated_at)'))
            ->get();



        $last_year_month_patients_visited = DB::table('appointments')
            ->select(DB::raw(' count(id) as patients'),DB::raw('MONTHNAME(updated_at) as month_name'))
            ->where('updated_at','>=',$this->last_year)
            ->whereIn('status',['completed','pending'])
            ->where('hospital_id',CommonMethods::getHopsitalID())
            ->groupBy(DB::raw('MONTHNAME(updated_at)'))
            ->get();

        $total_sale_by_patients = DB::table('sales')
            ->select(DB::raw(' sum(grand_total) as sale_amount'))
            ->where('hospital_id',CommonMethods::getHopsitalID())
            ->where('person_type','patient')
            ->get()->toArray();


        $today_sale = DB::table('sales')
            ->select(DB::raw(' sum(grand_total) as sale_amount'))
            ->where('hospital_id',CommonMethods::getHopsitalID())
            ->where('created_at','>=',$this->today)
            ->where('person_type','patient')
            ->get();


        $last_week_wise_sale = DB::table('sales')
            ->select(DB::raw(' sum(grand_total) as sale_amount'))
            ->where('created_at','>=',$this->last_week)
            ->where('hospital_id',CommonMethods::getHopsitalID())
            ->where('person_type','patient')
            ->get();


        $last_month_wise_sale = DB::table('sales')
            ->select(DB::raw(' sum(grand_total) as sale_amount'))
            ->where('created_at','>=',$this->last_month)
            ->where('person_type','patient')
            ->where('hospital_id',CommonMethods::getHopsitalID())
            ->get();






        $p = null;
        $v = null;
        if(isset($last_year_month_patients) && $last_year_month_patients->count() > 0){
            foreach($last_year_month_patients as $patient){
                $p[ucwords($patient->month_name)] = $patient->patients;
            }
        }
        if(isset($last_year_month_patients_visited) && $last_year_month_patients_visited->count() > 0){
            foreach($last_year_month_patients_visited as $patient){
                $v[ucwords($patient->month_name)] = $patient->patients;
            }
        }

           $patient_array = null;
        $patient_array_visited = null;
        foreach($months as $month){
            $patient_array[$month] = isset($p[$month])?$p[$month]:0;
        }
        foreach($months as $month){
            $patient_array_visited[$month] = isset($v[$month])?$v[$month]:0;
        }

        $d = [
            'patients'=>$patient_array,
            'visited_patients'=>$patient_array_visited,
            'total_sale_by_patients'=>isset($total_sale_by_patients[0])?$total_sale_by_patients[0]:0,
            'last_month_wise_sale'=>isset($last_month_wise_sale[0])?$last_month_wise_sale[0]:0,
            'last_week_wise_sale'=>isset($last_week_wise_sale[0])?$last_week_wise_sale[0]:0,
            'today_sale'=>isset($today_sale[0])?$today_sale[0]:0,
        ];




        return view('patient.report',$d);
    }

    public function get_payment_history($id){
        $patient = Patients::find($id);

        $sales = $patient->payment_from_sale;
        $s = [];
        if(isset($sales) && $sales->count() > 0){
            foreach($sales as $sale){
                $appointment = isset($sale->appointment_sessions)?$sale->appointment_sessions->appointments:NULL;
                $s[] = array(
                    'sale_id' =>$sale->id,
                    'sale_type'=>isset($sale->appointment_sessions)?"Appointment":"Manual",
                    'description'=>isset($appointment)?$appointment->doctor_services->service_name.' with Dr. '.$appointment->doctors->fname.' '.$appointment->doctors->lname:'Purchased Normally',
                    'amount'=>number_format($sale->grand_total,2),
                    'date_time' => CommonMethods::formatDateTime($sale->created_at)
                );

            }

        }

        echo json_encode($s);

    }

    public function save_communication_patient(\Illuminate\Http\Request $request){
        $patient_id = $request->patient_id;

        PatientCommunications::where('patient_id',$patient_id)->delete();

        $emails = !empty($request->emails)?explode(', ',$request->emails):[];
        $whatsapp = !empty($request->whatsapp)?explode(', ',$request->whatsapp):[];
        $sms = !empty($request->sms)?explode(', ',$request->sms):[];
        $phone_call = !empty($request->phone_call)?explode(', ',$request->phone_call):[];
        $hospital_id = CommonMethods::getHopsitalID();;

        foreach($emails as $email){
            $communication = new PatientCommunications();
            $communication->contact = $email;
            $communication->patient_id = $patient_id;
            $communication->contact_type = 'email';
            $communication->hospital_id = $hospital_id;
            $communication->cuser = \Illuminate\Support\Facades\Auth::id();
            $communication->save();
        }

        foreach($whatsapp as $value){
            $communication = new PatientCommunications();
            $communication->contact = $value;
            $communication->contact_type = 'whatsapp';
            $communication->patient_id = $patient_id;
            $communication->hospital_id = $hospital_id;
            $communication->cuser = \Illuminate\Support\Facades\Auth::id();
            $communication->save();
        }

        foreach($sms as $value){
            $communication = new PatientCommunications();
            $communication->contact = $value;
            $communication->contact_type = 'sms';
            $communication->patient_id = $patient_id;
            $communication->hospital_id = $hospital_id;
            $communication->cuser = \Illuminate\Support\Facades\Auth::id();
            $communication->save();
        }

        foreach($phone_call as $value){
            $communication = new PatientCommunications();
            $communication->contact = $value;
            $communication->contact_type = 'phone_call';
            $communication->hospital_id = $hospital_id;
            $communication->patient_id = $patient_id;
            $communication->cuser = \Illuminate\Support\Facades\Auth::id();
            $communication->save();
        }


    }
}
