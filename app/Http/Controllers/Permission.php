<?php

namespace App\Http\Controllers;

use App\Permissions;
use App\Staffs;
use App\User;
use Illuminate\Http\Request;

class Permission extends Controller
{
    //

    public function get_permissions($id){

        $user_permission = User::find($id)->permissions;
        $allow_permissions = [];
       foreach($user_permission as $u){
           $allow_permissions[] = $u->id;
       }

       if(Auth::User()->role=='doctor')
        $permissions = Permissions::with('children')->whereNull('parent_id')->whereNotIn('id',[5,35])->get();
           else
        $permissions = Permissions::with('children')->whereNull('parent_id')->get();



        return view('partials.get-permissions',['permissions'=>$permissions,'id'=>$id,'allow_permissions'=>$allow_permissions]);


    }

    public function save_permission_with_user($permission_id,$user_id,$status){

        $permission     = Permissions::find($permission_id);
        $user           = User::find($user_id);

        if ($status=="save"){
            $permission->users()->save($user);
        }

        if($status=="delete"){
            $permission->users()->detach($user);
        }

    }

    public function set_permissions(){
        $staffs = Staffs::whereNull('deleted_at')->get();
        $permissions = Permissions::with('children')->whereNull('parent_id')->get();
        //dd($staffs);
        return view('permissions',['permissions'=>$permissions]);
    }
}
