<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index(Request $request, $id){

        $users = Auth::user();
        $checkouts = Checkout::where('user_id', $users->id)->where('status', 'instant')->get();
        // $products = Product::find($id);

        $checkOrder = Order::where('user_id', $users->id)->where('status', 'unpaid')->first();

        if($request->input('payment') == null){

            return redirect()->route('product.detail', ['id' => $id])->with('error', 'Please choose your payment method first.');
        }
        elseif($checkOrder){

            $orders = Order::where('user_id', $users->id)->where('status', 'unpaid')->get();
            foreach($orders as $ord){
    
                $payments = Payment::all()->where('id', $ord->payment_id);
            }
    
            return view('order', compact('users', 'checkouts', 'payments', 'orders'));
        }
        else{

            foreach($checkouts as $co){
                
                if($co->qty <= 3){

                    Order::create([
                        'user_id' => $users->id,
                        'product_id' => $id,
                        'total' => $co->total + ($co->qty * 15000),
                        'payment_id' => $request->input('payment'),
                        'status' => 'unpaid',
                    ]);
                }
                else{

                    Order::create([
                        'user_id' => $users->id,
                        'product_id' => $id,
                        'total' => $co->total + 50000,
                        'payment_id' => $request->input('payment'),
                        'status' => 'unpaid',
                    ]);
                }
            }
        }

        $orders = Order::where('user_id', $users->id)->where('status', 'unpaid')->get();
        foreach($orders as $ord){

            $payments = Payment::all()->where('id', $ord->payment_id);
        }

        return view('order', compact('users', 'checkouts', 'payments', 'orders'));
    }
}
