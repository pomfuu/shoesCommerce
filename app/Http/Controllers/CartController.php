<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){

        $users = Auth::user();
        $cartItems = Cart::all()->where('user_id', $users->id);
        $product = Product::all();
        $category = Category::all();
        // dd($cartItems);
        return view('cart', compact('cartItems', 'users', 'category', 'product'));
    }

    public function destroy(Cart $cart){

        $cart->delete();
        return redirect()->route('user.cart')->with("Product deleted successfully");
    }

    public function editQty(Request $request){

        $users = Auth::user();
        $cart = Cart::where('user_id', $users->id)->get();
        $product = Product::all();
        
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);
    
        // Delete all existing Checkout records for the user
        Checkout::where('user_id', $users->id)->where('status', 'cart')->delete();
    
        foreach ($cart as $carts) {
            $matchingProduct = $product->firstWhere('id', $carts->product_id);
    
            if ($matchingProduct) {
                $total = $matchingProduct->price * $carts->qty;
    
                // Create a new Checkout record
                Checkout::create([
                    'user_id' => $carts->user_id,
                    'product_id' => $carts->product_id,
                    'qty' => $carts->qty,
                    'size' => $carts->size,
                    'total' => $total,
                    'status' => 'cart',
                ]);
            }
        }
    
        return view('cart-checkout', compact('users', 'cart'));
    }
}
