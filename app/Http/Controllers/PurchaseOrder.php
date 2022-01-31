<?php

namespace App\Http\Controllers;

use App\Manufactures;
use App\PurchaseOrderItems;
use App\PurchaseOrders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PDF;
class PurchaseOrder extends Controller
{
    //
    public function purchase_orders(){

        $orders = PurchaseOrders::whereNull('deleted_at')->paginate(100);

        return view('products.purchase-orders',['orders'=>$orders]);
    }

    public function purchase_orders_new(){
        $manufactures = Manufactures::whereNull('deleted_at')->get();
        return view('products.purchase-orders-new',['manufactures'=>$manufactures]);
    }

    public function purchase_orders_edit($id){
        $manufactures = Manufactures::whereNull('deleted_at')->get();
        $order = PurchaseOrders::find($id);
        return view('products.purchase-orders-new',['manufactures'=>$manufactures,'order'=>$order]);
    }

    public function delete_order(Request $request){
        $id = $request->id;

        $order = PurchaseOrders::find($id);
        $order->deleted_at = date('Y-m-d H:i:s');
        $order->save();
    }

    public function save_order(Request $request){
        $id = $request->id;

        if(empty($id))
            $order = new PurchaseOrders();
        else
            $order = PurchaseOrders::find($id);

        $order->manufacturer_id = $request->manufacturer_id;
        $order->purchase_date = $request->purchase_date;
        $order->cash_type = $request->cash_type;
        $order->total_price = $request->grand_total_price;
        $order->invoice_no = date('YmdHi').'-'.str_pad($request->manufacturer_id,6,0,STR_PAD_LEFT);
        $order->cuser = Auth::id();
        $order->save();

        $id =  $order->id;

        if($id > 0){
            $items = PurchaseOrderItems::where('order_id',$id)->delete();
            $product_name = $request->product_name;
            $expiry_date = $request->expiry_date;
            $quantity = $request->quantity;
            $price = $request->price;
            $total = str_replace(',','',$request->total);;
            $product_description = $request->product_description;
            $discount = $request->discount;

            if(count($product_name) > 0){

                foreach($product_name as $k=>$p){
                    if($p!=""){
                        $item = new PurchaseOrderItems();

                        $item->order_id = $id;
                        $item->product_description = $product_description[$k];
                        $item->item_name = $p;
                        $item->expiry_date = $expiry_date[$k];
                        $item->quantity = $quantity[$k];
                        $item->price = intval($price[$k]);
                        $item->total_price = str_replace(',','',$total[$k]);
                        $item->discount = intval($discount[$k]);
                        $item->cuser = Auth::id();
                        $item->save();
                    }

                }
            }

            if ($id > 0) {

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

    }

    public function get_order_items(Request $request){
        $id = $request->id;

        $items = PurchaseOrderItems::where('order_id',$id)->get();
        echo json_encode($items);
    }

    public function download_purchase_order($id){
        $order = PurchaseOrders::find($id);
        //dd($order);
        $pdf = PDF::loadView('pdf.purchase-order-pdf',['order'=>$order]);
        return $pdf->download("purchase-order-".$order->invoice_no.'.pdf');
    }
}
