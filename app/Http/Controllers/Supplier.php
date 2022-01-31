<?php

namespace App\Http\Controllers;

use App\Suppliers;
use Illuminate\Http\Request;
use DB;

class Supplier extends Controller
{
    //
    public function suppliers(){
        $suppliers = Suppliers::whereNull('deleted_at')->get();
            return view('account-managements.suppliers',['suppliers'=>$suppliers]);
    }

    public function save_supplier(Request $request){
        $id = $request->id;

        if(empty($id)){
            $supplier = new Suppliers();
            $r = $supplier->insert($request->except(['id', '_token']));
            $id = DB::getPdo()->lastInsertId();
        }else{
            $supplier = Suppliers::find($id);
           $id=  $supplier->update($request->except(['id', '_token']));

        }




        if($id > 0){
            echo json_encode(array('type' => 'success', 'message'=>'Supplier is saved successfully.'));
            exit;
        }else{
            echo json_encode(array('type' => 'error', 'message'=>'Supplier is not saved successfully.'));
            exit;
        }

    }

    public function edit_supplier($id){
        $supplier = Suppliers::find($id);

        return $supplier->toJson();
    }

    public function delete_supplier($id){
        $supplier = Suppliers::find($id);

        $supplier->deleted_at = date('Y-m-d H:i:s');
        $supplier->save();
    }
}
