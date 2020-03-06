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
                    <li class="breadcrumb-item"><a href="{{ route('my-account') }}">My Account</a></li>
                    <li class="breadcrumb-item active">Edit Address</li>
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
                @include('my-account.sidebar')
            </div>
            <div class="col-lg-9 order-lg-2 order-1">


                <!-- shop-product-wrapper start -->
                <div class="shop-product-wrapper">
                    <main id="content" class="site-main" role="main">
                    
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9 col-md-push-3 my-account">
                                    <h1 class="h2 heading-primary font-weight-normal">Edit Address</h1>

                                    @include('partials.message-success')

                                    <form action="{{ route('my-account.update-address.shipping') }}" method="post">
                                        {{ csrf_field() }}
                                        @include('my-account.form-address')
                                    </form>

                                </div>
                            </div>
                        </div>
                    </main>
                </div>
                <!-- shop-product-wrapper end -->
            </div>
        </div>
    </div>
</div>
<!-- main-content-wrap end -->

@endsection
