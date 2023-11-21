<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MenController extends Controller
{
    public function index(){
        $cards = Product::all();
        return view('men', compact('cards'));
    }
}
