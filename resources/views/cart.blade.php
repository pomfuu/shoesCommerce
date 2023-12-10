@extends('front-end.layout.master')
@section('title', 'Instant Checkout')
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
            
            <div class="row m-0 shadow rounded">
                <div class="col-8 item-list-container p-5">
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
                                        <div class="row m-0">
                                            {{-- <div class="col-1 my-5"></div> --}}
                                            <div class="col my-4 ms-4">
                                                <span class="item-tag fw-light">{{ $product->brand }}</span>
                                                <p class="m-0 fw-semibold fs-5">{{ $product->name }}</p>
                                            </div>
                                            <div class="col-2 my-auto">
                                                <span class="item-tag fw-light">{{ $cat->name }}</span>
                                                <p class="m-0 fw-semibold">Size : {{ $cart->size }}</p>
                                            </div>
                                            <div class="col-2 my-auto pe-0">
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
                                            <div class="col-1 "></div>
                                            <div class="col-2 my-auto">
                                                <div class="mx-auto">
                                                    <p class="item-tag fw-light m-0">Price per items</p>
                                                    <p class="fw-medium m-0">Rp {{ number_format($product->price, 0, '.', '.') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-1 my-auto text-center">
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
                        @forelse($cartItems as $carts)
                        @empty
                            <div class="separator-line mb-3"></div>
                            <div class="alert alert-light text-center" role="alert">
                                No item in cart. Check our product <a href="{{ route('product.brand') }}" class="text-primary fw-medium ">here!</a>
                            </div>
                        @endforelse
                        <div class="separator-line"></div>
                    </div>
                </div>
                <div class="col-4 summary-container p-5">
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
                    <p class="text-secondary text-end">Prices shown include all applicable taxes.</p>
                    <div class="mt-5">
                        @if($totalQty > 0)
                            <button class="checkout-btn bg-dark text-white fw-semibold " onclick="submitForm()">CHECKOUT</button>
                        @else
                            <button class="checkout-btn bg-dark text-light fw-semibold" disabled>CHECKOUT HERE LATER</button>
                        @endif
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