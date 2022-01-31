<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class DoctorServices extends Model
{
    //

    public function update_service($id,$array){
        return DB::table('doctor_services')->where('id',$id)->update($array);
    }
}
