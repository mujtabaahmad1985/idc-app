<?php

namespace App\Http\Controllers;



use App\Countries;

use App\Patients;

use Auth;
use Request;
use Validator;
use App\User;
use App\Medicals;
use App\Addresses;
use App\SendEmail;


class GeneralController extends Controller
{
    //
    public function create_account_patient(){
        $countries = Countries::get();
        $patient = Patients::orderBy('created_at', 'desc')->first();
        $uniqueId = isset($patient->id)?25082000+$patient->id+1:25082000;
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


        return view('register_as_patient',['countries'=>$countries,'current_country'=>$current_country,'unique_id'=>$uniqueId]);

    }

    public function save_from_login_page(\Illuminate\Http\Request $request){

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
            $p = Patients::whereNull('deleted_at')->where('patient_email',$request->patient_email)->get();
            if($p->isNotEmpty()){
                $u_id = $p[0]->id;

                if($patient_id != $u_id)
                    $flag = "true";
            }
        }

        if(!empty($patient_id)){
            $p = Patients::whereNull('deleted_at')->where('patient_unique_id',$request->patient_unique_id)->get();
            // dd($p);
            if($p->isNotEmpty()){
                $u_id = $p[0]->id;

                if($patient_id != $u_id)
                    $flag1 = "true";
            }
        }
        if($flag1=="true") {

            $validator = Validator::make($request->all(), [
                'patient_unique_id' => 'required|unique:patients',
            ]);

            if ($validator->fails()) {

                $error = $validator->errors()->all();
                echo json_encode(array('type' => 'error', 'message' => $error));
                exit;
            }
        }
        if($flag=="true") {

            $validator = Validator::make($request->all(), [
                'patient_email' => 'required|unique:patients',

            ]);

            if ($validator->fails()) {

                $error = $validator->errors()->all();
                echo json_encode(array('type' => 'error', 'message' => $error));
                exit;
            }
        }




        $user = new User();
        $user->email = $request->patient_email;
        $user->name = str_slug($request->name);
        $user->password =  bcrypt($request->password);
        $user->role = 'patient';
        $user->status = 'pending';
        $user->save();
        $user_id = $user->id;



        $patient = new Patients();


        if(!empty($user_id))
            $patient->user_id               = $user_id;
        $patient->salutation        = $request->salutation;
        $patient->patient_unique_id        = $request->patient_unique_id;
        $patient->patient_name             = $request->first_name.' '.$request->last_name;
        $patient->first_name             = $request->first_name;
        $patient->last_name             = $request->last_name;

        $patient->patient_phone            = $request->contact_number;
        $patient->code            = $request->country_area_code;
        $patient->patient_email            = $request->patient_email;
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

        $addresses = new Addresses();
        $addresses->address = $request->address;
        $addresses->patient_id = $id;
        $addresses->save();

        $medical_history = new Medicals();
        $medical_history->is_medication = isset($request->is_medication)?"Yes":"No";
        $medical_history->is_allegric   = isset($request->is_allegric)?"Yes":"No";
        $medical_history->medication                  = $request->medication;
        $medical_history->allegric                  = $request->allergic;
        $medical_history->others                  = $request->others;
        $medical_history->illness                  = json_encode($request->ilnessess);
        $medical_history->patient_id                  = $id;
        $medical_history->save();

        echo json_encode(array('type'=>'success','message'=>'Your information saved. An email has sent for activating account, check your inbox'));

    }


    public function take_backup(){

    }

    function backup_tables($host,$user,$pass,$name,$tables = '*')
    {

        $link = mysqli_connect($host,$user,$pass);
        mysqli_select_db($name,$link);

        $return="";
        //get all of the tables
        if($tables == '*')
        {
            $tables = array();
            $result = mysqli_query('SHOW TABLES');
            while($row = mysqli_fetch_row($result))
            {
                $tables[] = $row[0];
            }
        }
        else
        {
            $tables = is_array($tables) ? $tables : explode(',',$tables);
        }

        //cycle through
        foreach($tables as $table)
        {
            $result = mysqli_query('SELECT * FROM '.$table);
            $num_fields = mysqli_num_fields($result);

            $return.= 'DROP TABLE '.$table.';';
            $row2 = mysqli_fetch_row(mysqli_query('SHOW CREATE TABLE '.$table));
            $return.= "\n\n".$row2[1].";\n\n";

            for ($i = 0; $i < $num_fields; $i++)
            {
                while($row = mysqli_fetch_row($result))
                {
                    $return.= 'INSERT INTO '.$table.' VALUES(';
                    for($j=0; $j<$num_fields; $j++)
                    {
                        $row[$j] = addslashes($row[$j]);
                        $row[$j] = ereg_replace("\n","\\n",$row[$j]);
                        if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                        if ($j<($num_fields-1)) { $return.= ','; }
                    }
                    $return.= ");\n";
                }
            }
            $return.="\n\n\n";
        }

        //save file
        $filename = dirname(__FILE__)."/database_backups/idcsg-live-database-backup-".date('Y-m-d').".sql";;
        $filename_zip = dirname(__FILE__)."/database_backups/idcsg-live-database-backup-".date('Y-m-d').".zip";;
        $handle = fopen($filename,'w+');
        fwrite($handle,$return);
        fclose($handle);

        $zip = new ZipArchive();
        if ($zip->open($filename_zip, ZIPARCHIVE::CREATE) !== TRUE) {
            exit("cannot open <$filename>n");
        }
        $zip->addFile($filename , $filename);
        $zip->close();
        #Now delete the .sql file without any warning
        @unlink($filename);

        # rename(dirname(__FILE__).'/'.$filename, dirname(__FILE__)."/database_backups/".$filename);
    }

    public function forget_password(\Illuminate\Http\Request $request){
        $email = $request->email;

        $user = User::where('email',$email)->get();

        if($user->isNotEmpty()){

            SendEmail::reset_password($email);

            echo json_encode(array('type' => 'success','message'=>'Reset password link is sent to email address, check inbox.')); exit;
        }else{
            echo json_encode(array('type' => 'error','message'=>'Email address is not found in database.')); exit;
        }

    }

    public function reset_password(){
        $email =  $_GET['email'];

        return view('reset');
    }

    public function reset_with_new_password(\Illuminate\Http\Request $request){
           // dd($request->all());

            $rules = array(
                'new_password'         => ['required','min:8',
               'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/',
               ],

                'confirm_password'      => 'required|same:new_password'
            );

        $custom_messages = array(
            'regex' => 'Password must contain a capital character and number at least.'
        );

        $validator = Validator::make($request->all(), $rules,$custom_messages);

        // check if the validator failed -----------------------
        if($validator->fails()){
            $error =  $validator->errors()->all();
            echo json_encode(array('type' => 'error','message'=>$error));
            exit;
        }

        $password = $request->new_password;

        $email = $request->email;

        $user = User::where('email',$email)->get();

        if($user->isNotEmpty()) {

            $user_id = $user[0]->id;

            $user = User::find($user_id);

            $user->password =  bcrypt($password);
            $user->status = 'approved';
            $user->save();

            SendEmail::reset_account_credentials($email,$password);
            echo json_encode(array('type' => 'success','message'=>'Password is reset successfully, login credentials are sent to email'));
            exit;
        }


    }
    public function get_recent_patient_unique_id(){
        $patient = Patients::orderBy('created_at', 'desc')->first();
        $uniqueId = isset($patient->id)?25082000+$patient->id+1:25082000;$patient = Patients::orderBy('created_at', 'desc')->first();
        $uniqueId = isset($patient->id)?25082000+$patient->id+1:25082000;
        return $uniqueId;
    }
}
