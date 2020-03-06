@extends('layouts.app')
@section('meta')
    <meta property="fb:pages" content="111913193494382"/>
    <meta property="og:title" content="{{$product->name}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{URL::to('/')}}/product/{{$product->slug}}"/>
    <meta property="og:site_name" content="{{getConfiguration('company_name')}}"/>
    <meta property="og:image" content="{{$product->getImageAttribute()->largeUrl}}"/>
    <meta property="og:image:type" content="image/png"/>
    <meta property="og:image:width" content="1700"/>
    <meta property="og:image:height" content="811"/>
    <meta property="og:description" content="{!!$product->short_description!!}"/>


    <meta name="twitter:card" value="summary_large_image"/>
    <meta name="twitter:url" value="{{URL::to('/')}}/product/{{$product->slug}}"/>
    <meta name="twitter:title" value="{{$product->name}}"/>
    <meta name="twitter:description" value="{{$product->short_description}}"/>
    <meta name="twitter:image" value="{{$product->getImageAttribute()->largeUrl}}"/>
    <meta name="twitter:site" value="{{URL::to('/')}}"/>
    <meta name="twitter:creator" value=""/>

@endsection

@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('shop') }}">Shop</a></li>
                        <li class="breadcrumb-item active">{{ $product->name }}</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <!-- main-content-wrap start -->
    <div class="main-content-wrap shop-page section-ptb">
        <div class="container">
            <div class="row single-product-area product-details-inner">
                <div class="col-lg-5 col-md-6">
                    <!-- Product Details Left -->
                    <div class="product-large-slider">
                        @if($product->getProductGallery())
                            @foreach($product->getProductGallery() as $gallery)
                                <div class="pro-large-img img-zoom">
                                    <img src="{{ $gallery->url }}" alt="product-details"/>
                                    <a href="{{ $gallery->url }}" data-fancybox="images"><i
                                                class="fa fa-search"></i></a>
                                </div>
                            @endforeach
                        @endif

                    </div>
                    @if($product->getProductGallery())
                        <div class="product-nav">
                            @foreach($product->getProductGallery() as $gallery)
                                <div class="pro-nav-thumb">
                                    <img src="{{ $gallery->largeUrl }}" alt="product-details"/>
                                </div>
                            @endforeach
                        </div>
                @endif
                <!--// Product Details Left -->
                </div>

                <div class="col-lg-7 col-md-6">
                    <div class="product-details-view-content">
                        <div class="product-info">
                            <h3>{{ $product->name }}</h3>
                            <div class="product-rating d-flex">
                                <div class="product-ratings">
                                    <div class="ratings-box">
                                        <div class="rating" style="width:{{ $product->getRatingPercentage() }}%"></div>
                                    </div>
                                </div>
                                {{--<ul class="d-flex">
                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                </ul>--}}


                                <a href="#reviews">(<span class="count">{{count($product->getReviews())}}</span>
                                    customer review)</a>
                            </div>
                            <div class="price-box">
                                @unless($product->disable_price)
                                    @if(null !== $product->getSalePriceAttribute())
                                        <span class="new-price">
                                                Rs. {{ $product->getSalePriceAttribute() }}
                                            </span>
                                        @if(null !== $product->getRegularPriceAttribute())
                                            <span class="line-through">
                                                    Rs. {{ $product->getRegularPriceAttribute() }}
                                                </span>
                                        @endif
                                    @else
                                        <span class="new-price">
                                                Rs. {{ $product->getRegularPriceAttribute() }}
                                            </span>
                                    @endif
                                @endunless


                            </div>
                            @if($product->short_description)
                                {!! $product->short_description !!}
                            @endif

                            <div class="single-add-to-cart" data-product="{{ $product->id }}">
                                <button class="add-to-cart addtocart" type="submit">Buy product</button>
                            </div>
                            <ul class="stock-cont">
                                @if($product->sku)
                                    <li class="product-sku">Sku: <span>{{ $product->sku }}</span></li>
                                @endif
                                @if(!$cats->isEmpty())
                                    <li class="product-stock-status">Categories:
                                        @foreach($cats as $category)
                                            <a href="{{ route('welcome') . '/category/' . $category->slug }}"
                                               rel="tag">{{ $category->name }}</a>
                                            <span> {{$loop->last?"":" / "}} </span>

                                        @endforeach
                                    </li>
                            @endif

                            <!-- <li class="product-stock-status">Tag: <a href="#">Man</a></li> -->

                            </ul>
                            <div class="share-product-socail-area">
                                <p>Share this product</p>
                                <ul class="single-product-share">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-description-area section-pt">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-details-tab">
                            <ul role="tablist" class="nav">
                                <li class="active" role="presentation">
                                    <a data-toggle="tab" role="tab" href="#description" class="active">Description</a>
                                </li>
                                <li role="presentation">
                                    <a data-toggle="tab" role="tab" href="#reviews">Reviews</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="product_details_tab_content tab-content">
                            <!-- Start Single Content -->
                            <div class="product_tab_content tab-pane active" id="description" role="tabpanel">
                                <div class="product_description_wrap  mt-30">
                                    <div class="product_desc mb-30">
                                        {!! $product->description !!}
                                    </div>

                                </div>
                            </div>
                            <!-- End Single Content -->
                            <!-- Start Single Content -->
                            <div class="product_tab_content tab-pane" id="reviews" role="tabpanel">
                                @include('single-product.review',['product' => $product])
                            </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
            </div>
            @include('single-product.related-products')

        </div>
    </div>
    <!-- main-content-wrap end -->

@endsection
@include('partials.add-to-cart-script')