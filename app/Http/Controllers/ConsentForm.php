<?php

namespace App\Http\Controllers;

use App\ConsentForms;
use App\Helpers\CommonMethods;
use Illuminate\Http\Request;
use PDF;
class ConsentForm extends Controller
{
    //
    public function list_consent_forms(){
        $consent_forms = ConsentForms::where('hospital_id',CommonMethods::getHopsitalID())->get();
        return view('setup.consent-forms',['consents'=>$consent_forms]);
    }
    public function download_pdf($id){
        $consent = ConsentForms::find($id);
        $name = \Illuminate\Support\Str::slug($consent->name);

            $pdf = PDF::loadView('pdf.'.$name);

        $consent_file_name = $name;
        $consent_file_name = \Illuminate\Support\Str::slug($consent_file_name).'.pdf';
        return $pdf->download($consent_file_name);
    }
}
