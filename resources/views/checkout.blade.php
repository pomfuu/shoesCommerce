@extends('front-end.layout.master')
@section('title', 'Instant Checkout')
@section('content')

    <div class="container">

            <p>Yang Beli : {{ $user->name }}</p>
            <p>Nama Sepatunya : {{ $product->name }}</p>
            <p>Harganya : {{ $product->price }}</p>

            @foreach ($checkout as $co)
                <p>Ukurannya : {{ $co->size }}</p>
                <p>Totalnya : {{ $co->total }}</p>
            @endforeach

    </div>
@endsection