@extends('front-end.layout.master')
@section('title','Product | Men')
@section('content')
<section style="margin-block: 7vw" id="new-arr">
    <div class="container">
        <div class="dropdown text-end mb-5">
            <a id="filterButton" class="btn px-5 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
            style="background-color: #DDDDDD; border: none">
            @if ($selected)
                Filter: {{ ucfirst(str_replace('_', ' ', $selected)) }}
            @else
                Filter
            @endif
            </a>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('product.men', ['sort' => 'default']) }}">Default</a></li>
                <li><a class="dropdown-item" href="{{ route('product.men', ['sort' => 'Price_Lowest_to_Highest']) }}">Price Lowest to Highest</a></li>
                <li><a class="dropdown-item" href="{{ route('product.men', ['sort' => 'Price_Highest_to_Lowest']) }}">Price Highest to Lowest</a></li>
                <li><a class="dropdown-item" href="{{ route('product.men', ['sort' => 'Newest_Arrival']) }}">Newest Arrival</a></li>
                <li><a class="dropdown-item" href="{{ route('product.men', ['sort' => 'Highest_Rating']) }}">Highest Rating</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col d-flex flex-wrap">
                @foreach ( $cards as $card )
                    @include('card')
                @endforeach
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.dropdown-item').on('click', function() {
            var selectedFilter = $(this).text();
            $('#filterButton').text('Filter: ' + selectedFilter);
        });
    });
</script>
@endsection
