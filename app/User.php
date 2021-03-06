<?php

namespace SuperWorks;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'role_id', 'status', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('SuperWorks\Role');
    }
 
    public function isAdmin(){
        return $this->role->role == "admin";
    }

    public function isClient(){
        return $this->role->role == "client";
    }

    public function userAccount(){
        if($this->isAdmin()){
            return $this->hasOne('SuperWorks\Admin');
        } elseif($this->isClient()){
            return $this->hasOne('SuperWorks\Client');
        }
    }
}
