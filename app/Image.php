<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'image','user_id','product_id'
    ];
    
    public function users() 
    {
        return $this->belongsTo(\App\User::class);
    }

    public function products() 
    {
        return $this->belongsTo(\App\Product::class);
    }
}
