<div class="products mb-3">
    <div class="row justify-content-center">
        @foreach($getProduct as $value)
            @php
                $getProductImage = $value->getImageSingle($value->id);
            @endphp

        <div class="col-12 col-md-4 col-lg-4">
            <div class="product product-7 text-center">
                <figure class="product-media">
                    <a href="{{ url($value->slug) }}">
                        @if(!empty($getProductImage) && !empty($getProductImage->getLogo()))
                            <img style="height: 280px;width: 100%;object-fit: cover;" src="{{ $getProductImage->getLogo() }}" alt="{{ $value->title }}" class="product-image">
                        @endif
                    </a>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="{{ url($value->category_slug.'/'.$value->sub_category_slug) }}">{{ $value->sub_category_name }}</a>
                    </div>
                    <h3 class="product-title"><a href="{{ url($value->slug) }}">{{ $value->title }}</a></h3>
                    <div class="product-price">
                        ${{ number_format($value->price, 2) }}
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
