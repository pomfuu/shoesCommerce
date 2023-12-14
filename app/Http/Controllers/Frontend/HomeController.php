<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Image;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $cards = Product::all();
        $images = Image::all();
        $news = Product::orderBy('id', 'desc')->take(4)->get();
        return view('home', compact('cards','news', 'images'));
    }
}
