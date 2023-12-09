@extends('admin.layouts.master')

@section('content')

<div class="container mt-5 mb-5">

    <p class="fs-2 fw-bold text-center mb-2">Product Manager</p>
    <div class="text-end mb-4">
        <a href="{{ route('admin.product.create') }}" class="py-2 px-3 bg-primary rounded text-white fw-medium text-decoration-none fs-5">Add New Product</a>
    </div>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @elseif (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <table class="table table-striped border border-1">
        <thead>
            <tr class="fw-semibold">
                <td>ID</td>
                <td>Name</td>
                <td>Brand</td>
                <td>Category</td>
                <td>Gender</td>
                <td>Stock</td>
                <td>Price</td>
                <td>Description</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $prd)
            <tr>   
                <td>{{ $prd->id }}</td>
                <td>{{ $prd->name }}</td>
                <td>{{ $prd->brand }}</td>
                <td>
                    @foreach ($categories as $cat)
                        @if ($cat->id == $prd->category)
                            {{ $cat->name }}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($genders as $gender)
                        @if ($gender->id == $prd->gender)
                            {{ $gender->gender }}
                        @endif
                    @endforeach
                </td>
                <td>{{ $prd->stock }}</td>
                <td>Rp {{ number_format($prd->price, 0, '.', '.') }}</td>
                <td class="prd-desc">{{ $prd->description }}</td>
                <td>
                    <a href="{{ route('admin.product.edit', $prd->id) }}" class="btn btn-warning p-2 rounded"><i class="bi bi-pencil-fill text-white"></i></a>
                    {{-- <a href="" class="bg-danger p-2 rounded"><i class="bi bi-trash3 text-white"></i></a> --}}
                    <form id="delete-form" action="{{ route('admin.product.destroy', $prd) }}" method="post" enctype="multipart/form-data" class="d-inline">
                        @method('DELETE')
                                <button id="delete-btn" class="btn btn-danger p-2 rounded"><i class="bi bi-trash3 text-white"></i></button>
                        @csrf
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

<style>

    .prd-desc{

    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
    width: 200px;
    }
</style>

@endsection