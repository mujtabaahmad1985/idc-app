<?php

namespace App\Http\Controllers;
use App\Helpers\CommonMethods;
use DB;
use App\DoctorServices;
use Illuminate\Http\Request;
use Auth;

class DoctorService extends Controller
{
    //

    public  function get_service(){
        $services = DoctorServices::whereNull('deleted_at')->orderBy('service_name')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        return view('setup.doctorservices',['services'=>$services]);
    }

    public function get_service_by_id(Request $request){
        $id = $request->id;

        $service = DoctorServices::where('id',$id)->where('hospital_id',CommonMethods::getHopsitalID())->get();

        $array = array(
            'id' => $service[0]->id,
            'name' => $service[0]->service_name,
            'service_type'=> $service[0]->service_type,
            'buffer_time'=> $service[0]->buffer_time,
            'duration'=> $service[0]->duration,
            'price'=> $service[0]->price,
            'description'=> $service[0]->description,
        );

        echo json_encode($array);
    }
    public function add_service(Request $request){
        $service = new DoctorServices();

        $service->service_name = $request->service_name;
        $service->duration = $request->duration;
        $service->service_type = $request->service_type;
        $service->description = addslashes($request->description);
        $service->buffer_time = $request->buffer_time;
        $service->price = $request->price;
        $service->hospital_id = CommonMethods::getHopsitalID();
        $service->cuser             = Auth::id();
        $id = $service->save();
        if ($id > 0) {
            echo json_encode(array(
                'type' => 'success',
                'message' => 'Service is added successfully. you can view in listing.',
                'id' => $id,
                'name' => $request->service_name
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in user submitting, try again.'
            ));
        }
    }

    public function delete_service(Request $request){
        $id = $request->id;

        return DB::table('doctor_services')->where('id',$id)->update(array(
            'deleted_at' => date('Y-m-d H:i:s')
        ));
    }

    public function update_service(Request $request){
        $id = $request->id;
        $array = array(
            'service_name' => $request->service_name,
            'duration' => $request->duration,
            'service_type' => $request->service_type,
            'price' => $request->price,
            'buffer_time' => $request->buffer_time,
            'description' => $request->description,
        );
        $service = new DoctorServices();
        $result = $service->update_service($id, $array);

        if ($result > 0) {
            echo json_encode(array(
                'type' => 'success',
                'message' => 'Service is updated successfully. you can view in listing.'
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in user submitting, try again.'
            ));
        }

     //   update_service

    }

    public function search_services(){
        $name = $_GET['q'];
        header('Content-Type: application/json');


        $services = DoctorServices::whereNull('deleted_at')->where('service_name','LIKE','%'.$name.'%')

            ->where('hospital_id',CommonMethods::getHopsitalID())->get();

        $array = NULL;
        foreach($services as $service){
            $array[] = array(
                'id' => $service->id,
                'text' => $service->service_name,
                'price' => "$".number_format($service->price,2),
                'searched_data_type'=> 'Service'
            );
            //$array[] = $patient->patient_name;
        }

        // if(is_null($array))

        //   $array[] = array('id'=>0,'name'=>'Add patient');
        $array1['data']['services'] = $array;
        echo json_encode($array1);
    }


}
