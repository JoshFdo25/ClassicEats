<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();

        $products->transform(function ($product) {
            $product->image = url('storage/' . $product->image);
            return $product;
        });
    
        return response()->json($products);
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        $product->image = url('storage/' . $product->image);
    
        return response()->json($product);
    }
}
