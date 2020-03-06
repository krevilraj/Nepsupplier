<div id="secondary">
    <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
        <aside class="col-md-3 col-md-pull-9 sidebar shop-sidebar">
            <div class="panel-group">

                @if(!$childProduct->isEmpty())

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" href="#panel-filter-category">
                                {{$category->name}}
                            </a>
                        </h4>
                    </div>
                    <div id="panel-filter-category" class="accordion-body collapse in">
                        <div class="panel-body">
                            <ul class="cat_checkbox">

                               {{-- @foreach($childProduct as $category)
                                    <li><a href="{{ route('welcome') . '/category/' . $category->slug }}"><input type="checkbox">{{ $category->name }}</a></li>
                                @endforeach--}}
                                @foreach($childProduct as $category)
                                    <li><a href="{{ route('welcome') . '/category/' . $category->slug }}"  class="link_checkbox">
                                            <img src="{{asset('img/icons/uncheckbox.png')}}" class="icon_change" alt="">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                                @push('styles')
                                    <style>
                                        .cat_checkbox li{
                                            list-style: none;
                                        }
                                        .cat_checkbox li img{
                                            margin: 9px;
                                        }
                                    </style>
                                    @endpush
                                @push('scripts')
                                    <script>
                                        $(document).ready(function () {
                                            var img_path = {{asset('img/icons/checkbox.png')}}
                                            $('.link_checkbox').on('click', function(e) {
                                                e.preventDefault();
                                                alert('helst');
                                                $(this).find('.icon_change').attr("src",img_path);
                                            });
                                        })
                                    </script>
                                    @endpush

                            </ul>
                        </div>
                    </div>


                </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" href="#panel-filter-price">
                                Price
                            </a>
                        </h4>
                    </div>
                    <div id="panel-filter-price" class="accordion-body collapse in">
                        <div class="panel-body">
                            <form action="{{ url()->current() }}" method="get">
                                <div class="filter-price">
                                    <div id="price-slider"></div>
                                    <div class="filter-price-details">
                                        <span>from</span>
                                        <input type="text" name="min_price" id="price-range-low"
                                               class="form-control" placeholder="Min">
                                        <span>to</span>
                                        <input type="text" name="max_price" id="price-range-high"
                                               class="form-control" placeholder="Max">
                                        <button type="submit" class="btn btn-primary">FILTER</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>


        </aside>

        <aside id="woocommerce_top_rated_products-2"
               class="widget woocommerce widget_top_rated_products">
            <h4 class="widget-title">Featured</h4>
            <ul class="product_list_widget">
                @foreach($products as $product)
                @if($product->is_featured == 1)
                <li>
                    <a href="{{ route('product.show', $product->slug) }}">

                        <img width="180" height="180" src="{{ $product->getImageAttribute()->mediumUrl }}"
                             class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                             alt="{{ $product->name }}"/> <span
                            class="product-title">{{ $product->name }}</span>
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
                @endif
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
</div>