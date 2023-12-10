@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5 mb-5">

        <p class="fs-2 fw-bold text-center mb-4">Order Manager</p>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @elseif (session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @endif

        @foreach ($ordersums as $sum)
            <div class="row m-0 gap-2">
                <div class="col p-2 rounded border border-1 border-dark">
                    <p class="m-0 my-2">Order ID : <span class="fw-semibold ">{{ $sum->id }}</span></p>
                </div>
                <div class="col p-2 rounded border border-1 border-dark">
                    @foreach ($users as $user)
                        
                        @if ($sum->user_id == $user->id)
                            
                            <p class="m-0 my-2">Cust. Name : <span class="fw-semibold">{{ $user->name }}</span></p>
                        @endif
                    @endforeach
                </div>
                <div class="col p-2 rounded border border-1 border-dark">
                    <p class="m-0 my-2">Order Status : <span class="fw-semibold ">{{ ucfirst($sum->status) }}</span></p>
                </div>
                <div class="col p-2 d-flex justify-content-end border border-1 border-dark rounded">
                    <p class="m-0 my-auto me-4 ms-3">Action</p>
                    <form method="post" action="{{ route('admin.packed', ['id' => $sum->id]) }}">
                        @csrf
                        <button type="submit" class="btn btn-primary me-3">Packed</button>
                    </form>
                    <form method="post" action="{{ route('admin.shipped', ['id' => $sum->id]) }}">
                        <button class="btn btn-outline-primary me-3">Shipped</button>
                    </form>
                    <form method="post" action="{{ route('admin.cancelled', ['id' => $sum->id]) }}">
                        <button class="btn btn-danger me-3">Cancel</button>
                    </form>
                </div>
            </div>
            <div class="row m-0 mt-3 gap-2">
                <div class="col">
                    <div class="row py-3 border border-dark border-1 fw-semibold rounded-top">
                        <div class="col">Product Name</div>
                        <div class="col">Size</div>
                        <div class="col">Qty</div>
                        <div class="col">Total</div>
                    </div>
                    @foreach ($orders as $ord)
                        @if ($ord->sum_id == $sum->id)
                            <tbody>
                                <div class="row order-item-table py-2 border border-top-0 border-dark border-1">
                                    @foreach ($products as $prd)
                                        @if ($ord->product_id == $prd->id)
                                            <div class="col">{{ $prd->name }}</div>
                                        @endif
                                    @endforeach
                                    <div class="col">{{ $ord->size }}</div>
                                    <div class="col">{{ $ord->qty }}</div>
                                    <div class="col">Rp {{ number_format($ord->total, 0, '.', '.') }}</div>
                                </div>
                            </tbody>
                        @endif
                    @endforeach
                    </table>
                </div>
                <div class="col-3 p-0">
                    <div class="summary-container">

                        <p class="fw-semibold m-0 py-3 border border-dark border-1 text-center fw-semibold rounded-top">Summary</p>
                        <div class="row m-0 ">
                            <div class="col p-0 bg-success-subtle">
                                <p class="m-0 ps-1 py-1 border border-top-0 border-end-0 border-dark border-1">Payment Method</p>
                                <p class="m-0 ps-1 py-1 border border-top-0 border-end-0 border-dark border-1">Delivery Fee</p>
                                <p class="m-0 ps-1 py-1 border border-top-0 border-end-0 border-dark border-1">Total Price</p>
                            </div>
                            <div class="col p-0 fw-semibold ">
                                @foreach ($payments as $pay)
                                    @if ($sum->payment_id == $pay->id)
                                        <p class="m-0 ps-1 py-1 border border-top-0 border-dark border-1">{{ $pay->name }}</p>
                                    @endif
                                @endforeach
                                <p class="m-0 ps-1 py-1 border border-top-0 border-dark border-1">Rp
                                    {{ number_format($sum->delivery_fee, 0, '.', '.') }}</p>
                                <p class="m-0 ps-1 py-1 border border-top-0 border-dark border-1">Rp
                                    {{ number_format($sum->sum_total, 0, '.', '.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="separator-line my-5"></div>
        @endforeach

    </div>

    <style>
        .separator-line {

            height: 1px;
            width: 100%;
            background-color: #BBBBBB;
        }

        .order-item-table {

            background-color: #eeeeee;
        }
    </style>
@endsection
