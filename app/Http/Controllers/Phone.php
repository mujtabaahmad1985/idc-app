<?php

namespace App\Http\Controllers;

use App\Phones;
use Illuminate\Http\Request;

class Phone extends Controller
{
    //

    public function delete_phone($id){
        $phone = Phones::find($id)->delete();
    }
}
