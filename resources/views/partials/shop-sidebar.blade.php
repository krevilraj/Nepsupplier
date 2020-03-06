<!-- shop-sidebar-wrap start -->
<div class="categories-menu-wrap mb-30">
    <div class="categories_menu">
        <div class="categories_title">
            <h5 class="categori_toggle">Categories <i class="fas fa-sliders-h pull-right"></i>
            </h5>
        </div>
        <div class="categories_menu_toggle">
            <ul>
                @foreach($categoryMenuList as $menu)
                    @if($loop->index<8)
                        <li class="{{ !empty($menu['child']) ? ' menu_item_children' : '' }}">
                            <a
                                    href="{{ $menu['link'] }}">
                                {{ $menu['label'] }} @if(!empty($menu['child'])) <i
                                        class="fa fa-angle-right"></i> @endif
                            </a>
                            @include('partials.menu', ['menu' => $menu, 'menu_id' => 'category'])
                        </li>
                    @else
                        <li class="hide-child"><a
                                    href="{{ $menu['link'] }}">
                                {{ $menu['label'] }} @if(!empty($menu['child'])) <i
                                        class="fa fa-angle-right"></i> @endif
                            </a>
                            @include('partials.menu', ['menu' => $menu, 'menu_id' => 'category'])
                        </li>
                    @endif
                @endforeach
                @if(count($categoryMenuList)>8)
                    <li class="categories-more-less ">
                        <a class="more-default"><span class="c-more"></span>+ More
                            Categories</a>
                        <a class="less-show"><span class="c-more"></span>- Less Categories</a>
                    </li>
                @endif


            </ul>
        </div>
    </div>
</div>


<div class="shop-sidebar-wrap">

    <div class="shop-box-area">


        <!-- shop-sidebar start -->
        <div class="shop-sidebar mb-30">
            <h4 class="title">Filter By Price</h4>
            <!-- filter-price-content start -->
            <div class="filter-price-content">
                <form id="filter-form" action="{{ url()->current() }}" method="get">
                    <div id="price-slider" class="price-slider"></div>
                    <div class="filter-price-wapper">

                        <a class="add-to-cart-button" href="#">
                            <span onclick="event.preventDefault(); document.getElementById('filter-form').submit();">FILTER</span>
                        </a>
                        <div class="filter-price-cont">

                            <span>Price:</span>
                            <div class="input-type">
                                <input type="text"  id="min-price" readonly=""/>
                            </div>
                            <span>—</span>
                            <div class="input-type">
                                <input type="text"  id="max-price" readonly=""/>
                            </div>
                            <input type="hidden" name="min_price" id="val-min-price">
                            <input type="hidden" name="max_price" id="val-max-price">
                        </div>
                    </div>
                </form>
            </div>
            <!-- filter-price-content end -->
        </div>
        <!-- shop-sidebar end -->


    </div>
</div>
<!-- shop-sidebar-wrap end -->