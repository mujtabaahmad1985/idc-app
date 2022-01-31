<?php

namespace App\Http\Controllers;

use App\ClinicalDetails;
use App\Helpers\CommonMethods;
use Illuminate\Http\Request;
use App\Locations;
use App\Countries;
use Illuminate\Support\Facades\Auth;
class ClinicalDetail extends Controller
{
    //
    public function search_clinical(){
        $name = $_GET['q'];
        header('Content-Type: application/json');

        $c = new ClinicalDetails();
        $clinicals = $c->get_clinical_details_by_name($name);
        //dd($clinicals);
        $array = NULL;
        foreach($clinicals as $clinical){
            $array[] = array(
                'id' => $clinical->id,
                'text' => $clinical->name,
                'address' => $clinical->address,
                'contact_number' => $clinical->contact_number,
                'searched_data_type'=> 'Clinical Detail'
            );
            //$array[] = $patient->patient_name;
        }

        // if(is_null($array))

        //   $array[] = array('id'=>0,'name'=>'Add patient');
        $array1['data']['clinical'] = $array;
        echo json_encode($array1);
    }
    public function get_clinical_detail(){

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

        $locations = Locations::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();

        $clinical_detail = new ClinicalDetails();
        $clinical_detail = $clinical_detail->get_clinical_details();

        return view('setup.clinical-detail',['locations'=>$locations,'countries'=>$countries,'current_country'=>$current_country,'detail'=>$clinical_detail]);
    }

    public function add_clinical_detail(Request $request){
        $clinical_detail = new ClinicalDetails();
        $clinical_detail->location_id = $request->location;
        $clinical_detail->contact_number = $request->contact_number;
        $clinical_detail->mobile_number = $request->mobile_number;
        $clinical_detail->website = $request->website;
        $clinical_detail->email = $request->email;
        $clinical_detail->mobile_code = $request->mobile_code;
        $clinical_detail->contact_code = $request->contact_code;
        $clinical_detail->cuser             = Auth::id();
        $clinical_detail->hospital_id = CommonMethods::getHopsitalID();
        $clinical_detail->save();

        $id = $clinical_detail->id;

        if ($id > 0) {
            echo json_encode(array(
                'type' => 'success',
                'message' => 'Clinical detail is added successfully. you can view in listing.'
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in user submitting, try again.'
            ));
        }
    }

    public function get_detail($id){

       $detail = ClinicalDetails::get_clinical_details_by_id($id);

//echo "<pre>"; print_r($detail[0]-);
        $array = array(
            'id'                    => $detail[0]->clinical_detail_id,
            'name'                  => $detail[0]->name,
            'location_id'           => $detail[0]->location_id,
            'contact_number'        => !empty($detail[0]->contact_number)?$detail[0]->contact_number:"",
            'mobile_number'         => !empty($detail[0]->mobile_number)?$detail[0]->mobile_number:"",
            'website'               => !empty($detail[0]->website)?$detail[0]->website:"",
            'email'                 => !empty($detail[0]->email)?$detail[0]->email:"",
            'address'               => !empty($detail[0]->address)?$detail[0]->address:"",
            'contact_code'          => !empty($detail[0]->contact_code)?$detail[0]->contact_code:"",
            'mobile_code'          => $detail[0]->mobile_code,
       );

       echo json_encode($array);
    }

        public function update_clinical_detail(Request $request){
        $id = $request->id;
            $clinical_detail = ClinicalDetails::find($id);

            $clinical_detail->location_id = $request->location;
            $clinical_detail->contact_number = $request->contact_number;
            $clinical_detail->mobile_number = $request->mobile_number;
            $clinical_detail->website = $request->website;
            $clinical_detail->email = $request->email;
            $clinical_detail->mobile_code = $request->mobile_code;
            $clinical_detail->contact_code = $request->contact_code;
            $id = $clinical_detail->save();

            if ($id > 0) {
                echo json_encode(array(
                    'type' => 'success',
                    'message' => 'Clinical detail is updated successfully. you can view in listing.'
                ));
            } else {
                echo json_encode(array(
                    'type' => 'error',
                    'message' => 'Some problem in clinical detail submitting, try again.'
                ));
            }

        }

        public function delete_detail($id){
            $clinical_detail = ClinicalDetails::find($id);

            $clinical_detail->deleted_At = date('Y-m-d H:i:s');
            $clinical_detail->save();
        }

}
