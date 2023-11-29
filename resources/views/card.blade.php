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
