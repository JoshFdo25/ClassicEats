<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class GuestProductController extends Controller
{
    public function index()
    {
        // Retrieve categories with their products
        $categories = Category::with('products')->orderBy('name')->get();

        return view('guest.productspage.products', compact('categories'));
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('guest.productspage.product', compact('product'));
    }
}
