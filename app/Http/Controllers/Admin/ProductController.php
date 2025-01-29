<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function apiIndex()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public  function index() {

        $products = Product::orderBy('id', 'desc')->get();
        $total = Product::count();
        return view('Admin.Product.home', compact('products', 'total'));
    }

    public function create() {

        $categories = Category::all();

        return view('Admin.Product.create', compact('categories'));
    }

    public function save(Request $request) {

        $request->validate([
            'name' =>'required|max:50',
            'description' =>'required|string',
            'ingredients' =>'required|string',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'image' =>'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        }

        $category = Category::findOrFail($request->category_id);

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'ingredients' => $request->ingredients,
            'category_id' => $request->category_id,
            'category_name' => $category->name,
            'price' => $request->price,
            'image' => $imagePath,
            'status' => $request->has('status') ? $request->status : true,
        ]);

        if ($product) {
            return back()->with('success', 'Product added successfully');
        } else {
            return back()->with('error', 'Failed to add product');
        }

    }
    

    public function edit($id) {

        $categories = Category::all();

        $products = Product::findOrFail($id);
        return view('Admin.Product.update', compact('products', 'categories'));
    }


    public function update(Request $request, $id) {

        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        } else {
            $imagePath = $product->image;
        }

        $category = Category::findOrFail($request->category_id);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'ingredients' => $request->ingredients,
            'category_id' => $request->category_id,
            'category_name' => $category->name,
            'price' => $request->price,
            'image' => $imagePath,
            'status' => $request->has('status') ? $request->status : $product->status,
        ]);

        if ($product) {
            return redirect()->route('admin.products')->with('success', 'Product updated successfully');
        } else {
            return back()->with('error', 'Failed to update product');
        }

    }


    public function toggleStatus($id)
    {
        $product = Product::findOrFail($id);
        $product->update(['status' => !$product->status]);

        return back()->with('success', 'Product availability updated.');
    }


    public function delete($id) {

        $product = Product::findOrFail($id)->delete();

        if ($product) {
            return redirect()->route('admin.products')->with('success', 'Product deleted successfully');
        } else {
            return back()->with('error', 'Failed to delete product');
        }
    }
}
