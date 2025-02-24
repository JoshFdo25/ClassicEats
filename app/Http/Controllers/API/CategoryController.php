<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $categories->transform(function ($category) {
            $category->image = url('storage/' . $category->image);
            return $category;
        });

        return response()->json($categories);
    }
}
