@extends('admin.layouts.master')

@section('content')

<div class="container mt-5">

    <p class="fs-4 fw-semibold text-center">Edit ({{ $product->name }})</p>

    <form method="POST" action="{{ route('admin.product.update', $product->id) }}" class="w-50 mx-auto">
        
        @csrf
        @method('PUT')
        <div class="form-group mb-2">
            <label for="name" class="">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $product->name) }}" required>
        </div>
        
        <div class="form-group mb-2">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" rows="4" required>{{ old('description', $product->description) }}</textarea>
        </div>
        
        <div class="form-group mb-2">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" required>
        </div>
        
        <div class="form-group mb-2">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" id="price" value="{{ old('price', $product->price) }}" required>
        </div>
        
        <div class="form-group mb-2">
            <label for="image_id">Image ID</label>
            <input type="number" class="form-control" name="image_id" id="image_id" value="{{ old('image_id', $product->image_id) }}" required>
        </div>
        
        <div class="form-group mb-2">
            <label for="category">Category</label>
            <select class="form-select" name="category" id="category">
                @foreach ($categories as $cat)
                    <option @if($product->category == $cat->id) selected @endif value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="brand">Brand</label>
            <select class="form-select" name="brand" id="brand" required>
                @foreach($brands as $brn)
                    <option @if($product->brand == $brn->brandname) selected @endif value="{{ $brn->brandname }}">{{ $brn->brandname }}</option>
                @endforeach
            </select>
            
        </div>
        <div class="form-group mb-2">
            <label for="gender">Gender</label>
            <select class="form-select" name="gender" id="gender" required>
                @foreach($genders as $gender)
                    <option @if($product->gender == $gender->id) selected @endif value="{{ $gender->id }}">{{ $gender->gender }}</option>
                @endforeach
            </select>
        </div>

        <div class="submit-btn text-center">
            <button type="submit" class="btn btn-primary m-5 w-50">Update</button>
        </div>
    </form>
</div>

@endsection