<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyorderController extends Controller
{
    function index(){
        $user = Auth::user();
        $orders = DB::table('orders')
        ->join('products', 'orders.id', '=', 'products.id')
        ->join('product_images', 'products.image_id', '=', 'product_images.id')
        ->where('orders.user_id', $user->id)
        ->get();

    // Return the view with the orders data
    return view('myorder', ['orders' => $orders]);
    }
}
