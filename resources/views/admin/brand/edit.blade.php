@extends('admin.layouts.master')

@section('content')
    <div class="container mt-4 mb-5 w-50">
        <p class="fs-2 fw-bold text-center mb-3">Edit Brand</p>

        <form action="{{ route('admin.brand.update', $brands->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="input-group input-group mb-3">
                <span class="input-group-text">Brand Name</span>
                <input type="text" class="form-control" name="brandname" value="{{ old('brandname', $brands->brandname) }}">
            </div>

            <div class="text-end">

                <button type="submit" class="btn btn-primary w-50">Add</button>
            </div>
        </form>

        <div class="text-center mt-5">
            <a href="{{ route('admin.brand.index') }}" class="text-dark">Back to Brand Manager</a>
        </div>
    </div>
@endsection