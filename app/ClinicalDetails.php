<?php

namespace App;
use App\Helpers\CommonMethods;
use  DB;
use Illuminate\Database\Eloquent\Model;

class ClinicalDetails extends Model
{
    //
    public function locations(){
        return $this->belongsTo('App\Locations','location_id','id');
    }

    public function get_clinical_details(){
        return   DB::table('clinical_details as detail')
            ->select('detail.mobile_code as mobile_code','detail.contact_code as contact_code','detail.id as id','location.address as address','location.name as name','detail.email as email','location.zip_code as zip_code','location.country as country','detail.website as website','detail.contact_number','detail.mobile_number','detail.id as clinical_detail_id')
            ->join('locations as location','location.id','=','detail.location_id')
            -> whereNull('detail.deleted_at')
            ->where('detail.hospital_id',CommonMethods::getHopsitalID())
            ->orderBy('detail.created_at', 'desc')
            ->get();
    }

    public static function get_clinical_details_by_id($id){
    return   DB::table('clinical_details as detail')
        ->select('detail.mobile_code as mobile_code','detail.contact_code as contact_code','detail.location_id as location_id','location.address as address','location.name as name','detail.email as email','location.zip_code as zip_code','location.country as country','detail.website as website','detail.contact_number','detail.mobile_number','detail.id as clinical_detail_id')
        ->join('locations as location','location.id','=','detail.location_id')
        -> where('detail.id','=',$id)
        ->where('detail.hospital_id',CommonMethods::getHopsitalID())
        ->orderBy('detail.created_at', 'desc')
        ->get();
}
    public function get_clinical_details_by_name($name){
        return   DB::table('detail.mobile_code as mobile_code','detail.contact_code as contact_code','clinical_details as detail')
            ->select('location.id as id','location.address as address','location.name as name','detail.email as email','location.zip_code as zip_code','location.country as country','detail.website as website','detail.contact_number','detail.mobile_number','detail.id as clinical_detail_id')
            ->join('locations as location','location.id','=','detail.location_id')
            -> where('location.name','LIKE','%'.$name.'%')
            ->where('detail.hospital_id',CommonMethods::getHopsitalID())
            ->orderBy('detail.created_at', 'desc')
            ->get();
    }
}
