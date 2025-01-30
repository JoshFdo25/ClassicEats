<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = $request->user()->cart()->with('items.product')->first();
        return response()->json($cart);
    }

    public function add(Request $request, $productId)
    {
        $product = Product::where('_id', $productId)->first(); // Use '_id' for MongoDB

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
    
        if ($product->status === false) {
            return response()->json(['error' => 'Product is out of stock.'], 400);
        }
    
        if (auth()->check()) {
            $cart = auth()->user()->cart()->firstOrCreate([
                'user_id' => auth()->id(),
            ]);
    
            $cartItem = $cart->items()->where('product_id', $productId)->first();
    
            if ($cartItem) {
                $cartItem->update([
                    'quantity' => min($cartItem->quantity + 1, 6),
                ]);
            } else {
                $cart->items()->create([
                    'product_id' => $productId,
                    'quantity' => 1,
                ]);
            }
    
            return response()->json(['success' => 'Product added to cart.']);
        }
    
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function remove($cartItemId)
    {
        $cartItem = Cart::findOrFail($cartItemId);
        $cartItem->delete();
        return response()->json(['message' => 'Item removed from cart']);
    }
}
