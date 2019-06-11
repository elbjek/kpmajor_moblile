<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'image','product_id' 
        // 'imageable_id', 'imageable_type'
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
