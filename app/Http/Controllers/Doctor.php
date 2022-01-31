<?php

namespace App\Http\Controllers;

use App\DoctorExperiences;
use App\DoctorServices;
use App\Documents;
use App\Helpers\CommonMethods;
use App\Patients;
use App\Permissions;
use App\Staffs;
use Illuminate\Http\Request;
use App\Doctors;
use App\User;
use App\SendEmail;
use Illuminate\Support\Facades\Storage;
use Validator;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\Auth;
class Doctor extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function search_doctors(){
        $name = $_GET['q'];
        header('Content-Type: application/json');


        $doctors = Doctors::whereNull('deleted_at')->where('fname','LIKE','%'.$name.'%')->orWhere('lname','LIKE','%'.$name.'%')
            ->where('hospital_id',CommonMethods::getHopsitalID())
            ->get();
        //echo "<pre>"; print_r($patients);
        $array = NULL;
        foreach($doctors as $doctor){
            $array[] = array(
                'id' => $doctor->id,
                'text' => $doctor->fname.' '.$doctor->lname,
                'email' => $doctor->email,
                'phone' => $doctor->phone_number,
                'mobile' => $doctor->mobile_number,
                'searched_data_type'=> 'Doctor'
            );
            //$array[] = $patient->patient_name;
        }

        // if(is_null($array))

        //   $array[] = array('id'=>0,'name'=>'Add patient');
        $array1['data']['doctors'] = $array;
        echo json_encode($array1);
    }
    public function get_doctors(){
            $doctors = Doctors::with('users')
            ->whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();

            $doctor = Doctors::where('doctor_id',7)->where('hospital_id',CommonMethods::getHopsitalID())->first();

            $services = DoctorServices::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();

            return view('doctors.doctors',['doctors'=>$doctors,'services'=>$services]);
    }
    public function get_doctor_by_id($id){
        $doctor = Doctors::find($id);
        return $doctor->toJson(JSON_PRETTY_PRINT);
    }
    public function add_doctor(Request $request){
/*//dd($request->all());
        $user = User::create([
            'name' => strtolower($request->first_name.'-'.$request->last_name),
            'email' => $request->email,
            'password' => bcrypt($request->email.'.123#!'),
        ]);*/


        $id = $request->id;

        if(empty($id)){
            $validator = Validator::make($request->all(), [
                'email' => 'unique:users',

            ]);
            if ($validator->fails()) {

                $error = $validator->errors()->all();
                echo json_encode(array('type' => 'error', 'message' => $error));
                exit;
            }
            $password = Str::random(12);
            $user = new User();
            $user->email = $request->email;
            $user->name = Str::slug($request->first_name.'-'.$request->last_name);

            $user->password =  bcrypt($password);
            $user->status = 'pending';
            $user->role = 'doctor';
            $user->hospital_id = CommonMethods::getHopsitalID();

            $user->save();
            SendEmail::send_credentials($request->first_name.' '.$request->last_name,$request->email, $password,$user->id);
        }




        if(empty($id)){
            $doctor = new Doctors();
            $doctor->doctor_id = $user->id;
            $doctor->hospital_id = CommonMethods::getHopsitalID();

        }
           else{
                $doctor = Doctors::find($id);

                $u = User::find($doctor->doctor_id);

                if($u->email!=$request->email){
                    $u->email = $request->email;
                    $u->save();
                }
            }




        $doctor->fname = $request->first_name;
        $doctor->lname = $request->last_name;
        $doctor->phone_number = $request->phone_number;
        $doctor->mobile_number = $request->mobile_number;
        $doctor->date_of_birth = date('Y-m-d',strtotime(str_replace('.','-',$request->date_of_birth)));
        $doctor->facebook_url = $request->facebook_url;
        $doctor->linkedin_url = $request->linkedin_url;
        $doctor->twitter_url = $request->twitter_url;
        $doctor->gender = $request->gender;
        $doctor->doctor_role = $request->doctor_role;
        $doctor->zip_code = $request->zipcode;
        $doctor->specialities = $request->specialities;
        $doctor->biography = $request->biography;
        $doctor->city = $request->city;
        $doctor->address = $request->address;
        $doctor->about_me = $request->about_me;
        $doctor->notes = $request->notes;
        $doctor->cuser             = Auth::id();

        if($request->hasFile('profile_image')){
            $profile_image = $request->file('profile_image');



            $file_name = Str::slug($request->first_name)."-profile_image".'-'.time();
            $extension = $profile_image->getClientOriginalExtension();



            Storage::disk('images')->put($file_name.'.'.$extension,  File::get($profile_image));
            $doctor->profile_picture = $file_name.'.'.$extension;
            //END Check Validity
        }

        $doctor->save();
        $user_id =  $doctor->id;
        $experience_id = $request->experience_id;
        if ($user_id > 0) {
            $position = $request->position;
            $department = $request->department;
            $year = $request->year;
            $summary = $request->summary;
            $hospital = $request->hospital;
            if(isset($position)){
                foreach($position as $k=>$p){
                    if(!empty($p)){
                        if(isset($experience_id[$k]))
                            $experience = DoctorExperiences::find($experience_id[$k]);
                            else
                        $experience = new DoctorExperiences();
                        $experience->doctor_id = $user_id;
                        $experience->position = $p;
                        $experience->department = $department[$k];
                        $experience->year = $year[$k];
                        $experience->summary = $summary[$k];
                        $experience->hospital = $hospital[$k];
                        $experience->save();

                    }

                }

            }


            echo json_encode(array(
                'type' => 'success',
                'message' => 'Doctor is added successfully. you can view in listing.',
                'id' => $doctor->id,
                'name' => $doctor->fname. ' '.$doctor->lname
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in user submitting, try again.'
            ));
        }

    }
    public function edit_doctor($id){

     // dd($request->all());
        $doctor = Doctors::find($id);

        return view('doctors.doctor-form',['doctor'=>$doctor]);


    }

    public function set_permissions($id){
        $staff = Doctors::where('doctor_id',$id)->get();
        $user_id = $id;
        $id = isset($staff[0])?$staff[0]->id:0;

        $user_permissions = User::find($user_id)->permissions->pluck('id')->all();
        $user_permissions = count($user_permissions) > 0?$user_permissions:array();
//dd($user_permissions);
        $staff = Doctors::find($id);
        $permissions = Permissions::with('children')->whereNull('parent_id')->whereIn('id',[5,35,50])->get();

        return view('permissions',['permissions'=>$permissions,'id'=>$user_id,'staff'=>$staff,'user_permissions'=>$user_permissions]);
    }

    public function delete_doctor($id){
        $doctor = Doctors::find($id);
        $doctor->deleted_at = date('Y-m-d H:i:s');
        $doctor->save();
    }

    public function get_doctor_detail($id){
        $id = CommonMethods::decrypt($id);
        $doctor = Doctors::find($id);

        return view('doctors.view',['doctor'=>$doctor]);
    }

    public function get_doctor_patients($id){
        $id = CommonMethods::decrypt($id);
        $doctor = Doctors::find($id);
        $patients = isset($doctor->doctor_patients)?$doctor->doctor_patients:NULL;


        return view('doctors.doctor_patients',['doctor'=>$doctor,'patients'=>$patients]);
    }

    public function doctor_form(){
        return view('doctors.doctor-form');
    }

    public function doctor_profile($username){

        $user = User::where('name',$username)->first();

        return view('doctors.profile',['doctor'=>isset($user->doctors)?$user->doctors:NULL]);
    }

    public function doctor_appointments($id){
        $doctor = Doctors::find($id);

        return view('doctors.doctor-appointments-page',['doctor'=>$doctor]);
    }

}
