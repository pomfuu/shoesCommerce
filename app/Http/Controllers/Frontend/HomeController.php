<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $cards = Product::all();
        $news = Product::orderBy('id', 'desc')->take(4)->get();
        return view('home', compact('cards','news'));
    }
}
