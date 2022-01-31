<?php

namespace App\Http\Controllers;

use App\AppointmentSessions;
use App\Labs;
use App\Materials;
use App\Patients;
use App\Products;
use App\SaleItems;
use App\Sales;
use App\SessionItems;
use App\ToothAreas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentSession extends Controller
{
    //
    public function save_sessions(Request $request){


        $session_id = $request->session_id;

        if(!empty($session_id))
            $session = AppointmentSessions::find($session_id);
        else
            $session = new AppointmentSessions();

        $session->appointment_id = $request->appointment_id;
        $session->patient_id = $request->patient_id;
        $session->treatment_done = $request->treatment_done;
        $session->notes = $request->notes;
        $session->pre_advice = $request->pre_advice;
        $session->complaints = $request->complaints;
        $session->post_treatment_advice = $request->post_treatment_advice;
        $session->medications = isset($request->medications)?implode(',',$request->medications):"";
        $session->findings = $request->findings;
        $session->radiographs = $request->radiographs;
        $session->next_visit = $request->next_visit;
        $session->pre_medications = isset($request->pre_medications)?implode(',',$request->pre_medications):"";
        $session->consent = $request->consent;
        $session->material_id = $request->materials;
        $session->lab_id = $request->lab;
        $session->referral = $request->referral;
        $session->to_order = $request->to_order;
        $session->communication = isset($request->communication)?implode(',',$request->communication):"";
        $session->tooth_area = isset($request->tooth_area)?implode(',',$request->tooth_area):"";

        $session->save();

        $id = $session->id;

        if($id > 0)
            echo json_encode(array('type'=>'success','message'=>'Session information saved.','id'=>$session->id));
        else
            echo json_encode(array('type'=>'error','message'=>'Session information is not saved.'));


    }

    public function save_items(Request $request){
        $patient_id = $request->patient_id;
        $session_id = $request->session_id;
        $appointment_id = $request->appointment_id;
        $product_id    = $request->product_id;
        $item_quantity = $request->item_quantity;
        $item_discount = $request->item_discount;
        $total_price = 0;

        $session_items = SessionItems::where('appointment_session_id',$session_id)->delete();
        $ss = Sales::where('session_id',$session_id)->delete();
        $id = 0;
        if(isset($product_id) && count($product_id) > 0){
            foreach($product_id as $k=>$id){
                $p = Products::find($id);
                $price = $p->product_purchases[0]->price_unit;


            $item = new SessionItems();
            $item->product_id = $id;
            $item->appointment_session_id = $session_id;
            $item->item_quantity = $item_quantity[$k];
            $item->item_discount = $item_discount[$k];
            $item->patient_id = $patient_id;
            $item->appointment_id = $appointment_id;
            $item->item_price = $price;
            $total_price=$total_price+trim($price);

            $item->save();

            $id = $item->id;

            if($id > 0){




                $p->decrement('in_stock',1);
                $p->save();
            }

            }
        }

        if($id > 0){
            $sale = new Sales();
            $patient = Patients::find($patient_id);

            $sale->type = "invoice";
            $sale->person_type = "patient";
            $sale->person_name = $patient->first_name.' '.$patient->last_name;
            $sale->email = $patient->users->email;
            $sale->billing_address = $patient->address;
            $sale->person_id = $patient_id;
           // $sale->due_date = !empty($request->due_date)?date('Y-m-d', strtotime($request->due_date)):"";
            $sale->invoice_date = date('Y-m-d');
            $sale->session_id = $session_id;
            $sale->grand_total = $total_price;
            $sale->cuser = Auth::id();
            $sale->save();
            $sale_id = $sale->id;

            foreach($product_id as $k=>$id) {
                $p = Products::find($id);
                $price = $p->product_purchases[0]->price_unit;


                $item = new SaleItems();

                $item->sale_id = $sale_id;
                $item->item_name = $p->product_title;
                $item->item_description = "Item purchased after appointment.";
                $item->quantity = $item_quantity[$k];;
                $item->price = $price;
                $item->total_price = $item_quantity[$k] * trim($price);

                $item->save();

            }

            echo json_encode(array('type'=>'success','message'=>'Session Item(s) are saved.','id'=>$id,'appointment_id'=>$appointment_id));
        }

        else
            echo json_encode(array('type'=>'error','message'=>'Session item(s) are not saved.'));


    }
    public function edit_session_by_id($session_id){
        $session = AppointmentSessions::find($session_id);


        $appointment_id = $session->appointment_id;
        $patient_id = $session->patient_id;
        $patient = Patients::find($patient_id);
        $tooth_area = ToothAreas::all();
        $meterials = Materials::whereNull('deleted_at')->get();
        $labs = Labs::whereNull('deleted_at')->get();
        return view('patient.treatment-records.session',['patient'=>$patient, 'tooth_areas'=>isset($tooth_area[0])?$tooth_area:"",'materails'=>$meterials,'labs'=>$labs,'appointment_session'=>$session]);
    }


    public function delete_session($id){
        $app_seession = AppointmentSessions::find($id);

        $app_seession->deleted_at = date('Y-m-d H:i:s');
        $app_seession->save();
    }

    public function update_session_doctor(Request $request){
        $session_id = $request->id;
        $app_seession = AppointmentSessions::find($session_id);

        $app_seession->doctor_by = $request->doctor_id;
        $app_seession->save();

    }

}
