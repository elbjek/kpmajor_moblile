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
        ->select('products.*','users.name','users.lastname','users.city')
        ->latest('products.id')
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
    public function create(Product $Product)
    {
        $user = \Auth::id();
        return  compact('user');  
    }
    public function store(Request $request)
    {
        // $imageName = time().'.'.$request->image->getClientOriginalExtension();
        Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image'=> $request->image,
            'user_id' => \Auth::id()
            ]);
            return redirect('/home');
    }
    public function latest(){
        $products = Product::join('users', 'users.id', '=', 'products.user_id')
        ->select('products.*','users.name','users.lastname')
        ->latest('products.id')
        ->take(6)
        ->get();
        return response()->json($products);
    }

    // public function search(Request $request)
    // {
    //     $error = ['error' => 'No results found, please try with different keywords.'];

    //     // Making sure the user entered a keyword.
    //     if($request->has('q')) {

    //         // Using the Laravel Scout syntax to search the products table.
    //         $posts = Product::search($request->get('q'))->get();

    //         // If there are results return them, if none, return the error message.
    //         return $posts->count() ? $posts : $error;

    //     }

    //     // Return the error message if no keywords existed
    //     return $error;
    //         }
}
