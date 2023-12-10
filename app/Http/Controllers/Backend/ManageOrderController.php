<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class ManageOrderController extends Controller
{
    public function index(){

        $products = Product::all();
        $orders = Order::all();
        
        return view('admin.order.index', compact('products', 'orders'));
    }
}
