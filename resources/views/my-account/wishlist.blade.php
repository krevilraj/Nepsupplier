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
                        <li class="breadcrumb-item active">Wishlist Page</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <!-- main-content-wrap start -->
    <div class="main-content-wrap section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#" class="cart-table">
                        <div class=" table-content table-responsive">
                            @include('partials.message-success')

                            @if(count($wishlists) <= 0)
                                <div class="alert alert-danger">
                                    <p>No products in wishlist.</p>
                                </div>
                            @else
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="plantmore-product-thumbnail">Images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="plantmore-product-price">Unit Price</th>
                                        <th class="plantmore-product-stock-status">Stock Status</th>
                                        <th class="plantmore-product-add-cart">Add to cart</th>
                                        <th class="plantmore-product-remove">Remove</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($wishlists as $wishlist)

                                        <tr>
                                            <td class="plantmore-product-thumbnail"><a
                                                        href="{{ route('product.show', $wishlist->product->slug) }}"><img
                                                            src="{{ $wishlist->product->getImageAttribute()->mediumUrl }}"
                                                            alt="{{ $wishlist->product->name }}"></a></td>
                                            <td class="plantmore-product-name"><a
                                                        href="{{ route('product.show', $wishlist->product->slug) }}">{{ $wishlist->product->name }}</a>
                                            </td>
                                            <td class="plantmore-product-price">
                                                @if(null !== $wishlist->product->getSalePriceAttribute())
                                                    <span class="new-price">NRS {{ $wishlist->product->getSalePriceAttribute() }}</span>
                                                    <span class="old-price">NRS {{ $wishlist->product->getRegularPriceAttribute() }}</span>

                                                @else
                                                    <span class="new-price">NRS {{ $wishlist->product->getRegularPriceAttribute() }}</span>
                                                @endif
                                                {{--<span class="amount">$23.39</span>--}}
                                            </td>
                                            <td class="plantmore-product-stock-status"><span
                                                        class="in-stock">{{ $wishlist->product->in_stock != 0 ? 'In Stock' : 'Out Of Stock' }}</span></td>
                                            <td class="plantmore-product-add-cart">
                                                <a href="#" onclick="event.preventDefault(); document.getElementById('add-form').submit();">add to cart</a>
                                                @unless($wishlist->product->disable_price)
                                                    <form id="add-form" action="{{ route('cart.store' )}}" class="whishlist-atc"
                                                          method="post">
                                                        <input type="hidden" name="product"
                                                               value="{{ $wishlist->product->id }}">
                                                        <input type="hidden" name="quantity" value="1">
                                                        {{ csrf_field() }}

                                                    </form>
                                                @endunless

                                            </td>
                                            <td class="plantmore-product-remove">

                                                <a href="#"
                                                   onclick="event.preventDefault(); document.getElementById('delete-form').submit();"><i
                                                            class="fas fa-times"></i></a>
                                                <form id="delete-form"
                                                      action="{{ route('my-account.wishlist.destroy',$wishlist->product->id )}}"
                                                      method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <!-- main-content-wrap end -->
{{--

    @foreach($wishlists as $wishlist)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                <a href="{{ route('product.show', $wishlist->product->slug) }}">
                    {{ $wishlist->product->name }}
                </a>
            </td>
            <td>{{ humanizeDate($wishlist->created_at) }}</td>
            <td class="actions">
                @unless($wishlist->product->disable_price)
                    <form action="{{ route('cart.store' )}}" class="whishlist-atc"
                          method="post">
                        <input type="hidden" name="product"
                               value="{{ $wishlist->product->id }}">
                        <input type="hidden" name="quantity" value="1">
                        {{ csrf_field() }}
                        <input type="submit" value="Add To Cart"
                               class="btn btn-sm btn-primary p-6-12">
                    </form>
                @endunless
                <form action="{{ route('my-account.wishlist.destroy',$wishlist->product->id )}}"
                      method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">

                    <input type="submit" value="Delete"
                           class="btn btn-sm btn-danger p-6-12">
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
        </table>

        <div class="pull-right">
            --}}
{{--{{ $wishlists->setPath('wishlist')->render() }}--}}{{--

        </div>
        @endif

        </div>

        </div>
        </div>
        </main>
        </div>
        @include('my-account.sidebar')



@endsection
--}}
