<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\Sex;
use App\Models\Size;
use App\Models\Review;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Order;
use App\Models\OrderSum;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        $cards = Product::all();
        $images = Image::all();
        return view('home', compact('cards', 'images'));
    }

    public function productDetails($id){

        $products = Product::find($id);
        $productAll = Product::orderBy('id', 'desc')->where('gender', $products->gender)->whereNotIn('id', [$products->id])->take(4)->get();
        $images = Image::all();
        $genders = Sex::all();
        $sizes = Size::all();
        $reviews = Review::all();

        $ratings = new Collection();
        foreach($reviews as $rev){

            if($products->id == $rev->product_id){

                $ratings->push($rev->star);
            }
        }

        $countRating = $ratings->count();
        $averageRating = $ratings->avg();

        $rateCounter = new Collection();
        for($i = 1 ; $i <= 5 ; $i++){

            $rateTemp = $ratings->filter(function ($value) use ($i) {
                return $value == $i;
            })->count();
            $rateCounter->push($rateTemp);
        }     
        // dump($rateCounter);

        return view('detail', compact('products', 'productAll', 'images', 'genders', 'sizes', 'reviews', 'countRating', 'averageRating', 'rateCounter'));

    }
    public function addToCart(Request $request, $id){

        $product = Product::find($id);
        $users = Auth::user();

        $request->validate([

            'quantity' => 'required|numeric|min:1',
            'size' => 'required|numeric',
        ]);

        $checkCart = Cart::where('user_id', $users->id)->where('product_id', $product->id)->where('size', $request->input('size'))->first();
        if($checkCart){

            $checkCart->update([
                'qty' => $checkCart->qty + $request->input('quantity'),
            ]);
        }else{
            
            Cart::create([

                'user_id' => $users->id,
                'product_id' => $product->id,
                'qty' => $request->input('quantity'),
                'size' => $request->input('size'),
            ]);
        }

        return redirect()->route('product.detail', ['id' => $id])->with('success', 'Product added to cart successfully');
    }

    public function InstantCheckOut(Request $request, $id){

        $product = Product::find($id);
        $category = Category::all()->where('id', $product->category);
        $payment = Payment::all(); 
        $user = Auth::user();

        $request->validate([

            'quantity' => 'required|numeric|min:1',
            'size' => 'required|numeric',
        ]);

        $checkItem = Checkout::where('user_id', $user->id)->where('status', 'instant')->first();
        $checkOrderSum = OrderSum::where('user_id', $user->id)->where('status', 'unpaid')->first();
        if($checkOrderSum){

            return redirect()->route('product.detail', ['id' => $id])->with('error', 'Please finish your current order payment first.');
        }
        else{

            if($checkItem){
    
                $checkItem->update([
                    'product_id' => $product->id,
                    'qty' => $request->input('quantity'),
                    'size' => $request->input('size'),
                    'total' => ($request->input('quantity') * $product->price),
                ]);
            }else{
                
                Checkout::create([
    
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'qty' => $request->input('quantity'),
                    'size' => $request->input('size'),
                    'total' => ($request->input('quantity') * $product->price),
                    'status' => 'instant',
                ]);
            } 
        }

        $checkouts = Checkout::where('status', 'instant')->get();
        // $checkouts = Checkout::all();

        return view('checkout', compact('product', 'category', 'user', 'checkouts', 'payment'));
    }
}
