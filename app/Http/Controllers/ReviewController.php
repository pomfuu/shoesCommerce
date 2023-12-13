<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;
use App\Models\OrderSum;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index($id)
    {

        $users = Auth::user();
        $orders = Order::find($id);
        $ordersums = OrderSum::all()->where('id', $orders->sum_id);
        $products = Product::all()->where('id', $orders->product_id);

        return view('review', compact('orders', 'ordersums', 'products'));
    }

    public function reviewProduct(Request $request, $id)
    {

        $users = Auth::user();
        $orders = Order::find($id);
        $reviews = Review::orderBy('id', 'desc')->limit(1)->value('id');

        if ($orders->rate_status == 'not_yet') {

            Review::create([
                'product_id' => $orders->product_id,
                'user_id' => $orders->user_id,
                'star' => $request->input('star'),
                'comment' => $request->input('review-area'),
            ]);

            $orders->update([

                'rate_status' => 'rated'
            ]);

            if ($request->hasFile('review-img')) {
                // $filename = $reviews + 1 . 'from' . $users->id . '.' . $request->file('review-img')->getClientOriginalExtension();
                $filename = $reviews + 1 . 'from' . $users->id . '.jpg';
                $imagePath = $request->file('review-img')->storeAs('review', $filename, 'public');
            }

        } else {

            return redirect()->route('user.myorder')->with('error', 'You already rate the product from this order.');
        }

        return redirect()->route('user.myorder')->with('success', 'Thank you for your review :)');
    }
}
