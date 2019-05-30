<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ApiProductsController extends Controller
{
    public function index()
    {
        $user = \Auth::id();
        $products = Product::where('user_id', $user)->get();
        return response()->json($products);
    }
}
