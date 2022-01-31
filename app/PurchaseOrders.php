<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrders extends Model
{
    //
    protected $table = "orders";

    public function order_items(){
        return $this->hasMany('App\PurchaseOrderItems','order_id','id')->whereNull('deleted_at');
    }

    public function manufactures(){
        return $this->belongsTo('App\Manufactures','manufacturer_id','id')->whereNull('deleted_at');
    }
}
