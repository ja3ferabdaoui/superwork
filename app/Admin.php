<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $fillable = [
        'first_name', 'last_name', 'user_id','address','country','city','avatar','state'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
