<?php

namespace SuperWorks;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //

    protected $fillable = [
        'first_name', 'last_name', 'user_id','address','country','city','avatar','phone'
    ];

    public function user()
    {
        return $this->belongsTo('SuperWorks\User');
    }

    public function accounts()
    {
        return $this->hasMany('SuperWorks\Account');
    }
    public function hasAccount($value = null)
    {
        $account = $this->accounts()->where('type',$value)->first();
        if(!$account){
            return false;
        }
        return true;
    }

    public function hasAccount($value = null)
    {
        $account = $this->accounts()->where('type',$value)->first();
        if(!$account){
            return false;
        }
        return true;
    }
}
