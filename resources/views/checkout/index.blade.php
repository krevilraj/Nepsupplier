@extends('layouts.app')

@section('content')
    <div id="primary" class="content-area">
        <main id="content" class="site-main" role="main">
            <nav class="woocommerce-breadcrumb"><span><a href="{{ route('welcome') }}">Home</a></span> /
                <span>Checkout</span></nav>
            <div class="checkout">
                <div class="container">
                    <div class="row">
                        @if(Cart::instance('default')->count())
                            <form action="{{ route('checkout.store') }}" method="post">
                                {{ csrf_field() }}
                                @if(isset($address->id))
                                    <input type="hidden" name="address_id" value="{{ $address->id }}">
                                @endif
                                @include('checkout.form')
                            </form>
                        @else
                            <div class="col-md-12">
                                <div class="well">
                                    <p><strong>No items found in cart.</strong></p>
                                    <p><a href="{{ url('/shop') }}" class="btn btn-sm btn-primary">Back to shop</a></p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </main>
    </div>


@endsection

@push('scripts')

@endpush