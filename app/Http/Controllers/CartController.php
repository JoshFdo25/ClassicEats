<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
    
        if ($product->quantity < 1) {
            return back()->with('error', 'Product is out of stock.');
        }

        // Proceed with adding to cart for authenticated users
        if (auth()->check()) {
            $cart = auth()->user()->cart()->firstOrCreate([
                'user_id' => auth()->id(),
            ]);
        
            $cartItem = $cart->items()->where('product_id', $productId)->first();
        
            if ($cartItem) {
                $cartItem->update([
                    'quantity' => min($cartItem->quantity + 1, $product->quantity),
                ]);
            } else {
                $cart->items()->create([
                    'product_id' => $productId,
                    'quantity' => 1,
                ]);
            }
        
            return back()->with('success', 'Product added to cart.');
        }

        return back()->with('error', 'Please log in to add items to your cart.');
    }

    public function removeFromCart($cartItemId)
    {
        $cartItem = CartItem::findOrFail($cartItemId);

        $cartItem->delete();

        return back()->with('success', 'Item removed from cart.');
    }

    public function viewCart()
    {
        $cart = auth()->user()->cart;
        return view('guest.cart', compact('cart'));
    }

    public function updateCart(Request $request, $cartItemId)
    {
        $cartItem = CartItem::findOrFail($cartItemId);

        $product = $cartItem->product;

        $validated = $request->validate([
            'quantity' => "required|integer|min:1|max:{$product->quantity}",
        ]);

        $cartItem->update($validated);

        return response()->json(['success' => true]);
    }

    public function stripeCheckout(Request $request)
    {
        $cart = auth()->user()->cart;
    
        if (!$cart || $cart->items->isEmpty()) {
            return back()->with('error', 'Your cart is empty.');
        }
    
        $totalAmount = $cart->items->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
    
        try {
            Stripe::setApiKey(config('services.stripe.secret'));
    
            $paymentIntent = PaymentIntent::create([
                'amount' => $totalAmount * 100, // Stripe accepts amounts in cents
                'currency' => 'lkr',
                'metadata' => ['user_id' => auth()->id()],
            ]);
    
            return view('guest.checkout', [
                'clientSecret' => $paymentIntent->client_secret,
                'totalAmount' => $totalAmount,
            ]);
            
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function completeCheckout(Request $request)
    {
        $cart = auth()->user()->cart;

        if ($cart) {
            $cart->items()->delete();
            $cart->delete();
        }

        return response()->json(['success' => true]);
    }

}
