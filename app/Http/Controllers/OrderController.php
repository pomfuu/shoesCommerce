<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderSum;
use App\Models\Payment;
use App\Models\Checkout;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function myOrder(){

        // $user = Auth::user();
        // $orders = DB::table('orders')
        // ->join('products', 'orders.id', '=', 'products.id')
        // ->join('product_images', 'products.image_id', '=', 'product_images.id')
        // ->where('orders.user_id', $user->id)
        // ->get();

        $users = Auth::user();
        $products = Product::all();
        $ordersums = $ordersums = OrderSum::where('user_id', $users->id)->orderBy('id', 'desc')->get();
        $orders = Order::all();
        $payments = Payment::all();

        // Return the view with the orders data
        // return view('my-order', ['orders' => $orders]);
        return view('my-order', compact('products', 'ordersums', 'orders', 'payments', 'users'));
    }

    public function completed($id){

        $ordersums = OrderSum::find($id);
        if($ordersums->status == 'completed'){

            return redirect()->route('user.myorder')->with('warning', 'You already finished the order.');
        }
        else{

            $ordersums->update([

                'status' => 'completed',
            ]);
        }
        return redirect()->route('user.myorder')->with('success', 'Thanks for your order. We hope you enjoy it :)');
    }

    public function cancel($id){

        $ordersums = OrderSum::find($id);
        if($ordersums->status == 'cancelled'){

            return redirect()->route('user.myorder')->with('warning', 'You already cancelled this order.');
        }
        else{

            $ordersums->update([

                'status' => 'cancelled',
            ]);
        }
        return redirect()->route('user.myorder')->with('success', 'Successfully cancelled your order.');
    }

    public function checkOrder(){

        $users = Auth::user();
        $checkouts = Checkout::where('user_id', $users->id)->where('status', 'instant')->get();

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

        $ordersums = OrderSum::where('user_id', $users->id)->where('status', 'unpaid')->get();
        foreach($ordersums as $ord){

            $payments = Payment::all()->where('id', $ord->payment_id);  
        }

        return view('order', compact('users', 'checkouts', 'payments', 'ordersums', 'totalPrice', 'totalQty'));
    }
}
