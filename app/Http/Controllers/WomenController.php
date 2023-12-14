<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Image;
use App\Models\Sex;
use App\Models\Category;
use Illuminate\Http\Request;

class WomenController extends Controller
{
    public function index(Request $request){
        $images = Image::all();
        $genders = Sex::all();
        $categories = Category::all();
        $productbyGender = Product::whereIn('gender', ['2', '3']);

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

        return view('women', compact('images','cards','selected', 'genders', 'categories'));
    }
}
