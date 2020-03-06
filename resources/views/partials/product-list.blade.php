<div class="shop-product-list-wrap">
    <div class="row product-layout-list">
        <div class="col-lg-3 col-md-3">
            <!-- single-product-wrap start -->
            <div class="single-product">
                <div class="product-image">
                    <a href="{{ route('product.show', $product->slug) }}"><img
                                src="{{ $product->getImageAttribute()->mediumUrl }}"
                                alt="{{ $product->name }}"></a>
                </div>
            </div>
            <!-- single-product-wrap end -->
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="product-content-list text-left">
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
                <p><a href="{{ route('product.show', $product->slug) }}" class="product-name">{{ $product->name }}</a></p>

                <div class="product-rating">
                    <ul class="d-flex">
                        <li><a href="#"><i class="icon-star"></i></a></li>
                        <li><a href="#"><i class="icon-star"></i></a></li>
                        <li><a href="#"><i class="icon-star"></i></a></li>
                        <li><a href="#"><i class="icon-star"></i></a></li>
                        <li class="bad-reting"><a href="#"><i
                                        class="icon-star"></i></a></li>
                    </ul>
                </div>

                <p>{!! $product->short_description !!}</p>
            </div>
        </div>

        <div class="col-lg-3 col-md-3">
            <div class="block2">
                <ul class="stock-cont">
                    @if($product->sku)
                        <li class="product-sku">Sku: <span>{{ $product->sku }}</span></li>
                    @endif
                    <li class="product-stock-status">Availability: <span
                                class="in-stock">{{ $product->in_stock != 0 ? 'In Stock' : 'Out Of Stock' }}</span></li>
                </ul>
                <div class="product-button">
                    <div class="add-to-cart">
                        <div class="product-button-action" data-product="{{ $product->id }}">
                            <a href="#" class="add-to-cart addtocart">Add to Cart <i class="fas fa-shopping-cart"></i></a>
                        </div>
                    </div>
                    <ul class="actions">
                        <li class="add-to-wishlist" data-product="{{ $product->id }}">
                            <a href="wishlist.html" class="add_to_wishlist addtowishlist"><i
                                        class="fas fa-heart"></i> Add to Wishlist

                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>