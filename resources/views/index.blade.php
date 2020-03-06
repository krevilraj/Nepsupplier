@extends('layouts.app')

@section('content')

    <!-- Categories Item Warap Start -->
    <categorylist></categorylist>
    <!-- Categories Item Warap End -->

    <!-- Banner Area Start -->
    <div class="banner-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single-banner mb-30">
                        <a href="{{getConfiguration('first_left_ad_link')?getConfiguration('first_left_ad_link'):"#"}}">
                            @if(getConfiguration('first_left_ad'))
                                <img src="{{ url('storage') . '/' . getConfiguration('first_left_ad') }}"
                                     alt="{{getConfiguration('site_title')?getConfiguration('site_title'):".:Ebancha:."}}">
                            @else
                                <img src="{{ asset('/images/banner-03.jpg') }}" alt="">
                            @endif
                        </a>
                    </div>
                </div>
                <div class="col-lg-6  col-md-6">
                    <div class="single-banner mb-30">
                        <a href="{{getConfiguration('first_right_ad_link')?getConfiguration('first_right_ad_link'):"#"}}">
                            @if(getConfiguration('first_right_ad'))
                                <img src="{{ url('storage') . '/' . getConfiguration('first_right_ad') }}"
                                     alt="{{getConfiguration('site_title')?getConfiguration('site_title'):".:Ebancha:."}}">
                            @else
                                <img src="{{ asset('/images/banner-04.jpg') }}" alt="">
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Area End -->

    <!-- Product Area Start -->
    <div class="product-area section-pt-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3>On Sale Products</h3>
                    </div>
                    <!-- Section Title End -->
                </div>
                <div class="col-lg-6 col-md-6">
                    <!-- Section Title Start -->
                    <div class="view-all-product text-right">
                        <a href="#">View All Products <i class="fas fa-angle-double-right"></i></a>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row row-8 product-two-row-4">
                @foreach($saleProduct as $product)
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
    </div>
    <!-- Product Area Start -->

    <!-- Deals Off Area Start -->
    <div class="deals-offer-area section-pt-100 section-pb-40 dealis-offer-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-3 col-md-4">
                    <div class="deals-offer-title mb-20">
                        <h2>Deals Off The Day</h2>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-9 col-md-8">
                    <div class="row row-8 product-active-lg-4">
                        @foreach($deal_products as $product)
                            <div class="product-col">
                                @component('components.deal-item',[
                                'product_id' => $product->id,
                                'product_name' => $product->name,
                                'deal_expire' => $product->deal_expire,
                                'url' => route('dealProduct.show', $product->slug),
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
            </div>
        </div>
    </div>
    <!-- Deals Off Area End -->

    @if(getConfiguration('products_section_1') !=null)
        <!-- Product Area Start -->
        @if(getConfiguration('products_section_1') != null)
            <div class="product-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h3>Organic Products</h3>
                            </div>
                            <!-- Section Title End -->
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="tabs-categorys-list">
                                <ul class="nav menu-tabs" role="tablist">
                                    @foreach(json_decode(getConfiguration('products_section_1')) as $configuration)
                                        <li class="{{ $loop->first ? 'active' : '' }}"><a
                                                    class="{{ $loop->first ? 'active' : '' }}"
                                                    href="#products_section_1{{ $loop->index }}" role="tab"
                                                    data-toggle="tab">{{ $configuration }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="product-wrapper-four">
                        <div class="tab-content">
                            @foreach(json_decode(getConfiguration('products_section_1')) as $configuration)
                                <div class="tab-pane {{ $loop->first ? 'active' : '' }}"
                                     id="products_section_1{{ $loop->index }}">
                                    <div class="row row-8 product-row-6-active">
                                        @foreach(getProductsByCategory($configuration) as $product)
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
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        @endif
        <!-- Product Area Start -->
    @endif
    <!-- Banner Area Start -->
    <div class="banner-area section-pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single-banner mb-30">
                        <a href="{{getConfiguration('second_left_ad_link')?getConfiguration('second_left_ad_link'):"#"}}">
                            @if(getConfiguration('second_left_ad'))
                                <img src="{{ url('storage') . '/' . getConfiguration('second_left_ad') }}"
                                     alt="{{getConfiguration('site_title')?getConfiguration('site_title'):".:Ebancha:."}}">
                            @else
                                <img src="{{ asset('/images/banner-03.jpg') }}" alt="">
                            @endif
                        </a>
                    </div>
                </div>
                <div class="col-lg-6  col-md-6">
                    <div class="single-banner mb-30">
                        <a href="{{getConfiguration('second_right_ad_link')?getConfiguration('second_right_ad_link'):"#"}}">
                            @if(getConfiguration('second_right_ad'))
                                <img src="{{ url('storage') . '/' . getConfiguration('second_right_ad') }}"
                                     alt="{{getConfiguration('site_title')?getConfiguration('site_title'):".:Ebancha:."}}">
                            @else
                                <img src="{{ asset('/images/banner-04.jpg') }}" alt="">
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Area End -->


    @if($testimonials)
        <!-- Testimonials Area Start -->
        <div class="testimonials-area section-pt-50 section-pb-100 testimonial-bg">
            <div class="container">
                <div class="row testimonial-slider">
                    @foreach($testimonials as $testimonial)
                        <div class="col-lg-4">
                            <div class="testimonial-wrap">
                                <div class="quote-container">
                                    <div class="quote-image">
                                        <img src="{{ null === $testimonial->getImage()  ? $testimonial->getDefaultImage('uploads/avatar.jpg')->url : $testimonial->getImage()->smallUrl }}"
                                             alt="">
                                    </div>
                                    <div class="author">
                                        <ul>
                                            <li class="name">{{ $testimonial->client_name }}</li>

                                            @if($testimonial->client_company)
                                                <li class="title">
                                                    <span>{{ $testimonial->client_company }}</span>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="testimonials-text">
                                        {!! $testimonial->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Testimonials Area End -->
    @endif

    @if(getConfiguration('products_section_2') !=null)
        <!-- Product Area Start -->
        @if(getConfiguration('products_section_2') != null)
            @foreach(json_decode(getConfiguration('products_section_2')) as $configuration)
                <!-- Product Area Start -->
                <div class="product-area section-pt">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Section Title Start -->
                                <div class="section-title">
                                    <h3>{{ $configuration }}</h3>
                                </div>
                                <!-- Section Title End -->
                            </div>
                        </div>

                        <div class="product-wrapper-four">
                            <div class="row row-8 product-row-6-active">

                                @foreach(getProductsByCategory($configuration) as $product)
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
                    </div>
                </div>
                <!-- Product Area Start -->
            @endforeach
        @endif
        <!-- Product Area Start -->
    @endif

@endsection
@include('partials.add-to-cart-script')
