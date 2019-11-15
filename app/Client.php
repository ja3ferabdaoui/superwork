<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //

    protected $fillable = [
        'first_name', 'last_name', 'user_id','address','country','city','avatar','phone'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function accounts()
    {
        return $this->hasMany('App\Account');
    }
}
