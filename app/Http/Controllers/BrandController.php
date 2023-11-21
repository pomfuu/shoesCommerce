<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        $cards = Product::all();
        return view('brand', compact('cards'));
    }
}
