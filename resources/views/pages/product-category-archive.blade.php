@extends('layouts.app')

@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
                        <li class="breadcrumb-item active">Shop</li>
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
            <div class="row">
                <div class="col-lg-3 order-lg-1 order-2">

                    @include('partials.shop-sidebar')
                </div>
                <div class="col-lg-9 order-lg-2 order-1">

                    <div class="shop-banner mb-30">
                        <img src="/images/banner-01.jpg" alt="Shop banner">
                    </div>
                    @if(count($products) <= 0)
                        <div class="alert alert-danger">
                            No products found.
                        </div>
                    @else
                    <!-- shop-product-wrapper start -->
                        <div class="shop-product-wrapper">
                            <div class="row align-itmes-center">
                                <div class="col">
                                    <!-- shop-top-bar start -->
                                    <div class="shop-top-bar">
                                        <!-- product-view-mode start -->

                                        <div class="product-mode">
                                            <!--shop-item-filter-list-->
                                            <ul class="nav shop-item-filter-list" role="tablist">
                                                <li class="active"><a class="active grid-view" data-toggle="tab"
                                                                      href="#grid"><i class="fas fa-th"></i></a></li>
                                                <li><a class="list-view" data-toggle="tab" href="#list"><i
                                                                class="fas fa-list"></i></a></li>
                                            </ul>
                                            <!-- shop-item-filter-list end -->
                                        </div>
                                        <p>Total: {{count($products)}} results found</p>
                                        <!-- product-view-mode end -->
                                        <!-- product-short start -->
                                        <div class="product-short">
                                            <p>Sort By :</p>
                                            <form action="{{ url()->current() }}" method="get">
                                                @php($orderby = app('request')->input('orderby')?app('request')->input('orderby'):1)
                                                <select name="orderby" id="orderby" class="nice-select orderby">
                                                    <option value="1" @if($orderby == 1) selected="selected" @endif>Default sorting</option>
                                                    <option value="2" @if($orderby == 2) selected="selected" @endif>Sort by popularity</option>
                                                    <option value="4" @if($orderby == 4) selected="selected" @endif>Sort by newness</option>
                                                    <option value="5" @if($orderby == 5) selected="selected" @endif>Sort by price: low to high</option>
                                                    <option value="6" @if($orderby == 6) selected="selected" @endif>Sort by price: high to low</option>
                                                </select>
                                            </form>

                                        </div>
                                        <!-- product-short end -->
                                    </div>
                                    <!-- shop-top-bar end -->
                                </div>
                            </div>

                            <!-- shop-products-wrap start -->
                            <div class="shop-products-wrap">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="grid">
                                        <div class="shop-product-wrap">
                                            <div class="row row-8">
                                                @foreach($products as $product)
                                                    <div class="product-col col-lg-3 col-md-4 col-sm-6">
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
                                    <div class="tab-pane" id="list">
                                        @foreach($products as $product)
                                            @include('partials.product-list', ['product' => $product])

                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <!-- shop-products-wrap end -->

                            <!-- paginatoin-area start -->
                            <div class="paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        {{ $products->setPath('shop')->render() }}
                                    </div>
                                </div>
                            </div>
                            <!-- paginatoin-area end -->
                        </div>
                        <!-- shop-product-wrapper end -->
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->


@endsection
@include('partials.add-to-cart-script')
