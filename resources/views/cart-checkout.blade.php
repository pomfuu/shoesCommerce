@extends('front-end.layout.master')
@section('title', 'Instant Checkout')
@section('content')

    @foreach ($category as $cat)
    @endforeach

    <div class="container mt-5">
        <div class="">
            <div class="row m-0 gap-3">
                <div class="col-3 custom-rounded mb-3 py-3 px-4 bg-white shadow-sm">
                    <span class="deliver-to m-0 my-auto fw-medium ">Receiver : </span>
                    <span class="fw-semibold">{{ $users->name }}</span>
                </div>
                <div class="col custom-rounded mb-3 py-3 px-4 bg-white shadow-sm">
                    <span class="deliver-to m-0 my-auto fw-medium ">Deliver to : </span>
                    <span class="fw-semibold">{{ $users->address }}</span>
                    <a href="{{ route('user.profile') }}" class="d-inline-block text-end ms-4">Edit Address</a>
                </div>
            </div>
        </div>
        <form method="post" action="{{ route('user.cart.order') }}">
            <div class="row m-0 shadow rounded">
                <div class="col-8 item-list-container p-5">
                        <div class="row mb-3">
                            <div class="col fs-4 fw-semibold my-auto">
                                <p class="m-0">Cart Checkout</p>
                            </div>
                            <div class="col text-end my-auto">Items</div>
                        </div>
                        @foreach ($product as $product)
                            @foreach ($carts as $cart)
                            
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
                        @forelse($carts as $carts)
                        @empty
                            <div class="separator-line mb-3"></div>
                            <div class="alert alert-light text-center" role="alert">
                                No item in cart. Check our product <a href="{{ route('product.brand') }}" class="text-primary fw-medium ">here!</a>
                            </div>
                        @endforelse
                        <div class="separator-line"></div>
                    </div>
                    <div class="col-4 summary-container py-5 px-5 rounded-end">
                        <div class="col my-auto"><p class="fs-5 fw-semibold">Summary</p></div>
                        <div class="separator-line"></div>
                        <div class="row mt-3">
                            <div class="col">
                                <p class="">Item Total</p>
                                <p class="">Delivery Fee</p>
                            </div>
                            <div class="col text-end">
                                <p class="fw-semibold">Rp {{ number_format($totalPrice, 0, '.', '.') }}</p>
                                @if ($totalQty <= 3)
                                    
                                <p class="fw-semibold">Rp {{ number_format($totalQty * 15000, 0, '.', '.') }}</p>
                                @else
                                    <p class="fw-semibold">Rp {{ number_format(50000, 0, '.', '.') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="separator-line"></div>
                        <div class="row mt-3">
                            <div class="col">
                                <p class="fs-5">TOTAL PRICE</p>
                            </div>
                            <div class="col text-end">
                                @if ($totalQty <= 3)
                                    
                                    <p class="fs-5 fw-semibold">Rp {{ number_format($totalPrice + ($totalQty * 15000), 0, '.', '.') }}</p>
                                @else
                                    <p class="fs-5 fw-semibold">Rp {{ number_format($totalPrice + 50000, 0, '.', '.') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="separator-line"></div>
                        <label for="" class="d-block text-end mt-4">Payment Methods</label>
                        <select class="form-select rounded-0 mb-4 mt-2" name="payment" id="payment" aria-label="Payment methods">
                            <option class="select-pay" selected disabled>Select payment methods</option>
                            @foreach ($payment as $pay)
                                
                                <option class="select-pay" value="{{ $pay->id }}">{{ $pay->name }}</option>
                            @endforeach
                        </select>
                        <div class="separator-line"></div>
                        <p class="text-secondary text-end mt-2">Prices shown include all applicable taxes.</p>
                        <div class="mt-4">
                            <button type="submit" class="checkout-btn bg-dark text-white fw-semibold ">PROCEED TO PAYMENT</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <style>
    
        .separator-line {
    
        height: 1px;
        width: 100%;
        background-color: #000000;
        }
        .item-list-container{
    
            background-color: #FFFFFF;
            /* border-radius: 5px 0px 0px 5px; */
        }
        .item-tag{

            font-size: 12px;
        }
        .summary-container{
    
            background-color: #DDDDDD;
            /* border-radius: 0px 5px 5px 0px; */
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
@endsection
