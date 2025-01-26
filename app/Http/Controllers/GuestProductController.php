<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestProductController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.products');
        } elseif (Auth::check()) {
            $categories = Category::with('products')->orderBy('name')->get();
            return view('Guest.ProductsPage.products', compact('categories'));
        }

        $categories = Category::with('products')->orderBy('name')->get();
        return view('Guest.ProductsPage.products', compact('categories'));

    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('Guest.ProductsPage.product', compact('product'));
    }
}
