<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Image;
class Product extends Model 
{


    protected $fillable = [
        'title','description','price','category_id','user_id','image'
    ];

    public function user() 
    {
        return $this->belongsTo(\App\User::class);
    }

    public function categories() 
    {
        return $this->belongsTo(\App\Category::class);
    }

    public function images()
    {
        return $this->hasMany(\App\Image::class);
    }
}
