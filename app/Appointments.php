<?php

namespace App;
use App\Helpers\CommonMethods;
use DB;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    //


    public static function get_all_appointments($doctor_id=0,$patient_id=0,$limit=1000,$status=""){
        $hospital_id = CommonMethods::getHopsitalID();
        return    DB::table('appointments as appointments')
            ->select('room.name as room_name','appointments.notes as notes','location.name as location_name','location.address as location_address','appointments.booking_end_date as booking_end_date','appointments.status as status','room.color as color','appointments.id as appointment_id','appointments.appointment_type as appointment_type','appointments.notes as notes','patient.patient_name','patient.patient_unique_id as patient_unique_id', 'appointments.start_time','appointments.end_time','services.service_name','doctor.fname','doctor.lname','appointments.booking_date','doctor.id as doctor_id','room.id as room_id','services.id as service_id','location.id as location_id')
            ->leftJoin('patients as patient','patient.id','=','appointments.patient')
            ->leftJoin('locations as location','location.id','=','appointments.location')
            ->leftJoin('rooms as room','room.id','=','appointments.room')
            ->leftJoin('doctor_services as services','services.id','=','appointments.service')
            ->leftJoin('doctors as doctor','doctor.id','=','appointments.doctor')
            ->leftJoin('users as user','user.id','=','doctor.doctor_id')
            -> whereNull('appointments.deleted_at')
            ->where('appointments.status','!=','cancelled')
            ->where('appointments.hospital_id',$hospital_id)
            ->when($doctor_id, function($query) use ($doctor_id){
                if($doctor_id>0)
                    return $query->where('appointments.doctor',$doctor_id);
            })
            ->when($patient_id, function($query) use ($patient_id){
                if($patient_id > 0)
                    return $query->where('appointments.patient',$patient_id);
            })
            ->when($status, function($query) use ($status){
                if(!empty($status))
                    return $query->where('appointments.status',$status);
            })
            ->limit($limit)
            ->orderBy('appointments.created_at','desc')
            ->get();
       // $array = NULL;

    }

    public static function get_all_appointments_filter($doctors, $location, $services, $status){

        $data = array('doctor'=>$doctors,'location'=>$location,'service'=>$services);
        $hospital_id = CommonMethods::getHopsitalID();


        return    DB::table('appointments as appointments')
                        ->select('appointments.booking_end_date as booking_end_date','appointments.status as status','room.color as color','appointments.id as appointment_id','appointments.appointment_type as appointment_type','appointments.notes as notes','patient.patient_name','patient.patient_unique_id as patient_unique_id', 'appointments.start_time','appointments.end_time','services.service_name','doctor.fname','doctor.lname','appointments.booking_date','doctor.id as doctor_id','room.id as room_id','services.id as service_id','location.id as location_id')
                        ->leftJoin('patients as patient','patient.id','=','appointments.patient')
                        ->leftJoin('locations as location','location.id','=','appointments.location')
                        ->leftJoin('rooms as room','room.id','=','appointments.room')
                        ->leftJoin('doctor_services as services','services.id','=','appointments.service')
                        ->leftJoin('doctors as doctor','doctor.id','=','appointments.doctor')
                        ->leftJoin('users as user','user.id','=','doctor.doctor_id')
                        ->where('appointments.hospital_id',$hospital_id)
            ->where('appointments.status','!=','cancelled')
                        -> whereNull('appointments.deleted_at')
            ->where(function ($query) use ($data){
                if(!empty($data['doctor']) || !empty($data['doctor']) > 0)
                     $query->where('appointments.doctor',$data['doctor']);

                if(!empty($data['location']) || ($data['location']) > 0){
                     $query->where('appointments.location',$data['location']);
                }


                if(!empty($data['service']) || !empty($data['service']) > 0)
                     $query->where('appointments.service',$data['service']);
            })

                       // ->whereIn('appointments.service',$services)
                        ->limit(1000)
                        ->get();


        // $array = NULL;

    }

    public static function get_recent_today_appointments($hospital_id){

        return    DB::table('appointments as appointments')
            ->select('appointments.booking_end_date as booking_end_date','appointments.status as status','room.color as color','appointments.id as appointment_id','appointments.appointment_type as appointment_type','patient.patient_name','patient.patient_unique_id as patient_unique_id','appointments.notes as notes', 'appointments.start_time','appointments.end_time','services.service_name','doctor.fname','doctor.lname','appointments.booking_date','doctor.id as doctor_id','room.id as room_id','services.id as service_id','location.id as location_id')
            ->leftJoin('patients as patient','patient.id','=','appointments.patient')
            ->leftJoin('locations as location','location.id','=','appointments.location')
            ->leftJoin('rooms as room','room.id','=','appointments.room')
            ->leftJoin('doctor_services as services','services.id','=','appointments.service')
            ->leftJoin('doctors as doctor','doctor.id','=','appointments.doctor')
            ->leftJoin('users as user','user.id','=','doctor.doctor_id')
            -> whereNull('appointments.deleted_at')
            ->where('appointment_type','appointment')
            ->where('appointments.status','!=','cancelled')
            ->where('appointments.hospital_id',$hospital_id)
            ->orderBy('booking_date','desc')
            ->limit(10)
            ->get();
        // $array = NULL;

    }

    public static function get_detail_appointments($id){
        $hospital_id = CommonMethods::getHopsitalID();

        return    DB::table('appointments as appointments')
            ->select('appointments.booking_end_date as booking_end_date','appointments.status as status','room.color as color','appointments.id as appointment_id','appointments.appointment_type as appointment_type','patient.id as patient_id','patient.patient_name','patient.patient_unique_id as patient_unique_id', 'appointments.start_time','appointments.end_time','services.service_name','doctor.fname',
                'doctor.lname','appointments.booking_date','location.name as location_name','location.address as location_address',
            'room.name as room_name','patient.patient_email as patient_email','patient.patient_phone as patient_phone','room.id as room_id','location.id as location_id','doctor.id as doctor_id','appointments.notes as notes'
            )
            ->leftJoin('patients as patient','patient.id','=','appointments.patient')
            ->leftJoin('locations as location','location.id','=','appointments.location')
            ->leftJoin('rooms as room','room.id','=','appointments.room')
            ->leftJoin('doctor_services as services','services.id','=','appointments.service')
            ->leftJoin('doctors as doctor','doctor.id','=','appointments.doctor')
            ->leftJoin('users as user','user.id','=','doctor.doctor_id')
            -> whereNull('appointments.deleted_at')
            ->where('appointments.status','!=','cancelled')
            ->where('appointments.id',$id)
            ->where('appointments.hospital_id',$hospital_id)
            ->get();
        // $array = NULL;

    }


    public function consents(){
        return $this->hasMany("App\Consents", "appointment_id",'id')->whereNull('deleted_at')->orderBy('id','DESC');
    }

    public function doctors(){
        return $this->hasOne('App\Doctors','id','doctor');
    }

    public function doctor_services(){
        return $this->hasOne('App\DoctorServices','id','service');
    }

    public function locations(){
        return $this->hasOne('App\Locations','id','location');
    }

    public function appointment_sessions(){
        return $this->hasMany('App\AppointmentSessions','appointment_id','id')->whereNull('deleted_at');;
    }

    public function treatment_dones(){
        return $this->hasMany('App\TreatmentDones','appointment_id','id')->whereNull('deleted_at');;
    }

    public function patients(){
        return $this->hasOne('App\Patients','id','patient');
    }

    public function rooms(){
        return $this->hasOne('App\Rooms','id','room');
    }

    public function appointment_activities(){
        return $this->hasMany('App\AppointmentActivities','appointment_id','id')->orderBy('id','ASC');;
    }
}
