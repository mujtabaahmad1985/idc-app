<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    //
    public static function getTotalSale(){
        $invoices = Sales::sum('grand_total');

        return number_format($invoices,2);
    }

    public static function getCurrentMonthSale(){
        $currentMonth = date('Y-m');
        $sale = Sales::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)->sum('grand_total');

        return number_format($sale,2);
    }

    public static function getTodaySale(){
        $sale = Sales::whereDate('created_at', Carbon::today())->sum('grand_total');

        return number_format($sale,2);
    }

    public function sale_items(){
        return $this->hasMany('App\SaleItems','sale_id','id')->whereNull('deleted_at');
    }

    public function appointment_sessions(){
        return $this->belongsTo('App\AppointmentSessions','session_id','id')->whereNull('deleted_at');
    }

}
