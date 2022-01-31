<?php

namespace App\Http\Controllers;

use App\Expenses;
use App\Invoices;
use App\Sales;
use Illuminate\Http\Request;

class AccountManagement extends Controller
{
    //

    public function sales(){

        $sales = Sales::paginate(100);
        return view('account-managements.sales',['sales'=>$sales]);
    }

    public function expenses(){

        $expenses = Expenses::paginate(100);
        return view('account-managements.expenses',['expenses'=>$expenses]);
    }

    public function new_sale(){
        return view('account-managements.new-sale');
    }

    public function new_expense(){
        return view('account-managements.new-expense');
    }


}
