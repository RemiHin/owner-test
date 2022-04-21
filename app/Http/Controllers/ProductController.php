<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function new(Request $request)
    {
        if(!Product::where('name', $request->name)->first())
        {
            DB::insert("INSERT INTO products (name) VALUES ('".$request->name."')");
            return redirect()->route('products.index')->with('status', 'Product saved');
        }

        return redirect()->route('products.index')->with('status', 'Product name already exists');

    }

    public function delete(Request $request)
    {
        DB::delete("DELETE FROM products WHERE id = ".$request->id);

        return redirect()->route('products.index')->with('status', 'Product was deleted');
    }
}
