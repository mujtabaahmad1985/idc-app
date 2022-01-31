<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchiveStaffs extends Model
{
    //
    protected $fillable = array('staff_id', 'salutation','date_of_birth','first_name','last_name','email','phone_code','contact_number','address','gender','zip_code','designation','state','city','country','nationality','start_date','end_date','id_no');
}
