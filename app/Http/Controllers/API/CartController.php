<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = $request->user()->cart()->with('items.product')->first();
    
        if ($cart) {
            foreach ($cart->items as $item) {
                if ($item->product) {
                    $item->product->image = url('storage/' . $item->product->image);
                }
            }
        }
    
        return response()->json($cart);
    }

    public function add(Request $request, $productId)
    {
        $product = Product::where('_id', $productId)->first();

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

    public function updateQuantity(Request $request, $cartItemId)
    {
        $cartItem = CartItem::findOrFail($cartItemId);

        $request->validate([
            'quantity' => 'required|integer|min:1|max:6',
        ]);
        
        $cartItem->update([
            'quantity' => $request->input('quantity')
        ]);
        
        return response()->json(['message' => 'Quantity updated successfully']);
    }

    public function remove($cartItemId)
    {
        $cartItem = CartItem::findOrFail($cartItemId);
        $cartItem->delete();
        return response()->json(['message' => 'Item removed from cart']);
    }
}
