<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        // Assuming you have a user authentication system
        $userId = auth()->user()->id;

        // Get cart items for the current user
        $cartItems = Cart::where('user_id', $userId)->get();

        // Check if the cart is not empty
        if ($cartItems->isEmpty()) {
            return response()->json(['message' => 'Cart is empty'], 400);
        }

        // Calculate total and create checkout entry
        $total = 0;
        foreach ($cartItems as $cartItem) {
            $total += $cartItem->qty * $cartItem->products->price;
            Checkout::create([
                'user_id' => $userId,
                'product_id' => $cartItem->product_id,
                'qty' => $cartItem->qty,
                'size' => $cartItem->size,
                'total' => $cartItem->qty * $cartItem->products->price,
                'status' => 'unpaid', // You can set the initial status here
            ]);
        }

        // Clear the user's cart
        Cart::where('user_id', $userId)->delete();

        return response()->json(['message' => 'Checkout successful', 'total' => $total]);
    }

    public function updateQuantity(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'qty' => 'required|integer|min:1',
        ]);

        // Assuming you have a user authentication system
        $userId = auth()->user()->id;

        // Update the quantity in the cart
        $cartItem = Cart::where('id', $id)->where('user_id', $userId)->first();

        if (!$cartItem) {
            return response()->json(['message' => 'Cart item not found'], 404);
        }

        $cartItem->qty = $request->input('qty');
        $cartItem->save();

        return response()->json(['message' => 'Quantity updated successfully', 'cart_item' => $cartItem]);
    }
}
