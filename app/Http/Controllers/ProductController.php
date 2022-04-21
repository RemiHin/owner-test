<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function new(Request $request)
    {
        if(!Product::where('name', $request->name)->first())
        {
            Product::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);
            return redirect()->route('products.index')->with('status', 'Product saved');
        }

        return redirect()->route('products.index')->with('status', 'Product name already exists');

    }

    public function delete(Request $request, Product $product)
    {
        if($product)
        {
            $product->delete();
            return redirect()->route('products.index')->with('status', 'Product was deleted');
        }

        return redirect()->route('products.index')->with('status', 'Product not found');
    }
}
