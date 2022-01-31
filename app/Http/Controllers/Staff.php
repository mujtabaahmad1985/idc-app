<?php

namespace App\Http\Controllers;

use App\ArchiveStaffs;
use App\Folders;
use App\Helpers\CommonMethods;
use App\Leaves;
use App\Permissions;
use App\Staffs;
use App\User;
use Illuminate\Http\Request;
use App\Countries;
use App\SendEmail;
use Validator;
use App\Activities;
use Auth;

class Staff extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_staffs(){


        $columns = ['id','first_name','last_name','contact_number','email','date_of_birth','gender','address','zip_code','designation'];
        if(!isset($_GET['keywords']) || empty($_GET['keywords']))
            $staffs = Staffs::with('users')
                ->whereNull('deleted_at')->orderBy('id','DESC')->where('hospital_id',CommonMethods::getHopsitalID())->paginate(100);
        else{
            $query = Staffs::select('*');

            foreach($columns as $column)
            {
                if($column=="contact_number")
                    $query->orWhere($column, 'LIKE', '%'.str_replace(' ','',trim(htmlspecialchars($_GET['keywords']))). '%');
                else
                    $query->orWhere($column, 'LIKE', '%'.trim(htmlspecialchars($_GET['keywords'])). '%');
                $query->whereNull('deleted_at');
            }

            $staffs = $query->where('hospital_id',CommonMethods::getHopsitalID())->paginate(100);
            //$staffs->appends(Request::only('keywords'))->links();

        }

//dd($staffs);
        return view('staffs.staffs',['staffs'=>$staffs]);
    }

    public function edit_staffs($id){
        $staffs = Staffs::find($id);

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
        return view('staffs.edit_single_staff',['staffs'=>$staffs,'countries'=>$countries,'current_country'=>$current_country]);
    }

    public function add_staffs(){

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

        return view('staffs.add_staff',['countries'=>$countries,'current_country'=>$current_country]);
    }

    public function save_staff(Request $request){

        $staff_id = $request->staff_id;

        if(empty($staff_id)){

            $validator = Validator::make($request->all(), [
                'email'    => 'required|unique:users',
                'contact_number' => 'required|unique:staffs',
            ]);

            if($validator->fails()){
                $error =  $validator->errors()->all();
                echo json_encode(array('type' => 'error','message'=>$error));
                exit;
            }

            $password = \Illuminate\Support\Str::random(12);
            $user = new User();
            $user->email = $request->email;
            $user->name = strtolower($request->first_name.'-'.$request->last_name.'-'.rand(1,100));
            $user->password =  bcrypt($password);
            $user->status = 'approved';
            $user->role = 'staff';
            $user->hospital_id = CommonMethods::getHopsitalID();
            $user->save();
            $user_id = $user->id;

         //   SendEmail::send_credentials($request->first_name.' '.$request->last_name,$request->email, $password,$user_id);



            $staff = new Staffs();

        }
        else{
            $staff = Staffs::find($staff_id);
            $user = User::find($staff->user_id);
            $user->role = $request->role;
            $user->save();
        }



        $date_of_birth = $request->year.'-'.$request->month.'-'.$request->day;

        if(!empty($user_id))
        $staff->user_id                  = $user_id;
        $staff->salutation               = $request->salutation;
        $staff->last_name             = $request->last_name;
        $staff->first_name             = $request->first_name;
        $staff->contact_number            = $request->contact_number;
        $staff->phone_code                     = $request->country_area_code;
        $staff->email                     = $request->email;
        $staff->date_of_birth            = !empty($request->day)?date('Y-m-d',strtotime($date_of_birth)):NULL;
        $staff->gender                   = $request->gender;
        $staff->nationality              = $request->nationality;
        $staff->id_no                     = $request->id_no;
        $staff->start_date            = !empty($request->start_date)?date('Y-m-d',strtotime($request->start_date)):NULL;
        $staff->end_date            = !empty($request->end_date)?date('Y-m-d',strtotime($request->end_date)):NULL;
        $staff->city                     = $request->city;
        $staff->state                    = $request->state;
        $staff->zip_code                  = $request->zipcode;
        $staff->address                  = $request->address;
        $staff->designation                  = $request->designation;
        $staff->cuser                   = Auth::id();
        $staff->hospital_id = CommonMethods::getHopsitalID();



        $staff->save();

        $id = $staff->id;

        if($id > 0){

            $activity = new Activities();

            $activity->user_id = Auth::id() ;
            $activity->activity_type = 'staff';
            $activity->activity_title = 'Staff is added into system.';
            $activity->activity_description =  '<strong>'.ucwords($request->first_name.' '.$request->last_name).'</strong> is added into system ';
            $activity->hospital_id = CommonMethods::getHopsitalID();
            $activity->created_by = Auth::id();

            if($staff_id=="")
            echo json_encode(array('type' => 'success','id'=>$id));
            else
                echo json_encode(array('type' => 'update','id'=>$id));
        }

    }

    public function view_profile($id){
        $staff = Staffs::with('users')
            ->whereNull('deleted_at')->where('staffs.user_id',$id)->where('hospital_id',CommonMethods::getHopsitalID())->get();

        $countries = Countries::get();
        $ipaddress = '';
        $ipaddress = getenv('HTTP_CLIENT_IP');
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

        return view('staffs.profile',['staff' => $staff[0],'countries'=>$countries,'current_country'=>$current_country]);
    }

    public function view_my_profile($id){
        $staff = Staffs::with('users')
            ->whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->where('staffs.user_id',$id)->get();

        return view('staffs.my-profile',['staff' => $staff[0]]);
    }

    public function delete_staff($id){
        $staff = Staffs::find($id);
        $staff->deleted_at = date('Y-m-d h:i:s');
        $staff->save();

        $activity = new Activities();

        $activity->user_id = $id ;
        $activity->activity_type = 'staff';
        $activity->activity_title = 'Staff is deleted.';
        $activity->activity_description =  '<strong>'.ucwords($staff->first_name.' '.$staff->last_name).'</strong> is deleted';
        $activity->created_by = Auth::id();
    }

    public function activate_account($email,$by_email,$user_id){

        $user = User::where('email',$email)->get();
        if($user->isNotEmpty()){
            $status = $user[0]->status;
            if($status=="pending"){

                $activity = new Activities();

                $activity->user_id = Auth::id() ;
                $activity->activity_type = 'staff';
                $activity->activity_title = 'Account is updated.';
                $activity->activity_description =  '<strong>'.ucwords($email).'</strong> is activated its account';
                $activity->created_by = Auth::id();

                $u = User::find($user[0]->id);

                $u->status='approved';  $u->save();
                return view('partials.activate');

            }

            if($status=="approved"){

                return view('partials.activate-approved');

            }
        }
    }



    public function view_my_documents($document_category){
        $folder = Folders::where('slug',$document_category)->get();
        $documents = Folders::find($folder[0]->id)->documents;
        $documents = !empty($documents)?$documents:NULL;

        return view('staffs.my-documents',['documents'=>$document_category,'id'=>$folder[0]->id,'documents_list'=>$documents]);
    }
    public function view_my_salaries($id){
        return view('staffs.my-salaries');
    }
    public function view_salary_detail($month_year){
        return view('staffs.salary-detail');
    }

    public function view_my_commissions($id){
        return view('staffs.my-commission');
    }
    public function view_my_purchases($id){
        return view('staffs.my-purchase');
    }

    public function view_purchases_detail($id){
        return view('staffs.purchase-detail');
    }
    public function view_commission_detail($month_year){
        return view('staffs.commission-detail');
    }

    public function update_staff(Request $request){
       $staff_id = $request->id;
       $staff = Staffs::find($staff_id);
        $data = $staff->attributesToArray();
        $user_id = $data['user_id'];
        $data = array_except($data, ['user_id','id','created_at','updated_at','deleted_at']);
        $data['staff_id'] = $user_id;
//dd($data);
        $archive = ArchiveStaffs::create($data);

        $date_of_birth = $request->year.'-'.$request->month.'-'.$request->day;

        $staff->salutation               = $request->salutation;
        $staff->last_name             = $request->last_name;
        $staff->first_name             = $request->first_name;
        $staff->contact_number            = $request->contact_number;
        $staff->phone_code                     = $request->country_area_code;
        $staff->email                     = $request->email;
        $staff->date_of_birth            = !empty($request->day)?date('Y-m-d',strtotime($date_of_birth)):NULL;
        $staff->gender                   = $request->gender;
        $staff->nationality              = $request->nationality;
        $staff->id_no                     = $request->id_no;
        $staff->start_date            = !empty($request->start_date)?date('Y-m-d',strtotime($request->start_date)):NULL;
        $staff->end_date            = !empty($request->end_date)?date('Y-m-d',strtotime($request->end_date)):NULL;
        $staff->city                     = $request->city;
        $staff->state                    = $request->state;
        $staff->zip_code                  = $request->zipcode;
        $staff->address                  = $request->address;
        $staff->designation                  = $request->designation;
        $staff->cuser = \Illuminate\Support\Facades\Auth::id();
        $id = $staff->save();

        if($id > 0){
            $activity = new Activities();

            $activity->user_id = Auth::id() ;
            $activity->activity_type = 'staff';
            $activity->activity_title = 'Staff is updated.';
            $activity->activity_description =  '<strong>'.ucwords($request->first_name.' '.$request->last_name).'</strong> is updated';
            $activity->created_by = Auth::id();

            $activity->save();
            echo json_encode(array('type' => 'success','id'=>$staff_id));
        }


    }

    public function get_revised_data($id){
        $archive_data = ArchiveStaffs::where('staff_id',$id)->get();
        $archive_data = $archive_data->isNotEmpty()?$archive_data:NULL;
        return view('staffs.get-revised-data',['revised' => $archive_data]);
    }

    public function get_revised_data_by_id($id){
        $archive_data = ArchiveStaffs::where('id',$id)->get();

        $archive_data = $archive_data->isNotEmpty()?$archive_data:NULL;
        return view('staffs.get-revised-data-by-id',['revised' => $archive_data]);
    }

    public function upload_profile_picture(Request $request){
        $file_data = $request->image;
        $image_array_1 = explode(";", $file_data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $staff_id = $request->staff_id;
        $file_name = 'image_'.time().'_'.$staff_id.'.png'; //generating unique file name;
        $data = base64_decode($image_array_2[1]);
        if($file_data!=""){ // storing image in storage/app/public Folder
            \Storage::disk('images')->put($file_name,$data);
            $staff = Staffs::find($staff_id);
            $old_picture = $staff->profile_picture;

            $staff->profile_picture = $file_name;
            $staff->save();
            \Storage::disk('images')->delete($old_picture);
        }
    }

    public function approve_staff_account($id){
        $password = str_random(12);
        $staff = Staffs::find($id);
        $user_id = $staff->user_id;

        $user = User::find($user_id);

        $user->password =  bcrypt($password);
        $user->status = 'approved';
        $user->save();

        SendEmail::send_credentials_approve_account($staff->first_name.' '.$staff->last_name,$user->email, $password,$user_id);
    }

    public function suspend_staff_account($id){
        $staff = Staffs::find($id);
        $user_id = $staff->user_id;

        $user = User::find($user_id);

        $user->status = 'suspended';
        $user->save();
    }

    public function get_activities($id){

        $activities = User::find($id)->activities()->paginate(10);

        return view('staffs.get-activities',['activities'=>$activities]);
    }

    public function view_my_leave($id){
        $sick_leave = Leaves::where('user_id',$id)->where('leave_type','=','sick-leave')->where('status','approved')->sum('number_of_leave');
        $vacation = Leaves::where('user_id',$id)->where('leave_type','=','vacations')->where('status','approved')->sum('number_of_leave');
        $un_paid = Leaves::where('user_id',$id)->where('leave_type','=','un-paid')->where('status','approved')->sum('number_of_leave');
        $emergancy = Leaves::where('user_id',$id)->where('leave_type','=','emergancy')->where('status','approved')->sum('number_of_leave');
        $current_month = date('Y-m');

        $leaves = Leaves::where('user_id',$id)->where('leave_start_date','LIKE','%'.$current_month.'%')->where('status','approved')->orderBy('leave_start_date','ASC')->get();


       /* $sick_leave_this_month = Leaves::where('user_id',$id)->where('leave_start_date','LIKE','%'.$current_month.'%')->where('leave_type','=','sick-leave')->sum('number_of_leave');
        $vacation_this_month = Leaves::where('user_id',$id)->where('leave_start_date','LIKE','%'.$current_month.'%')->where('leave_type','=','vacations')->sum('number_of_leave');
        $emergancy_this_month = Leaves::where('user_id',$id)->where('leave_start_date','LIKE','%'.$current_month.'%')->where('leave_type','=','emergancy')->sum('number_of_leave');
        $un_paid_this_month = Leaves::where('user_id',$id)->where('leave_start_date','LIKE','%'.$current_month.'%')->where('leave_type','=','un_paid')->sum('number_of_leave');


        $array = array(
            'month_name' => date('M Y'),
            'sick_leave' => $sick_leave_this_month,
            'vacations' => $vacation_this_month,
            'emergancy' => $emergancy_this_month,
            ''
        );*/

        return view('staffs.my-leave',['sick_leave'=>5-$sick_leave,'vacations'=>5-$vacation,'un_paid'=>5-$un_paid,'emergancy'=>5-$emergancy,'leaves'=>$leaves]);
    }

    public function add_new_leave(Request $request){

        $maximum_leaves = array(
            'sick-leave' =>5,
            'un-paid' => 5,
            'emergancy' => 5,
            'vacations' => 5
        );

        $user_id = $request->user_id;
        $leave_type = $request->leave_type;
        $l = Leaves::where('user_id',$user_id)->where('leave_type',$leave_type)->sum('number_of_leave');
        $max_leave = $maximum_leaves[$leave_type];

        if($max_leave <= $l){
            echo json_encode(array('type' => 'error','message'=>'Your leave for '.str_replace('-',' ',$leave_type).' is exceeding from limit.'));exit;
        }





     $leave_start_date =  !empty($request->leave_start_date)?date('Y-m-d',strtotime($request->leave_start_date)):NULL;
        $leave_end_date = !empty($request->leave_end_date)?date('Y-m-d',strtotime($request->leave_end_date)):NULL;
        $number_of_leave = $request->number_of_leave;

        $reason_of_leave = $request->reason_of_leave;

        $leaves = new Leaves();

        $leaves->user_id = $user_id;
        $leaves->leave_start_date = $leave_start_date;
        $leaves->leave_end_date = $leave_end_date;
        $leaves->number_of_leave = $number_of_leave;
        $leaves->leave_type = $leave_type;
        $leaves->reason_of_leave = $reason_of_leave;
        $leaves->status = 'waiting';
        $leaves->cuser = \Illuminate\Support\Facades\Auth::id();
        $leaves->save();

        $id = $leaves->id;

        $remaining_leaves = $max_leave - ($l+$number_of_leave);

        if($id > 0){


            echo json_encode(array('type' => 'success','message'=>'Leave is sent successfully for approving','data'=>array(
                'remaining_leave'=>$remaining_leaves,
                'leave_type' => $leave_type
            )));
        }

        else
            echo json_encode(array('type' => 'error','message'=>'There is someting wrong, try again'));



    }

    public function leave_requests(){

        $leaves = Leaves::with('users')->paginate(20);

        $leaves = $leaves->isNotEmpty()?$leaves:NULL;

        return view('staffs.leaves',['leaves'=>$leaves]);


    }

    public function set_permissions($id){
        $staff = Staffs::where('user_id',$id)->get();
        $user_id = $id;
        $id = isset($staff[0])?$staff[0]->id:0;

        $user_permissions = User::find($user_id)->permissions->pluck('id')->all();
        $user_permissions = count($user_permissions) > 0?$user_permissions:array();
//dd($user_permissions);
        $staff = Staffs::find($id);
        $permissions = Permissions::with('children')->whereNull('parent_id')->get();

        return view('permissions',['permissions'=>$permissions,'id'=>$user_id,'staff'=>$staff,'user_permissions'=>$user_permissions]);
    }

    public function save_permissions(Request $request){
        $user_id = $request->user_id;
        $permissoins = $request->permissions;
        $user           = User::find($user_id);
        $user->permissions()->detach();
        //exit;

        foreach($permissoins as $permissions){
            $permission     = Permissions::find($permissions);



                $permission->users()->save($user);

        }


    }
}
