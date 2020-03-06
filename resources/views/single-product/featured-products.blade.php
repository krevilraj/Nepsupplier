@if(count($relatedProducts))
    <div class="related-product-area section-pt">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h3> Featured Product</h3>
                </div>
            </div>
        </div>
        <div class="row row-8 product-row-6-active">
            @foreach($relatedProducts as $relatedProduct)
                <div class="product-col">
                <!-- Single Product Start -->
                <div class="single-product-wrap mt-10">
                    <div class="product-image">
                        <a href="#"><img src="{{ optional($relatedProduct->getImageAttribute())->mediumUrl }}" alt=""></a>
                        <span class="onsale">Sale!</span>
                    </div>
                    <div class="product-content">
                        <div class="price-box">
                            @unless($product->disable_price)
                                @if(null !== $product->getSalePriceAttribute())
                                    <span class="new-price">
                                        Rs. {{ $product->getRegularPriceAttribute() }}
                                    </span>
                                @else

                                @endif
                            @endunless
                        </div>
                        <h6 class="product-name"><a href="#">{{ $product->name }}</a></h6>

                        <div class="product-button-action">
                            <a href="#" class="add-to-cart">Select </a>
                        </div>
                    </div>
                </div>
                <!-- Single Product End -->
                </div>
            @endforeach
            </div>
        </div>
   
@endif