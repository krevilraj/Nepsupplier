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
                    <li class="breadcrumb-item active">Orders</li>
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
                                    <h1 class="h2 heading-primary font-weight-normal">My Orders</h1>

                                    @include('partials.message-success')

                                    @if(count($orders) <= 0)
                                        <div class="alert alert-danger">
                                            <p>No order has been made yet.</p>
                                        </div>
                                    @else


                                        <table class="table table-bordered table-order-list table-content-align-center mb-none">
                                            <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($orders as $order)
                                                <tr>
                                                    <td><a href="{{ route('my-account.order.view',$order->id )}}">#{{ $order->id }}</a></td>
                                                    <td>{{ \Carbon\Carbon::parse($order->order_date)->format('F j, Y')}}</td>
                                                    <td>
                                                <span class="label label-{{ getOrderStatusClass($order->orderStatus->name) }}">
                                                    {{ $order->orderStatus->name }}
                                                </span>
                                                    </td>
                                                    <td>
                                                        @php
                                                            $priceTotal = 0.00;
                                                            foreach ($order->products as $product){
                                                                $discount = $product->pivot->discount;
                                                                $actualPrice = $product->pivot->price * $product->pivot->qty;

                                                                $discountAmount = $actualPrice * ( $discount / 100 );
                                                                $productSubTotal = $actualPrice - ( $discountAmount );
                                                                $priceTotal += $actualPrice - ( $discountAmount );
                                                            }

                                                            $subTotal = $priceTotal;
                                                            $tax = 0;
                                                            if ($order->enable_tax) {
                                                                $tax = ($subTotal * $order->tax_percentage) / 100;
                                                            }

                                                            $grandTotal = $subTotal + $tax;
                                                        @endphp
                                                        RS <span class="label label-default">{{ number_format($grandTotal, 2) }}</span> for
                                                        <strong>{{ count($order->products) }}</strong> Products
                                                    </td>
                                                    <td>
                                                        @if($order->orderStatus->name == 'Pending')
                                                            <a href="{{ route('my-account.order.cancel',$order->id )}}"
                                                               class="btn btn-sm btn-danger p-6-12"
                                                               onclick="return confirm('Are you sure you want to cancel this order?');">Cancel</a>
                                                        @endif
                                                        <a href="{{ route('my-account.order.view',$order->id )}}"
                                                           class="btn btn-sm btn-info p-6-12">View</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        <div class="pull-right">
                                            {{ $orders->setPath('orders')->render() }}
                                        </div>
                                    @endif

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
