<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiTokens extends Model
{
    //
    public function generateToken($user_id)
    {
        $this->user_id = $user_id;
        $this->api_token = str_random(60);
        $this->save();

        return $this->api_token;
    }
}
