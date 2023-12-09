@extends('front-end.layout.master')
@section('title', 'Instant Checkout')
@section('content')

@foreach($orders as $ord)@endforeach
@foreach($payments as $pay)@endforeach

    <div class="container mt-5">
        <div class="d-flex justify-content-center ">
            <div class="content-container bg-white shadow">
                <p class="fw-semibold text-center m-0">Order Total Price</p>
                <p class="fw-medium fs-2 text-center">Rp {{ number_format($ord->total, 0, '.', '.') }}</p>
                
                <div class="separator-line my-5"></div>
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('./storage/bank/'.  $pay->id .'.png') }}" alt="bank" class="bank-image mb-4">
                </div>

                <p class="text-center fw-bold fs-4 m-0">{{ $pay->virtual_account }}</p>
                <p class="text-center fw-medium ">Schuhe Official</p>

                <div class="separator-line my-5"></div>
                <button class="w-100 btn border-1 border-dark mb-2">Check Order Status</button>
                <a class="w-100 btn bg-dark text-light mb-5" href="{{ route('home') }}">Back to Home</a>
                <ol class="order-tutorial">
                    <li>Copy the virtual account number.</li>
                    <li>Open the banking application or select the "Virtual Account" option on the ATM.</li>
                    <li>Input the virtual account code you copied.</li>
                    <li>Confirm the total invoice amount and the bank name under the account name "Schuhe Official."</li>
                    <li>Wait for order confirmation, with a maximum processing time of 1 x 24 hours.</li>
                    <li>If you encounter any issues, contact customer service at <span class="fw-semibold">744-22932</span>.</li>
                    <li>Note that every placed order is subject to the applicable privacy and policy terms.</li>
                </ol>
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
    .content-container{

        padding: 75px;
        border-radius: 5px;
        width: 600px;
        border: 5px double #DDDDDD;
    }
    .bank-image{

        width: 200px;
        height: auto;
    }
    .order-tutorial{

        text-align: justify;
    }
    .custom-rounded {

    border-radius: 5px;
    }
</style>
