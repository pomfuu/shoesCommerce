@extends('front-end.layout.master')
@section('title','My Orders')
@section('content')
<div class="container">
    <div class="row m-0">
        <div class="item-list-container">
            <div class="row mb-3">
                <div class="col fs-4 fw-semibold my-auto">
                    <p class="container"><br><br>My Orders</p>
                </div>
            </div>
        
            @foreach($orders as $order)
                    <div class="item-container">
                        <div class="separator-line"></div>
                            <div class="row">           
                                <div class="col-1 my-5"></div>
                            <div class="col my-auto">
                                <br>
                                <img src="{{ asset('./storage/product/' .$order->main_image. '.jpg') }}" style="width: 8vw;" class="card-img-top" alt="product image">
                                <br><br>
                            </div>
                            <div class="col-2 my-auto">
                                <span class="item-tag fw-light">Brand</span>
                                <p class="m-0 fw-semibold fs-5">{{ $order->brand }}</p>
                            </div>
                                <div class="col-2 my-auto">
                                <span class="item-tag fw-light">Name</span>
                                <p class="m-0 fw-semibold fs-5">{{ $order->name }}</p>
                            </div>
                            <div class="col-2 my-auto">
                                <span class="item-tag fw-light">Total</span>
                                <p class="m-0 fw-semibold fs-5">Rp {{ number_format($order->total, 0, '.', '.') }}
                            </div>
                            <div class="col-2 my-auto">
                                <div class="mx-auto">
                                    <span class="item-tag fw-light">Status</span>
                                    <p class="m-0 fw-semibold fs-5">{{ $order->status }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
            <div class="separator-line"></div>
        </div>
    </div>
</div>
@endsection
<style>
    
    .separator-line {

    height: 1px;
    width: 100%;
    background-color: #000000;
    }
    .item-list-container{
        background-color: #FFFFFF;
        border-radius: 5px 0px 0px 5px;
    }
    .item-tag{

        font-size: 12px;
    }

</style>