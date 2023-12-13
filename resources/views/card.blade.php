<div class="col-md-3 col-6">
    <a href="{{ route('product.detail', ['id' => $card->id]) }}" class="text-decoration-none text-black">
        <div class="#" style="width:99%">
            @foreach($images as $img)
                @if($img->image_id == $card->id)
                    <img src="{{ asset('./storage/product/' .$img->main_image) }}" style="height: 27vw; object-fit: cover" class="card-img-top" alt="product image">
                @endif
            @endforeach
            <div class="card-body my-2">
            <p class="card-title fs-5">{{ $card->name }}</p>
            <p style="color: #707070">Rp{{ number_format($card->price, 0, '.', '.') }}</p>
            </div>
        </div>
    </a>
</div>