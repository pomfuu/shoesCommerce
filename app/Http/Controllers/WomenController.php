<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WomenController extends Controller
{
    public function index(Request $request){
        $productbyGender = Product::whereIn('gender', ['women', 'unisex']);

        $sorting = $request->input('sort');
        $selected = $request->input('sort');
        switch ($sorting) {
            case 'Price_Lowest_to_Highest':
                $productbyGender->orderBy('price', 'asc');
                break;
            case 'Price_Highest_to_Lowest':
                $productbyGender->orderBy('price', 'desc');
                break;
            case 'Newest_Arrival':
                $productbyGender->latest();
                break;
            case 'Highest_Rating':
                $productbyGender->orderBy('averageStar', 'desc');
                break;
            default:
        }

        $cards = $productbyGender->get();

        return view('women', compact('cards','selected'));
    }
}
