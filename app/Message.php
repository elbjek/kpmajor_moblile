<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'message_content','seen','user_id','conversation_id'
    ];

    public function users() {
        return $this->belongsTo(\App\User::class);
    }

    public function conversations()
    {
        return $this->belongsToMany(\App\Conversation::class);
    }
}
