<?php

namespace App\Http\Controllers;

use App\Customers;
use Illuminate\Http\Request;
use DB;

class Customer extends Controller
{
    //
    public function save_customer(Request $request){
        $id = $request->id;

        if(empty($id)){
            $customer = new Customers();
            $r = $customer->insert($request->except(['id', '_token']));

            $id = DB::getPdo()->lastInsertId();
        }else{
            $customer = Customers::find($id);
            $id=  $customer->update($request->except(['id', '_token']));

        }




        if($id > 0){
            echo json_encode(array('type' => 'success', 'message'=>'customer is saved successfully.'));
            exit;
        }else{
            echo json_encode(array('type' => 'error', 'message'=>'customer is not saved successfully.'));
            exit;
        }

    }

    public function customers(){
        $customers = Customers::whereNull('deleted_at')->get();
        return view('account-managements.customers',['customers'=>$customers]);
    }

    public function edit_customer($id){
        $customer = customers::find($id);

        return $customer->toJson();
    }

    public function delete_customer($id){
        $customer = customers::find($id);

        $customer->deleted_at = date('Y-m-d H:i:s');
        $customer->save();
    }
}
