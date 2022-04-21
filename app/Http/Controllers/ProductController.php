<?php

namespace App\Http\Controllers;

use App\Product;
use App\Service\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function new(Request $request)
    {
        if($this->productService->handleNewProduct($request->name, $request->description))
        {
            return redirect()->route('products.index')->with('status', 'ProductService saved');
        }
        return redirect()->route('products.index')->with('status', 'ProductService name already exists');
    }

    public function delete(Request $request, Product $product)
    {
        if($this->productService->handleProductDeleting($product))
        {
            return redirect()->route('products.index')->with('status', 'ProductService was deleted');
        }
        return redirect()->route('products.index')->with('status', 'ProductService not found');
    }
}
