<!-- #primary -->
<div id="secondary">
    <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
        <aside id="woocommerce_top_rated_products-2"
               class="widget woocommerce widget_top_rated_products">
            <h1 class="widget-title">Latest</h1>
            <ul class="product_list_widget">
                @foreach($latestProducts as $product)
                    <li>
                        <a href="{{ route('product.show', $product->slug) }}">
                            <img width="180" height="180" src="{{ $product->getImageAttribute()->mediumUrl }}"
                                 class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                 alt="{{ $product->name }}"/> <span
                                    class="product-title">
                                    {!! str_limit($product->name, 40)!!}</span>
                        </a>

                        @if(null !== $product->getSalePriceAttribute())
                            <span class="price">
                                    <del>
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol">NRS</span>
                                            {{ $product->getRegularPriceAttribute() }}
                                        </span>
                                    </del>
                                    <ins>
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol">NRS</span>
                                            {{ $product->getSalePriceAttribute() }}
                                        </span>
                                    </ins>
                                </span>
                        @else
                            <span class="price">
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol">NRS</span>
                                            {{ $product->getRegularPriceAttribute() }}
                                        </span>
                                </span>
                        @endif

                    </li>
                @endforeach

            </ul>
        </aside>
        <aside id="leftbannerwidget-1" class="widget widgets-leftbanner">
            <div class="left-banner">
                <a href="#">
                    <img src="{{asset('img/leftbanner.jpg')}}"
                         class="vv"/>
                </a>
            </div>
        </aside>
    </div>
    <!-- #primary-sidebar -->
</div>
<!-- #secondary -->