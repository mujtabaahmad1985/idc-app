<?php

namespace App\Http\Controllers;

use App\Leaves;
use Illuminate\Http\Request;
use App\SendEmail;
use App\Staffs;
use App\User;
use Illuminate\Support\Facades\Auth;

class Leave extends Controller
{
    //

    public function update_leave_status(Request $request){

        $leave_id = $request->id;
        $status = $request->status;
        $reason_of_rejection = "";
        if($status=="rejected"){
            $reason_of_rejection = $request->reason_of_rejection;
        }

        $leave = Leaves::find($leave_id);
        $leave->status = $status;
        $leave->reason_of_rejection = $reason_of_rejection;
        $leave->cuser = Auth::id();
        $id = $leave->save();

        if($id > 0){
            $staff = Staffs::where('user_id',$leave->user_id)->get();
            $user = User::find($leave->user_id);

            SendEmail::leave_status($staff[0]->first_name.' '.$staff[0]->last_name,$user->email,$reason_of_rejection,$status);

            echo json_encode(array('type' => 'success','message'=>'Leave status is updated successfully'));
        }

        else
            echo json_encode(array('type' => 'error','message'=>'There is someting wrong, try again'));

    }
}
