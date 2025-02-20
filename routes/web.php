<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\GuestProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/contact-us', [HomeController::class,'contactIndex'])->name('contact-us');

Route::post('/contact-submit', [HomeController::class, 'submit'])->name('contact.submit');

Route::get('/products', [GuestProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [GuestProductController::class, 'show'])->name('products.show');


Route::middleware('auth')->group(function () {
    //user profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Cart routes
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.index');
    Route::post('/cart/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::patch('/cart/{cartItem}', [CartController::class, 'updateCart'])->name('cart.update');
    Route::delete('/cart/{cartItem}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    
    // Route::get('/cart/stripe-checkout', [CartController::class, 'viewCheckout'])->name('cart.checkout');
    Route::post('/checkout', [CartController::class, 'stripeCheckout'])->name('cart.stripeCheckout');
    Route::get('/checkout/success', [CartController::class, 'checkoutSuccess'])->name('checkout.success');

});

//Admin Routes
Route::prefix('admin')->middleware(['auth:admin'])->group(function () {

    // Admin profile routes
    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/profile', [AdminProfileController::class, 'destroy'])->name('admin.profile.destroy');

    // Admin landing page route
    Route::get('/', [ProductController::class, 'index']);

    // Product routes
    Route::get('products', [ProductController::class, 'index'])->name('admin.products');

    Route::get('products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('products/save', [ProductController::class,'save'])->name('admin.products.save');

    Route::patch('/products/{id}/toggle-status', [ProductController::class, 'toggleStatus'])->name('admin.products.toggleStatus');

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

Route::fallback(function () {
    return view('errors.404');
});

require __DIR__.'/auth.php';
