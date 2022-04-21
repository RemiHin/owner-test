<?php

namespace App\Service;

use App\Product;
use App\Tag;

class ProductService
{

    public function handleNewProduct($name, $description)
    {
        if(!Product::where('name', $name)->first())
        {
            $product = Product::create([
                'name' => $name,
                'description' => $description,
            ]);
            return $product;
        }
        return false;
    }

    public function handleAddTags($product, $tags)
    {
        foreach(explode(',', $tags) as $name)
        {
            $tag = Tag::firstOrCreate([
                'name' => trim($name),
            ]);
            $tag->products()->attach($product);
        }
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
