<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Admin Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    // Admin landing page route
    Route::get('/', [ProductController::class, 'index'])->name('admin.products');


    // Product routes
    Route::get('products', [ProductController::class, 'index'])->name('admin.products');

    Route::get('products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('products/save', [ProductController::class,'save'])->name('admin.products.save');

    Route::get('products/edit/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('products/edit/{id}', [ProductController::class, 'update'])->name('admin.products.update');

    Route::get('products/delete/{id}', [ProductController::class, 'delete'])->name('admin.products.delete');


    // Category routes
    Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories');

    Route::get('categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('categories/save', [CategoryController::class,'save'])->name('admin.categories.save');
    
    Route::get('categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('categories/edit/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');

    Route::get('categories/delete/{id}', [CategoryController::class, 'delete'])->name('admin.categories.delete');
});

require __DIR__.'/auth.php';
