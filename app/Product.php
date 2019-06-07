<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{


    protected $fillable = [
        'title','description','image','price','category_id','user_id'
    ];

    public function users() 
    {
        return $this->belongsTo(\App\User::class);
    }

    public function categories() 
    {
        return $this->belongsTo(\App\Category::class);
    }
    public function getSearchResult(): SearchResult
    {
       $url = route('products.show', $this->id);
         
       return new SearchResult($this, $this->title, $url);
    }
}
