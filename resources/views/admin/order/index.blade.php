@extends('admin.layouts.master')

@section('content')

<div class="container mt-5 mb-5">

    <p class="fs-2 fw-bold text-center mb-2">Order Manager</p>

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
                <td>User ID</td>
                <td>Product ID</td>
                <td>Total</td>
                <td>Payment ID</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $ord)
            <tr>   
                <td>{{ $ord->id }}</td>
                <td>{{ $ord->user_id }}</td>
                <td>{{ $ord->product_id }}</td>
                <td>Rp {{ number_format($ord->total, 0, '.', '.') }}</td>
                <td>{{ $ord->payment_id }}</td>
                <td>{{ $ord->status }}</td>
                <td class="d-flex">
                    <form action="">
                        <button class="btn btn-primary me-3" >Packed</button>
                    </form>
                    <form action="">
                        <button class="btn btn-warning me-3" >Shipped</button>
                    </form>
                    <form action="">
                        <button class="btn btn-danger me-3" >Cancel</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection