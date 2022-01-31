<?php

namespace App\Http\Controllers;

use App\BookingProcesses;
use App\Helpers\CommonMethods;
use App\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class BookingProcess extends Controller
{
    //
    public function show_booking_process(){
        $booking_email_phone= BookingProcesses::whereNotIn('field_type',['payment','approval-options'])->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $booking_payments= BookingProcesses::where('field_type','payment')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $booking_option= BookingProcesses::where('field_type','approval-options')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $booking_request= BookingProcesses::where('field_type','update_booking_request')->where('hospital_id',CommonMethods::getHopsitalID())->get();


        $booking_pay = NULL;
        $booking_options = NULL;
        if(!empty($booking_payments)):
        foreach($booking_option as $bp){
            $booking_options[] = $bp->field_label;
        }
        endif;

        if(!empty($booking_payments)):
            foreach($booking_payments as $bp){
                $booking_pay[] = $bp->field_label;
            }
        endif;
        $payments = Payments::get();

            return view('setup.booking_process',['booking_email_phone' => $booking_email_phone,'payments' => $payments,'booking_payments' => $booking_pay,
                'booking_options'=>$booking_options,'booking_request'=>isset($booking_request[0])?$booking_request[0]->field_name:NULL]);
    }

    public function update_booking_process(Request $request)
    {
        $id = $request->id;

        $booking = BookingProcesses::find($id);
        $booking->status = $request->status;
        $booking->hospital_id = CommonMethods::getHopsitalID();
        $result = $booking->save();
        echo $result;
    }

    public function delete_booking_process(Request $request){
        $id = $request->id;

        $booking = BookingProcesses::find($id);

        $result = $booking->delete();



    }

    public function add_booking_process(Request $request){


        $booking = new BookingProcesses();
        $booking->field_name = str_slug($request->label);
        $booking->field_label = ($request->label);
        $booking->field_type = ($request->type);
        $booking->cuser             = Auth::id();
        $booking->hospital_id = CommonMethods::getHopsitalID();
        $result = $booking->save();
        echo $result;
    }

    public function add_payments(Request $request){

        $payments = $request->payments;

        $p = BookingProcesses::where('field_type','=','payment')->delete();

        foreach($payments as $payment){
            $booking = new BookingProcesses();
            $booking->field_name = str_slug($payment);
            $booking->field_label = ($payment);
            $booking->field_type = 'payment';
            $booking->hospital_id = CommonMethods::getHopsitalID();
            $result = $booking->save();
        }
    }

    public function update_approval_options(Request $request){
        $booking = BookingProcesses::where('field_label', '=', $request->is_value);
        $result = $booking->delete();
        if ($request->is_checked==="true") {

            $booking = new BookingProcesses();
            $booking->field_name = $request->is_value;
            $booking->field_label = $request->is_value;
            $booking->field_type = 'approval-options';
            $booking->hospital_id = CommonMethods::getHopsitalID();
            $result = $booking->save();
        }
    }

    public function update_booking_request(Request $request){
        $booking = BookingProcesses::where('field_type', '=', 'update_booking_request');
        $result = $booking->delete();


            $booking = new BookingProcesses();
            $booking->field_name = $request->value;
            $booking->field_label = $request->value;
            $booking->field_type = 'update_booking_request';
        $booking->hospital_id = CommonMethods::getHopsitalID();
            $result = $booking->save();

    }
}
