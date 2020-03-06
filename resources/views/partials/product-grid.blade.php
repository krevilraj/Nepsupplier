{{--<li>
    <div class="product">
        <figure class="product-image-area">
            <a href="{{ route('product.show', $product->slug) }}" title="Product Name"
               class="product-image">
                <img src="{{ $product->getImageAttribute()->mediumUrl }}" alt="Product Name">
            </a>

            <a href="#" class="product-quickview" data-product="{{ $product->id }}">
                <i class="fa fa-share-square-o"></i>
                <span>Quick View</span>
            </a>
            @if($product->getDiscountPercentage() != 0)
                <div class="product-label">
                    <span class="discount">-{{ $product->getDiscountPercentage() }}%</span>
                </div>
            @endif
        </figure>
        <div class="product-details-area">
            <h2 class="product-name">
                <a href="{{ route('product.show', $product->slug) }}" title="{{ $product->name }}">
                    {{ $product->name }}
                </a>
            </h2>
            <div class="product-ratings">
                <div class="ratings-box">
                    <div class="rating" style="width:{{ $product->getRatingPercentage() }}%"></div>
                </div>
            </div>

            @if ( auth()->guest() )

                @unless($product->disable_price)
                    <div class="product-price-box">
                        @if(null !== $product->getSalePriceAttribute())
                            <span class="old-price">NRS {{ $product->getRegularPriceAttribute() }}</span>
                            <span class="product-price">NRS {{ $product->getSalePriceAttribute() }}</span>
                        @else
                            <span class="product-price">NRS {{ $product->getRegularPriceAttribute() }}</span>
                        @endif
                    </div>
                @endunless
            @else
                <div class="product-price-box">
                    @if(null !== $product->getSalePriceAttribute())
                        <span class="old-price">NRS {{ $product->getRegularPriceAttribute() }}</span>
                        <span class="product-price">NRS {{ $product->getSalePriceAttribute() }}</span>
                    @else
                        <span class="product-price">NRS {{ $product->getRegularPriceAttribute() }}</span>
                    @endif
                </div>
            @endif

            <div class="product-actions" data-product="{{ $product->id }}">
                <a href="javascript:void(0);" class="addtowishlist" title="Add to Wishlist">
                    <i class="fa fa-heart"></i>
                </a>

                @if ( auth()->guest() )
                    @if($product->disable_price)
                        <a href="{{ route('enquiry', 'product=' . $product->slug) }}"
                           class="enquiry" title="Enquiry"
                           data-loading-text="Loading...">
                            <i class="fa fa-info"></i>
                            <span>Enquiry</span>
                        </a>
                    @else
                        <a href="javascript:void(0);" class="addtocart"
                           title="Add to Cart"
                           data-loading-text="Loading...">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Add to Cart</span>
                        </a>
                    @endif

                @else
                    <a href="javascript:void(0);" class="addtocart"
                       title="Add to Cart"
                       data-loading-text="Loading...">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Add to Cart</span>
                    </a>
                @endif

                <a href="javascript:void(0);" class="comparelink" title="Add to Compare" data-loading-text="...">
                    <i class="glyphicon glyphicon-signal"></i>
                </a>
            </div>
        </div>
    </div>
</li>--}}

{{--<li class="post-1398 product type-product status-publish has-post-thumbnail product_cat-books-media product_cat-clothing product_cat-health product_cat-featured product_cat-shoes product_cat-sports product_tag-appetere first instock sale featured shipping-taxable purchasable product-type-simple">
    <div class="container-inner">
        <span class="product-loading"></span>
        <div class="product-block-inner">
            <div class="image-block"><a href="{{ route('product.show', $product->slug) }}">

                    @if($product->getDiscountPercentage() != 0)
                        <span class="onsale ondiscount">-{{ $product->getDiscountPercentage() }}
                            %</span>
                    @endif
                    <img width="180" height="180" src="{{ $product->getImageAttribute()->mediumUrl }}"
                         class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="{{ $product->name }}"
                    /></a>
                <div class="product-block-hover"></div>
            </div>
            <div class="product-detail-wrapper">

                <a href="{{ route('product.show', $product->slug) }}">
                    <h3 class="product-name">{{ $product->name }}</h3></a>

                @unless($product->disable_price)


                    <div class="product-price-box">
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
                    </div>
                @endunless

                @if($product->disable_price)
                    <a href="{{ route('enquiry', 'product=' . $product->slug) }}"
                       class="button product_type_simple "
                       rel="nofollow">Enquiry
                        Now</a>
                @else
                    <a href="javascript:void(0);"
                       class="button product_type_simple addtocart"
                       title="Add to Cart"
                       data-loading-text="Loading...">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Add to Cart</span>
                    </a>
                @endif

                <div class="woocommerce product compare-button">
                    <a href="javascript:void(0)"
                       class="compare button comparelink"
                       data-product="{{ $product->id }}"
                       rel="nofollow">Compare</a>
                </div>
                <p>
                    <a href="#"
                       class="button yith-wcqv-button"
                       data-product_id="1398">Quick
                        View</a>
                </p>
                <div class="yith-wcwl-add-to-wishlist add-to-wishlist-1398">
                    <div class="yith-wcwl-add-button show"
                         style="display:block">
                        <p>
                            <a href="javascript:void(0)"
                               data-product="{{ $product->id }}"
                               class="addtowishlist add_to_wishlist">
                                Add to
                                Wishlist</a>
                            <img src="wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif"
                                 class="ajax-loading"
                                 alt="loading"
                                 width="16"
                                 height="16"
                                 style="visibility:hidden"/>
                        </p>
                    </div>

                    <div style="clear:both"></div>
                    <div class="yith-wcwl-wishlistaddresponse"></div>
                </div>



                <div class="clear"></div>
                <div class="product-button-hover"></div>
            </div>
        </div>
    </div>
</li>--}}



<li class="post-1313 product type-product status-publish has-post-thumbnail product_cat-books-media product_cat-clothing product_cat-jewellery product_cat-featured product_cat-sports product_tag-audire  instock featured shipping-taxable purchasable product-type-simple">
    <div class="container-inner">
        <span class="product-loading"></span>
        <div class="product-block-inner">
            <div class="image-block"><a href="{{ route('product.show', $product->slug) }}">
                    @if($product->getDiscountPercentage() != 0)
                        <span class="onsale ondiscount">-{{ $product->getDiscountPercentage() }}
                            %</span>
                    @endif

                    <img width="180" height="180" src="{{ $product->getImageAttribute()->mediumUrl }}"
                         class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="{{ $product->name }}"
                    /></a>
                <div class="product-block-hover"></div>
            </div>
            <div class="product-detail-wrapper" data-product="{{ $product->id }}">
                <a href="{{ route('product.show', $product->slug) }}">
                    <h3 class="product-name">{{ $product->name }}</h3></a>

                @unless($product->disable_price)


                    <div class="product-price-box">
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
                    </div>
                @endunless

                @if($product->disable_price)
                    <a href="{{ route('enquiry', 'product=' . $product->slug) }}"
                       class="button product_type_simple "
                       rel="nofollow">Enquiry
                        Now</a>
                @else
                    <a href="javascript:void(0);"
                       class="button product_type_simple addtocart"
                       title="Add to Cart"
                       data-loading-text="Loading...">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Add to Cart</span>
                    </a>
                @endif

                <div class="woocommerce product compare-button">
                    <a href="javascript:void(0)"
                       class="compare button comparelink"
                       data-product="{{ $product->id }}"
                       rel="nofollow">Compare</a>
                </div>
                <p>
                    <a href="#"
                       class="button yith-wcqv-button"
                       data-product_id="{{ $product->id }}">Quick
                        View</a>
                </p>
                <div class="yith-wcwl-add-to-wishlist add-to-wishlist-1398">
                    <div class="yith-wcwl-add-button show"
                         style="display:block">
                        <p>
                            <a href="javascript:void(0)"
                               data-product="{{ $product->id }}"
                               class="addtowishlist add_to_wishlist">
                                Add to
                                Wishlist</a>
                            <img src="wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif"
                                 class="ajax-loading"
                                 alt="loading"
                                 width="16"
                                 height="16"
                                 style="visibility:hidden"/>
                        </p>
                    </div>

                    <div style="clear:both"></div>
                    <div class="yith-wcwl-wishlistaddresponse"></div>
                </div>


                <div class="clear"></div>
                <div class="product-button-hover"></div>
            </div>
        </div>
    </div>
</li>

