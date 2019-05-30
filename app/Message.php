<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'message_content','seen','user_id'
    ];

    public function users() {
        return $this->belongsTo(\App\User::class);
    }
}
