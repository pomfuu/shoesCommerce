<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderSum;
use App\Models\Payment;
use App\Models\User;
use Auth;

class ManageOrderController extends Controller
{
    public function index(){

        $products = Product::all();
        $ordersums = OrderSum::orderBy('id', 'desc')->get();
        $orders = Order::all();
        $payments = Payment::all();
        $users = User::all();

        return view('admin.order.index', compact('products', 'orders', 'ordersums', 'payments', 'users'));
    }

    public function packed($id){

        $ordersums = OrderSum::find($id);

        if($ordersums->status == 'packed'){

            return redirect()->route('admin.index')->with('warning', 'Order status already set to "Packed".');
        }
        elseif($ordersums->status == 'shipped'){

            return redirect()->route('admin.index')->with('error', 'Canot go back to "Packed" status.');
        }
        elseif($ordersums->status == 'cancelled'){

            return redirect()->route('admin.index')->with('error', 'Order already cancelled, cannot go back to "Packed" status.');
        }
        else{

            $ordersums->update([

                'status' => 'packed',
            ]);
        }

        return redirect()->route('admin.index')->with('success', 'Order status successfully updated to "Packed".');
    }

    public function shipped($id){

        $ordersums = OrderSum::find($id);

        if($ordersums->status == 'shipped'){

            return redirect()->route('admin.index')->with('warning', 'Order status already set to "Shipped".');
        }
        elseif($ordersums->status == 'cancelled'){

            return redirect()->route('admin.index')->with('error', 'Order already cancelled, cannot go back to "Shipped" status.');
        }
        else{

            $ordersums->update([

                'status' => 'shipped',
            ]);
        }

        return redirect()->route('admin.index')->with('success', 'Order status successfully updated to "Shipped".');
    }

    public function cancel($id){

        $ordersums = OrderSum::find($id);

        if($ordersums->status == 'cancelled'){

            return redirect()->route('admin.index')->with('warning', 'Order status already set to "Cancelled".');
        }
        else{

            $ordersums->update([

                'status' => 'cancelled',
            ]);
        }

        return redirect()->route('admin.index')->with('success', 'Order status successfully updated to "Cancelled".');
    }
}
