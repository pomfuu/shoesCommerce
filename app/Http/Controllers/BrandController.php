<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Image;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(Request $request){
        $images = Image::all();
        $cards = Product::query();

        $sorting = $request->input('sort');
        $selected = $request->input('sort');
        switch ($sorting) {
            case 'Price_Lowest_to_Highest':
                $cards->orderBy('price', 'asc');
                break;
            case 'Price_Highest_to_Lowest':
                $cards->orderBy('price', 'desc');
                break;
            case 'Newest_Arrival':
                $cards->latest();
                break;
            case 'Highest_Rating':
                $cards->orderBy('averageStar', 'desc');
                break;
            default:
        }

        $cards = $cards->get();
        $cards = $cards->groupBy('brand');

        return view('brand', compact('images','cards','selected'));
    }
}
