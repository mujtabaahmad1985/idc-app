<?php

namespace App\Http\Controllers\Api;

use App\ApiTokens;
use App\Invoices;
use App\Medicals;
use App\MobileCodes;
use App\Patients;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\CommonMethods;
use App\Folders;

class PatientApi extends Controller
{
    //
    /**
     * Get patient basic information about personal data, designtion and addresss.
     *
     */
    public function getPatientBasicInformation(Request $request){
        $token = $request->bearerToken();



        if (!empty($token)) {
            $user = CommonMethods::authenticate_token($token);
            if (!isset($user)) {
                return CommonMethods::sendError('No user found against this token!',null,'X003');
            }


            $patient = Patients::where('user_id',$user['user_id'])->first();

            if (!isset($patient)) {
                return CommonMethods::sendError('No patient found against this token!',null,'X003');
            }

            $data = array(
                'id' => $patient->id,
                'patient_unique_id'         => $patient->patient_unique_id,
                'salutation'                => $patient->salutation,
                'first_name'                => $patient->first_name,
                'last_name'                 => $patient->last_name,
                'phone'                     => isset($patient->phones)?$patient->phones:$patient->patient_phone,
                'date_of_birth'             => $patient->date_of_birth,
                'patient_email'             => $patient->patient_email,
                'gender'                    => $patient->gender,
                'nationality'               => $patient->nationality,
                'card_type'               => $patient->card_type,
                'card_number'               => $patient->card_number,
                'occupation'               => $patient->occupation,
                'comapny_name'               => $patient->comapny_name,
                'address'               => isset($patient->addresses)?$patient->addresses:$patient->addresses,



            );
            return CommonMethods::sendResponse($data,'Patient data found!');
        }else{
            return CommonMethods::sendError('No token is found with request!',null,'X001');
        }
    }


    public function getPatientReferral(Request $request){
        $token = $request->bearerToken();



        if (!empty($token)) {
            $user = CommonMethods::authenticate_token($token);
            if (!isset($user)) {
                return CommonMethods::sendError('No user found against this token!',null,'X003');
            }


            $patient = Patients::where('user_id',$user['user_id'])->first();


            if (!isset($patient)) {
                return CommonMethods::sendError('No patient found against this token!',null,'X003');
            }

            $referral = isset($patient->patients)?$patient->patients:NULL;
         $name= "";
            $ref = NULL;
            if((isset($referral) && !is_null($referral) && !empty($referral)) || !empty($patient->referral_name)){
                if(isset($referral) && !is_null($referral) && !empty($referral))
                    $ref = $referral;
                if(!empty($patient->referral_name))
                    $name = $patient->referral_name;
            }

            $data = array(
                'referral_name'             => isset($ref)?$ref->first_name.' '.$ref->last_name:$name,
                'referral_unique_id'        => isset($ref)?$ref->patient_unique_id:NULL,
                'salutation'                => isset($ref)?$ref->salutation:NULL,
                'first_name'                => isset($ref)?$ref->first_name:NULL,
                'last_name'                 => isset($ref)?$ref->last_name:NULL,
                'phone'                     => isset($ref) && isset($ref->phones)?$ref->phones:NULL,
                'date_of_birth'             => isset($ref)?$ref->date_of_birth:NULL,
                'patient_email'             => isset($ref)?$ref->patient_email:NULL,
                'gender'                    => isset($ref)?$ref->gender:NULL,
                'nationality'               => isset($ref)?$ref->nationality:NULL,
                'address'                   => isset($ref) && isset($ref->addresses)?$ref->addresses:NULL,



            );
            return CommonMethods::sendResponse($data,'Refferal data found!');
        }else{
            return CommonMethods::sendError('No token is found with request!',null,'X001');
        }
    }

    public function getPatientReferrals(Request $request){
        $token = $request->bearerToken();



        if (!empty($token)) {
            $user = CommonMethods::authenticate_token($token);
            if (!isset($user)) {
                return CommonMethods::sendError('No user found against this token!',null,'X003');
            }


            $patient = Patients::where('user_id',$user['user_id'])->first();


            if (!isset($patient)) {
                return CommonMethods::sendError('No patient found against this token!',null,'X003');
            }

            $referrals = (isset($patient->patient_refers) && $patient->patient_refers->count() > 0)?$patient->patient_refers:NULL;

            if(isset($referrals)){
                foreach($referrals as $ref){
                    $data[] = array(
                        'referral_name'             => isset($ref)?$ref->first_name.' '.$ref->last_name:$name,
                        'referral_unique_id'        => isset($ref)?$ref->patient_unique_id:NULL,
                        'salutation'                => isset($ref)?$ref->salutation:NULL,
                        'first_name'                => isset($ref)?$ref->first_name:NULL,
                        'last_name'                 => isset($ref)?$ref->last_name:NULL,
                        'phone'                     => isset($ref) && isset($ref->phones)?$ref->phones:NULL,
                        'date_of_birth'             => isset($ref)?$ref->date_of_birth:NULL,
                        'patient_email'             => isset($ref)?$ref->patient_email:NULL,
                        'gender'                    => isset($ref)?$ref->gender:NULL,
                        'nationality'               => isset($ref)?$ref->nationality:NULL,
                        'address'                   => isset($ref) && isset($ref->addresses)?$ref->addresses:NULL,



                    );
                }
            }


            return CommonMethods::sendResponse($data,'Refferal data found!');
        }else{
            return CommonMethods::sendError('No token is found with request!',null,'X001');
        }
    }
    public function getPatientDocuments(Request $request){
        $token = $request->bearerToken();



        if (!empty($token)) {
            $user = CommonMethods::authenticate_token($token);
            if (!isset($user)) {
                return CommonMethods::sendError('No user found against this token!',null,'X003');
            }


            $patient = Patients::where('user_id',$user['user_id'])->first();


            $folders = Folders::whereNull('deleted_at')->where('patient_id',$patient->id)->orderBy('folder_name')->get();
           // dd($folders);
            $documents = [];

            if(isset($folders) && $folders->count() > 0){
                foreach($folders as $folder){

                    if(isset($folder->documents) && $folder->documents->count() > 0){
                        foreach($folder->documents as $document){
                            $documents[$folder->folder_name][] = array(
                                'title' => $document->document_title,
                                'document_location' => 'https://uploads.idcapp.net/documents/'.$document->document_title
                            );
                        }

                    }else{
                        $documents[$folder->folder_name] = NULL;
                    }
                }

                return CommonMethods::sendResponse($documents,'Documents data found!');
            }else{
                return CommonMethods::sendError('No documents found against this patient!',null,'X003');
            }

        }else{
            return CommonMethods::sendError('No token is found with request!',null,'X001');
        }

    }

    public function getPatientMedication(Request $request){
        $token = $request->bearerToken();



        if (!empty($token)) {
            $user = CommonMethods::authenticate_token($token);
            if (!isset($user)) {
                return CommonMethods::sendError('No user found against this token!',null,'X003');
            }


            $patient = Patients::where('user_id',$user['user_id'])->first();

            $medical = Medicals::where('patient_id',$patient->id)->first();


            $data = [];

            if(isset($medical)){
                $data['is_medication']      = $medical->is_medication;
                $data['medication']         = $medical->medication;
                $data['is_allegric']        = $medical->is_allegric;
                $data['allegric']           = $medical->allegric;
                $data['illness']           = json_decode($medical->illness);



                return CommonMethods::sendResponse($data,'Medical conditions found!');
            }else{
                return CommonMethods::sendError('No documents found against this patient!',null,'X003');
            }

        }else{
            return CommonMethods::sendError('No token is found with request!',null,'X001');
        }

    }

    public function getPatientAppointments(Request $request){
        $token = $request->bearerToken();



        if (!empty($token)) {
            $user = CommonMethods::authenticate_token($token);
            if (!isset($user)) {
                return CommonMethods::sendError('No user found against this token!',null,'X003');
            }


            $patient = Patients::where('user_id',$user['user_id'])->first();

            $medical = Medicals::where('patient_id',$patient->id)->first();


            $data = [];

            if(isset($patient->appointments) && $patient->appointments->count() > 0){
                foreach($patient->appointments as $appointment){
                    $data[] = array(
                        'id' => $appointment->id,
                        'service' => $appointment->doctor_services->service_name,
                        'doctor_name' => 'Dr. '.$appointment->doctors->fname.' '.$appointment->doctors->lname,
                        'booking_date' => CommonMethods::formatDate($appointment->booking_date),
                        'start_time' => $appointment->start_time,
                        'end_time' => $appointment->end_time,
                        'status' => $appointment->status
                    );
                }




                return CommonMethods::sendResponse($data,'Appointments are found!');
            }else{
                return CommonMethods::sendError('No appointments found against this patient!',null,'X003');
            }

        }else{
            return CommonMethods::sendError('No token is found with request!',null,'X001');
        }

    }

    public function validate_code(Request $request){
        $code = $request->get('code');
        $mobile_code = MobileCodes::where('code',$code)->first();

        if(isset($mobile_code)){

            $token = ApiTokens::where('user_id',$mobile_code->user_id)->first();

            return CommonMethods::sendResponse(array('access_token'=>$token->api_token),'Data found');
        }

        return CommonMethods::sendError('No code is found with request!',null,'X001');

    }

    public function getPatientInvoices(Request $request){
        $token = $request->bearerToken();



        if (!empty($token)) {
            $user = CommonMethods::authenticate_token($token);
            if (!isset($user)) {
                return CommonMethods::sendError('No user found against this token!', null, 'X003');
            }


            $patient = Patients::where('user_id', $user['user_id'])->first();

            $invoices = Invoices::where('patient_id',$patient->id)->get();

            if(isset($invoices) && $invoices->count() > 0){
                foreach($invoices as $invoice){
                    $data[] = array(
                        'invoice_id' =>str_pad($invoice->id,6,0,STR_PAD_LEFT),
                        'paid_as' => $invoice->paid_via,
                        'total_amount' => number_format($invoice->total_amount,2),
                        'apointment_id' => $invoice->appointment_id,
                        'invoice_date' => CommonMethods::formatDate($invoice->created_at)
                    );
                }
                return CommonMethods::sendResponse($data,'Invoices are found!');
            }
        }
        return CommonMethods::sendError('No code is found with request!',null,'X001');
        }
}
