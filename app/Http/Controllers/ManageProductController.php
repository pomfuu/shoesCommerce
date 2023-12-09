<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\Sex;
use App\Models\Category;
use App\Models\Brand;

class ManageProductController extends Controller
{
    public function index(){

        $products = Product::all();
        $images = Image::all();
        $genders = Sex::all();
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.index', compact('products', 'images', 'genders', 'categories', 'brands'));
    }

    public function create(){

        $genders = Sex::all();
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.product.create', compact('genders', 'categories', 'brands'));
    }

    public function store(Request $request){

        $validate = $request->validate([

            'name' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'image_id' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'gender' => 'required',
        ]);

        Product::Create($validate);

        return redirect()->route('admin.product.index')->with("Success");
    }

    public function show(Product $products){

        return view('admin.product.show', compact('products'));
    }

    public function edit($id){

        $product = Product::find($id);
        $genders = Sex::all();
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.product.edit', compact('product', 'genders', 'categories', 'brands'));
    }

    public function update(Request $request, $id){

        $validate = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'image_id' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'gender' => 'required',
        ]);
    
        $product = Product::find($id);
    
        if (!$product) {
            // Handle the case where the product is not found
            return redirect()->route('admin.product.index')->with("error", "Product not found");
        }
    
        $product->update($validate);
    
        return redirect()->route('admin.product.index')->with("success", "Product updated successfully");
    }

    public function destroy(Product $product){

        $product->delete();
        return redirect()->route('admin.product.index')->with("Product deleted successfully");
    }
}
