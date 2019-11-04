<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compt extends Model
{
    //
    protected $belongsTo = [
        'user' => 'App\User',
    ];
}
