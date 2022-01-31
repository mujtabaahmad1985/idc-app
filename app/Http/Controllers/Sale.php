<?php

namespace App\Http\Controllers;

use App\Patients;
use App\SaleItems;
use App\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PDF;
class Sale extends Controller
{
    //
    public function save_sale(Request $request){
       $id = $request->id;
        if(empty($id))
            $sale = new Sales();
        else
            $sale = Sales::find($id);

        $name = "";

        if(is_numeric($request->person_name)){
            $patient = Patients::find($request->person_name);
            $name = $patient->first_name.' '.$patient->last_name;
            $sale->person_id = $request->person_name;
        }else{
            $name = $request->person_name;
        }

        $sale->type = $request->type;
        $sale->person_name = $name;
        $sale->email = $request->email;
        $sale->billing_address = $request->billing_address;
        $sale->due_date = !empty($request->due_date)?date('Y-m-d', strtotime($request->due_date)):"";
        $sale->invoice_date = date('Y-m-d');
        $sale->grand_total = $request->grand_total_price;
        $sale->cuser = Auth::id();
        $sale->save();

        $sale_id = $sale->id;

        $products = $request->product_name;
        $description = $request->description;
        $quantity = $request->quantity;
        $price = $request->price;
        $total = $request->total;

        if(count($products) > 0){
            foreach($products as $i=>$p){
                $item = new SaleItems();

                $item->sale_id = $sale_id;
                $item->item_name = $p;
                $item->item_description = $description[$i];
                $item->quantity = $quantity[$i];
                $item->price = $price[$i];
                $item->total_price = $total[$i];
                /*$item->cuser = Auth::id();*/
                $item->save();
            }
        }

        if ($sale_id > 0) {

            echo json_encode(array(
                'type' => 'success',
                'message' => 'Transaction is added successfully. you can view in listing.'
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in sale submitting, try again.'
            ));
        }
    }

    public function view_sale(Request $request){
        $id = $request->id;

        $sale = Sales::with('sale_items')->where('id',$id)->first();

        return $sale->toJson();
    }


    public function download_sale_pdf($id){
        $sale = Sales::with('sale_items')->where('id',$id)->first();
        $pdf = PDF::loadView('pdf.sale-pdf',['sales'=>$sale]);
        return $pdf->download($sale->id.'-'.date('YmdHis').'.pdf');
    }
}
