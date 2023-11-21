<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WomenController extends Controller
{
    public function index(){
        $cards = Product::all();
        return view('women', compact('cards'));
    }
}
