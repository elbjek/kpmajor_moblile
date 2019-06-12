<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Image;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product = Product::with('images')
        ->join('users','users.id','=','products.user_id')
        ->select('products.*','city')
        ->latest('products.id')
        ->get();
        // dd($product);
        // $product = Product::join('users','users.id','=','products.user_id')
        // ->select('products.*','name','lastname','phone_number','city','online','users.created_at')
        // ->with('images')
        // ->fifinrst();

        // dd($product->images);

        return view('home');
    }
}
