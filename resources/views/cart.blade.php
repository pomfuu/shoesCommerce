@extends('front-end.layout.master')
@section('title', 'Cart')
@section('content')

    @foreach ($category as $cat)
    @endforeach

    @php
        $total = 0;
        $totalPrice = 0;
        $totalQty = 0;
        $deliveryFee = 0;
    @endphp

    @foreach ($product as $prd)
        @foreach ($cartItems as $cart)
            @if ($cart->product_id == $prd->id)
                @php
                    $total = $prd->price * $cart->qty;
                    $totalPrice = $totalPrice + $total;
                    $totalQty = $totalQty + $cart->qty;
                @endphp
            @endif
        @endforeach
    @endforeach

    <div class="container mt-5">
        {{-- <form action=""> --}}
            
            <div class="row m-0">
                <div class="col-8 item-list-container p-4">
                    <div class="">
                        <div class="row mb-3">
                            <div class="col fs-4 fw-semibold my-auto">
                                <p class="m-0">Shopping Cart</p>
                            </div>
                            <div class="col text-end my-auto">Items</div>
                        </div>
                        @foreach ($product as $product)
                            @foreach ($cartItems as $cart)
                            
                                @if ($cart->product_id == $product->id)
                                    
                                    <div class="item-container">
                                        <div class="separator-line"></div>
                                        <div class="row">
                                            <div class="col-1 my-5"></div>
                                            <div class="col my-auto">
                                                <span class="item-tag fw-light">{{ $product->brand }}</span>
                                                <p class="m-0 fw-semibold fs-5">{{ $product->name }}</p>
                                            </div>
                                            <div class="col-2 my-auto">
                                                <span class="item-tag fw-light">{{ $cat->name }}</span>
                                                <p class="m-0 fw-semibold">Size : {{ $cart->size }}</p>
                                            </div>
                                            <div class="col-2 my-auto">
                                            <form method="post" action="{{ route('user.cart.checkout', ['id' => $cart->id]) }}" id="checkoutForm">
                                                <div class="input-group">
                                                    <button
                                                        class="min-plus-btn btn btn-outline-secondary border-black border-1 fs-5 fw-semibold text-dark"
                                                        type="button" id="minus-btn">-</button>
                                                    <input type="text"
                                                        class="form-control text-center border-black border-1 py-2 fw-semibold "
                                                        name="quantity" placeholder="1" aria-label="Example text with two button addons"
                                                        min="1" value="{{ $cart->qty }}" id="quantity">
                                                    <button
                                                        class="min-plus-btn btn btn-outline-secondary border-black border-1 fs-5 fw-semibold text-dark"
                                                        type="button" id="plus-btn">+</button>
                                                </div>
                                            </form>
                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col my-auto">
                                                <div class="mx-auto">
                                                    <span class="item-tag fw-light">Price per items</span>
                                                    <p class="fw-medium m-0">Rp {{ number_format($product->price, 0, '.', '.') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-2 my-auto text-center">
                                                <form id="delete-form" action="{{ route('user.destroy', ['cart' => $cart->id]) }}" method="post" class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                            <button class="btn" id="delete-btn" ><i class="bi bi-x-lg"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                        <div class="separator-line"></div>
                    </div>
                </div>
                <div class="col-4 summary-container py-4 px-5">
                    <div class="col my-auto">
                        <p class="fs-5 fw-semibold">Summary</p>
                    </div>
                    <div class="separator-line"></div>
                    <div class="row mt-3">
                        <div class="col">
                            <p class="">Total Quantity</p>
                        </div>
                        <div class="col text-end">   
                        
                            <p class="fw-semibold">{{$totalQty}} Items</p>
                        </div>
                    </div>
                    <div class="separator-line"></div>
                    <div class="row mt-3">
                        <div class="col">
                            <p class="fs-5">TOTAL PRICE</p>
                        </div>
                        <div class="col text-end">
                            <p class="fs-5 fw-semibold">Rp {{ number_format($totalPrice, 0, '.', '.') }}</p>
                        </div>
                    </div>
                    <p class="text-secondary">Prices shown include all applicable taxes.</p>
                    <div class="mt-4">
                        <button class="checkout-btn bg-dark text-white fw-semibold " onclick="submitForm()">CHECKOUT</button>
                    </div>
                </div>
            </div>
        {{-- </form> --}}
    </div>

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
        .summary-container{
    
            background-color: #DDDDDD;
            border-radius: 0px 5px 5px 0px;
        }
    
        .checkout-btn{
    
            width: 100%;
            height: 48px;
            border: none;
        }
        .custom-rounded {

            border-radius: 5px;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('#quantity').prop('disabled', false);
            $('#plus-btn').click(function() {
                $('#quantity').val(parseInt($('#quantity').val()) + 1);
            });
            $('#minus-btn').click(function() {
                $('#quantity').val(parseInt($('#quantity').val()) - 1);
                if ($('#quantity').val() == 0) {
                    $('#quantity').val(1);
                }

            });
        });
    </script>

    <script>
        function submitForm(){

            var execute = document.getElementById('checkoutForm');
            execute.submit();
        }
    </script>
@endsection