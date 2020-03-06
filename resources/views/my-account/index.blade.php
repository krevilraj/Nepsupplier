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
                    <li class="breadcrumb-item active">My-Account</li>
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
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="panel-box">
                                    <h1 class="dash-title">Welcome @if(isset($shippingAddress))
                                            {{ $shippingAddress->first_name . ' ' . $shippingAddress->last_name }}
                                        @endif</h1>


                                    <div class="panel-box-title">
                                        <h3>ADDRESS BOOK</h3>
                                        <a href="{{ route('my-account.edit-address.shipping') }}" class="panel-box-edit">Edit
                                            Address</a>
                                    </div>

                                    <div class="panel-box-content">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <address>
                                                    @if(!isset($shippingAddress))
                                                        You have not set a default address.
                                                    @else
                                                        <h2 style="color: #57BC90">  {{ $shippingAddress->first_name . ' ' . $shippingAddress->last_name }}
                                                        </h2>
                                                        {{ $shippingAddress->address1 . ' ' . $shippingAddress->address2 }}
                                                        <br>
                                                        {!! isset($shippingAddress->city) ? $shippingAddress->city .'<br/>' : '' !!}
                                                        {!! isset($shippingAddress->state_id->name) ? $shippingAddress->state_id->name . '<br/>' : '' !!}
                                                        {{ $shippingAddress->postcode }}
                                                    @endif
                                                </address>
                                            </div>
                                        </div>
                                    </div>
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
