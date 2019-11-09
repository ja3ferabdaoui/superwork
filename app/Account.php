<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //

    public function Client()
    {
        return $this->hasOne('App\Client');
    }
}
