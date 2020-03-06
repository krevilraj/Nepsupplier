<div class="product-col">
    <!-- Single Product Start -->
    <div class="single-product-wrap mt-10">
        <div class="product-image">
            <a href="{{ route('product.show', $product->slug) }}">
                <img src="{{ $product->getImageAttribute()->mediumUrl }}" alt=""></a>

            @if($product->getDiscountPercentage() != 0)
                <span class="onsale">-{{ $product->getDiscountPercentage() }}
                                                        % Sale!</span>
            @endif

        </div>
        <div class="product-button" data-product="{{ $product->id }}">
            <a href="#" class="add-to-wishlist addtowishlist"><i class="fas fa-heart"></i></a>
        </div>
        <div class="product-content">
            <div class="price-box">
                @if ( auth()->guest() )

                    @unless($product->disable_price)
                        <div class="product-price-box">
                            @if(null !== $product->getSalePriceAttribute())
                                <span class="new-price">NRS {{ $product->getSalePriceAttribute() }}</span>
                                <span class="old-price">NRS {{ $product->getRegularPriceAttribute() }}</span>

                            @else
                                <span class="new-price">NRS {{ $product->getRegularPriceAttribute() }}</span>
                            @endif
                        </div>
                    @endunless
                @else
                    <div class="product-price-box">
                        @if(null !== $product->getSalePriceAttribute())
                            <span class="new-price">NRS {{ $product->getSalePriceAttribute() }}</span>
                            <span class="old-price">NRS {{ $product->getRegularPriceAttribute() }}</span>

                        @else
                            <span class="new-price">NRS {{ $product->getRegularPriceAttribute() }}</span>
                        @endif
                    </div>
                @endif

            </div>
            <h6 class="product-name"><a href="#">{{ $product->name }}</a></h6>

            <div class="product-button-action" data-product="{{ $product->id }}">
                <a href="#" class="add-to-cart addtocart">Add to Cart <i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>
    </div>
    <!-- Single Product End -->
</div>