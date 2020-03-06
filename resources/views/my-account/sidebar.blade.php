<!-- shop-sidebar-wrap start -->
                        <div class="shop-sidebar-wrap">
                            <div class="shop-box-area">

                                <!--sidebar-categores-box start  -->
                                <div class="sidebar-categores-box shop-sidebar mb-30">
                                    <h4 class="title">Dashboard</h4>
                                    <!-- category-sub-menu start -->
                                    <div class="category-sub-menu user-nav">
                                        <ul>
                                            @php($route = Route::currentRouteName())
                                            <li class="{{ $route == 'my-account' ? 'active': null }} has-user">
                                                <a href="{{ route('my-account') }}"><i class="fa fa-dashboard"></i>Dashboard</a>
                                            </li>
                                            <li class="{{ ($route == 'my-account.orders' || $route == 'my-account.order.view') ? 'active': null }} has-user">
                                                <a href="{{ route('my-account.orders') }}"><i class="fa fa-shopping-cart"></i>Orders</a>
                                            </li>

                                            <li class="{{ ($route == 'my-account.edit-address' || $route == 'my-account.edit-address.shipping') ? 'active': null }} has-user">
                                                <a href="{{ route('my-account.edit-address') }}"><i class="fa fa-map-marker"></i>Addresses</a>
                                            </li>
                                            <li class="{{ $route == 'my-account.edit-account' ? 'active': null }} has-user">
                                                <a href="{{ route('my-account.edit-account') }}"><i class="fa fa-user"></i>Account Information</a>
                                            </li>
                                            @unless(isset(auth()->user()->provider))
                                                <li class="{{ $route == 'my-account.change-password' ? 'active': null }} has-user">
                                                    <a href="{{ route('my-account.change-password') }}"><i class="fa fa-key"></i>Change Password</a>
                                                </li>
                                            @endunless
                                            <li class="{{ $route == 'my-account.wishlist' ? 'active': null }} has-user">
                                                <a href="{{ route('my-account.wishlist') }}"><i class="fa fa-heart"></i>My Wishlist</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>Logout</a>
                                            </li>
                                        </ul>
                                    
                                        </ul>
                                    </div>
                                    <!-- category-sub-menu end -->
                                </div>
                                <!--sidebar-categores-box end  -->
                            </div>
                        </div>
                        <!-- shop-sidebar-wrap end -->