<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    //
    public static function getTotalExpense(){
        $invoices = Expenses::sum('grand_total');

        return number_format($invoices,2);
    }

    public static function getCurrentMonthExpense(){
        $currentMonth = date('Y-m');
        $Expense = Expenses::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)->sum('grand_total');

        return number_format($Expense,2);
    }

    public static function getTodayExpense(){
        $Expense = Expenses::whereDate('created_at', Carbon::today())->sum('grand_total');

        return number_format($Expense,2);
    }

    public function expense_categories()
    {
        return $this->hasOne('App\ExpenseCategories','id','category_id');
    }

    public function expense_items(){
        return $this->hasMany('App\ExpenseItems','sale_id','id')->whereNull('deleted_at');
    }

}
