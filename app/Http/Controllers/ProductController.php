<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $cards = Product::all();
        return view('home', compact('cards'));
    }
}
