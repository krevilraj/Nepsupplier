{{--
--Required slot-----
product_id
product_name
url
image
discount_percentage
disable_price
regularPrice
salePrice
--}}


<!-- Single Product Start -->
<div class="single-product-wrap mt-10">
    <div class="product-image">
        <a href="{{$url}}">
            <img src="{{ $image }}" alt="{{ $product_name }}">
        </a>

        @if($discount_percentage != 0)
            <span class="onsale">-{{ $discount_percentage }}
                                                        % Sale!</span>
        @endif

    </div>
    <div class="product-button" data-product="{{ $product_id }}">
        <a href="#" class="add-to-wishlist addtowishlist"><i class="fas fa-heart"></i></a>
    </div>
    <div class="product-content">
        <div class="price-box">
            @if ( auth()->guest() )

                @unless($disable_price)
                    <div class="product-price-box">
                        @if(null !== $salePrice)
                            <span class="new-price">NRS {{ $salePrice }}</span>
                            <span class="old-price">NRS {{ $regularPrice }}</span>

                        @else
                            <span class="new-price">NRS {{ $regularPrice }}</span>
                        @endif
                    </div>
                @endunless
            @else
                <div class="product-price-box">
                    @if(null !== $salePrice)
                        <span class="new-price">NRS {{ $salePrice }}</span>
                        <span class="old-price">NRS {{ $regularPrice }}</span>

                    @else
                        <span class="new-price">NRS {{ $regularPrice }}</span>
                    @endif
                </div>
            @endif

        </div>
        <h6 class="product-name"><a href="#">{{ $product_name }}</a></h6>

        <div class="product-button-action" data-product="{{ $product_id }}">
            <a href="#" class="add-to-cart addtocart">Add to Cart <i class="fas fa-shopping-cart"></i></a>
        </div>
    </div>
</div>
<!-- Single Product End -->

