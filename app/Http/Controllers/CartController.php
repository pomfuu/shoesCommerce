<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\Category;
use App\Models\Product;
use App\Models\Payment;
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
        $carts = Cart::where('user_id', $users->id)->get();
        $product = Product::all();
        $payment = Payment::all(); 

        $total = 0;
        $totalPrice = 0;
        $totalQty = 0;
        $deliveryFee = 0;

        foreach ($product as $prd){
            foreach ($carts as $cart){
                if ($cart->product_id == $prd->id){

                        $total = $prd->price * $cart->qty;
                        $totalPrice = $totalPrice + $total;
                        $totalQty = $totalQty + $cart->qty;
                }
            }    
        }

        foreach($product as $prd){

            $category = Category::all()->where('id', $prd->category);
        }
        
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);
    
        // Delete all existing Checkout records for the user
        Checkout::where('user_id', $users->id)->where('status', 'cart')->delete();
    
        foreach ($carts as $cart) {
            $matchingProduct = $product->firstWhere('id', $cart->product_id);
    
            if ($matchingProduct) {
                $total = $matchingProduct->price * $cart->qty;
    
                // Create a new Checkout record
                Checkout::create([
                    'user_id' => $cart->user_id,
                    'product_id' => $cart->product_id,
                    'qty' => $cart->qty,
                    'size' => $cart->size,
                    'total' => $total,
                    'status' => 'cart',
                ]);
            }
        }
    
        return view('cart-checkout', compact('users', 'carts', 'product', 'payment', 'category', 'totalPrice', 'totalQty'));
    }
}
