<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;
class Invoices extends Model
{
    //
    public static function getTotalInvoices(){
        $invoices = Invoices::sum('total_amount');

        return number_format($invoices,2);
    }

    public static function getCurrentMonthSale(){
        $currentMonth = date('Y-m');
        $sale = Invoices::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)->sum('total_amount');

        return number_format($sale,2);
    }

    public static function getTodaySale(){
        $sale = Invoices::whereYear('created_at', Carbon::today())->sum('total_amount');

        return number_format($sale,2);
    }

    public function patients(){
        return $this->belongsTo('App\Patients','patient_id','id');
    }
}
