<?php

namespace App\Http\Controllers;
use App\AppointmentActivities;
use App\Helpers\CommonMethods;
use App\SendEmail;
use App\User;
use DB;
use App\Appointments;
use App\DoctorServices;
use App\Patients;
use App\Rooms;
use App\Locations;
use App\Doctors;
use App\Activities;
use App\Availabilities;
use Illuminate\Http\Request;
use App\Countries;
use Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use PDF;

class Appointment extends Controller
{
    //


    public function add_appointment(Request $request){
        $r = $request;
        $start = $request->start_time;
        $end = $request->end_time;

        if($start=="" || $end==""){
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Kindly select start and end time for appointment.'
            ));

            exit;
        }

        if($start >=  $end){
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Start time should be less than end time.'
            ));

            exit;
        }

        $d = Doctors::find($request->doctor_id);

        $check_availability = Availabilities::doctor_availability($request->appointment_date_start,$request->start_time,$request->end_time,['doctor'=>$d->doctor_id,'location'=>$request->location_id]);
     //  dd($check_availability );


        $request->start_time = date('H:i', strtotime('+0 minutes',strtotime($request->start_time)));
        $request->end_time = date('H:i', strtotime('-0 minutes',strtotime($request->end_time)));

        $is_appointment_exists_for_doctor = Appointments::where(function($query) use ($request){
                $query->where('doctor',$request->doctor_id)->orWhere('room',$request->room_id);
            })
            ->where('status','!=','cancelled')
            ->where('appointments.hospital_id',CommonMethods::getHopsitalID())
            ->where('booking_date',date('Y-m-d', strtotime($request->appointment_date_start)))
            ->where(function($query) use ($request){
                $query->where(function($query) use ($request){

                    /*
                     * CASE 1:
                            Existing Start Time >= Start Time
                            AND
                            Existing End Time <= End Time
                     */
                    $query->where('start_time','>=',date('H:i', strtotime($request->start_time)));
                    $query->where('start_time','<',date('H:i', strtotime($request->end_time)));

                    $query->where('end_time','>',date('H:i', strtotime($request->start_time)));

                    // $query->where('end_time','<',date('H:i', strtotime($request->end_time)));
                })
                    ->orWhere(function($query) use ($request){
                        /*
                         * CASE 2:
                                Existing Start Time >= Start Time
                                AND
                                Existing End Time > End Time
                         */
                        $query->where('start_time','>=',date('H:i', strtotime($request->start_time)));
                        $query->where('end_time','>',date('H:i', strtotime($request->end_time)));
                        $query->where('start_time','<',date('H:i', strtotime($request->end_time)));
                    })
                    ->orWhere(function($query) use ($request){
                        /*
                         * CASE 3:
                                Existing Start Time < Start Time
                                AND
                                Existing End Time <= End Time
                         */
                        $query->where('start_time','<',date('H:i', strtotime($request->start_time)));
                        $query->where('end_time','<',date('H:i', strtotime($request->end_time)));
                        $query->where('start_time','<',date('H:i', strtotime($request->end_time)));
                        $query->where('end_time','>',date('H:i', strtotime($request->start_time)));
                    })
                    ->orWhere(function($query) use ($request){
                        /*
                         * CASE 4:
                                Existing Start Time < Start Time
                                AND
                                Existing End Time <= End Time
                         */
                        $query->where('start_time','<',date('H:i', strtotime($request->start_time)));

                        $query->where('end_time','>',date('H:i', strtotime($request->end_time)));
                    })
                    ->orWhere(function($query) use ($request){
                        /*
                         * CASE 4:
                                Existing Start Time < Start Time
                                AND
                                Existing End Time <= End Time
                         */
                        $query->where('start_time','>',date('H:i', strtotime($request->start_time)));
                        $query->where('start_time','<',date('H:i', strtotime($request->end_time)));

                        $query->where('end_time','>',date('H:i', strtotime($request->start_time)));
                        $query->where('end_time','<',date('H:i', strtotime($request->end_time)));
                    }) ;
            })
            //->where('room',$request->room_id)
            //->where('location',$request->location_id)
            ->get();
        // dd($is_appointment_exists_for_doctor);
        if(!isset($request->walkin) || empty($request->walkin)) {

            if ($is_appointment_exists_for_doctor->isNotEmpty()) {
                // if(0){

                if ($is_appointment_exists_for_doctor[0]->appointment_type == "appointment") {
                    echo json_encode(array(
                        'type' => 'error',
                        'message' => 'An appointment is already booked with selected slots and doctor, please select different slots or doctor.'
                    ));
                } else {
                    echo json_encode(array(
                        'type' => 'error',
                        'message' => 'Doctor is not available for this time.'
                    ));
                }


                exit;

            }
        }
        $is_block_time = Appointments::where('booking_date',date('Y-m-d', strtotime($request->appointment_date_start)))
            ->where('status','!=','cancelled')
            ->where('appointment_type','block_time')
            ->where('appointments.hospital_id',CommonMethods::getHopsitalID())
            ->where(function($query) use ($request){
                $query->where(function($query) use ($request){

                    /*
                     * CASE 1:
                            Existing Start Time >= Start Time
                            AND
                            Existing End Time <= End Time
                     */
                    $query->where('start_time','>=',date('H:i', strtotime($request->start_time)));
                    $query->where('start_time','<',date('H:i', strtotime($request->end_time)));

                    $query->where('end_time','>',date('H:i', strtotime($request->start_time)));

                    // $query->where('end_time','<',date('H:i', strtotime($request->end_time)));
                })
                    ->orWhere(function($query) use ($request){
                        /*
                         * CASE 2:
                                Existing Start Time >= Start Time
                                AND
                                Existing End Time > End Time
                         */
                        $query->where('start_time','>=',date('H:i', strtotime($request->start_time)));
                        $query->where('end_time','>',date('H:i', strtotime($request->end_time)));
                        $query->where('start_time','<',date('H:i', strtotime($request->end_time)));
                    })
                    ->orWhere(function($query) use ($request){
                        /*
                         * CASE 3:
                                Existing Start Time < Start Time
                                AND
                                Existing End Time <= End Time
                         */
                        $query->where('start_time','<',date('H:i', strtotime($request->start_time)));
                        $query->where('end_time','<',date('H:i', strtotime($request->end_time)));
                        $query->where('start_time','<',date('H:i', strtotime($request->end_time)));
                        $query->where('end_time','>',date('H:i', strtotime($request->start_time)));
                    })
                    ->orWhere(function($query) use ($request){
                        /*
                         * CASE 4:
                                Existing Start Time < Start Time
                                AND
                                Existing End Time <= End Time
                         */
                        $query->where('start_time','>',date('H:i', strtotime($request->start_time)));
                        $query->where('start_time','<',date('H:i', strtotime($request->end_time)));

                        $query->where('end_time','>',date('H:i', strtotime($request->start_time)));
                        $query->where('end_time','<',date('H:i', strtotime($request->end_time)));
                    })
                    ->orWhere(function($query) use ($request){
                        /*
                         * CASE 4:
                                Existing Start Time < Start Time
                                AND
                                Existing End Time <= End Time
                         */
                        $query->where('start_time','<=',date('H:i', strtotime($request->start_time)));

                        $query->where('end_time','>=',date('H:i', strtotime($request->end_time)));
                    }) ;
            })
            //->where('room',$request->room_id)
            //->where('location',$request->location_id)
            ->get();
        // dd($is_block_time);
        if(!isset($request->walkin) && empty($request->walkin)){
            if($is_block_time->isNotEmpty()){
                // if(0){

                if($is_block_time[0]->room==-1 && $is_block_time[0]->doctor==-1){
                    //if all rooms and all doctors are not available
                    echo json_encode(array(
                        'type' => 'error',
                        'message' => 'You cannot book appointment at block time'
                    ));

                    exit;
                }

                if($is_block_time[0]->room==-1 && $is_block_time[0]->doctor==$request->doctor_id){
                    //if all rooms and same  doctor are not available
                    $doctor = Doctors::find($request->doctor_id);
                    echo json_encode(array(
                        'type' => 'error',
                        'message' => 'Dr. '.$doctor->fname.' is not available'
                    ));

                    exit;
                }

                if($is_block_time[0]->room==$request->room_id && $is_block_time[0]->doctor==$request->doctor_id){
                    //if same rooms and same  doctor are not available
                    $doctor = Doctors::find($request->doctor_id);
                    echo json_encode(array(
                        'type' => 'error',
                        'message' => 'Dr. '.$doctor->fname.' is not available for this room'
                    ));

                    exit;
                }


            }
        }



        $patient_id = $request->patient_id;
        if($patient_id>0) {
            $is_appointment_exists_for_patient = Appointments::where('patient', $request->patient_id)
                ->where('booking_date', date('Y-m-d', strtotime($request->appointment_date_start)))
                ->where(function ($query) use ($request) {
                    $query->where(function ($query) use ($request) {

                        /*
                         * CASE 1:
                                Existing Start Time >= Start Time
                                AND
                                Existing End Time <= End Time
                         */
                        $query->where('start_time', '>=', date('H:i', strtotime($request->start_time)));
                        $query->where('start_time', '<', date('H:i', strtotime($request->end_time)));

                        $query->where('end_time', '>', date('H:i', strtotime($request->start_time)));

                        $query->where('end_time', '<=', date('H:i', strtotime($request->end_time)));
                    })
                        ->orWhere(function ($query) use ($request) {
                            /*
                             * CASE 2:
                                    Existing Start Time >= Start Time
                                    AND
                                    Existing End Time > End Time
                             */
                            $query->where('start_time', '>=', date('H:i', strtotime($request->start_time)));
                            $query->where('end_time', '>', date('H:i', strtotime($request->end_time)));
                            $query->where('start_time', '<', date('H:i', strtotime($request->end_time)));
                        })
                        ->orWhere(function ($query) use ($request) {
                            /*
                             * CASE 3:
                                    Existing Start Time < Start Time
                                    AND
                                    Existing End Time <= End Time
                             */
                            $query->where('start_time', '<', date('H:i', strtotime($request->start_time)));
                            $query->where('end_time', '<=', date('H:i', strtotime($request->end_time)));
                            $query->where('start_time', '<', date('H:i', strtotime($request->end_time)));
                            $query->where('end_time', '>', date('H:i', strtotime($request->start_time)));
                        })
                        ->orWhere(function ($query) use ($request) {
                            /*
                             * CASE 4:
                                    Existing Start Time < Start Time
                                    AND
                                    Existing End Time <= End Time
                             */
                            $query->where('start_time', '>', date('H:i', strtotime($request->start_time)));
                            $query->where('start_time', '<', date('H:i', strtotime($request->end_time)));

                            $query->where('end_time', '>', date('H:i', strtotime($request->start_time)));
                            $query->where('end_time', '<', date('H:i', strtotime($request->end_time)));
                        });
                })->get();

            // if ($is_appointment_exists_for_patient->isNotEmpty()) {
            if (0) {
                echo json_encode(array(
                    'type' => 'error',
                    'message' => 'An appointment is already booked with selected patient at same time slots.'
                ));

                exit;

            }
        }

        /*  $bindings = $is_appointment_exists_for_doctor->getBindings();
          $sqlString = $is_appointment_exists_for_doctor->toSql() ;
          foreach ($bindings as &$binding) {
              $binding = is_numeric($binding) ? $binding : "'" . $binding . "'";
              $sqlString = preg_replace('/\?/', $binding, $sqlString, 1);
          }*/
        //$sqlString = str_replace(['?'], $bindings, $sqlString);
        // echo $sqlString;


        $appointment = new Appointments();

        $patient_id = $request->patient_id;
        if($patient_id==0 && !empty($request->patient_name)){
            $u = new User();
            $u->name = Str::slug($request->patient_name).'-'.$request->unique_id;
            if(!empty($request->patient_email))
            $u->email = $request->patient_email;
            else
                $u->email = "noemail@gmail.com";
            $u->role="patient";
            $u->hospital_id = CommonMethods::getHopsitalID();
            $u->save();
            $new_user_id = $u->id;

            $patient = new Patients();
            $patient->patient_unique_id = $request->unique_id;
            $p_name = explode(' ',$request->patient_name);



            $first_name = "";
            $last_name = "";

            if(count($p_name)==1)
                $first_name = $p_name[0];

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


            $patient->first_name = $first_name;
            $patient->last_name = $last_name;
            $patient->user_id = $new_user_id;
            $patient->salutation        = $request->salutation;
            $patient->patient_name = $request->patient_name;
            $patient->patient_email = $request->patient_email;
            $patient->patient_phone = $request->patient_phone;
            $patient->code            = $request->country_area_code;
            $patient->hospital_id = CommonMethods::getHopsitalID();
            $patient->cuser = Auth::id();
            $patient->save();

            $patient_id = $patient->id;
            if(!empty($request->patient_email))
            SendEmail::send_profile_link($request->patient_name,$new_user_id,$request->patient_email,$patient_id);
            //    $name =
        }

        if($patient_id==0){
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Appointment cannot booked without patient data.'
            ));

            exit;
        }

        $service_id = $request->service_id;

        if(!is_numeric($service_id)){
            $service = new DoctorServices();

            $service->service_name = $service_id;
            $service->hospital_id = CommonMethods::getHopsitalID();
            $id = $service->save();
            $id = $service->id;
            $service_id = $id;
        }





        $appointment->start_time        = date('H:i', strtotime($start));
        $appointment->end_time          = date('H:i', strtotime($end));
        $appointment->booking_date = date('Y-m-d', strtotime($request->appointment_date_start));
        $appointment->booking_end_date = date('Y-m-d', strtotime($request->appointment_date_end));
        $appointment->patient           = $patient_id;
        $appointment->doctor            = $request->doctor_id;
        $appointment->service           = $service_id;
        $appointment->location          = $request->location_id;
        $appointment->room              = $request->room_id;
        $appointment->notes              = $request->notes;
        $appointment->cuser             = Auth::id();
        $appointment->hospital_id       = CommonMethods::getHopsitalID();

        $appointment->save();

        $id = $appointment->id;

        if ($id > 0) {
            AppointmentActivities::add_appointment_activity($id,'created');
            $patient = Patients::find($patient_id);
            if($patient->patient_email!=""){
                $pdf = PDF::loadView('pdf.appointment-detail-pdf',['patient'=>$patient]);
                $file_name="appointment.pdf";
                $path = public_path('/uploads/qrcode');
                $pdf->save($path . '/' . $file_name);
                SendEmail::sendBookAppointmentEmail($patient->patient_name,$patient->patient_email,$patient_id);
            }

            $service = DoctorServices::find($service_id);

            $activity = new Activities();

            $activity->user_id = $patient_id ;
            $activity->activity_type = 'patient';
            $activity->activity_title = 'booked appointment';
            $activity->activity_description =  'Appointment booked for "'.$service->service_name.'" from '.date('H:i', strtotime($request->start_time)).' - '.date('H:i', strtotime($request->end_time))
                .' at '.$request->appointment_date;
            $activity->created_by = Auth::id();

            $activity->hospital_id = CommonMethods::getHopsitalID();

            $activity->save();

            echo json_encode(array(
                'type' => 'success',
                'message' => 'Booked.'
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in booking, try again.'
            ));
        }

    }

    /*public function block_time(Request $request){
        $start_date = date('Y-m-d',strtotime($request->block_date));
        $end_date = date('Y-m-d',strtotime($request->block_end_date));
        $s = $start_date;
        while($start_date <= $end_date){
           // echo $start_date.'<br />';
            $start_date = date('Y-m-d',strtotime("+1 days ".$start_date));

       // exit;

        $appointment = new Appointments();
        $appointment->start_time        = date('H:i', strtotime($request->start_time));
        $appointment->end_time          = date('H:i', strtotime($request->end_time));
        $appointment->booking_date      = $s;
        $appointment->booking_end_date  = $end_date;
        $appointment->doctor            = $request->doctor_id;
        $appointment->service           = $request->service_id;
        $appointment->location          = $request->location_id;
        $appointment->room              = $request->room_id;
        $appointment->notes              = $request->notes;
        $appointment->appointment_type              = $request->booking_type;
        $appointment->save();

        $id = $appointment->id;
    }
        if ($id > 0) {
            echo json_encode(array(
                'type' => 'success',
                'message' => 'Block time is set.'
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in blocking, try again.'
            ));
        }
    }*/
    public function block_time(Request $request){
        $start_date = date('Y-m-d',strtotime($request->block_date));
        $end_date = date('Y-m-d',strtotime($request->block_end_date));
        $s = $start_date;
        while($start_date <= $end_date){

            $start_date = date('Y-m-d',strtotime("+1 days ".$start_date));
            foreach($request->doctor_id as $doctor)
            {
                foreach($request->location_id as $location)
                {
                    foreach($request->room_id as $room)
                    {
                        $appointment = new Appointments();
                        $appointment->start_time        = date('H:i', strtotime($request->start_time));
                        $appointment->end_time          = date('H:i', strtotime($request->end_time));
                        $appointment->booking_date      = $s;
                        $appointment->booking_end_date  = $end_date;
                        $appointment->doctor            = $doctor;
                        $appointment->service           = $request->service_id;
                        $appointment->location          = $location;
                        $appointment->room              = $room;
                        $appointment->notes             = $request->notes;
                        $appointment->appointment_type  = $request->booking_type;
                        $appointment->cuser             = Auth::id();
                        $appointment->hospital_id       = CommonMethods::getHopsitalID();
                        $appointment->save();
                        $id = $appointment->id;
                    }

                }
            }
        }
        if ($id > 0) {
            echo json_encode(array(
                'type' => 'success',
                'message' => 'Block time is set.'
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in blocking, try again.'
            ));
        }
    }
    public function get_appointments($d_id,$p_id){


        //  header('Content-Type: application/json');
        $doctor_id = Auth::user()->role=='doctor'?Auth::User()->doctors->id:$d_id;



        $appointments = Appointments::get_all_appointments($doctor_id,$p_id);
        //  dd($appointments);


        $array = NULL;

        if($appointments && !is_null($appointments)){
            foreach($appointments as $appointment){
                $color = !empty($appointment->color)?$appointment->color:"#3a87ad";
                if($appointment->status=="cancelled" && $appointment->appointment_type=="appointment")
                    $color = "#858585";

                $appointment_date = $appointment->booking_date.' '.date('H:i', strtotime($appointment->start_time));
                //dump($appointment_date);
                $ap_date = \Carbon\Carbon::parse($appointment_date);
                $room_color = "#3a87ad";
                if($ap_date->isPast())
                    $room_color = 'rgb(121, 121, 121,0.4)';
                else{
                    if(!empty($appointment->color))
                        $room_color =  $appointment->color;
                    else
                        $room_color = "#3a87ad";
                }



                $array[] = array(
                    'id' => $appointment->appointment_id,
                    'title' => $appointment->appointment_type=="appointment"?"".$appointment->status." - ".$appointment->patient_name.' '.$appointment->service_name:"Dr. "
                        .$appointment->fname.' '.$appointment->lname.' is not available from '.$appointment->start_time. '-'.$appointment->end_time.' at '.CommonMethods::formatDate($appointment->booking_date),
                    'start' => $appointment->booking_date.'T'.$appointment->start_time,
                    'end'=> $appointment->booking_date.'T'.$appointment->end_time,
                    'doctor_id' => $appointment->doctor_id,
                    'room_id' => $appointment->room_id,
                    'location_id' => $appointment->location_id,
                    'service_id' => $appointment->service_id,
                    'notes' => $appointment->notes,
                    'patient_unique_id' => $appointment->patient_unique_id,
                    'appointment_type' => $appointment->appointment_type,
                    'color'             =>  $appointment->appointment_type=="appointment"?"#3a87ad":"#F44336",
                    'room_color'    => $room_color,
                    'status' => $appointment->status
                );
            }
        }

        echo json_encode($array);

    }

    public function get_filter_appointments(Request $request){



        $doctors        = !empty($request->doctors)?$request->doctors:"";

        //dd($doctors);
        $locations      = !empty($request->locations)?$request->locations:"";


        //dd($locations);
        $services       = !empty($request->services)?$request->services:"";

        $status   = $request->appointments;


        //  header('Content-Type: application/json');
        if(!empty($doctors))
            $request->session()->put('search_doctor_id',$doctors);
        else
            $request->session()->remove('search_doctor_id');


        if(!empty($locations))
            $request->session()->put('search_location_id',$locations);
        else
            $request->session()->remove('search_location_id');

        if(!empty($services))
            $request->session()->put('search_service_id',$services);
        else
            $request->session()->remove('search_location_id');

        $appointments = Appointments::get_all_appointments_filter($doctors,$locations,$services,$status);
        $array =NULL;
        if($appointments && !empty($appointments) && !is_null($appointments)){
            foreach($appointments as $appointment){

                $appointment_date = $appointment->booking_date.' '.date('H:i', strtotime($appointment->start_time));
                //dump($appointment_date);
                $ap_date = \Carbon\Carbon::parse($appointment_date);
                $room_color = "#3a87ad";
                if($ap_date->isPast())
                    $room_color = 'rgb(121, 121, 121,0.4)';
                else{
                    if(!empty($appointment->color))
                        $room_color =  $appointment->color;
                    else
                        $room_color = "#3a87ad";
                }
                $now = time();

                $array[] = array(
                    'id' => $appointment->appointment_id,
                    'title' => $appointment->appointment_type=="appointment"?"".$appointment->status." - ".$appointment->patient_name.' '.$appointment->service_name:"Dr. "
                        .$appointment->fname.' '.$appointment->lname.' is not available from '.$appointment->start_time. '-'.$appointment->end_time.' at '.CommonMethods::formatDate($appointment->booking_date),
                    'start' => $appointment->booking_date.'T'.$appointment->start_time,
                    'end'=> $appointment->booking_date.'T'.$appointment->end_time,
                    'doctor_id' => $appointment->doctor_id,
                    'room_id' => $appointment->room_id,
                    'location_id' => $appointment->location_id,
                    'service_id' => $appointment->service_id,
                    'notes' => $appointment->notes,
                    'patient_unique_id' => $appointment->patient_unique_id,
                    'appointment_type' => $appointment->appointment_type,
                    'color'             =>  $appointment->appointment_type=="appointment"?"#3a87ad":"#F44336",
                    'room_color'    =>  $room_color,
                    'status' => $appointment->status
                );
            }
            echo json_encode($array);
        }else{
            echo json_encode(array());
        }



    }

    public function get_appointments_detail($id){


        header('Content-Type: application/json');

        $appointments = Appointments::get_detail_appointments($id);
        $rooms = Rooms::whereNull('deleted_at')->get();
        $locations = Locations::whereNull('deleted_at')->get();
        $doctors        = Doctors::with('users')
            ->whereNull('deleted_at')->get();


        if($appointments){
            foreach($appointments as $appointment){

                $appointment_date = $appointment->booking_date.' '.date('H:i', strtotime($appointment->start_time));
                //dump($appointment_date);
                $ap_date = \Carbon\Carbon::parse($appointment_date);
                $room_color = "#3a87ad";
                if($ap_date->isPast())
                    $room_color = 'rgb(121, 121, 121,0.4)';
                else{
                    if(!empty($appointment->color))
                        $room_color =  $appointment->color;
                    else
                        $room_color = "#3a87ad";
                }
                $array = array(
                    'id' => $appointment->appointment_id,
                    'service' => $appointment->service_name,
                    'patient_name' => $appointment->patient_name,
                    'patient_id' => $appointment->patient_id,
                    'patient_email' => $appointment->patient_email,
                    'patient_phone' => $appointment->patient_phone,
                    'location' => $appointment->location_name,
                    'start' => $appointment->start_time,
                    'end'=> $appointment->end_time,
                    'booking_date' => $appointment->booking_date,
                    'booking_end_date' => $appointment->booking_end_date,
                    'room_name' => $appointment->room_name,
                    'doctor_name' => ucwords('Dr '.$appointment->fname.' '.$appointment->lname),
                    'room_id' => $appointment->room_id,
                    'location_id' => $appointment->location_id,
                    'doctor_id' => $appointment->doctor_id,
                    'notes' => $appointment->notes,
                    'patient_unique_id' => $appointment->patient_unique_id,
                    'appointment_type' => $appointment->appointment_type,
                    'room_color'    => $room_color,
                    'status' => $appointment->status
                );


                $day = strtolower(date('l', strtotime($appointment->booking_date)));
                $id = Auth::user()->role=='doctor'?Auth::id():$appointment->doctor_id;
                $time_slots = Availabilities::where('doctors_id',$id)->where('days',$day)->get();
                //  dd($time_slots);
                $slots = NULL;
                if($time_slots){

                    foreach($time_slots as $slot){
                        $start_time = date('H:i',strtotime($slot->start_time));
                        $end_time   = date('H:i',strtotime($slot->end_time));

                        $tStart = strtotime($start_time);
                        $tEnd = strtotime($end_time);
                        $tNow = $tStart;
                        while($tNow <= $tEnd){



                            $now = date("H:i",$tNow);
                            $tNow = strtotime('+15 minutes',$tNow);
                            $slots[] =$now;
                        }

                    }


                }


            }
        }

        // echo json_encode($array);
        return view('partials.patient_appointment',['user_info'=>$array,'rooms'=>$rooms,'locations'=>$locations,'doctors'=>$doctors,'slots'=>$slots]);

    }

    public function update_by_resize(Request $request){
        $appointment = Appointments::find($request->id);

        $doctor_id = $appointment->doctor;

        $doctor_appointment = Appointments::whereNull('deleted_at')
            ->where('booking_date',date('Y-m-d', strtotime($request->start_time)))
            ->where('appointment_type','appointment')
            ->where('doctor',$doctor_id)

            ->where(function($query) use ($request){
                $query->where(function($query) use ($request){

                    /*
                     * CASE 1:
                            Existing Start Time >= Start Time
                            AND
                            Existing End Time <= End Time
                     */
                    $query->where('start_time','>=',date('H:i', strtotime($request->start_time)));
                    $query->where('start_time','<',date('H:i', strtotime($request->end_time)));

                    $query->where('end_time','>',date('H:i', strtotime($request->start_time)));

                    // $query->where('end_time','<',date('H:i', strtotime($request->end_time)));
                }) ->orWhere(function($query) use ($request){
                    /*
                     * CASE 2:
                            Existing Start Time >= Start Time
                            AND
                            Existing End Time > End Time
                     */
                    $query->where('start_time','>=',date('H:i', strtotime($request->start_time)));
                    $query->where('end_time','>',date('H:i', strtotime($request->end_time)));
                    $query->where('start_time','<',date('H:i', strtotime($request->end_time)));
                })->orWhere(function($query) use ($request){
                    /*
                     * CASE 3:
                            Existing Start Time < Start Time
                            AND
                            Existing End Time <= End Time
                     */
                    $query->where('start_time','<',date('H:i', strtotime($request->start_time)));
                    $query->where('end_time','<',date('H:i', strtotime($request->end_time)));
                    $query->where('start_time','<',date('H:i', strtotime($request->end_time)));
                    $query->where('end_time','>',date('H:i', strtotime($request->start_time)));
                })->orWhere(function($query) use ($request){
                    /*
                     * CASE 4:
                            Existing Start Time < Start Time
                            AND
                            Existing End Time <= End Time
                     */
                    $query->where('start_time','>',date('H:i', strtotime($request->start_time)));
                    $query->where('start_time','<',date('H:i', strtotime($request->end_time)));

                    $query->where('end_time','>',date('H:i', strtotime($request->start_time)));
                    $query->where('end_time','<',date('H:i', strtotime($request->end_time)));
                }) ;
            })
            ->get();

        $start = date('H:i', strtotime($appointment->start_time));
        $c_start = date('H:i', strtotime($request->start_time));
        $end = date('H:i', strtotime($appointment->end_time));

        $tStart = strtotime($start);
        $tEnd = strtotime($end);
        $tNow = $tStart;
        $time_slots = [];

        while($tNow <= $tEnd){

            $now = date("H:i",$tNow);
            $tNow = strtotime('+15 minutes',$tNow);
            $time_slots[] = $now;
        }


        // dd($time_slots);
        $resource_type = $request->resource_type;
        /*if(in_array($c_start,$time_slots)){
            echo -1;
            exit;
        }*/
        /*if($doctor_appointment->isNotEmpty()){
            if($appointment->booking_date==date('Y-m-d', strtotime($request->start_time))
                && $appointment->start_time!= date('H:i', strtotime($request->start_time))
                && $appointment->end_time!=date('H:i', strtotime($request->end_time))
                && isset($request->resource_type)
                &&$resource_type=="room" && !empty($request->resource_id)
                && $appointment->room == $request->resource_id){
                echo -1;
                exit;
            }

        }*/





        $appointment->start_time = date('H:i', strtotime($request->start_time));
        $appointment->end_time = date('H:i', strtotime($request->end_time));
        $appointment->booking_date = date('Y-m-d', strtotime($request->start_time));
        if(isset($request->resource_type)&&$resource_type=="room" && !empty($request->resource_id))
            $appointment->room = $request->resource_id;

        if(isset($request->resource_type)&&$resource_type=="staff" && !empty($request->resource_id))
            $appointment->doctor = $request->resource_id;

        $result = $appointment->save();
        AppointmentActivities::add_appointment_activity($request->id,'updated');
        $service = DoctorServices::find($appointment->service);

        $activity = new Activities();

        $activity->user_id = $appointment->patient ;
        $activity->activity_type = 'patient';
        $activity->activity_title = 'updated appointment';
        $activity->activity_description =  'Appointment update for "'.$service->service_name.'" from '.date('H:i', strtotime($request->start_time)).' - '.date('H:i', strtotime($request->end_time))
            .' at '.$appointment->booking_date;
        $activity->created_by = Auth::id();

        $activity->save();

        echo $result;
    }

    public function update_by_id(Request $request){
        //  echo "<pre>"; print_r($request->all()); echo "</pre>"; exit;
        $appointment = Appointments::find($request->id);

        $start = $request->start_time;
        $end = $request->end_time;

        if($start=="" || $end==""){
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Kindly select start and end time for appointment.'
            ));

            exit;
        }

        if($start >=  $end){
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Start time should be less than end time.'
            ));

            exit;
        }

        $appointment->start_time = date('H:i', strtotime($request->start_time));
        $appointment->end_time = date('H:i', strtotime($request->end_time));
        $appointment->booking_date = date('Y-m-d', strtotime($request->appointment_date_start));
        $appointment->booking_end_date = date('Y-m-d', strtotime($request->appointment_date_end));
        $appointment->doctor            = $request->doctor_id;
        $appointment->service           = $request->service_id;
        $appointment->location          = $request->location_id;
        $appointment->room              = $request->room_id;
        $appointment->notes              = $request->notes;

        $result = $appointment->save();

        if ($result > 0) {
            AppointmentActivities::add_appointment_activity($request->id,'updated');
            $service = DoctorServices::find($appointment->service);

            if($appointment->appointment_type=='appointment') {
                $activity = new Activities();

                $activity->user_id = $appointment->patient;
                $activity->activity_type = 'patient';
                $activity->activity_title = 'updated appointment';
                $activity->activity_description = 'Appointment update for "' . $service->service_name . '" from ' . date('H:i', strtotime($request->start_time)) . ' - ' . date('H:i', strtotime($request->end_time))
                    . ' at ' . $request->appointment_date;
                $activity->created_by = Auth::id();


                $activity->save();
            }
            echo json_encode(array(
                'type' => 'success',
                'message' => 'Updated.'
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in booking, try again.'
            ));
        }
    }

    public function delete_appointment($id){
        $appointment = Appointments::find($id);
        $appointment->deleted_at              = date('Y-m-d H:i:s');

        $result = $appointment->save();

        if ($result > 0) {
            if($appointment->appointment_type=='appointment') {
                $service = DoctorServices::find($appointment->service);

                $activity = new Activities();

                $activity->user_id = $appointment->patient;
                $activity->activity_type = 'patient';
                $activity->activity_title = 'deleted appointment';
                $activity->activity_description = 'Appointment deleted for "' . $service->service_name . '" from ' . date('H:i', strtotime($appointment->start_time)) . ' - ' . date('H:i', strtotime($appointment->end_time))
                    . ' at ' . $appointment->booking_date;
                $activity->created_by = Auth::id();

                $activity->save();
                AppointmentActivities::add_appointment_activity($id,'deleted');
            }
            echo json_encode(array(
                'type' => 'success',
                'message' => 'Deleted.'
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in deleting, try again.'
            ));
        }
    }

    function fCheckAvailabiltyForServices($startTime,$endTime,$reservedSlotArray){
        //echo "<pre>"; print_r($reservedSlotArray);
        //  foreach($reservedSlotArray as $key=>$value){
        //fPrintR($value);

        if(in_array($startTime,$reservedSlotArray)){
            return true;
        }

        if(in_array($endTime,$reservedSlotArray)){
            return true;
        }
        //  }


    }

    public function check_availability($start_time,$end_time,$date,$room,$location,$doctor){
        $date = $date;
        $new_start_time = date('H:i',strtotime($start_time));
        $new_end_time = date('H:i',strtotime($end_time));
        $location = 1;
        $room = 1;
        $doctor = 2;
        /*$s = date('i',strtotime($start_t));
        $ss = 15-$s;
        echo $ss; exit;
        if($s<7){
            $min = 0-$s;
            $start_t = date('H:i', strtotime($min.' minutes'.$start_t));
        }else{
            $max = 15 - $s;
            $start_t = date('H:i', strtotime($max.' minutes'.$start_t));
        }

        echo $start_t;
        exit;*/
        $booked_appointment = Appointments::where('booking_date',$date)->where('hospital_id',CommonMethods::getHopsitalID())->get();

        $flag = false;
        foreach($booked_appointment as $appointment){
            $flag = false;
            $old_start_time =date('H:i', strtotime($appointment->start_time));
            $old_end_time = date('H:i',strtotime($appointment->end_time));



            $start = $old_start_time;
            $end = $old_end_time;

            $tStart = strtotime($start);
            $tEnd = strtotime($end);
            $tNow = $tStart;
            $time_slots = [];

            while($tNow <= $tEnd){

                $now = date("H:i",$tNow);
                $tNow = strtotime('+15 minutes',$tNow);
                $time_slots[] = $now;
            }
            //$slot[]= $time_slots;
            $result = $this->fCheckAvailabiltyForServices($new_start_time, $new_end_time,$time_slots);
            if($result){


                $existing_records = array(
                    'appointment_id' => $appointment->id,
                    'location' => $appointment->location,
                    'room'     => $appointment->room,
                    'doctor'   => $appointment->doctor,
                    'appointment_type' => $appointment->appointment_type
                );



            }
            /*if($flag){
                echo "Appointment ID: ".$appointment->id.' : '.$old_start_time. ' '.$old_end_time." Start New Time: ".$new_start_time.'-'.$new_end_time."<br >";
            }*/
        }
        // echo $existing_records['room'].' '.$room;
        $error_array = NULL;
        if($existing_records['appointment_type']=="block_time"){
            if($existing_records['location']==$location){
                $error_array[] = (array(
                    'type' => 'error',
                    'message' => 'Location is not available for selected time slots.'
                ));
            }
        }


        if($existing_records['room']==$room){
            $error_array[] = (array(
                'type' => 'error',
                'message' => 'Selected room is not available for selected time slots.'
            ));
        }

        if($existing_records['doctor']==$doctor){
            $error_array[] = (array(
                'type' => 'error',
                'message' => 'Selected doctor is not available for selected time slots.'
            ));
        }
        if(!is_null($error_array)){
            echo json_encode($error_array);
        }else{
            echo json_ecnode(array());
        }
    }

    public function make_appointment(Request $request){
        $services       = DoctorServices::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $locations      = Locations::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $rooms          = Rooms::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $countries = Countries::get();
        if(Auth::User()->role=='doctor'){
            $p = $permissions_allowed = Auth::user()->permissions->pluck('id')->all();
            if(Auth::user()->role=='administrator' || in_array(54,$p) ){
                $doctors        = Doctors::with('users')
                    ->whereNull('deleted_at')->get();
            }else
                $doctors = Doctors::with('users')->whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->where('doctor_id',Auth::id())->get();
        }

        else
            $doctors        = Doctors::with('users')
                ->whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $patient = Patients::orderBy('created_at', 'desc')->where('hospital_id',CommonMethods::getHopsitalID())->first();
        $uniqueId = isset($patient->id)?25082000+$patient->id+1:25082000;
        $doctor_id = isset($request->doctor_id)?$request->doctor_id:0;

        $slots = NULL;
        $more_availability = NULL;
        $doctor_id = empty($request->staff_id)?$doctor_id:$request->staff_id;
        if($doctor_id > 0){
            $day = strtolower(date('l', strtotime($request->selected_date)));
            $time_slots = Availabilities::where('doctors_id',$doctor_id)->where('days',$day)->where('hospital_id',CommonMethods::getHopsitalID())->get();
            $more_availability = Availabilities::where('doctors_id',$doctor_id)->where('days',$day)->where('start_time','<=',date('H:i', strtotime($request->strTime)))
                ->where('end_time','>=',date('H:i', strtotime($request->strTime)))
                ->whereNull('deleted_at')
                ->where('hospital_id',CommonMethods::getHopsitalID())
                ->get();

            //dd($more_availability);

            if($time_slots){

                foreach($time_slots as $slot){
                    $start_time = date('H:i',strtotime($slot->start_time));
                    $end_time   = date('H:i',strtotime($slot->end_time));

                    $tStart = strtotime($start_time);
                    $tEnd = strtotime($end_time);
                    $tNow = $tStart;
                    while($tNow <= $tEnd){



                        $now = date("H:i",$tNow);
                        $tNow = strtotime('+5 minutes',$tNow);
                        $slots[] =$now;
                    }

                }


            }
        }


        return view('partials.make-appointment',['countries'=>$countries,'unique_id'=>$uniqueId,'doctors'=>$doctors,'services'=>$services,'rooms'=>$rooms,
            'locations'=>$locations,'page'=>'calendar','start_time'=>date('H:i',strtotime($request->strTime)),'choose_date'=>!empty($request->selected_date)?date('d.m.Y', strtotime($request->selected_date)):date('d.m.Y'),
            'patient_id'=>$request->patient_id,'patient_name'=>$request->patient_name,'doctor_id'=>$doctor_id,'slots'=>$slots,
            'more_availability'=>isset($more_availability[0])?$more_availability[0]:NULL,'room_id'=>$request->room_id,'staff_id'=>$request->staff_id
            ,'un_available_doctor_id'=>$request->un_available_doctor_id]);

    }

    public function book_appointment_by_patient($id,$name){
        $services       = DoctorServices::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $locations      = Locations::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $rooms          = Rooms::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $doctors        = Doctors::with('users')
            ->whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $patient = Patients::orderBy('created_at', 'desc')->where('hospital_id',CommonMethods::getHopsitalID())->first();
        $uniqueId = isset($patient->id)?25082000+$patient->id+1:25082000;

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

        return view('calendar',['unique_id'=>$uniqueId,'doctors'=>$doctors,'services'=>$services,'rooms'=>$rooms,'locations'=>$locations,'countries'=>$countries,'current_country'=>$current_country,'page'=>'calendar','patient_id'=>$id,'patient_name'=>$name]);
    }

    public function get_not_availability($id){


        $un_availability = Availabilities::get_un_availbility($id);
        // dd($un_availability);
        $array = NULL;

        if($un_availability && !empty($un_availability) && !is_null($un_availability)) {
            foreach($un_availability as $value){
                $array[] = array(
                    'title' => $value->first_name.' '.$value->last_name. ' is not available',
                    'start' => $value->start_date.'T00:00:00',
                    'end' => $value->end_date.'T23:59:59',
                    'doctor_id' => $value->doctor_id,
                    'id' => $value->id
                );
            }
            echo json_encode($array);
        }else{
            echo json_encode(array());
        }



    }

    public function get_pending_appointment($id){
        $today = date('Y-m-d');
        $appointment = Appointments::where('patient',$id)->where('status','pending')->where('booking_date','>=',$today)->whereNull('deleted_at')->orderBy('booking_date','desc')->first();
        //dd($appointment);

        $flag = 'no-appointment-available';

        if(isset($appointment->id)){
            $data = Appointments::get_detail_appointments($appointment->id);

            $data_array = array(
                'service' => $data[0]->service_name,
                'patient_name' => $data[0]->patient_name,
                'location' => $data[0]->location_name,
                'start' => date('H:i', strtotime($data[0]->start_time)),
                'end'=> date('H:i', strtotime($data[0]->end_time)),
                'booking_date' => date('l, d M Y', strtotime($data[0]->booking_date)),
                'room_name' => $data[0]->room_name,
                'doctor_name' => ucwords('Dr '.$data[0]->fname.' '.$data[0]->lname),
                'appointment_id' => $appointment->id
            );

            echo json_encode(array(
                'type' => 'success',
                'data' => $data_array
            ));
        }else{
            echo json_encode(array());
        }
    }

    public function show_appointment($id){
        $type= isset($_GET['type'])?"Yes":"No";
        $check_id = strpos($id,'google-');
       if($check_id === false){
           $appointments = Appointments::get_detail_appointments($id);
           // header('Content-Type: application/json');


           if($appointments[0]->appointment_type=="appointment"){


               $rooms = Rooms::whereNull('deleted_at')->get();
               $locations = Locations::whereNull('deleted_at')->get();
               $doctors        = Doctors::with('users')
                   ->whereNull('deleted_at')->get();


               if($appointments){
                   foreach($appointments as $appointment){
                       $array = array(
                           'id' => $appointment->appointment_id,
                           'service' => $appointment->service_name,
                           'patient_name' => $appointment->patient_name,
                           'patient_id' => $appointment->patient_id,
                           'patient_email' => $appointment->patient_email,
                           'patient_phone' => $appointment->patient_phone,
                           'location' => $appointment->location_name,
                           'start' => $appointment->start_time,
                           'end'=> $appointment->end_time,
                           'booking_date' => $appointment->booking_date,
                           'booking_end_date' => $appointment->booking_end_date,
                           'room_name' => $appointment->room_name,
                           'doctor_name' => ucwords('Dr '.$appointment->fname.' '.$appointment->lname),
                           'room_id' => $appointment->room_id,
                           'location_id' => $appointment->location_id,
                           'doctor_id' => $appointment->doctor_id,
                           'notes' => $appointment->notes,
                           'patient_unique_id' => $appointment->patient_unique_id,
                           'appointment_type' => $appointment->appointment_type,
                           'room_color'    => !empty($appointment->color)?$appointment->color:"#3a87ad",
                           'status' => $appointment->status
                       );


                       $day = strtolower(date('l', strtotime($appointment->booking_date)));
                       $id = Auth::user()->role=='doctor'?Auth::id():$appointment->doctor_id;
                       $time_slots = Availabilities::where('doctors_id',$id)->where('days',$day)->get();
                       //  dd($time_slots);
                       $slots = NULL;
                       if($time_slots){

                           foreach($time_slots as $slot){
                               $start_time = date('H:i',strtotime($slot->start_time));
                               $end_time   = date('H:i',strtotime($slot->end_time));

                               $tStart = strtotime($start_time);
                               $tEnd = strtotime($end_time);
                               $tNow = $tStart;
                               while($tNow <= $tEnd){



                                   $now = date("H:i",$tNow);
                                   $tNow = strtotime('+15 minutes',$tNow);
                                   $slots[] =$now;
                               }

                           }


                       }


                   }
               }

               // echo json_encode($array);
               if($type=="Yes")
                   return view('partials.view-appointment',['user_info'=>$array,'rooms'=>$rooms,'locations'=>$locations,'doctors'=>$doctors,'slots'=>$slots]);
               else
                   return view('partials.show-appointment',['user_info'=>$array,'rooms'=>$rooms,'locations'=>$locations,'doctors'=>$doctors,'slots'=>$slots]);
           }else{
               $block_time = Appointments::find($id);

               return view('partials.show-block-time',['block_time'=>$block_time]);
           }
       }else{
           echo "google";
       }

    }
    public function show_google_appointment(Request $request){

       $id = explode('-',$request->id);

       $access_token = $request->access_token;
        $authorization = "Authorization: Bearer ".$access_token;
        $curl = curl_init();
        $options = array(
            CURLOPT_URL => "https://www.googleapis.com/calendar/v3/calendars/primary/events/".$id[1],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                $authorization,
               "Content-Type: application/json"
            ),
        );

        curl_setopt_array($curl, $options);

        $response = curl_exec($curl);
        $response = json_decode($response);


        curl_close($curl);

        return view('partials.show-google-appointment',['appointment'=>$response]);

    }


    public function by_room($id,$date){

        $room = Rooms::find($id);
        $date = date('Y-m-d', strtotime($date));
        // echo $date; exit;
        return view('partials.room-calendar',['room'=>$room,'go_to_date'=>$date]);
    }

    public function update_status_appointment($id,$status){
        $appointment = Appointments::find($id);
        $appointment->status = $status;
        $appointment->save();
        AppointmentActivities::add_appointment_activity($id,$status);
    }

    public function get_appointment_by_id($id){
        $appointment = Appointments::find($id);
        $array = array(
            'id' => $appointment->id,
            'services' => $appointment->service,
            'patient' => $appointment->patient,
            'location' => $appointment->location,
            'start' => date('H:i', strtotime($appointment->start_time)),
            'end'=> date('H:i',strtotime($appointment->end_time)),
            'booking_date' => date('d.m.Y', strtotime($appointment->booking_date)),

            'room' => $appointment->room,
            'doctor' => $appointment->doctor,
            'notes' => $appointment->notes,

        );

        echo json_encode($array);
    }

    public function check_all_availability(Request $request){
        echo json_encode([]);
        exit;

        $room_id = $request->room;
        $doctor_id = $request->doctor;
        $location_d = $request->location_id;
        $start_time = $request->start_time;
        $end_time = $request->end_time;
        $selected_date = date('Y-m-d',strtotime($request->selected_date));

        $new_start_time = date('H:i',strtotime($start_time));
        $new_end_time = date('H:i',strtotime($end_time));

        $appointment_by_room = Appointments::where('booking_date',$selected_date)->whereNull('deleted_at')->where(function($query) use ($request) {
            $query->where(function ($query) use ($request) {

                if(!empty($request->room))
                    $query->orWhere('room', '=', $request->room);

                /* if(!empty($request->doctor))
                     $query->orWhere('doctor', '=', $request->doctor);

                 if(!empty($request->location_id))
                     $query->orWhere('location', '=', $request->location_id);*/




            });
        })

            ->get();

        ;
        // dd($appointment_by_room);
        $r_id = 0;
        $l_id = 0;
        $d_id = 0;

        if(isset($appointment_by_room[0])){
            $r_id = $appointment_by_room[0]->room;
            $l_id = $appointment_by_room[0]->location;
            $d_id =  $appointment_by_room[0]->doctor;
        }

        $existing_records = NULL;
        foreach($appointment_by_room as $appointment){
            $flag = false;
            $old_start_time =date('H:i', strtotime($appointment->start_time));
            $old_end_time = date('H:i',strtotime($appointment->end_time));



            $start = $old_start_time;
            $end = $old_end_time;

            $tStart = strtotime($start);
            $tEnd = strtotime($end);
            $tNow = $tStart;
            $time_slots = [];

            while($tNow <= $tEnd){

                $now = date("H:i",$tNow);
                $tNow = strtotime('+5 minutes',$tNow);
                $time_slots[] = $now;
            }
            //dd();
            //$slot[]= $time_slots;
            $result = $this->fCheckAvailabiltyForServices($new_start_time, $new_end_time,$time_slots);
            if($result){


                $existing_records = array(
                    'appointment_id' => $appointment->id,
                    'location' => $appointment->location,
                    'room'     => $appointment->room,
                    'doctor'   => $appointment->doctor,
                    'appointment_type' => $appointment->appointment_type
                );



            }
            /*if($flag){
                echo "Appointment ID: ".$appointment->id.' : '.$old_start_time. ' '.$old_end_time." Start New Time: ".$new_start_time.'-'.$new_end_time."<br >";
            }*/
        }

        // dd($existing_records);
        // echo date('l',strtotime($selected_date));

        $availability = Availabilities::where('doctors_id',$doctor_id)->where('days',strtolower(date('l',strtotime($selected_date))))->get();
        $availability_check = false;


        if($availability->isEmpty())
            $availability_check = true;

        foreach($availability as $a){

            $start  = date("H:i",strtotime($a->start_time));
            $end    = date("H:i",strtotime($a->end_time));


            $tStart = strtotime($start);
            $tEnd = strtotime($end);
            $tNow = $tStart;
            $time_slots = NULL;

            while($tNow <= $tEnd){

                $now = date("H:i",$tNow);
                $tNow = strtotime('+5 minutes',$tNow);
                $time_slots[] = $now;
            }

            //$slot[]= $time_slots;
            $result = $this->fCheckAvailabiltyForServices($request->start_time, $request->end_time,$time_slots);

            if(!$result)
                $availability_check = true;


        }


        if($availability_check)
            $existing_records['doctor_un_available'] = (int)($request->doctor);

        echo json_encode($existing_records);



    }

    public function edit_appointment($id){

        $appointment = Appointments::find($id);
        // dd($appointment);

        $services       = DoctorServices::whereNull('deleted_at')->get();
        $locations      = Locations::whereNull('deleted_at')->get();
        $rooms          = Rooms::whereNull('deleted_at')->get();
        $doctors        = Doctors::with('users')
            ->whereNull('deleted_at')->get();
        $patient = NULL;
        $countries = Countries::get();
        if($appointment->appointment_type=='appointment')
            $patient = Patients::find($appointment->patient);
        $activity = NULL;
        if($appointment->appointment_type=='appointment')
            $activity = Patients::find($appointment->patient)->activities->take(1);
        ;

        if($appointment->appointment_type=='appointment')
            return view('partials.edit-appointment',['countries'=>$countries,'services'=>$services,'appointment'=>$appointment,'doctors'=>$doctors,'rooms'=>$rooms,'locations'=>$locations,'patient'=>$patient,'activities'=>$activity]);
        else
            return view('partials.edit-block-time',['appointment'=>$appointment,'doctors'=>$doctors,'rooms'=>$rooms,'locations'=>$locations]);
    }

    public function search_appointments(){
        $keyword = $_GET['q'];
       // echo $keyword;

        $appointments = \App\Appointments::where('status','!=','cancelled')->
            where('appointment_type','appointment')->
        where(function($q) use ($keyword){
            $q->orWhereHas('patients', function($q) use ($keyword){
                $q->where('patient_name','LIKE','%'.$keyword.'%');
            })
                ->orWhereHas('doctors',function($q) use ($keyword){
                    $q->where('fname','LIKE','%'.$keyword.'%')->orWhere('lname','LIKE','%'.$keyword.'%');
                })
                ->orWhereHas('doctor_services',function($q) use ($keyword){
                    $q->where('service_name','LIKE','%'.$keyword.'%');
                });
        })->orderBy('appointments.id' ,'DESC')
            ->paginate(100);
       // dd($appointments);
        /*foreach($appointments as $appointment){
            $msg = "Appointment Time: ".$appointment->booking_date.' - '.$appointment->start_time. ' - '.$appointment->end_time."<br />";
            $msg.="Service Name: ".$appointment->doctor_services->service_name."<br />";
            $msg.="Doctor Name: ".$appointment->doctors->fname.' '.$appointment->doctors->lname."<br />";
            echo $msg;
        }*/
        return view('partials.search-appointments',['appointments'=>$appointments]);
    }

    public function send_appointment_reminder(Request $request){


        $appointment_id = $request->apointment_id;
        $patient_id = $request->patient_id;

        $patient = Patients::find($patient_id);
       // dd($patient);
        $email = $patient->patient_email;
        $name = $patient->first_name. ' '.$patient->last_name;
        SendEmail::sendReminderEmail($name,$email,$patient_id,$appointment_id);

    }



}
