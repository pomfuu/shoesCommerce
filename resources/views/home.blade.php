@extends('front-end.layout.master')
@section('title','Home')
@section('content')
<header style="margin-top: 5.5vw; margin-bottom: 14.5vw">
    <div class="container header" style="padding-inline: 5vw">
        <div
          class="row p-0 m-0 align-items-center justify-content-center py-5 my-5 header"
        >
          <div class="col-md-5 col-12 banner ">
            <h1
              class="fw-semibold text-start header-title"
              style="font-size: 4.5rem"
            >
              Walk the Talk
            </h1>
            <p>Shop the Hottest Shoe Trends with <b>Schuhe</b></p>
          </div>
          <div class="col-md-3 banner-img" style="position: absolute">
            <img
              src="{{ url('./storage/asset/home_banner.svg') }}"
              class="mb-4"
              style="height: 22vw"
              alt=""
            />
          </div>
          <div class="col-md-3 text-start fs-5 col-12  banner ms-auto">
            <p class="fw-semibold">
              NAVIGATE
            </p>
            <div class="">
              <a class="text-decoration-none text-black" href="#"><p class="m-0 p-0">SHOP FOR MEN</p></a>
              <hr class="my-2" />
              <a class="text-decoration-none text-black" href="#"><p class="m-0 p-0">SHOP FOR WOMEN</p></a>
              <hr class="my-2" />
              <a class="text-decoration-none text-black" href="#"><p class="m-0 p-0">SHOP BY BRANDS</p></a>
              <hr class="my-2" />
              <a class="text-decoration-none text-black" href="#new-arr"><p class="m-0 p-0">NEW ARRIVALS</b></p></a>
            </div>
          </div>
        </div>
    </div>
</header>
<section>
    <div class="col d-flex align-items-center">
        <div class="col-md-4 ms-auto brand-col col-12">
            <div class="container">
                <h1 style="font-size: 3.2rem" class="brand-title">BRAND COLLECTIONS</h1>
                <hr class="mt-2 mb-4">
                <div class="row">
                    <div class="col d-flex">
                        <div class="col-md-6 list" style="font-size: 1.5rem">
                            <p>Nike</p>
                            <p>Adidas</p>
                            <p>Puma</p>
                            <p>Reebok</p>
                            <p>Converse</p>
                        </div>
                        <div class="col-md-6 list list-2" style="font-size: 1.5rem">
                            <p>New Balance</p>
                            <p>ASICS</p>
                            <p>Fila</p>
                            <p>Timberland</p>
                            <p>Vans</p>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn fs-5 text-center rounded-1 py-3 px-5 my-2" style="background-color: #DDDDDD">SHOP BY BRANDS ></a>
            </div>
        </div>
        <div class="col-md-7 ms-auto img-1">
            <img class="img-fluid" src="{{ url('./storage/asset/banner-sepatu-putih.svg') }}" alt="">
        </div>
    </div>
</section>
<section style="margin-block: 7vw" id="new-arr">
    <div class="container">
        <p class="fs-4 ms-auto text-end">New Arrivals</p>
        <div class="row">
            <div class="col d-flex flex-wrap">
                @foreach ( $news as $card )
                <div class="col-md-3 col-6">
                    <a href="#" class="text-decoration-none text-black">
                        <div class="#" style="width:99%">
                            <img src="{{ asset('./storage/product/' .$card->image. '.jpg') }}" style="height: 27vw; object-fit: cover" class="card-img-top" alt="product image">
                            <div class="card-body my-2">
                              <p class="card-title fs-5">{{ $card->name }}</p>
                              <p style="color: #707070">Rp{{ number_format($card->price, 0, '.', '.') }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section style="margin-block: 9vw">
    <div class="container">
        <p class="fs-4 ms-auto text-end">Best Selling Items</p>
        <div class="row">
            <div class="col d-flex flex-wrap">
                @foreach ( $cards as $card )
                @if ( $card->id <= 4 )
                <div class="col-md-3 col-6">
                    <a href="#" class="text-decoration-none text-black">
                        <div class="#" style="width:99%">
                            <img src="{{ asset('./storage/product/' .$card->image. '.jpg') }}" style="height: 27vw; object-fit: cover" class="card-img-top" alt="product image">
                            <div class="card-body my-2">
                              <p class="card-title fs-5">{{ $card->name }}</p>
                              <p style="color: #707070">Rp{{ number_format($card->price, 0, '.', '.') }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-wrap gap-1 justify-content-center">
                <div class="col-md-6 img-men" style="width:49%">
                    <a href="#" class="text-decoration-none"><p class="text-white fw-semibold fs-5 ms-4 mt-4">MEN COLLECTIONS ></p></a>
                </div>
                <div class="col-md-6 img-women" style="width:49%">
                    <a href="#" class="text-decoration-none"><p class="text-white fw-semibold fs-5 ms-4 mt-4">WOMEN COLLECTIONS ></p></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section style="margin-top: 13vw">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <p class="fw-semibold" style="font-size: 3.2rem">Why Schuhe?</p>
                <p style="text-align: justify">Why choose Schuhe? Because we're not just a marketplace; we're a community that celebrates individuality, self-expression, and the joy of finding the perfect pair. Join us on this exciting journey of discovery, where every step is a statement, and every shoe tells a story. Ready to step into a world of endless possibilities? Dive into Schuhe, where every click opens the door to a universe of style, comfort, and unmatched elegance.</p>
            </div>
            <div class="ms-auto col-md-2 col-12 d-flex flex-column m-0 p-0 text-white" style="background-color: #1e1e1e;">
                <div class="col-md-6 col-6 fs-5 ms-4 mt-4">
                    REACH US
                </div>
                <div class="col-md-5 col-6 m-0 p-0 ms-4 mb-4 mt-4">
                    <a class="text-decoration-none text-white d-block mb-2" href="https://www.facebook.com/">Facebook</a>
                    <a class="text-decoration-none text-white d-block mb-2" href="https://www.instagram.com/">Instagram</a>
                    <a class="text-decoration-none text-white d-block mb-2" href="https://www.tiktok.com/">TikTok</a>
                    <a class="text-decoration-none text-white d-block mb-2" href="https://web.whatsapp.com/">Whatsapp</a>
                    <a class="text-decoration-none text-white d-block" href="https://mail.google.com/mail/u/0/#inbox">Gmail</a>
                </div>
            </div>
            <div class="col-md-5 col-12 m-0 p-0">
                <img class="h-100 mx-0 p-0 text-start img-why" style="object-fit: cover; width: 100%" src="{{ asset('./storage/asset/why-img.svg') }}" alt="image">
            </div>
        </div>
    </div>
</section>
<style>
    .img-men{
        background-image: url('./storage/asset/men-c.svg');
        background-size: cover;
        background-repeat: no-repeat;
        height: 40vw;
    }
    .img-women{
        background-image: url('./storage/asset/women-c.svg');
        background-size: cover;
        background-repeat: no-repeat;
        height: 40vw;
    }
    .btn:hover{
        background-color: #1e1e1e !important;
        color: #FFFFFC;
    }
    @media (max-width: 991.98px) {
      .banner, .brand-col {
        width: 100%;
      }
      .banner-img, .img-1{
        display: none;
      }
      .header{
        padding-inline: 0 !important;
      }
    }

    @media (max-width: 768px) {
        .list-2{
            margin-left: 15vw;
        }
        .img-men{
            width: 100% !important;
            height: 40vh;
        }
        .img-women{
            width: 100% !important;
            height: 40vh;
        }
        .card-img-top{
            height: 25vh !important;
        }
    }

    @media (max-width: 480px) {
        .brand-title{
            font-size: 2.2rem !important;
        }
        .list p{
            font-size: 1.2rem !important;
        }
        .header{
            padding-inline: 2vw !important;
        }
        .header-title{
            font-size: 3rem !important;
        }
        .img-why{
            display: none;
        }
    }
</style>
@endsection

