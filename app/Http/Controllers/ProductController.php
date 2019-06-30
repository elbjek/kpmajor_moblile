<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
    public function show(Product $Product)
    {
        return view('product');
    }
    public function create()
    {
        return view('create_product');
    }

}
