<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function doctors(){
        return $this->belongsTo('App\Doctors','id','doctor_id');
    }

    public function permissions(){
        return $this->belongsToMany('App\Permissions','permissions_users','user_id','permission_id');
    }

    public function folders(){
        return $this->hasMany("App\Folders", "staff_id",'id')->whereNull('deleted_at')->orderBy('id','DESC');
    }

    public function activities(){
        return $this->hasMany("App\Activities", "user_id",'id')->whereNull('deleted_at')->orderBy('id','DESC');
    }

    public function appointments(){
        return $this->hasMany("App\Appointments", "cuser",'id')->whereNull('deleted_at')->orderBy('id','DESC')->where('booking_date',Carbon::today()->format('Y-m-d'));
    }

    public function leaves(){
        return $this->hasMany("App\Leaves", "user_id",'id')->whereNull('deleted_at')->orderBy('id','DESC');
    }

    public function user_messages(){
        return $this->hasMany("App\UserMessages", "receiver_id",'id')->whereNull('deleted_at')->where('status','unread')->orderBy('id','DESC');
    }

    public function user_recent_messages(){
        return $this->hasMany("App\UserMessages", "receiver_id",'id')->whereNull('deleted_at')->orderBy('id','DESC')->limit(10);
    }

    public function staffs(){
        return $this->hasOne("App\Staffs", "user_id",'id')->whereNull('deleted_at');
    }

    public function hospitals(){
        return $this->hasOne("App\Hospitals", "user_id",'id');
    }
    public function patients(){
        return $this->hasOne("App\Patients", "user_id",'id')->whereNull('deleted_at');
    }

    public function patients_added_by_staff(){
        return $this->hasMany("App\Patients", "cuser",'id')->whereNull('deleted_at');
    }

    public function availabilities(){
        return $this->hasMany('App\Availabilities','doctors_id','id');
    }

    public function hospital_patients(){
        return $this->hasMany('App\Patients','hospital_id','id')->select(DB::raw(' count(id) as patient_count'))->whereNull('deleted_at');
    }

    public function hospital_appointments(){
        return $this->hasMany('App\Appointments','hospital_id','id')->select(DB::raw(' count(id) as appointment_count'))->whereNull('deleted_at');
    }

    public function hospital_appointments_this_month(){
        return $this->hasMany('App\Appointments','hospital_id','id')->select(DB::raw(' count(id) as appointment_count'));
    }

    public function total_sales(){
        return $this->hasMany('App\Sales','hospital_id','id')->select(DB::raw(' sum(grand_total) as grand_total'))->whereNull('deleted_at');
    }

    public function hospital_doctors(){
        return $this->hasMany('App\Doctors','hospital_id','id')->select(DB::raw(' count(id) as total_doctors'))->whereNull('deleted_at');
    }

    public function hospital_staffs(){
        return $this->hasMany('App\Staffs','hospital_id','id')->select(DB::raw(' count(id) as total_staff'))->whereNull('deleted_at');
    }
}
