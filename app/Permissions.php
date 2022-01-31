<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    //

    public function parent()
    {
        return $this->belongsTo('App\Permissions', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Permissions', 'parent_id');
    }

    public function users(){
        return $this->belongsToMany('App\User','permissions_users','permission_id','user_id');
    }
}
