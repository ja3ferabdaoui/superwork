<?php

namespace SuperWorks;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    //
    protected $fillable = [
        'subject', 'text', 'user_id','status','conversation_id'
    ];
    public function user()
    {
        return $this->belongsTo('SuperWorks\User');
    }
}
