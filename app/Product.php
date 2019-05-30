<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title','description','price','user_id'
    ];

    public function users() 
    {
        return $this->belongsTo(\App\User::class);
    }

    // public function categories() 
    // {
    //     return $this->belongsTo(\App\Category::class,'category_id');
    // }
}
