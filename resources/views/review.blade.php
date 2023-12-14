@extends('front-end.layout.master')
@section('title', 'Product Rate')
@section('content')

    <div class="container mt-5">
        <div class="row gap-3 content-container m-0 w-75 mx-auto p-5 bg-white shadow-sm rounded">
            <div class="col-4">

                {{-- <div class="item-img mx-auto">
                    <img src="{{ asset('./storage/product/' . $prd->id . 's1.jpg') }}" alt="Item Image">
                </div> --}}
                
                @foreach($products as $prd)
                    @foreach ($images as $img)
                        @if ($prd->id == $img->id)
                            <div class="bg-dark item-img">
                                <img src="{{ asset('./storage/product/' . $img->main_image) }}" alt=""
                                class="item-img">
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
            <div class="col">

                <p class="m-0 text-end text-muted  ">Order ID : {{ $orders->sum_id }} | {{ $orders->created_at }}</p>
                @foreach ($products as $prd)
                    <p class="m-0 fw-semibold fs-4">{{ $prd->name }}</p>
                    <p class="m-0 mb-3">Size : {{ $orders->size }}</p>
                @endforeach

                <form action="{{ route('user.add.review', ['id' => $orders->id]) }}" method="post" enctype="multipart/form-data">

                    <p class="m-0 mb-1 fw-semibold ">How do you rate our product?</p>
                    <div class="row m-0 boxed gap-2 mb-3">
                        <input type="radio" id="1" name="star" value="1">
                        <label for="1">1</label>
                        <input type="radio" id="2" name="star" value="2">
                        <label for="2">2</label>
                        <input type="radio" id="3" name="star" value="3">
                        <label for="3">3</label>
                        <input type="radio" id="4" name="star" value="4">
                        <label for="4">4</label>
                        <input type="radio" id="5" name="star" value="5">
                        <label for="5">5</label>
                    </div>

                    <div class="form-floating mb-4">
                        <textarea class="form-control" name="review-area" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Write your review here</label>
                    </div>

                    <p class="m-0 mb-1 fw-semibold ">Add an image to your review</p>
                    <div class="input-group mb-1">
                        <input type="file" class="form-control" id="inputGroupFile01" name="review-img">
                    </div>
                    <p class="support-info m-0 mb-5 text-end">* supported file (.jpg, .jpeg, .png)</p>

                    <button type="submit" class="btn btn-dark w-50 rounded-0">Submit</button>

                </form>
            </div>
        </div>
    </div>

    <style>
    
        .item-img {
    
            width: 250px;
            height: 250px;
            background-color: #dddddd;
            object-fit: cover;
        }
    
        .boxed label {
            display: inline-block;
            text-align: center;
            width: 50px;
            padding: 10px;
            background-color: #dddddd;
            color: #383838;
            border-radius: 5px;
        }
    
        .boxed label:hover {
    
            background-color: #cccccc;
        }
    
        .boxed input[type="radio"] {
            display: none;
        }
    
        .boxed input[type="radio"]:checked+label {
            color: #ffffff;
            background-color: #FFC107;
        }
    
        .support-info{
    
            font-size: 12px;
        }
    
    
    </style>
@endsection

