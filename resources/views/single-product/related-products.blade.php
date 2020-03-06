@if(count($relatedProducts))
    <div class="related-product-area section-pt">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h3> Related Product</h3>
                </div>
            </div>
        </div>
        <div class="row row-8 product-row-6-active">

            @foreach($relatedProducts as $product)
                <div class="product-col">
                    @component('components.product-item',[
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'url' => route('product.show', $product->slug),
                    'product_id' => $product->id,
                    'image' => $product->getImageAttribute()->mediumUrl,
                    'discount_percentage' => $product->getDiscountPercentage(),
                    'disable_price' => $product->disable_price,
                    'regularPrice' => $product->getRegularPriceAttribute(),
                    'salePrice' => $product->getSalePriceAttribute(),
                    ])
                        Error Component
                    @endcomponent
                </div>
            @endforeach
        </div>
    </div>
@endif