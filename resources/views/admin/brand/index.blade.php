@extends('admin.layouts.master')

@section('content')
<div class="container mt-4 mb-5 w-50">
    
        <p class="fs-2 fw-bold text-center mb-3">Brand Manager</p>
        
        @if (session('success'))
        <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="row gap-5">
            <div class="col">
                <p class="fw-semibold mb-2 text-center">Add new brand</p>
                <form action="{{ route('admin.brand.store') }}" method="post">
                    @csrf
                    <div class="input-group input-group mb-3">
                        <span class="input-group-text">Brand Name</span>
                        <input type="text" class="form-control" name="brandname" value="{{ old('brandname') }}">
                    </div>

                    <div class="text-end">

                        <button type="submit" class="btn btn-primary w-50">Add</button>
                    </div>
                </form>
            </div>
            <div class="col-5">
                <table class="table table-striped border border-1">
                    <thead>
                        <tr class="fw-semibold">
                            <td>ID</td>
                            <td>Brand</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $brand->id }}</td>
                                <td>{{ $brand->brandname }}</td>
                                <td>
                                    <a href="{{ route('admin.brand.edit', $brand->id) }}"
                                        class="btn btn-warning p-2 rounded"><i class="bi bi-pencil-fill text-white"></i></a>
                                    <form id="delete-form" action="{{ route('admin.brand.destroy', $brand) }}"
                                        method="post" enctype="multipart/form-data" class="d-inline">
                                        @method('DELETE')
                                        <button id="delete-btn" class="btn btn-danger p-2 rounded"><i class="bi bi-trash3 text-white"></i></button>
                                        @csrf
                                    </form>
                                </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script>
        $(".action-alert").delay(10000).fadeOut(500)
    </script>
@endsection
