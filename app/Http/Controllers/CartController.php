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
    
        if ($product->status === false) {
            return $request->wantsJson()
                ? response()->json(['error' => 'Product is out of stock.'], 400)
                : back()->with('error', 'Product is out of stock.');
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
    
            $totalItems = $cart->items()->sum('quantity');
    
            return $request->wantsJson()
                ? response()->json(['success' => 'Product added to cart.', 'totalItems' => $totalItems])
                : back()->with(['success' => 'Product added to cart.', 'totalItems' => $totalItems]);
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
        return view('Guest.cart', compact('cart'));
    }

    public function updateCart(Request $request, $cartItemId)
    {
        $cartItem = CartItem::findOrFail($cartItemId);
    
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1|max:6',
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

        foreach ($cart->items as $item) {
            if (!$item->product->status) {
                return back()->with('error', "'{$item->product->name}' is unavailable. Please remove it from your cart before checkout.");
            }
        }

        $totalAmount = $cart->items->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
    
        try {
            Stripe::setApiKey(config('services.stripe.secret'));
    
            $paymentIntent = PaymentIntent::create([
                'amount'   => $totalAmount * 100,
                'currency' => 'lkr',
                'metadata' => ['user_id' => auth()->id()],
            ]);
    
            return view('Guest.checkout', [
                'clientSecret' => $paymentIntent->client_secret,
                'totalAmount'  => $totalAmount,
            ]);
    
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }    

    public function checkoutSuccess()
    {
        $cart = auth()->user()->cart;

        if ($cart) {
            $cart->items()->delete();
        }

        return view('Guest.success');
    }
}
