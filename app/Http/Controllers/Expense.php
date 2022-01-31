<?php

namespace App\Http\Controllers;

use App\ExpenseItems;
use App\Expenses;
use App\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class Expense extends Controller
{
    //
    public function save_expense(Request $request){
        $id = $request->id;
        if(empty($id))
            $sale = new Expenses();
        else
            $sale = Expenses::find($id);

        $sale->type = $request->type;
        $sale->person_name = $request->person_name;
        $sale->email = $request->email;
        $sale->category_id = $request->category_id;
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
                $item = new ExpenseItems();

                $item->sale_id = $sale_id;
                $item->item_name = $p;
                $item->item_description = $description[$i];
                $item->quantity = $quantity[$i];
                $item->price = $price[$i];
                $item->total_price = $total[$i];

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

    public function view_expense(Request $request){
        $id = $request->id;

        $expense = Expenses::with('expense_items')->where('id',$id)->first();

        return $expense->toJson();
    }

    public function download_expense_pdf($id){
        $sale = Expenses::with('expense_items')->where('id',$id)->first();
        $pdf = PDF::loadView('pdf.expense-pdf',['sales'=>$sale]);
        return $pdf->download("expense-".$sale->id.'-'.date('YmdHis').'.pdf');
    }
}
