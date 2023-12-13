<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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

    // public function store(Request $request){

    //     $validate = $request->validate([

    //         'name' => 'required',
    //         'description' => 'required',
    //         'stock' => 'required',
    //         'price' => 'required',
    //         'image_id' => 'required',
    //         'category' => 'required',
    //         'brand' => 'required',
    //         'gender' => 'required',
    //     ]);

    //     Product::Create($validate);

    //     return redirect()->route('admin.product.index')->with("Success");
    // }

    public function store(Request $request){

        $validate = $request->validate([

            'name' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'gender' => 'required',
        ]);

        $product = Product::create([

            'name' => $validate['name'],
            'description' => $validate['description'],
            'stock' => $validate['stock'],
            'price' => $validate['price'],
            'category' => $validate['category'],
            'brand' => $validate['brand'],
            'gender' => $validate['gender'],
        ]);

        $product->update(['image_id' => $product->id]);

        $filename1 = $product->id . 's1' . '.jpg';
        $imagePath1 = $request->file('main-img')->storeAs('product', $filename1, 'public');

        $filename2 = $product->id . 's2' . '.jpg';
        $imagePath2 = $request->file('sec-img')->storeAs('product', $filename2, 'public');

        $filename3 = $product->id . 's3' . '.jpg';
        $imagePath3 = $request->file('third-img')->storeAs('product', $filename3, 'public');

        $filename4 = $product->id . 's4' . '.jpg';
        $imagePath4 = $request->file('fourth-img')->storeAs('product', $filename4, 'public');

        $filename5 = $product->id . 's5' . '.jpg';
        $imagePath5 = $request->file('fifth-img')->storeAs('product', $filename5, 'public');

        Image::create([

            'image_id' => $product->id,
            'main_image' => $filename1,
            'sec_image' => $filename2,
            'third_image' => $filename3,
            'fourth_image' => $filename4,
            'fifth_image' => $filename5,
        ]);

        return redirect()->route('admin.product.index')->with("Success");
    }

    private function storeImage($file, $product, $suffix)
    {
        if ($file !== null) {
            $filename = $product->id . $suffix . '.jpg';
            $file->storeAs('product', $filename, 'public');
            $product->images()->create(['path' => $filename]);
        }
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
