<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Payment;
use App\Models\Order;
use App\Models\OrderSum;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    
    public function instantOrder(Request $request, $id){

        $users = Auth::user();
        $checkouts = Checkout::where('user_id', $users->id)->where('status', 'instant')->get();
        $carts = Cart::where('user_id', $users->id)->get();
        $product = Product::find($id);

        $total = 0;
        $totalPrice = 0;
        $totalQty = 0;
        $deliveryFee = 0;

        foreach($checkouts as $co){
            
            $totalQty = $co->qty;
            $totalPrice = $co->total;
            if($totalQty > 3){

                $deliveryFee = 50000;
            }
            else{

                $deliveryFee = 15000 * $totalQty;
            }

        }

        $checkOrderSum = OrderSum::where('user_id', $users->id)->where('status', 'unpaid')->first();

        if($request->input('payment') == null){

            return redirect()->route('user.cart')->with('error', 'Please choose your payment method first.');
        }
        elseif($checkOrderSum){

            $ordersums = OrderSum::where('user_id', $users->id)->where('status', 'unpaid')->get();
            foreach($ordersums as $ord){
    
                $payments = Payment::all()->where('id', $ord->payment_id);
            }
    
            return view('order', compact('users', 'checkouts', 'payments', 'ordersums', 'totalPrice', 'totalQty'));
        }
        else{

            $orderSum = OrderSum::create([

                'user_id' => $users->id,
                'payment_id' => $request->input('payment'),
                'sum_total' => $totalPrice + $deliveryFee,
                'delivery_fee' => $deliveryFee,
                'status' => 'unpaid'
            ]);

            foreach($checkouts as $co){
                
                Order::create([
                    'user_id' => $users->id,
                    'product_id' => $co->product_id,
                    'sum_id' => $orderSum->id,
                    'total' => $co->total,
                    'qty' => $co->qty,
                    'size' => $co->size,
                    'rate_status' => 'not_yet',
                ]);
            }
        }

        $ordersums = OrderSum::where('user_id', $users->id)->where('status', 'unpaid')->get();
        foreach($ordersums as $ord){

            $payments = Payment::all()->where('id', $ord->payment_id);  
        }

        return view('order', compact('users', 'checkouts', 'payments', 'ordersums', 'totalPrice', 'totalQty'));
    }

    public function cartOrder(Request $request){


        $users = Auth::user();
        $checkouts = Checkout::where('user_id', $users->id)->where('status', 'cart')->get();
        $carts = Cart::where('user_id', $users->id)->get();
        $product = Product::all();

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
                        if($totalQty > 3){

                            $deliveryFee = 50000;
                        }
                        else{

                            $deliveryFee = 15000 * $cart->qty;
                        }
                }
            }    
        }

        $checkOrderSum = OrderSum::where('user_id', $users->id)->where('status', 'unpaid')->first();

        if($request->input('payment') == null){

            return redirect()->route('user.cart')->with('error', 'Please choose your payment method first.');
        }
        elseif($checkOrderSum){

            $ordersums = OrderSum::where('user_id', $users->id)->where('status', 'unpaid')->get();
            foreach($ordersums as $ord){
    
                $payments = Payment::all()->where('id', $ord->payment_id);
            }
    
            return view('order', compact('users', 'checkouts', 'payments', 'ordersums', 'totalPrice', 'totalQty'));
        }
        else{

            $orderSum = OrderSum::create([

                'user_id' => $users->id,
                'payment_id' => $request->input('payment'),
                'sum_total' => $totalPrice + $deliveryFee,
                'delivery_fee' => $deliveryFee,
                'status' => 'unpaid'
            ]);

            foreach($checkouts as $co){
                
                Order::create([
                    'user_id' => $users->id,
                    'product_id' => $co->product_id,
                    'sum_id' => $orderSum->id,
                    'total' => $co->total,
                    'qty' => $co->qty,
                    'size' => $co->size,
                    'rate_status' => 'not_yet',
                ]);
            }
        }

        $ordersums = OrderSum::where('user_id', $users->id)->where('status', 'unpaid')->get();
        foreach($ordersums as $ord){

            $payments = Payment::all()->where('id', $ord->payment_id);  
        }

        return view('order', compact('users', 'checkouts', 'payments', 'ordersums', 'totalPrice', 'totalQty'));
    }
}
