<?php

namespace App\Http\Controllers;

use App\Helpers\CommonMethods;
use App\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Payment extends Controller
{
    //
    public function show_payment(){
        $pay = Payments::where('hospital_id',CommonMethods::getHopsitalID())->get();
        return view('setup.payment',['payment'=>$pay]);
    }

    public function save_payment(Request $request){
        $payment_title = $request->payment_title;

        $payment = new Payments();
        $payment->payment_title = $payment_title;
        $payment->cuser = Auth::id();
        $payment->hospital_id = CommonMethods::getHopsitalID();
        $payment->save();

        $id = $payment->id;

        if($id > 0){
            $pay = Payments::get();
            $array = NULL;
            foreach($pay as $p){
                $array[] = array(
                    'id' => $p->id,
                    'payment_title' => $p->payment_title
                );
            }

            echo json_encode($array);
        }
    }

    public function delete_payment(Request $request){
            $id = $request->id;

            $payment = Payments::find($id);
            $payment->delete();
    }
}
