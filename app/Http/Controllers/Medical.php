<?php

namespace App\Http\Controllers;

use App\Medicals;
use App\Patients;
use Illuminate\Http\Request;

class Medical extends Controller
{
    //

    public function get_medical_with_patient(){
        $name = $_GET['q'];

        $medicals = Medicals::where('illness','LIKE','%'.$name.'%')->get();
$array = NULL;
        foreach($medicals as $m){
            $patient = Patients::find($m->patient_id);

            $array[] = array(
                'id' => $patient->id,
                'text' => $patient->patient_name.' with '.$name,
                'patient_unique_id' => $patient->patient_unique_id,
                'patient_phone' => $patient->patient_phone,
                'display' => $name
            );
        }

        $array1['data']['medicals'] = $array;
        // header('Content-Type: application/json');
        echo json_encode($array1);

    }

    function array_find($needle, array $haystack)
    {
        foreach ($haystack as $key => $value) {
            if (false !== stripos($value, $needle)) {
                return $key;
            }
        }
        return false;
    }
}
