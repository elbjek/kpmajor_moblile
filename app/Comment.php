<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment_content', 'user_id' ,'product_id'
    ];

    public function products()
    {
        return $this->belongsToMany(\App\Product::class);
    }
}
