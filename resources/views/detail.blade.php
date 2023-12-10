@extends('front-end.layout.master')
@section('title', 'Details')
@section('content')

    <div class="container mt-5">

        @if(session('success'))
            <div class="action-alert alert alert-success text-center">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="action-alert alert alert-danger text-center">
                {{ session('error') }}
            </div>           
        @endif

        <div class="row gap-5">
            <div class="col">
                @foreach ($images as $img)
                    @if($products->id == $img->id)
                        <div class="bg-dark item-main-img">
                            <img src="{{ asset('./storage/product/' .$img->main_image. '.jpg') }}" alt="" class="item-main-img">
                        </div>
                        <div class="row m-0 gap-2 g-2">
                            {{-- Second Image --}}
                            <div class="col p-0">
                                <div class="item-img bg-dark">
                                    <img src="{{ asset('./storage/product/' .$img->sec_image. '.jpg') }}" alt="" class="item-img">
                                </div>
                            </div>
                            {{-- Third Image --}}
                            <div class="col p-0">
                                <div class="item-img bg-dark">
                                    <img src="{{ asset('./storage/product/' .$img->third_image. '.jpg') }}" alt="" class="item-img">
                                </div>
                            </div>
                            {{-- Fourth Image --}}
                            <div class="col p-0">
                                <div class="item-img bg-dark">
                                    <img src="{{ asset('./storage/product/' .$img->fourth_image. '.jpg') }}" alt="" class="item-img">
                                </div>
                            </div>
                            {{-- Fifth Image --}}
                            <div class="col p-0">
                                <div class="item-img bg-dark">
                                    <img src="{{ asset('./storage/product/' .$img->fifth_image. '.jpg') }}" alt="" class="item-img">
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="col">
                <p class="fs-3 fw-semibold m-0 mb-1">{{ $products->name }}</p>

                <div class="avg-rating-small d-inline-flex py-2 px-3 fw-bold rounded">
                    <i class="bi bi-star-fill text-warning "></i> &nbsp {{ number_format($averageRating, 1, '.', '') }}
                </div>
                <p class="d-inline-flex fw-semibold ms-3">Sold : </p>

                {{-- Placeholder for Price --}}
                <p class="fs-2 fw-bold">Rp{{ number_format($products->price, 0, '.', '.') }}</p>

                {{-- Placeholder for description --}}
                <p class="desc-placeholder mt-2 mb-5">{{ $products->description }}</p>

                {{-- Container for size-selection & process button --}}
                <form method="post" id="productForm">
                    <div class="size-container">
                        <p class="m-0 mb-1 fs-5 fw-semibold">Choose your Size</p>
                        <div class="row m-0 boxed gap-2">
                            @foreach($sizes as $size)
                                <input type="radio" id="{{ $size->size }}" name="size" value="{{ $size->size }}">
                                <label for="{{ $size->size }}">{{ $size->size }}</label>
                            @endforeach
                            <div class="col fs-5 info-btn my-auto text-center"><i class="bi bi-info-circle my-auto"></i></div>
                        </div>
                        <div class="separator-line mt-3 mb-4"></div>
                        <div class="row m-0">
                            <div class="col-4 p-0">
                                <div class="input-group mb-4">
                                    <button
                                        class="min-plus-btn btn btn-outline-secondary border-black border-1 fs-5 fw-semibold text-dark"
                                        type="button" id="minus-btn">-</button>
                                    <input type="text"
                                        class="form-control text-center border-black border-1 py-2 fw-semibold " name="quantity"
                                        placeholder="1" aria-label="Example text with two button addons" min="1" value="1" id="quantity">
                                    <button
                                        class="min-plus-btn btn btn-outline-secondary border-black border-1 fs-5 fw-semibold text-dark"
                                        type="button" id="plus-btn">+</button>
                                </div>
                            </div>
                            <div class="col my-auto">
                                <p class="fw-semibold">Stok : {{ $products->stock }}</p>
                            </div>
                        </div>
                        <div class="row m-0 gap-3">
                            <div class="col p-0">
                                <button type="submit" class="process-btn d-block border-0 text-decoration-none py-2 px-4 text-center fw-semibold w-100 " name="process" value="cart">ADD TO CART</button>
                            </div>
                            <div class="col p-0">
                                <button type="submit" class="process-btn d-block border-0 text-decoration-none py-2 px-4 text-center fw-semibold w-100 " name="process" value="buy">BUY NOW</button>
                            </div>
                            <div class="col-1 p-0"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="separator-line my-5"></div>
        <div class="row m-0 gap-4">
            {{-- Rating summary content --}}
            <div class="col-3">
                <div class="rating-summary-content px-5 py-4 custom-rounded">
                    <p class="text-center fs-1 fw-bold m-0">{{ number_format($averageRating, 1, '.', '') }}/5.0</p>
                    <p class="text-center fw-medium">{{ $countRating }} ratings & reviews</p>
                    @php
                        $rating = [5, 4, 3, 2, 1];
                    @endphp
                    <div class="row">
                        @foreach($rating as $rat)
                        <div class="col">
                            <div class="d-block">
                                @for ($i = 0; $i < $rat; $i++)
                                    <i class="bi bi-star-fill me-1 fs-5 text-warning "></i>
                                    @endfor
                            </div>
                        </div>
                        <div class="col-2 ">
                            <p class="m-0 mt-1 fw-medium text-end">{{ $rateCounter[$rat-1] }}</p>
                        </div>
                        <div class="separator-line mt-1 mb-2"></div>
                        @endforeach
                    </div>

                        
                </div>
                {{-- Brand Information --}}
                <div class="brand-information-content px-5 py-5 mt-3 custom-rounded">
                    <div class="brand-img rounded-circle mx-auto"></div>
                    <p class="fs-5 fw-semibold text-center mt-3 mb-4">{{ $products->brand }}</p>
                    <a href="{{ route('product.brand') }}"
                        class="d-block bg-light text-decoration-none py-2 mx-2 text-dark text-center custom-rounded">Visit Brand Page</a>
                </div>
            </div>
            {{-- Review & Rating --}}
            <div class="col p-0">
                @foreach ($reviews as $rev)     
                    @if ($products->id == $rev->product_id)
                        <div class="review-container bg-light custom-rounded shadow  p-4 mb-2">
                            <div class="row m-0">
                                <div class="col">
                                    <span class="me-2 fw-semibold">Reviewer Name</span>
                                    @for ($i = 0 ; $i < $rev->star ; $i++)
                                        
                                    <i class="bi bi-star-fill me-1 fs-6 text-warning "></i>
                                    @endfor
                                </div>
                                <div class="col">
                                    <p class="m-0 text-end text-body-tertiary ">12/10/2019</p>
                                </div>
                            </div>
                            <div class="row m-0 mt-3 gap-3">
                                <div class="col-1">
                                    <div class="review-img"></div>
                                </div>
                                <div class="col">
                                    <p class="review-comment-placeholder m-0">{{$rev->comment}}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="container">
        <div class="separator-line line-custom-margin"></div>
        <p class="fs-3 fw-semibold text-center mb-5">Similar Products</p>
        <div class="row m-0 gap-1">
            @foreach($productAll as $prdAll)
                @if(($prdAll->gender == $products->gender || $prdAll->gender == 'unisex'))
                    <div class="col p-0">
                        <a href="#" class="text-decoration-none text-black">
                            <div class="#" style="width:99%">
                                <div style="height: 27vw; object-fit: cover; background-color: #000000" class="card-img-top"alt="product image">
                                
                                    @foreach ($images as $img)
                                        @if ($prdAll->id == $img->id)
                                            
                                            <img src="{{ asset('./storage/product/' .$img->main_image. '.jpg') }}" style="height: 27vw; object-fit: cover" class="card-img-top" alt="product image">
                                        @endif
                                    @endforeach
                                </div>
                                <div class="card-body my-2">
                                    <p class="card-title fs-5">{{ $prdAll->name }}</p>
                                    <p style="color: #707070">Rp{{ number_format($prdAll->price, 0, '.', '.') }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <style>
        .item-main-img {

            height: 450px;
            width: 100%;
            object-fit: cover;
        }

        .item-img {

            height: 150px;
            width: 100%;
            object-fit: cover;
        }

        .avg-rating-small {

            background-color: #dddddd;
        }

        .desc-placeholder {

            text-align: justify;
        }

        .separator-line {

            height: 1px;
            width: 100%;
            background-color: #000000;
        }
        .boxed label {
            display: inline-block;
            text-align: center;
            width: 65px;
            padding: 10px;
            background-color: #DDDDDD; 
            border-radius: 5px;
        }

        .boxed label:hover{

            background-color: #cccccc;
        }

            .boxed input[type="radio"] {
            display: none;
        }

            .boxed input[type="radio"]:checked + label {
            border: solid 2px green;
        }
        .info-btn{

            max-width: 65px;
        }

        .min-plus-btn {

            background-color: #DDDDDD;
        }

        .min-plus-btn:hover {

            background-color: #cccccc;
        }

        .process-btn {

            color: #000000;
            background-color: #dddddd;
            border-radius: 5px
        }
        .process-btn:hover {

            background-color: #cccccc;
        }

        .rating-summary-content {

            background-color: #EFEFEF;
        }

        .brand-information-content {

            background-color: #EFEFEF;
        }

        .brand-img {

            width: 150px;
            height: 150px;
            background-color: #dddddd
        }

        .custom-rounded {

            border-radius: 5px;
        }

        .review-img {

            width: 64px;
            height: 64px;
            background-color: #000000;
        }

        .review-comment-placeholder {

            text-align: justify;
        }

        .line-custom-margin {

            margin-top: 100px;
            margin-bottom: 64px
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
        $(".action-alert").delay(10000).fadeOut(500)
    </script>

<script>
    document.getElementById('productForm').addEventListener('submit', function (event) {
        var action = event.submitter.getAttribute('value');

        if (action === 'cart') {
            this.action = "{{ route('user.detail.addToCart', ['id' => $products->id]) }}";
        } else if (action === 'buy') {
            this.action = "{{ route('user.detail.instantCheckOut', ['id' => $products->id]) }}";
        }
    });
</script>

@endsection
