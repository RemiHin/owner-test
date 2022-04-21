<?php

namespace App\Service;

use App\Product;

class ProductService
{

    public function handleNewProduct($name, $description)
    {
        if(!Product::where('name', $name)->first())
        {
            Product::create([
                'name' => $name,
                'description' => $description,
            ]);
            return true;
        }
        return false;
    }

    public function handleProductDeleting(Product $product)
    {
        if($product)
        {
            $product->delete();
            return true;
        }
        return false;
    }
}
