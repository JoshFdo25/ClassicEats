<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::orderBy('id', 'desc')->get();
        $total = Category::count();
        return view('Admin.Category.home', compact('categories', 'total'));
    }

    public function create() {
        return view('Admin.Category.create');
    }

    public function save(Request $request) {

        $request->validate([
            'name'=> 'required|max:50',
            'image' =>'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('category_images', 'public');
        }

        $category = Category::create([
            'name' => $request->name,
            'image' => $imagePath
        ]);

        if ($category) {
            return back()->with('success', 'Category added successfully');
        } else {
            return back()->with('error', 'Failed to add category');
        }

    }

    public function edit($id) {

        $categories = Category::findOrFail($id);
        return view('Admin.Category.update', compact('categories'));
    }

    public function update(Request $request, $id) {

        $category = Category::findOrFail($id);

        $request->validate([
            'name'=> 'required|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('category_images', 'public');
        } else {
            $imagePath = $category->image;
        }

        $category->update([
            'name' => $request->name,
            'image' => $imagePath,
        ]);

        if ($category) {
            return redirect()->route('admin.categories')->with('success', 'Category updated successfully');
        } else {
            return back()->with('error', 'Failed to update category');
        }
    }

    public function delete($id) {

        $category = Category::findOrFail($id);

        Product::where('category_id', $category->id)->delete();

        if ($category->delete()) {
            return back()->with('success', 'Category deleted successfully');
        } else {
            return back()->with('error', 'Failed to delete category');
        }

    }
}
