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
                        <li class="breadcrumb-item active">Cart Page</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->
    @if(session('enquiry'))
        <div class="container">
            <div class="alert alert-primary ">
                <strong><i class="fa fa-warning"></i>Out Of Stock!</strong>
                <span class="text-light">The Product You Selecetd Are Out Of Stock !</span>
            </div>
        </div>

    @endif

    @if(Cart::instance('default')->count())
    <!-- main-content-wrap start -->
    <div class="main-content-wrap section-ptb cart-page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#" class="cart-table">
                        <div class="table-content table-responsive">
                            <table class="table cart-table">
                                <thead>
                                <tr>
                                    <th class="plantmore-product-thumbnail">Images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="plantmore-product-price">Unit Price</th>
                                    <th class="plantmore-product-quantity">Quantity</th>
                                    <th class="plantmore-product-subtotal">Total</th>
                                    <th class="plantmore-product-remove">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(Cart::instance('default')->content() as $cartContent)
                                <tr data-row="{{ $cartContent->rowId }}">
                                    <td class="plantmore-product-thumbnail"><a href="javascript:void(0);" href="{{ route('product.show', getProductSlug($cartContent->id)) }}"><img src="{{ asset(getProductImage($cartContent->id, 'small')) }}"
                                                                                             alt="{{ $cartContent->name }}"></a></td>
                                    <td class="plantmore-product-name"><a href="{{ route('product.show', getProductSlug($cartContent->id)) }}">{{ $cartContent->name }}</a></td>
                                    <td class="plantmore-product-price"><span class="amount">{{ $cartContent->price }}</span></td>
                                    <td class="plantmore-product-quantity">
                                        <input class="qty-input" type="number" value="{{ $cartContent->qty }}">
                                    </td>
                                    <td class="product-subtotal"><span class="amount">{{ $cartContent->total }}</span></td>
                                    <td class="plantmore-product-remove"><a href="#" class="btn-remove-row"><i class="fas fa-times"></i></a>

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="coupon-all">

                                    <div class="coupon2">
                                        <input class="submit btn-update-cart" name="update_cart" type="button" value="Update cart">
                                        <a href="/shop" class=" continue-btn">Continue Shopping</a>
                                    </div>


                                </div>
                            </div>
                            <div class="col-md-4 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    @php
                                        $subTotal = str_replace(',', '', Cart::instance('default')->subtotal());
                                        $tax = 0;
                                        if (getConfiguration('enable_tax')) {
                                            $tax = ($subTotal * getConfiguration('tax_percentage')) / 100;
                                        }
                                        $grandTotal = $subTotal + $tax;
                                    @endphp
                                    <ul>
                                        <li>Subtotal <span>RS {{ $subTotal }}</span></li>
                                        <li>Tax <span>RS {{ number_format($tax, 2) }}</span></li>
                                        <li>Total <span>RS {{ number_format($grandTotal, 2) }}</span></li>
                                    </ul>
                                    <a href="{{ route('checkout') }}" class="proceed-checkout-btn">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->
    @else
        <div class="col-md-12">
            <div class="alert alert-success alert-message display-block mb-none">
                <div>
                                <span>No items found in cart.
                                    <a href="{{ url('/shop') }}"
                                       class="btn btn-xs btn-primary pull-right">Back to shop</a>
                                </span>
                </div>
            </div>
        </div>
    @endif



                    {{--<div class="row">
                        @if(Cart::instance('default')->count())
                            <div class="col-md-8 col-lg-9">
                                <div class="cart-table-wrap">
                                    <table class="cart-table">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th>Product Name</th>
                                            <th>Unit Price</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(Cart::instance('default')->content() as $cartContent)
                                            <tr data-row="{{ $cartContent->rowId }}">
                                                <td class="product-action-td">
                                                    <a href="javascript:void(0);" title="Remove product"
                                                       class="btn-remove btn-remove-row">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </td>
                                                <td class="product-image-td">
                                                    <a href="{{ route('product.show', getProductSlug($cartContent->id)) }}"
                                                       title="{{ $cartContent->name }}">
                                                        <img src="{{ asset(getProductImage($cartContent->id, 'small')) }}"
                                                             alt="{{ $cartContent->name }}">
                                                    </a>
                                                </td>
                                                <td class="product-name-td">
                                                    <h2 class="product-name">
                                                        <a href="{{ route('product.show', getProductSlug($cartContent->id)) }}"
                                                           title="{{ $cartContent->name }}">{{ $cartContent->name }}</a>
                                                    </h2>
                                                </td>
                                                <td>RS{{ $cartContent->price }}</td>
                                                <td>
                                                    <div class="qty-holder">
                                                        <a href="javascript:void(0);" class="qty-dec-btn"
                                                           title="Dec">-</a>
                                                        <input type="text" class="qty-input" name="quantity"
                                                               value="{{ $cartContent->qty }}">
                                                        <a href="javascript:void(0);" class="qty-inc-btn"
                                                           title="Inc">+</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="text-primary">RS {{ $cartContent->total }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="6" class="clearfix">
                                                <button class="btn btn-primary btn-update btn-update-cart pull-right"
                                                        disabled>
                                                    Update Cart
                                                </button>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <aside class="col-md-4 col-lg-3 sidebar shop-sidebar">
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse"
                                                   href="#panel-cart-total">
                                                    Cart Totals
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="panel-cart-total" class="accordion-body collapse in">
                                            <div class="panel-body">
                                                <table class="totals-table">
                                                    <tbody>
                                                    @php
                                                        $subTotal = str_replace(',', '', Cart::instance('default')->subtotal());
                                                        $tax = 0;
                                                        if (getConfiguration('enable_tax')) {
                                                            $tax = ($subTotal * getConfiguration('tax_percentage')) / 100;
                                                        }
                                                        $grandTotal = $subTotal + $tax;
                                                    @endphp
                                                    <tr>
                                                        <td>Subtotal</td>
                                                        <td>RS {{ $subTotal }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tax</td>
                                                        <td>RS {{ number_format($tax, 2) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Grand Total</td>
                                                        <td>RS {{ number_format($grandTotal, 2) }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <div class="totals-table-action">
                                                    <a href="{{ route('checkout') }}" class="btn btn-primary btn-block">Proceed
                                                        to Checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                        @else
                            <div class="col-md-12">
                                <div class="alert alert-success alert-message display-block mb-none">
                                    <div>
                                <span>No items found in cart.
                                    <a href="{{ url('/shop') }}"
                                       class="btn btn-xs btn-primary pull-right">Back to shop</a>
                                </span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>--}}

@endsection


@push('scripts')

    <script>
        // Increment quantity
        $(document).on("click", ".qty-inc-btn", function (e) {
            e.preventDefault();
            var $this = $(this);

            var quantity = $this.siblings(".qty-input");
            var val = parseInt(quantity.val());
            quantity.val(val + 1);

            $('.btn-update-cart').prop('disabled', false);

        });

        // Decrement quantity
        $(document).on("click", ".qty-dec-btn", function (e) {
            e.preventDefault();
            var $this = $(this);

            var quantity = $this.siblings(".qty-input");
            var val = parseInt(quantity.val());
            quantity.val(val - 1);
            if (quantity.val() < 0) {
                quantity.val(0);
            }

            $('.btn-update-cart').prop('disabled', false);
        });



        // Update cart
        $(document).on("click", ".btn-update-cart", function (e) {
            e.preventDefault();
            var $this = $(this);

            var cartContents = [];

            $('.cart-table > tbody  > tr').each(function (i, tr) {
                var rowId = $(tr).attr('data-row');
                var quantity = $(tr).find('.qty-input').val();

                cartContents.push({
                    rowId: rowId,
                    quantity: quantity
                });

            });

            if (cartContents) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('cart.update') }}",
                    data: {
                        cartContents: cartContents
                    },
                    beforeSend: function () {
                        $this.prop('disabled', true);
                    },
                    success: function (data) {
                        //
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        //
                    },
                    complete: function () {
                        location.reload();
                    }
                });
            }
        });

        // Remove row
        $(document).on("click", ".btn-remove-row", function (e) {
            e.preventDefault();
            var $this = $(this);

            var rowId = $this.parent().parent().attr('data-row');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ url('cart/destroy')  }}" + '/' + rowId,
                data: {
                    rowId: rowId
                },
                beforeSend: function () {
                    $this.prop('disabled', true);
                },
                success: function (data) {
                    //
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    //
                },
                complete: function () {
                    location.reload();
                }
            });

        });

        $(document).on("click", ".btn-clear", function (e) {
            e.preventDefault();
            var $this = $(this);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('cart.destroy')  }}",
                beforeSend: function () {
                    $this.button('loading');
                },
                success: function (data) {
                    //
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    //
                },
                complete: function () {
                    location.reload();
                }
            });

        });

    </script>

@endpush