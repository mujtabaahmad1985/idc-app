<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folders extends Model
{
    //
    public function documents(){
        return $this->hasMany("App\Documents", "folder_id",'id')->orderBy('id','DESC');
    }

    public function digital_images(){
        return $this->hasMany("App\Documents", "folder_id",'id')->whereRaw("documents.document_tile regexp '.jpg|.png'")->orderBy('id','DESC');
    }
}
