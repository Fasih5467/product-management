<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $user_id = auth()->id();
        $products = Product::where('user_id', $user_id)->orderBy('id','desc')->get();
        return view('product.list', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $product = new Product;
        $product->user_id = auth()->id();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        return redirect('/products')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect('/products')->with('error', 'Product not found.');
        }

        return view('product.edit', compact('product'));
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $product = Product::find($request->id);

        if (!$product) {
            return redirect('/products')->with('error', 'Product not found.');
        }
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        return redirect('/products')->with('success', 'Product updated successfully.');
    }
    public function destroy($id)
    {   
        
        $product = Product::find($id);

        if (!$product) {
            return redirect('/products')->with('error', 'Product not found.');
        }

        $product->delete();

        return redirect('/products')->with('success', 'Product deleted successfully.');
    }
}
