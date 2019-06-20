<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ApiProductsController extends Controller
{
    public function index()
    {
        $user = \Auth::id();
        // $products = Product::with('users')
        // // ->join('users','users.id','=','products.user_id')
        // // ->select('products.*','city')
        // ->latest('products.id')
        // ->get();
        $products = Product::with('user')->paginate(3);
        return response()->json($products);
    }

    public function show(Product $Product)
    {
        $selectedProduct = $Product->id;
        $product = Product::join('users', 'users.id', '=', 'products.user_id')
            ->select('products.*', 'name', 'lastname', 'phone_number', 'city', 'online', 'users.created_at')
            ->where('products.id', $selectedProduct)
            ->with('images')
            ->first();

        $previous = Product::where('products.id', '<', $Product->id)->orderBy('products.id', 'desc')->with('images')->first();

        $all = Product::join('users', 'users.id', '=', 'products.user_id')
            ->select('products.*', 'name', 'lastname', 'phone_number', 'city', 'online', 'users.created_at')
            ->latest('products.id')
            ->with('images')
            ->get();

        $next = Product::where('id', '>', $Product->id)->first();

        $items = [$product, $previous, $next, $all];
        return $items;
    }
    public function create(Product $Product)
    {
        $user = \Auth::id();
        return compact('user');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'description' => 'required|min:5',
            'price' => 'required|min:1',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:10000',
        ]);

        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/products', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $fileNameToStore,
            'user_id' => \Auth::id(),
        ]);
        return redirect('/home');
    }
    public function edit(Product $Product)
    {
        $user = \Auth::id();
        $selected = $Product->id;
        $product = Product::where('products.id', $selected)
            ->get();
        return response()->json($product);
    }

    // public function update (Request $request, Appointment $appointment)
    // {
    //     $id = $appointment->id;
    //     $appointment->update($request->all());
    //     return redirect('/appointments/'.$id);
    // }

    public function update(Request $request, Product $product)
    {
        $id = $product->id;

        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/products', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $product->update($request->all());
        return redirect('/products/'.$id);
    }

    public function latest()
    {
        $products = Product::with('images')
            ->take(6)
            ->latest('products.id')
            ->get();
        return response()->json($products);
    }
}
