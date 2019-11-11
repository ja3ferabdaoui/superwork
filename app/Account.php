<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $fillable = [
        'account_token', 'type', 'type_id','status','client_id'
    ];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
