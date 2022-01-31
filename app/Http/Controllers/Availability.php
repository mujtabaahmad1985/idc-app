<?php

namespace App\Http\Controllers;
use App\Appointments;
use App\Availabilities;
use App\Doctors;
use App\Helpers\CommonMethods;
use App\Locations;
use DB;
use Auth;
use Illuminate\Http\Request;
use function PHPSTORM_META\elementType;

class Availability extends Controller
{
    //

    public function page_availability(){
        $avail = new Availabilities();
        //$availability = $avail->get_availbility();
        //$availability = Availabilities::with('Doctors')->get();
        if(Auth::User()->role=='doctor')
            $doctors = Doctors::whereNull('deleted_at')->where('doctor_id',Auth::id())->get();
            else
        $doctors = Doctors::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();

        $locations = Locations::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();


        return view('partials.availability-like-google',['doctors'=>$doctors,'locations'=>$locations]);
    }

    public function get_by_doctor(Request $request){
                $id = $request->id;

                $availability = Availabilities::where('doctor_id',$id)->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $array = NULL;
                foreach($availability as $avail){
                    $array[] = array(
                        'id' => $avail->id,
                        'day' => $avail->day,
                        'slots' => date('H:i', strtotime($avail->start_time)).' - '. date('H:i', strtotime($avail->end_time))
                    );
                }

                echo json_encode($array);
    }

    public function add_availablity(Request $request){

        $id = $request->id;


        $availability = Availabilities::where('id','=',$id)->where('hospital_id',CommonMethods::getHopsitalID())->count();
        if($availability>0){
            $old_data =  Availabilities::where('id','=',$id)->where('hospital_id',CommonMethods::getHopsitalID())->first();

            $old_data->start_time = $request->start_time;
            $old_data->end_time = $request->end_time;
            $old_data->days = $request->day;
            $old_data->doctors_id = $request->doctor_id;
            $old_data->location = $request->location;

            $old_data->save();
            echo $old_data->id;
        }else{
            $new_data = new Availabilities();

            $new_data->doctors_id = $request->doctor_id;
            $new_data->start_time = $request->start_time;
            $new_data->end_time = $request->end_time;
            $new_data->days = $request->day;
            $new_data->location = $request->location;
            $new_data->hospital_id = CommonMethods::getHopsitalID();
            $new_data->cuser = Auth::id();
            $new_data->save();

            echo $new_data->id;

        }


        exit;
      //  echo $request->doctor_id;exit;
        $days = $request->day;

       foreach($days as $day){

           $av = Availabilities::where('doctor_id',$request->doctor_id)->where('hospital_id',CommonMethods::getHopsitalID())->where('day',$day)->get();

           if(!isset($av[0])){

           $availability = new Availabilities();

           $availability->doctor_id = $request->doctor_id;
           $availability->start_time = $request->start_time;
           $availability->end_time = $request->end_time;
           $availability->day = $day;
               $availability->cuser             = Auth::id();
           $availability->save();
           $result = $availability->id;
           }else{
               $result = DB::table('availabilities')->where('doctor_id',$request->doctor_id)->where('day',$day)->update(array(
                   'start_time' => $request->start_time,'end_time' => $request->end_time
               ));
           }



       }
        if ($result > 0) {
            $availability = Availabilities::where('doctor_id',$request->doctor_id)->where('hospital_id',CommonMethods::getHopsitalID())->get();
            $array = NULL;
            foreach($availability as $avail){
                $data[] = array(
                    'id' => $avail->id,
                    'day' => $avail->day,
                    'slots' => date('H:i', strtotime($avail->start_time)).' - '. date('H:i', strtotime($avail->end_time))
                );
            }

            echo json_encode(array(
                'type' => 'success',
                'message' => 'Availability times is updated successfully.',
                'data' => $data
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Same data is inserted, kindly change and try again.'
            ));
        }
    }

    public function delete_availability($id){
        $availability = Availabilities::find($id);
        $availability->delete();
    }

    public function save_holidays(Request $request){


        $id = $request->id;
        $availability = Availabilities::where('id','=',$id)->where('hospital_id',CommonMethods::getHopsitalID())->count();
        if($availability>0){
            $old_data =  Availabilities::where('id','=',$id)->where('hospital_id',CommonMethods::getHopsitalID())->first();

            $old_data->start_date = date('Y-m-d', strtotime(str_replace('.','-',$request->from_date)));
            $old_data->end_date = date('Y-m-d', strtotime(str_replace('.','-',$request->end_date)));

            $old_data->save();
        }else{
            $new_data = new Availabilities();

            $new_data->doctors_id = $request->doctor_id;
            $new_data->start_date = date('Y-m-d', strtotime(str_replace('.','-',$request->from_date)));
            $new_data->end_date = date('Y-m-d', strtotime(str_replace('.','-',$request->end_date)));

            $new_data->cuser             = Auth::id();
            $new_data->save();

            echo $new_data->id;

        }

    }

    public function get_time_slots_by_doctor($id){
        $day = strtolower(date('l'));
        if(Auth::user()->role=='doctor')
            $id = Auth::id();
        $time_slots = Availabilities::where('doctors_id',$id)->where('hospital_id',CommonMethods::getHopsitalID())->where('days',$day)->get();
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

            echo json_encode($slots);
        }

    }

    public function get_details_availability($id){
        $availabilities = \App\Availabilities::with(['locations'])->whereNull('deleted_at')->where('doctors_id',$id)->get()->toJson();

        return $availabilities;


    }

    public function get_availability($id){

        $doctors = Doctors::where('id',$id)->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $locations = Locations::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        foreach($doctors as $doctor){
            $fill_array = array(
                'doctor_id' => $doctor->id,
                'doctor_name' => ucwords($doctor->fname.' '.$doctor->lname)
            );
            $availability = Doctors::find($doctor->id)->availabilities;
            //  echo "<pre>"; print_r($availability); exit;
            $avail_array = NULL;
            foreach($availability as $avail){
                if(!empty($avail->start_time)) {
                    $avail_array[$avail->days][] = array(
                        'day_name' => $avail->days,
                        'start_time' => date('H:i', strtotime($avail->start_time)),
                        'end_time' => date('H:i', strtotime($avail->end_time)),
                        'availability_id' => $avail->id,
                        'location' => $avail->location,
                    );
                }
                if(!empty($avail->start_date)){
                    $avail_array['holiday'][] = array(
                        'start_date' => $avail->start_date,
                        'end_date' => $avail->end_date,
                        'availability_id' => $avail->id,
                    );
                }

            }

            $fill_array['availability'] = $avail_array;
            $array[] = $fill_array;
        }

     //    echo "<pre>"; print_r($array); exit;


        return view('partials.availability',['availability'=>$array,'locations'=>$locations]);
    }

    public function check_availability_by_doctor_date(Request $request){
        //echo "<pre>"; print_r($request->all());
        $doctor_id = $request->selected_doctor;





        $day = date('l',strtotime($request->selected_date));

        $room_flag = 'available';

        $room_selected_id = 0;
        $selected_date = $request->selected_date;
        $appointment = Appointments::where(function ($query) use ($request) {
            $query->where(function ($sub_query) use ($request){
                $sub_query->where('start_time','<',$request->end_time)->where('end_time','>',$request->end_time);
            })
                ->orWhere(function ($sub_query) use ($request) {
                    $sub_query->where('start_time','<',$request->start_time)->where('end_time','>',$request->start_time);
                }) ;
        })->where('booking_date',date('Y-m-d', strtotime($selected_date)))->where('hospital_id',CommonMethods::getHopsitalID())->get();
        //  echo $appointment;exit;


        // dd($appointment);


        if($appointment->isNotEmpty()){

                $room_flag = 'booked';
                $room_selected_id = $appointment[0]->room;
            }



        //echo $doctor_id; exit;
        if(!empty($doctor_id)){
            $selected_date = date('Y-m-d',strtotime($request->selected_date));
            $day = date('l',strtotime($request->selected_date));
            $doctor = Doctors::find($doctor_id);

            $availability = Availabilities::where('doctors_id',$doctor_id)->where('days','=',strtolower($day))->get();

            if($availability->isEmpty()){

                $array = array(
                    'message' => ucwords($doctor->fname. ' '.$doctor->lname).' is not available at '.$request->selected_date,
                    'type' => 'error'
                );
                echo json_encode($array);
                exit;
            }


            $availability = Availabilities::where('doctors_id',$doctor_id)->where('hospital_id',CommonMethods::getHopsitalID())->where('start_date','<=',$selected_date)->where('end_date','>=',$selected_date)->get();

            if($availability->isNotEmpty()){

                $array = array(
                    'message' => ucwords($doctor->fname. ' '.$doctor->lname).' is not available at '.$request->selected_date,
                    'type' => 'error',
                    'room_id' => $room_selected_id
                );
                echo json_encode($array);
                exit;
            }else{
                //echo $day.' - '.$request->start_time.' - '.$request->end_time;
                $slots = Availabilities::where('doctors_id',$doctor_id)->where('hospital_id',CommonMethods::getHopsitalID())->where('days','=',strtolower($day))->where('start_time','<=',$request->start_time)->where('end_time','>=',$request->end_time)->get();

                if($slots->isNotEmpty()){
                    $array = array(
                        'type' => 'location_found',
                        'location_id' => $slots[0]->location,
                        'room_id' => $room_selected_id
                    );
                    echo json_encode($array);
                    exit;
                }else{
                    echo json_encode(array(
                        'type'=>'no_slot',
                        'message'=> ucwords($doctor->fname. ' '.$doctor->lname).' is not available from '.date('H:i', strtotime($request->start_time)).' - '.date('H:i', strtotime($request->end_time)).' at '.$request->selected_date,
                        'room_id' => $room_selected_id
                    ));
                }

            }

        }else{
            echo json_encode(array('type'=>'error','room_id' => $room_selected_id));
        }

    }

    public function check_availability_by_object(Request $request){
        $day = date('l',strtotime($request->selected_date));
        $location_flag = 'available';
        $room_flag = 'available';
        $doctor_id = $request->doctor_id;
        $room_selected_id = 0;
        $room_id = $request->room_id;
        $selected_date = $request->selected_date;
        $appointment = Appointments::where('location',$request->location_id)->when($doctor_id, function($query) use ($doctor_id){
            if(!empty($doctor_id) && $doctor_id > 0)
                return $query->where('appointments.doctor',$doctor_id);
        })->where(function ($query) use ($request) {
            $query->where(function ($sub_query) use ($request){
                $sub_query->where('start_time','<=',$request->end_time)->where('end_time','>=',$request->end_time);
            })
                ->orWhere(function ($sub_query) use ($request) {
                    $sub_query->where('start_time','<=',$request->start_time)->where('end_time','>=',$request->start_time);
            }) ;
         })

            ->where('booking_date',date('Y-m-d', strtotime($selected_date)))->where('hospital_id',CommonMethods::getHopsitalID())->get();
      //  echo $appointment;exit;
       // dd($appointment);


        if($appointment->isNotEmpty()){
            $location_flag = 'booked';

            if($appointment[0]->room==$room_id){
                $room_flag = 'booked';
                $room_selected_id = $appointment[0]->room;
            }


        }else{
            if($request->location_id > 0):
            $slots = Availabilities::where('location',$request->location_id)->where('days','=',strtolower($day))->when($doctor_id, function($query) use ($doctor_id){
                if(!empty($doctor_id) && $doctor_id > 0)
                    return $query->where('availabilities.doctors_id',$doctor_id);
            })->where('start_time','<=',$request->start_time)->where('end_time','>=',$request->end_time)->where('hospital_id',CommonMethods::getHopsitalID())->get();

            if($slots->isEmpty())
                $location_flag = 'not-available';
            endif;
        }




        echo json_encode(array(
            'type' => 'success',
            'loaction_flag' => $location_flag,
            'room_flag' => $room_flag,
            'room_id' => $room_selected_id
        ));
    }

   /* public function save_doctor_availability(Request $request){
        $locations = $request->location;
        $availabile_date_time = $request->availabile_date_time;
        $availability_id = $request->id;
        if(count($locations) > 0){
            foreach($locations as $index=>$location){
                $date_time = explode(' - ',$availabile_date_time[$index]);
                $start_date = date('Y-m-d',strtotime($date_time[0]));
                $end_date   = date('Y-m-d',strtotime($date_time[1]));

                $start_time =  date('H:i',strtotime($date_time[0]));
                $end_time =  date('H:i',strtotime($date_time[1]));

                $id = isset($availability_id[$index])?$availability_id[$index]:"";
                if(empty($id))
                    $availability = new Availabilities();
                else
                    $availability = Availabilities::find($id);
                $availability->location = $location;
                $availability->start_time = $start_time;
                $availability->end_time = $end_time;
                $availability->start_date = $start_date;
                $availability->end_date = $end_date;
                $availability->doctors_id = $request->doctor_id;
                $availability->repeat_occurrence = $request->repeat_occurrence[$index];

                $availability->save();

            }
        }
    }*/

    public function save_doctor_availability(Request $request){
        $locations = $request->location;
        $start_dates = $request->start_date;
        $end_dates = $request->end_date;
        $start_times = $request->start_time;
        $end_times = $request->end_time;
        $availability_id = $request->id;
        $custom_dates_ = $request->custom_dates;
        $repeat_occurrence = $request->repeat_occurrence;


        if(count($locations) > 0){
            foreach($locations as $index=>$location){

                $start_date = date('Y-m-d',strtotime($start_dates[$index]));
                $end_date   = date('Y-m-d',strtotime($end_dates[$index]));

                $start_time =  date('H:i',strtotime($start_times[$index]));
                $end_time =  date('H:i',strtotime($end_times[$index]));

                $id = isset($availability_id[$index])?$availability_id[$index]:"";
                if(empty($id))
                    $availability = new Availabilities();
                else
                    $availability = Availabilities::find($id);
                $availability->location = $location;
                $availability->start_time = $start_time;
                $availability->end_time = $end_time;
                $availability->start_date = $start_date;
                $availability->end_date = $end_date;
                $availability->doctors_id = $request->doctor_id;
                $availability->repeat_occurrence = $repeat_occurrence[$index];



                $custom_dates = isset($custom_dates_[$index]) && !empty($custom_dates_[$index])?json_decode(stripslashes( ($custom_dates_[$index]) ) ,true):"";
                $r = NULL;
                if(!empty($custom_dates)){
                    foreach($custom_dates as $d){
                        if($d['name']=="options"){
                            $r[$d['name']][] = $d['value'];
                        }else{
                            $r[$d['name']] = $d['value'];
                        }

                    }

                    $time_repeat = isset($r['time_repeat'])?$r['time_repeat']:"";
                    $type_time_repeat = isset($r['type_time_repeat'])?$r['type_time_repeat']:"";
                    $days = isset($r['options'])?implode(',',$r['options']):"";
                    $custom_end =  isset($r['custom_end'])?$r['custom_end']:"";
                    $end_repeat_date =  isset($r['end_repeat_date'])?$r['end_repeat_date']:"";

                    $availability->time_repeat = $time_repeat;
                    $availability->type_time_repeat = $type_time_repeat;
                    $availability->days_options = $days;
                    $availability->custom_end = $custom_end;
                    $availability->end_repeat_date = date('Y-m-d',strtotime($end_repeat_date));
                }



                $availability->hospital_id = CommonMethods::getHopsitalID();
                $availability->cuser = Auth::id();
                $availability->save();

            }
        }
    }


}
