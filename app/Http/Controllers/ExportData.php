<?php

namespace App\Http\Controllers;

use App\Helpers\CommonMethods;
use App\MedicalConditions;
use App\Patients;
use Illuminate\Http\Request;
use Response;
use Carbon\Carbon;

class ExportData extends Controller
{
    //

    public function export_data(){
        $medical_conditions = MedicalConditions::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->orderBy('name')->get();

        $data = [
            'medical_conditions' => $medical_conditions
        ];
        return view('setup.export',$data);
    }

     public function get_export_data(Request $request){
        $master_option = $request->master_option;


        if($master_option=="patient"){
            $patients = null;
            $patient_option = $request->patient_option;
            $age = $request->age;

            switch($patient_option){
                case "age":
                    $patient_age = explode('-',$age);
                    $start_age = $patient_age[0];
                    $end_age = $patient_age[1];


                    $start_date = Carbon::now()->subYears($end_age)->format('Y-m-d');
                    $end_date = Carbon::now()->subYears($start_age)->format('Y-m-d');

                    $patients = Patients::whereBetween('date_of_birth',[$start_date,$end_date])->where('hospital_id',CommonMethods::getHopsitalID())->get();
                   // echo json_encode(['type'=>'patient','data'=>$patients]);


                break;
                case "gender":
                    $gender = $request->gender;
                    $patients = Patients::where('gender',$gender)->where('hospital_id',CommonMethods::getHopsitalID())->get();
                    break;
                case "date_registered":
                    $from_date = $request->from_date;
                    $to_date = $request->to_date;



                    $patients = NULL;

                    if(!empty($from_date) && empty($to_date)){
                        $f_date = date('Y-m-d',strtotime(str_replace('.','-',$from_date)));

                        $patients = Patients::where('created_at','>=',$f_date)->where('hospital_id',CommonMethods::getHopsitalID())->get();
                    }

                    if(empty($from_date) && !empty($to_date)){
                        $e_date = date('Y-m-d',strtotime(str_replace('.','-',$to_date)));

                        $patients = Patients::where('created_at','<=',$e_date)->where('hospital_id',CommonMethods::getHopsitalID())->get();
                    }

                    if(!empty($from_date) && !empty($to_date)){
                        $e_date = date('Y-m-d',strtotime(str_replace('.','-',$to_date)));
                        $f_date = date('Y-m-d',strtotime(str_replace('.','-',$from_date)));
                        $patients = Patients::whereBetween('created_at',[$f_date,$e_date])->where('hospital_id',CommonMethods::getHopsitalID())->get();
                    }



                    break;
                case "insuarance_by":
                    $insuarance_by = $request->insuarance_by;
                    $patients = Patients::where('insurance_by',$insuarance_by)->where('hospital_id',CommonMethods::getHopsitalID())->get();
                break;
            }

            if(isset($request->do_export)){
                $filename = 'patient-'.$patient_option.'.csv';
                $columns = ['Patient Unique No','D/O Register','Salutation','Name','D O B','IC/P/P NO','Sex','Mailing Address','Post Code',
                    'Change Of Address','Post Code','Tel number','Phone number','Referral Name','Referral Code','Drug Allergy','Name Of the Allergic Medicin','Occupation',
                    'Email','Source Code','Company','Company Website','Insurance By','Insurance No'
                    ];
                if(isset($patients) && $patients->count() > 0){
                    $headers = array(
                        "Content-type" => "text/csv",
                        "Content-Disposition" => "attachment; filename=".$filename,
                        "Pragma" => "no-cache",
                        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                        "Expires" => "0"
                    );


                    $callback = function() use ($patients, $columns)
                    {
                        $file = fopen('php://output', 'w');
                        fputcsv($file, $columns);

                        foreach($patients as $patient) {

                            $referral = isset($patient->patients)?$patient->patients:NULL;
                            $name= "";
                            $ref = NULL;
                            if((isset($referral) && !is_null($referral) && !empty($referral)) || !empty($patient->referral_name)){
                                if(isset($referral) && !is_null($referral) && !empty($referral))
                                    $ref = $referral;
                                if(!empty($patient->referral_name))
                                    $name = $patient->referral_name;
                            }
                            $array = [
                                $patient->patient_unique_id,
                                CommonMethods::formatDate($patient->created_at),
                                $patient->salutation,
                                $patient->first_name.' '.$patient->last_name,
                                CommonMethods::formatDate($patient->date_of_birth),
                                $patient->card_number,
                                $patient->gender,
                                isset($patient->addresses) && isset($patient->addresses[0])?( $patient->addresses[0]->house_no.', '. $patient->addresses[0]->apartments_no.', '. $patient->addresses[0]->street_no.', '.  $patient->addresses[0]->city.', '. $patient->addresses[0]->country):"",
                                isset($patient->addresses) && isset($patient->addresses[0])? $patient->addresses[0]->zipcode:"",

                                isset($patient->addresses) && isset($patient->addresses[1])?( $patient->addresses[1]->house_no.', '. $patient->addresses[1]->apartments_no.', '. $patient->addresses[1]->street_no.', '.  $patient->addresses[0]->city.', '. $patient->addresses[1]->country):"",
                                isset($patient->addresses) && isset($patient->addresses[1])? $patient->addresses[1]->zipcode:"", "",
                                $patient->patient_phone,
                                isset($ref)?$ref->first_name.' '.$ref->last_name:$name,
                                isset($ref)?$ref->patient_unique_id:"",
                                "",
                                isset($patient->drug_allergies)?implode(', ',$patient->drug_allergies->pluck('name')->all()):"",
                                $patient->occupation,
                                $patient->patient_email,"",$patient->comapny_name,"",$patient->insurance_by,$patient->insurance_number





                            ];
                            fputcsv($file, $array);
                        }
                        fclose($file);
                    };
                    return response()->stream($callback, 200, $headers);
                }
            }

            else
            return view('patient.export.export',['patients'=>$patients]);
        }
     }


     function export_patient_data($data){

     }

}
