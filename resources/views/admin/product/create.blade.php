@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">

        <p class="fs-4 fw-semibold text-center">Add New Product</p>

        <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data" class="w-50 mx-auto">

            <div class="form-group mb-2">
                <label for="name" class="">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" rows="4" required>{{ old('description') }}</textarea>
            </div>

            <div class="form-group mb-2">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" name="stock" id="stock" value="{{ old('stock') }}"
                    required>
            </div>

            <div class="form-group mb-2">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" id="price" value="{{ old('price') }}"
                    required>
            </div>

            <div class="form-group mb-2">
                <label for="category">Category</label>
                <select class="form-select" name="category" id="category">
                    <option value="" selected disabled>Choose a category</option>
                    @foreach ($categories as $cat)
                        <option @if (old('category') != null && old('category') == $cat->id) selected @endif value="{{ $cat->id }}">
                            {{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="brand">Brand</label>
                <select class="form-select" name="brand" id="brand" required>
                    <option value="" selected disabled>Choose a brand</option>
                    @foreach ($brands as $brn)
                        <option @if (old('brand') != null && old('brand') == $brn->brandname) selected @endif value="{{ $brn->brandname }}">
                            {{ $brn->brandname }}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group mb-2">
                <label for="gender">Gender</label>
                <select class="form-select" name="gender" id="gender" required>
                    <option value="" selected disabled>Suitable for? (Gender)</option>
                    @foreach ($genders as $gender)
                        <option @if (old('gender') != null && old('gender') == $gender->id) selected @endif value="{{ $gender->id }}">
                            {{ $gender->gender }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-image mb-2">
                <p class="m-0 mb-1 ">Main Image</p>
                <div class="input-group mb-1">
                    <input type="file" class="form-control" id="main-img" name="main-img">
                </div>
            </div>
            <div class="input-image mb-2">
                <p class="m-0 mb-1 ">2nd Image</p>
                <div class="input-group mb-1">
                    <input type="file" class="form-control" id="sec-img" name="sec-img">
                </div>
            </div>
            <div class="input-image mb-2">
                <p class="m-0 mb-1 ">3rd Image</p>
                <div class="input-group mb-1">
                    <input type="file" class="form-control" id="third-img" name="third-img">
                </div>
            </div>
            <div class="input-image mb-2">
                <p class="m-0 mb-1 ">4th Image</p>
                <div class="input-group mb-1">
                    <input type="file" class="form-control" id="fourth-img" name="fourth-img">
                </div>

            </div>
            <div class="input-image mb-2">
                <p class="m-0 mb-1 ">5th Image</p>
                <div class="input-group mb-1">
                    <input type="file" class="form-control" id="fifth-img" name="fifth-img">
                </div>
            </div>

            <div class="submit-btn text-center">
                <button type="submit" class="btn btn-primary m-5 w-50">Add</button>
            </div>
        </form>
    </div>
@endsection
