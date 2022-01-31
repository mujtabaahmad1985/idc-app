<?php

namespace App\Http\Controllers;

use App\Appointments;
use App\Invoices;
use App\SessionItems;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Str;
use Auth;
class Invoice extends Controller
{
    //
    public function load_invoice_template(Request $request){
        $ammount = SessionItems::getSessionPaidAmount(4,1);
     //   dd($ammount);
        $appoinment = Appointments::find($request->appointment_id);
        return view('invoices.invoice-template',['appointment'=>$appoinment]);
    }

    public function download_invoice($id){
      //  exit;
        $appointment = Appointments::find($id);
        $patient = $appointment->patients;

        $pdf = PDF::loadView('invoices.invoice-pdf',['appointment'=>$appointment]);
        return $pdf->download(Str::slug($patient->patient_name).'-'.date('YmdHis').'.pdf');
    }

    public function save_invoice(Request $request){
        $appointment_id = $request->appointment_id;
        $patient_id  = $request->patient_id;

        $invoice = Invoices::where('appointment_id',$appointment_id)->where('patient_id',$patient_id)->first();
        if(isset($invoice))
            $invoice = Invoices::find($invoice->id);
        else
            $invoice = new Invoices();

        $invoice->appointment_id = $appointment_id;
        $invoice->patient_id = $patient_id;
        $invoice->status = 'Paid';
        $invoice->total_amount = $request->total_amount;
        $invoice->paid_via = $request->paymeny_via;
        $invoice->submitted_by = Auth::id();
        $invoice->other_payment_info = $request->other_payment_info;
        $invoice->appointment_id = $appointment_id;
        $invoice->appointment_id = $appointment_id;
        $invoice->cuser             = Auth::id();

        $invoice->save();

        $id = $invoice->id;

        if($id > 0)
            echo json_encode(array('type'=>'success','message'=>'Invoice is saved.'));
        else
            echo json_encode(array('type'=>'error','message'=>'Invoice is not saved.'));


    }

    public function get_patient_invoices($id){
        $invoices = Invoices::where('patient_id',$id)->get();

        return view('patient.payments',['invoices'=>$invoices]);

    }
}
