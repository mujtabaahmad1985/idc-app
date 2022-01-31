<?php

namespace App;
use App\Helpers\CommonMethods;
use DB;
use Illuminate\Database\Eloquent\Model;

class Availabilities extends Model
{
    //
    protected $table = 'availabilities';

    protected $fillable = array('doctor_id');
    public function get_availbility(){
        return DB::table('doctors as doctors')
            ->select('doctors.id as doctor_id','doctors.fname', 'doctors.lname','availabilities.days as days','availabilities.end_time','availabilities.start_time','availabilities.start_date','availabilities.start_date','availabilities.all_day','availabilities.repeat_occurrence')
            ->leftJoin('availabilities as availabilities','availabilities.doctors_id','=','doctors.id')

            -> whereNull('availabilities.deleted_at')

            ->get();
    }

    public static function get_un_availbility($doctor_id){
        $hospital_id = CommonMethods::getHopsitalID();
        return DB::table('availabilities as availabilities')
            ->select('doctors.id as doctor_id','availabilities.id as id','doctors.fname as first_name','doctors.lname as last_name','availabilities.start_date as start_date','availabilities.end_date as end_date')
            ->leftJoin('doctors as doctors','doctors.id','=','availabilities.doctors_id')
            ->when($doctor_id, function($query) use ($doctor_id){
                if(!empty($doctor_id) && $doctor_id > 0)
                    return $query->where('availabilities.doctors_id',$doctor_id);
            })
            -> whereNull('availabilities.deleted_at')
            -> whereNull('availabilities.start_time')
            -> whereNull('availabilities.end_time')
            ->where('availabilities.hospital_id',$hospital_id)
            ->get();


    }
    public function doctors()
    {
        return $this->belongsTo(Doctors::class);
    }

    public static function get_time_slots_from_availability($date,$start_time,$end_time,array $param){

        $date = date('Y-m-d',strtotime($date));
        $hospital_id = CommonMethods::getHopsitalID();
        $start_time = date('H:i', strtotime($start_time));
        $end_time = date('H:i', strtotime($end_time));
      //  dd($start_time.' - '.$end_time);
        $availability = Availabilities::where(function($q) use($date){
            $q->where('start_date','<=',$date);
            $q->where('end_date','>=',$date);
        })
            ->where('start_time','<=',$start_time)
            ->where('end_time','>=',$end_time)
            ->where('hospital_id',$hospital_id)
            ->where(function($q) use($param){
                if(isset($param['doctor']) && !empty($param['doctor'])){
                    $q->where('doctors_id',$param['doctor']);
                }

                if(isset($param['location']) && !empty($param['location'])){
                    $q->where('location',$param['location']);
                }
            })->get();
     //   dd($availability);

        return $availability;
    }

    public static function doctor_availability($date,$start_time,$end_time,array $param){
        $date = date('Y-m-d',strtotime($date));
        $hospital_id = CommonMethods::getHopsitalID();
        $start_time = date(strtotime($start_time));
        $end_time = date( strtotime($end_time));

        $availability = Availabilities::whereNull('deleted_at')->where(function($q) use($param){
            if(isset($param['doctor']) && !empty($param['doctor'])){
                $q->where('doctors_id',$param['doctor']);
            }

            if(isset($param['location']) && !empty($param['location'])){
                $q->where('location',$param['location']);
            }
        })->where('hospital_id',$hospital_id)->get();


       // $days_available = false;
        $daily = false;
        $mon_fri = false;
        $custom = false;
        $not_availabile = [];

       if(isset($availability) && $availability->count() > 0){
           foreach($availability as $a){



               $a_start_date = $a->start_date;
               $a_end_date = $a->end_date;
               $a_start_time = date( strtotime($a->start_time));
               $a_end_time = date( strtotime($a->end_time));
               $a_repeat_occurrence = $a->repeat_occurrence;

               if($a_repeat_occurrence=="no-repeat"){
                   $input_date =  $date;
                   $input_end_date = $end_time;

                   $db_start_date = strtotime($a_start_time);
                   $db_end_date =$a_end_time;

                   if($input_date < $db_start_date || $input_date > $db_end_date){
                       $not_availabile['no-repeat'] = 'no-repeat';
                   }else{
                       if($start_time<$a_start_time || $end_time>$a_end_time){
                           //         dump('test');

                           $not_availabile['no-repeat'] = 'no-repeat';
                       }
                   }

               }

               if($a_repeat_occurrence=="daily"){
                //   dump("start time: ".date('H:i a',$start_time).' db start '.date('H:i a',$a_start_time)." end time: ".date('H:i a',$end_time).' db start '.date('H:i a',$a_end_time));
                    if($start_time<$a_start_time || $end_time>$a_end_time){
               //         dump('test');


                        $not_availabile['daily'] = 'daily';
                    }
               }

               if($a_repeat_occurrence=="mon-fri"){
                   $day = date('D',strtotime($date));
                   $days_array = ['mon','tue','wed','thu','fri'];
                  // dd($days_array);

                   if(!in_array(strtolower($day),$days_array)){
                       $not_availabile['mon_fri'] = 'mon_fri';
                   }else{
                       if($start_time<$a_start_time || $end_time>$a_end_time){
                           //         dump('test');

                           $not_availabile['mon_fri'] = 'mon_fri';
                       }
                   }

               }


               if($a_repeat_occurrence=="custom-repeat"){

                   if($a->custom_end=="custom_end_date"){

                    $custom_end_date = $a->end_repeat_date;
                    if(!empty($custom_end_date)){

                        $db_end_date = strtotime($custom_end_date);
                        $input_date = strtotime($date);

                        if($db_end_date<$input_date){
                            $not_availabile['custom_end_date'] = 'custom_end_date';
                        }else{

                            $day = date('D',strtotime($date));

                            $days_array = explode(',',$a->days_options);

                            if(!in_array(strtolower($day),$days_array)) {
                                $not_availabile['custom_end_date'] = 'custom_end_date';
                            }else{

                                if($start_time<$a_start_time || $end_time>$a_end_time){
                                    //         dump('test');

                                    $not_availabile['custom_end_date'] = 'custom_end_date';
                                }
                            }

                        }
                    }


                   }

                   if($a->custom_end=="never-end"){
                       $day = date('D',strtotime($date));

                       $days_array = explode(',',$a->days_options);

                       if(!in_array(strtolower($day),$days_array)) {
                           $not_availabile['custom_end_date'] = 'custom_end_date';
                       }else{

                           if($start_time<$a_start_time || $end_time>$a_end_time){
                               //         dump('test');

                               $not_availabile['custom_end_date'] = 'custom_end_date';
                           }
                       }
                   }

               }



           }
       }
      // dump($not_availabile);
        if(count($not_availabile) >= $availability->count()){
            echo json_encode(array('type'=>'error','message' => "Doctor or Location is un-available for selected time slots. check availabilty settings"));
            exit;
        }


        //dd($availability);
        ;
    }

    public function locations(){
        return $this->hasOne('App\Locations','id','location');
    }
}
