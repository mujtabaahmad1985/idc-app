<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;

class Hospitals extends Model
{
    //

    public function users(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function hospital_types(){
        return $this->hasOne('App\HospitalTypes','id','hospital_type');
    }
    public function total_appointments(){
        return $this->hasMany('App\Appointments','hospital_id','user_id')->select(DB::raw(' count(id) as appointments'))->whereNull('deleted_at');
    }

    public function total_doctors(){
        return $this->hasMany('App\Doctors','hospital_id','user_id')->select(DB::raw(' count(id) as doctors'))->whereNull('deleted_at');
    }

    public function total_staffs(){
        return $this->hasMany('App\Staffs','hospital_id','user_id')->select(DB::raw(' count(id) as staffs'))->whereNull('deleted_at');
    }

    public function patient_sessions(){
        return $this->hasMany('App\AppointmentSessions','hospital_id','user_id')->select(DB::raw(' count(id) as patient_sessions'))->whereNull('deleted_at');
    }

    public function total_incvoices(){
        return $this->hasMany('App\Invoices','hospital_id','user_id')->select(DB::raw(' count(id) as invoices'));
    }

    public function last_six_monthtotal_incvoices(){
        return $this->hasMany('App\Invoices','hospital_id','user_id')->select(DB::raw(' count(id) as invoices'),DB::raw('MONTHNAME(created_at) as month_name'))
            ->where('created_at','>=',Carbon::today()->subMonth(6)->format('Y-m-d'))->groupBy(DB::raw('MONTHNAME(created_at)'));
    }


}
