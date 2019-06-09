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
        // $user = \Auth::id();
        $selectedProduct = $Product->id;
        // $product = Product::join('users','users.id','=','products.user_id')
        // ->select('products.*','name','lastname','phone_number','city','online','users.created_at')
        // ->where('products.id',$selectedProduct)
        // ->get();

        $product = Product::join('users','users.id','=','products.user_id')
        ->select('products.*','name','lastname','phone_number','city','online','users.created_at')
        ->where('products.id',$selectedProduct)
        ->first();
        // find($Product->id);

        // // get previous user id
        $previous = Product::where('products.id', '<', $Product->id)->orderBy('products.id', 'desc')->first();
    
        // // get next user id
        $next = Product::where('id', '>', $Product->id)->first();
    
        // return View::make('users.show')->with('previous', $previous)->with('next', $next);
        $test=[$product,$previous,$next];
        return $test;
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
    public function latest()
    {
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
