<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Patients extends Model
{
    //
    public function children() { $children = $this->hasMany('App\Patients', 'referral_id'); return $children; }

    public function childrenRecursive() { return $this->children()->with('childrenRecursive'); }



    public function patients(){
        return $this->belongsTo(self::class, 'referral_id','id');
    }

    public function patient_refers()
    {
        return $this->hasMany(Patients::class,'referral_id','id')->with('patients');
    }

    public function users(){
        return $this->belongsTo('App\User','user_id','id');
    }



    public function addresses(){
        return $this->hasMany("App\Addresses", "patient_id",'id')->orderBy('set_as_main','ASC');
    }

    public function treatments(){
        return $this->hasMany("App\Treatments", "patient_id",'id')->whereNull('deleted_at')->orderBy('id','DESC');
    }

    public function appointments(){
        return $this->hasMany("App\Appointments", "patient",'id')->whereNull('deleted_at')->orderBy('id','DESC');
    }
    public function patient_appointments(){
        return $this->hasMany("App\Appointments", "patient",'id')->whereNull('deleted_at')->orderBy('booking_date','DESC');
    }
    public function activities(){
        return $this->hasMany("App\Activities", "user_id",'id')->whereNull('deleted_at')->orderBy('id','DESC');
    }

    public function phones(){
        return $this->hasMany("App\Phones", "patient_id",'id')->orderBy('id','DESC');
    }

    public function consents(){
        return $this->hasMany("App\Consents", "patient_id",'id')->whereNull('deleted_at')->orderBy('id','DESC');
    }

    public function documents(){
        return $this->hasMany("App\Documents", "user_id",'id')->orderBy('id','DESC');
    }

    public function medicals(){
        return $this->hasOne("App\Medicals", "patient_id",'id')->orderBy('id','DESC');
    }

    public function media_files(){
        return $this->hasMany("App\MediaFiles", "patient_id",'id')->orderBy('id','DESC');;
    }

    public function folders(){
        return $this->hasMany("App\Folders", "patient_id",'id')->orderBy('folder_name','DESC')->whereNull('deleted_at');;
    }

    public function patient_sessions(){
        return $this->hasMany("App\PatientSessions", "patient_id",'id')->orderBy('session_date_time','DESC');
    }

    public function patient_past_sessions(){
        return $this->hasMany("App\AppointmentSessions", "patient_id",'id')->orderBy('created_at','DESC');
    }

    public function medical_histories(){
        return $this->hasMany("App\MedicalHistories", "patient_id",'id')->orderBy('date_of_history','DESC')->whereNull('deleted_at');
    }

    public function patient_drug_allergies(){
        return $this->hasMany("App\PatientDrugAllergies", "patient_id",'id');
    }

    public function drug_allergies(){
        return $this->belongsToMany('App\DrugAllergies','patient_drug_allergies','patient_id','drug_id')->withPivot('created_at', 'updated_at','id')->orderBy('patient_drug_allergies.created_at','DESC');;
    }

    public function patient_assigned_flags(){
        return $this->belongsToMany('App\PatientFlags','assigned_flags','patient_id','flag_id')->withPivot('created_at', 'updated_at')->orderBy('assigned_flags.created_at','DESC');;
    }

    public function digital_images(){
        return $this->hasMany("App\DigitalImages", "patient_id",'id')->groupBy('digital_images.title')->orderBy('id','DESC');
    }

    public function pre_medicals(){
        return $this->belongsToMany('App\PreMedicals','medication_patients','patient_id','pre_medical_id');
    }

    public function products(){
        return $this->belongsToMany('App\Products','medication_patients','patient_id','pre_medical_id');
    }

    public function patient_pending_appointments(){
        return $this->hasMany("App\Appointments", "patient",'id')->whereNull('deleted_at')->where('status','pending')->orderBy('booking_date','DESC');
    }

    public function amount_from_sale(){
        return $this->hasOne("App\Sales", "person_id",'id')->select(DB::raw(' sum(grand_total) as sale_amount'))->whereNull('deleted_at')->groupBy('person_id');

    }

    public function payment_from_sale(){
        return $this->hasMany("App\Sales", "person_id",'id')->whereNull('deleted_at');

    }
}
