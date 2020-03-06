<a href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart"></i><span
            class="cart-total">{{ count($cartContents) }}</span>
</a>


<ul class="mini-cart">
    @if(count($cartContents))
        @foreach($cartContents as $cartContent)
            <li class="cart-item">
                <div class="cart-image">
                    <a href="{{ route('product.show', getProductSlug($cartContent->id)) }}"><img alt="{{ $cartContent->name }}" src="{{ asset(getProductImage($cartContent->id, 'small')) }}"></a>
                </div>
                <div class="cart-title">
                    <a href="#">
                        <h4>{{ $cartContent->name }}</h4>
                    </a>
                    <div class="quanti-price-wrap">
                        <span class="quantity">{{ $cartContent->qty }} x</span>
                        <div class="price-box"><span class="new-price">NRs {{ $cartContent->price }}</span></div>
                    </div>
                </div>
            </li>
        @endforeach
        <li class="subtotal-box">
            <div class="subtotal-title">
                <h3>Total :</h3><span>Rs{{ $cartTotal }}</span>
            </div>
        </li>
        <li class="mini-cart-btns">
            <div class="cart-btns">
                <a href="{{ route('cart.index') }}">View cart</a>
                <a href="{{ route('checkout') }}">Checkout</a>
            </div>
        </li>
    @else
        <li class="subtotal-box">
            <div class="subtotal-title">
                <h3>No products in cart.</h3>
            </div>
        </li>
    @endif
</ul>