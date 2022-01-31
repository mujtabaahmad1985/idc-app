<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\User;
class Doctors extends Model
{
    //
    protected $fillable = ['fname', 'lname', 'doctor_id'];
    public function users(){
        return $this->belongsTo('App\User','doctor_id','id');
    }

    public function availabilities(){
        return $this->hasMany('App\Availabilities','doctors_id','id');
    }

    public function doctor_patients(){
        return $this->hasMany("App\Appointments", "doctor",'id')->whereNull('deleted_at')->orderBy('id','DESC')->groupBy('patient');
    }

    public function doctor_todays_patients(){
        return $this->hasMany("App\Appointments", "doctor",'id')->whereNull('deleted_at')->whereIn('status',['pending','completed'])->where('booking_date',Carbon::today()->format('Y-m-d'))->orderBy('id','DESC')->groupBy('patient')->where('appointment_type','appointment');
    }

    public function doctor_last_week_patients(){
        return $this->hasMany("App\Appointments", "doctor",'id')->whereNull('deleted_at')->whereIn('status',['pending','completed'])->where('booking_date','>=',Carbon::today()->subDays(7)->format('Y-m-d'))->orderBy('id','DESC')->groupBy('patient')->where('appointment_type','appointment');
    }

    public function doctor_last_month_patients(){
        return $this->hasMany("App\Appointments", "doctor",'id')->whereNull('deleted_at')->whereIn('status',['pending','completed'])->where('booking_date','>=',Carbon::today()->subMonth(1)->format('Y-m-d'))->orderBy('id','DESC')->groupBy('patient')->where('appointment_type','appointment');
    }

    public function doctor_last_year_patients(){
        return $this->hasMany("App\Appointments", "doctor",'id')->whereNull('deleted_at')
            ->whereIn('status',['pending','completed'])->where('booking_date','>=',Carbon::today()->subYear(1)->format('Y-m-d'))->orderBy('id','DESC')->groupBy('patient')->where('appointment_type','appointment');
    }


    public function doctor_experience(){
        return $this->hasMany("App\DoctorExperiences", "doctor_id",'id')->whereNull('deleted_at')->orderBy('id','DESC');
    }

    public function doctor_recent_pending_appointments(){
        return $this->hasMany("App\Appointments", "doctor",'id')->whereNull('deleted_at')->orderBy('id','DESC')->where('status','pending')->take(5);
    }

    public function doctor_appointments(){
        return $this->hasMany("App\Appointments", "doctor",'id')->whereNull('deleted_at')->orderBy('id','DESC')->whereIN('status',['pending','completed']);
    }

    public function doctor_todays_appointments(){

        return $this->hasMany("App\Appointments", "doctor",'id')->whereNull('deleted_at')->orderBy('id','DESC')->where('booking_date',Carbon::today()->format('Y-m-d'));
    }

    public function doctor_this_month_appointments(){

        return $this->hasMany("App\Appointments", "doctor",'id')->whereNull('deleted_at')->orderBy('id','DESC')->where('booking_date','>=', Carbon::today()->subMonth(1)->format('Y-m-d'));
    }

    public function doctor_roles(){
        return $this->hasOne('App\DoctorRoles','id','doctor_role');

    }

}
