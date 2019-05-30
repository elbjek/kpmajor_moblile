<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ApiProductsController extends Controller
{
    public function index()
    {
        $user = \Auth::id();
        $products = Product::join('users', 'users.id', '=', 'products.user_id')
        ->select('products.*','users.name','users.lastname')
        ->get();
        return response()->json($products);
    }

    public function show(Product $Product)
    {
        $user = \Auth::id();
        $selectedProduct = $Product->id;
        $product = Product::join('users','users.id','=','products.user_id')
        ->select('products.*','name','lastname','phone_number')
        ->where('products.id',$selectedProduct)
        ->get();
        return response()->json($product);
    }
}
