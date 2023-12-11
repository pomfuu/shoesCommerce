@extends('front-end.layout.master')
@section('title', 'My Orders')
@section('content')
    <div class="container mt-5">

        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @elseif (session('warning'))
            <div class="alert alert-warning text-center">
                {{ session('warning') }}
            </div>
        @endif

        <div class="row m-0">
            <div class="item-list-container">

                <p class="m-0 fw-semibold fs-3 my-auto">My Orders</p>
                <div class="separator-line-head mb-4 mt-3"></div>

                @foreach ($ordersums as $sum)
                    <p class="m-0 item-tag fw-light text-end">{{ $sum->created_at }}</p>

                    <div class="item-container">
                        <div class="row">
                            {{-- <div class="col my-auto">
                                <br>
                                <img src="{{ asset('./storage/product/' . $sum->main_image . '.jpg') }}" style="width: 8vw;"
                                    class="card-img-top" alt="product image">
                                <br><br>
                            </div> --}}
                            <div class="col-1 my-auto">
                                <span class="item-tag fw-light">Order ID</span>
                                <p class="m-0 fw-semibold fs-5">{{ $sum->id }}</p>
                            </div>
                            <div class="col my-auto ps-4">
                                <span class="item-tag fw-light">Order Name</span>
                                <p class="m-0 fw-semibold fs-5">{{ $users->name }}</p>
                            </div>
                            <div class="col my-auto">
                                <span class="item-tag fw-light">Order Total</span>
                                <p class="m-0 fw-semibold fs-5">Rp {{ number_format($sum->sum_total, 0, '.', '.') }}
                            </div>
                            <div class="col-2 my-auto">
                                <div class="mx-auto">
                                    <span class="item-tag fw-light">Status</span>
                                    <p class="m-0 fw-semibold fs-5">{{ ucfirst($sum->status) }}</p>
                                </div>
                            </div>
                            {{-- <div class="col-1 my-4"></div> --}}
                            <div class="col my-auto text-end">
                                
                                    @if ($sum->status == 'unpaid')
                                        <div class="d-flex justify-content-end ">
                                            <form method="post" action="{{ route('user.checkorder') }}" class="m-0">
                                                <button class="complete-btn mt-3 mb-2 me-3 py-2 px-3 rounded fw-semibold ">View Payment Details</button>
                                            </form>
                                            <form method="post" action="{{ route('user.order.cancelled', ['id' => $sum->id]) }}" class="m-0">
                                                <button class="btn btn-danger mt-3 mb-2 py-2 px-3 rounded">Cancel</button>
                                            </form>
                                        </div>
                                    @elseif($sum->status == 'shipped')   
                                        <form method="post" action="{{ route('user.order.completed', ['id' => $sum->id]) }}" class="m-0">
                                            <button class="complete-btn mt-3 mb-2 py-2 px-3 rounded ">Complete the order</button>
                                        </form>     
                                    @endif
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 mt-3 gap-2 pb-4">
                        <div class="col-1"></div>
                        <div class="col">
                            <div class="row header-border py-3 fw-semibold ">
                                <div class="col">Product Name</div>
                                <div class="col">Size</div>
                                <div class="col">Qty</div>
                                <div class="col">Total</div>
                                <div class="col-1">Rate</div>
                            </div>
                            @foreach ($orders as $ord)
                                @if ($ord->sum_id == $sum->id)
                                    <div class="row item-border py-2">
                                        @foreach ($products as $prd)
                                            @if ($ord->product_id == $prd->id)
                                                <div class="col">{{ $prd->name }}</div>
                                            @endif
                                        @endforeach
                                        <div class="col">{{ $ord->size }}</div>
                                        <div class="col">{{ $ord->qty }}</div>
                                        <div class="col">Rp {{ number_format($ord->total, 0, '.', '.') }}</div>
                                        <div class="col-1">
                                            @if ($sum->status == 'completed')
                                                <form method="post" action="{{ route('user.review', ['id', $ord->id]) }}">
                                                    <button class="btn p-0 text-dark"><i class="bi bi-star-fill"></i> Rate</button>
                                                </form>
                                            @else
                                                <p class="m-0">-</p>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="separator-line-head mt-5 mb-4"></div>
                @endforeach
            </div>
        </div>
    </div>

    <style>
        .separator-line {
    
            height: 1px;
            width: 100%;
            background-color: #212529;
        }
    
        .separator-line-head {
    
            height: 2px;
            width: 100%;
            background-color: #9e9e9e;
        }
    
        .item-list-container {
            background-color: #FFFFFF;
            border-radius: 5px 0px 0px 5px;
        }
    
        .item-tag {
    
            font-size: 12px;
        }
    
        .header-border {
    
            border-bottom: 1px solid #212529;
        }
    
        .item-border {
    
            border-bottom: 1px solid #E19827;
        }
        .complete-btn {
    
            border: 2px solid #E19827;
            background-color: transparent;
            color: #E19827;
        }
        .complete-btn:hover {
    
            border: 2px solid #212529;
            background-color: transparent;
            color: #212529;
        }
    </style>

    <script>
        $(".action-alert").delay(10000).fadeOut(500)
    </script>

@endsection

