<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class ManageBrandController extends Controller
{
    public function index(){

        $brands = Brand::all();

        return view('admin.brand.index', compact('brands'));
    }

    public function store(Request $request){

        $brands = Brand::all();

        $validate = $request->validate([
            'brandname' => 'required|unique:brands',
        ]);
    
        if ($brands->contains('brandname', $validate['brandname'])) {
            
            return redirect()->route('admin.brand.index')->with('error', 'That brand already exists in the database');
        }
    
        $newBrand = Brand::create([
            'brandname' => $validate['brandname'],
        ]);
    
        return redirect()->route('admin.brand.index')->with('success', 'Brand added successfully');
    }

    public function edit(Request $request, $id){

        $brands = Brand::find($id);

        return view('admin.brand.edit', compact('brands'));
    }

    public function update(Request $request, $id){

        $validate = $request->validate([
            'brandname' => 'required',
        ]);
    
        $brands = Brand::find($id);
    
        if (!$brands) {

            return redirect()->route('admin.brand.index')->with("error", "Brand not found");
        }
    
        $brands->update($validate);

        return redirect()->route('admin.brand.index')->with('success', 'Brand updated successfully');
    }

    public function destroy(Brand $brand){

        $brand->delete();
        return redirect()->route('admin.brand.index')->with('success', "Brand deleted successfully");
    }
}

