<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

@yield('meta')

<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    @if(getConfiguration('site_favicon'))
        <link rel="shortcut icon" href="{{ url('storage') . '/' . getConfiguration('site_favicon') }}"
              type="image/x-icon"/>
    @endif

    <title>{{getConfiguration('site_title')}}</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Icon Font CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fancy-box.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jqueryui.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')
</head>
<body>

<div class="main-wrapper" id="app">
    <header class="header">
        <div class="topbar-outer">
            <div class="container">
                @if(getConfiguration('facebook_link') || getConfiguration('twitter_link') || getConfiguration('googleplus_link') || getConfiguration('instagram_link') || getConfiguration('linkedin_link'))
                    <div class="topbar-left">
                        <div class="topbar-social">
                            @if(getConfiguration('facebook_link'))
                                <div class="social-facebook content">
                                    <a href="{{ getConfiguration('facebook_link') }}" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a>
                                </div>
                            @endif
                            @if(getConfiguration('twitter_link'))
                                <div class="social-twitter content">
                                    <a href="{{ getConfiguration('twitter_link') }}" target="_blank"><i
                                                class="fab fa-twitter"></i></a>
                                </div>
                            @endif
                            @if(getConfiguration('instagram_link'))
                                <div class="social-instagram content">
                                    <a href="{{ getConfiguration('instagram_link') }}" target="_blank"><i
                                                class="fab fa-instagram"></i></a>
                                </div>
                            @endif
                            @if(getConfiguration('linkedin_link'))
                                <div class="social-linkedin content">
                                    <a href="{{ getConfiguration('linkedin_link') }}" target="_blank"><i
                                                class="fab fa-linkedin"></i></a>
                                </div>
                            @endif
                        </div>
                    </div>

                @endif


                <div class="topbar-right">
                    <div class="header-menu-links">
                        <ul id="menu-header-top-links" class="header-menu">
                            <li id="menu-item-3249"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-2709 current_page_item menu-item-3249">
                                <a href="index.php" aria-current="page">Home</a>
                            </li>
                            <li id="menu-item-3250"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3250">
                                <a href="/about-us">About Us</a>
                            </li>
                            @if(!Auth::check())
                                <li><a href="/login" class="login show-login-link">Login / Register</a></li>
                            @else
                                @role(['admin', 'manager','shop-manager'])
                                <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                                @endrole
                                <li><a href="{{ route('my-account') }}">My Account</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            @endif

                        </ul>
                    </div>


                </div>
            </div>
        </div>

        <!-- haeader Mid Start -->
        <div class="haeader-mid-area  border-bm-1 d-none d-lg-block ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-5">
                        <div class="logo-area">
                            <a href="/">
                                @if(getConfiguration('site_logo'))
                                    <img src="{{ url('storage') . '/' . getConfiguration('site_logo') }}"
                                         alt="{{getConfiguration('site_title')?getConfiguration('site_title'):".:Ebancha:."}}">
                                @else
                                    <img src="{{ asset('/images/logo.png') }}" alt="">
                                @endif
                            </a>

                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="search-box-wrapper">
                            <div class="search-box-inner-wrap">
                                <form class="search-box-inner" action="{{ route('search') }}" method="get">
                                    <div class="search-select-box">
                                        <select class="nice-select" name="cat">
                                            <option value="volvo">All</option>
                                            @foreach($productCategories as $productCategory)
                                                <option value="{{ $productCategory->id }}">{{ $productCategory->name }}</option>
                                                @include('partials.dropdown-categories')
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="search-field-wrap">
                                        <input type="text" name="q" class="search-field"
                                               placeholder="Search product...">

                                        <div class="search-btn">
                                            <button><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="customer-wrap green-bg">
                            <div class="single-costomer-box">
                                <div class="single-costomer">
                                    <p><i class="far fa-check-circle"></i><span>Free Delivery</span></p>
                                </div>
                            </div>

                            <div class="single-costomer-box">
                                <div class="single-costomer">
                                    <p><i class="fas fa-lock"></i><span>Safe Payment</span></p>
                                </div>
                            </div>

                            <div class="single-costomer-box">
                                <div class="single-costomer">
                                    <p><i class="far fa-bell"></i><span>24/7 Support</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- haeader Mid End -->

        <!-- haeader bottom Start -->
        <div class="haeader-bottom-area bg-gren header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9 d-none d-lg-block">

                        <div class="main-menu-area white_text">
                            <!--  Start Mainmenu Nav-->
                            <nav class="main-navigation">
                                <ul>
                                    @foreach($menuList as $menu)
                                        <li>
                                            <a
                                                    href="{{ $menu['link'] }}">
                                                {{ $menu['label'] }}
                                                {!! !empty($menu['child']) ? ' <i class="fa fa-angle-down"></i>' : '' !!}
                                            </a>
                                            @include('partials.main_menu', ['menu' => $menu])
                                        </li>
                                    @endforeach

                                </ul>
                            </nav>

                        </div>
                    </div>

                    <div class="col-5 col-md-6 d-block d-lg-none">
                        <div class="logo"><a href="#">
                                @if(getConfiguration('site_logo'))
                                    <img src="{{ url('storage') . '/' . getConfiguration('site_logo') }}"
                                         alt="{{getConfiguration('site_title')?getConfiguration('site_title'):".:Ebancha:."}}">
                                @else
                                    <img src="{{ asset('/images/logo.png') }}" alt="">
                                @endif
                            </a></div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-7">
                        <div class="right-blok-box text-white d-flex">
                            <div class="user-wrap">
                                <a href="{{ route('my-account.wishlist') }}"><span class="cart-total"
                                                                                   id="wishcount">{{getWhislistCount()}}</span><i
                                            class="far fa-heart"></i></a>
                            </div>


                            <div class="shopping-cart-wrap" id="mini-cart">
                                <a href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart"></i></i><span
                                            class="cart-total">{{ Cart::instance('default')->count() }}</span> </a>
                                @if(Cart::instance('default')->count())
                                    <ul class="mini-cart">
                                        @foreach(Cart::content() as $cartContent)
                                            <li class="cart-item">
                                                <div class="cart-image">
                                                    <a href="{{ url('/product' . '/' . getProductSlug($cartContent->id)) }}"><img
                                                                alt="{{ $cartContent->name }}"
                                                                src="{{ asset(getProductImage($cartContent->id, 'small')) }}"></a>
                                                </div>
                                                <div class="cart-title">
                                                    <a href="{{ url('/product' . '/' . getProductSlug($cartContent->id)) }}">
                                                        <h4>{{ $cartContent->name }}</h4>
                                                    </a>
                                                    <div class="quanti-price-wrap">
                                                        <span class="quantity">{{ $cartContent->qty }} ×</span>
                                                        <div class="price-box"><span
                                                                    class="new-price">NRs{{ $cartContent->price }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                        <li class="subtotal-box">
                                            <div class="subtotal-title">
                                                <h3>Total :</h3><span>Rs {{ Cart::instance('default')->total() }}</span>
                                            </div>
                                        </li>
                                        <li class="mini-cart-btns">
                                            <div class="cart-btns">
                                                <a href="{{ route('cart.index') }}">View cart</a>
                                                <a href="{{ route('checkout') }}">Checkout</a>
                                            </div>
                                        </li>
                                    </ul>
                                @endif
                            </div>

                            <!-- <div class="user-wrap padding-left-15">
                                <a href="/login"><i class="far fa-user"></i>Dashboard</a>
                            </div> -->
                            <div class="padding-left-15 uppercase semi-bold padding-right-0">

                            <!-- @role(['admin', 'manager','shop-manager'])
                                <a href="{{ route('dashboard.index') }}" class="font-16">Dashboard</a>
                                @endrole
                                @if(Auth::check())
                                <a href="{{ route('my-account') }}" class="font-16">My Account</a>
                                @else
                                <a href="/login" class="font-16">Login</a>
@endif -->

                            </div>

                            <div class="mobile-menu-btn d-block d-lg-none">
                                <div class="off-canvas-btn">
                                    <a href="#"><img src="{{ asset('images/bg-menu.png') }}" alt=""></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- haeader bottom End -->

        <!-- off-canvas menu start -->
        <aside class="off-canvas-wrapper">
            <div class="off-canvas-overlay"></div>
            <div class="off-canvas-inner-content">
                <div class="btn-close-off-canvas">
                    <i class="fas fa-times"></i>
                </div>

                <div class="off-canvas-inner">

                    <div class="search-box-offcanvas">
                        <form>
                            <input type="text" placeholder="Search product...">
                            <button class="search-btn"><i class="fa fa-search"></i></button>
                        </form>
                    </div>

                    <!-- mobile menu start -->
                    <div class="mobile-navigation">

                        <!-- mobile menu navigation start -->
                        <nav>
                            <ul class="mobile-menu">
                                <li><a href="#">Home</a></li>
                                <li class="menu-item-has-children "><a href="#">About Us</a>
                                    <ul class="dropdown">
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">About Us</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#">Products</a>
                                    <ul class="megamenu dropdown">
                                        <li class="mega-title has-children"><a href="#">Kitchen</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Kitchen</a></li>
                                                <li><a href="#">Kitchen</a></li>
                                                <li><a href="#">Kitchen</a></li>
                                                <li><a href="#">Kitchen</a></li>
                                                <li><a href="#">Kitchen</a></li>
                                            </ul>
                                        </li>
                                        <li class="mega-title has-children"><a href="#">Kitchen</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Kitchen</a></li>
                                                <li><a href="#">Kitchen</a></li>
                                                <li><a href="#">Kitchen</a></li>
                                                <li><a href="#">Kitchen</a></li>
                                                <li><a href="#">Kitchen</a></li>
                                            </ul>
                                        </li>
                                        <li class="mega-title has-children"><a href="#">Kitchen</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Kitchen</a></li>
                                                <li><a href="#">Kitchen</a></li>
                                                <li><a href="#">Kitchen</a></li>
                                                <li><a href="#">Kitchen</a></li>
                                                <li><a href="#">Kitchen</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>


                                <li><a href="search.html">Search</a></li>
                                <li><a href="product-details.html">Product Details</a></li>
                                <li><a href="contact-us.html">Contact</a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->


                    <!-- offcanvas widget area start -->
                    <div class="offcanvas-widget-area">
                        <div class="top-info-wrap text-left text-black">
                            <h5>My Account</h5>
                            <ul class="offcanvas-account-container">
                                <li><a href="my-account.html">My account</a></li>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                            </ul>
                        </div>

                    </div>
                    <!-- offcanvas widget area end -->
                </div>
            </div>
        </aside>
        <!-- off-canvas menu end -->

    </header>

@if(Route::currentRouteName() == 'welcome')
    <!-- Hero Section Start -->
        <div class="hero-slider-area">

            <div class="container">
                <div class="row">

                    <div class="col-lg-3">
                        <div class="categories-menu-wrap mt-30">
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
                    </div>

                    <div class="col-lg-9">
                        <div class="hero-slider-wrapper mt-30">
                            <!-- Hero Slider Start -->

                            @if($slideshows->isNotEmpty())
                                <div class="hero-slider-area hero-slider-one">
                                    <div class="swiper-container gallery-top">
                                        <div class="swiper-wrapper">
                                            @foreach($slideshows as $slideshow)
                                                <div class="swiper-slide"
                                                     style="background-image:url({{ asset(optional($slideshow->getImage())->largeSlideshowUrl)}}">
                                                    <div class="hero-content-one">
                                                        <div class="slider-content-text">
                                                            <h2>{!! $slideshow->title !!}</h2>
                                                            <p>{!! $slideshow->sub_title !!}</p>

                                                            <div class="slider-btn">
                                                                <a href="{{$slideshow->link?$slideshow->link:"#"}}">shopping
                                                                    Now</a>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            @endforeach

                                        </div>

                                        <!-- Add Arrows -->
                                        <!--<div class="swiper-button-next swiper-button-white"></div>
                                <div class="swiper-button-prev swiper-button-white"></div>-->

                                        <div class="swiper-pagination"></div>
                                    </div>
                                    <div class="swiper-container gallery-thumbs">
                                        <div class="swiper-wrapper">

                                            @foreach($slideshows as $slideshow)
                                                <div class="swiper-slide">
                                                    <div class="slider-thum-text"><span>{!! $slideshow->title !!}</span>
                                                    </div>

                                                </div>
                                            @endforeach

                                        </div>

                                    </div>
                                </div>
                            @else
                                <div class="hero-slider-area hero-slider-one">
                                    <div class="swiper-container gallery-top">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"
                                                 style="background-image:url({{ asset('images/slide-bg-1.jpg') }})">
                                                <div class="hero-content-one">
                                                    <div class="slider-content-text">
                                                        <h2>Double BBQ <br>Bacon Cheese 2019 </h2>

                                                        <p>Exclusive Offer -20% Off This Week </p>
                                                        <div class="slider-btn">
                                                            <a href="#">shopping Now</a>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="swiper-slide"
                                                 style="background-image:url({{ asset('images/slide-bg-2.jpg') }} )">
                                                <div class="hero-content-one">
                                                    <div class="slider-content-text">
                                                        <h2>ADAM Apple <br>Big Sale 20% Off </h2>
                                                        <p>Exclusive Offer -20% Off This Week </p>
                                                        <div class="slider-btn">
                                                            <a href="#">shopping Now</a>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="swiper-slide"
                                                 style="background-image:url(images/slide-bg-3.jpg)">
                                                <div class="hero-content-one">
                                                    <div class="slider-content-text">
                                                        <h2>The Smart <br> Way To Eat Nuts</h2>
                                                        <p>Exclusive Offer -20% Off This Week </p>
                                                        <div class="slider-btn">
                                                            <a href="#">shopping Now</a>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="swiper-slide"
                                                 style="background-image:url(images/slide-bg-4.jpg)">
                                                <div class="hero-content-one">
                                                    <div class="slider-content-text">
                                                        <h2>Fresh Fruits <br>Super Discount</h2>

                                                        <p>Exclusive Offer -20% Off This Week </p>
                                                        <div class="slider-btn">
                                                            <a href="#">shopping Now</a>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                        <!-- Add Arrows -->
                                        <!--<div class="swiper-button-next swiper-button-white"></div>
                                <div class="swiper-button-prev swiper-button-white"></div>-->

                                        <div class="swiper-pagination"></div>
                                    </div>
                                    <div class="swiper-container gallery-thumbs">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="slider-thum-text"><span>Double BBQ Bacon Cheese 2019</span>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="slider-thum-text"><span>ADAM Apple Big Sale 20% Off</span>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="slider-thum-text"><span>The Smart  Way To Eat Nuts</span>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="slider-thum-text"><span>Fresh Fruits Super Discount</span>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                        @endif
                        <!-- Hero Slider End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Section End -->
    @endif


    @yield('content')

    @if($brands)
        <div class="our-brand-area section-pb-50 brand-bg">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3>Our Brands</h3>
                        </div>
                        <!-- Section Title End -->
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="our-brand-active">
                            @foreach($brands as $brand)
                                <div class="brand-group">
                                    <div class="brand-item">
                                        <a href="{{ $brand->link }}" target="_blank"><img
                                                    src="{{ optional($brand->getImage())->url }}"
                                                    alt="{{ $brand->name }}"></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <footer>
        <div class="footer-top section-pb section-pt-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">

                        <div class="widget-footer mt-40">
                            <h6 class="title-widget">Contact Info</h6>

                            <div class="contact-call-wrap">
                                <i class="fas fa-headphones"></i>
                                <div class="footer-call">
                                    <p>Hotline Free 24/24:</p>
                                    <h6>(+977) 123 456 789</h6>
                                </div>
                            </div>
                            <div class="footer-addres">
                                <p>Kathmandu , Nepal</p>
                                <p>Contact@domain.com</p>
                            </div>

                            @if(getConfiguration('facebook_link') || getConfiguration('twitter_link') || getConfiguration('googleplus_link') || getConfiguration('instagram_link') || getConfiguration('linkedin_link'))
                                <ul class="social-icons">
                                    @if(getConfiguration('facebook_link'))
                                        <li>
                                            <a href="{{ getConfiguration('facebook_link') }}"
                                               class="facebook social-icon" target="_blank"
                                               title="Facebook">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if(getConfiguration('twitter_link'))
                                        <li>
                                            <a href="{{ getConfiguration('twitter_link') }}" class="twitter social-icon"
                                               target="_blank" title="Twitter">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if(getConfiguration('linkedin_link'))
                                        <li>
                                            <a href="{{ getConfiguration('linkedin_link') }}"
                                               class="linkedin social-icon" target="_blank" title="Linkedin">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            @endif


                        </div>

                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widget-footer mt-40">
                            <h6 class="title-widget">Information</h6>
                            <ul class="footer-list">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Quick Contact</a></li>
                                <li><a href="#">Blog Pages</a></li>
                                <li><a href="#">Concord History</a></li>
                                <li><a href="#">Client Feed</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widget-footer mt-40">
                            <h6 class="title-widget">Extras</h6>
                            <ul class="footer-list">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Quick Contact</a></li>
                                <li><a href="#">Blog Pages</a></li>
                                <li><a href="#">Concord History</a></li>
                                <li><a href="#">Client Feed</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="widget-footer mt-40">
                            <h6 class="title-widget">Get the app</h6>
                            <p>GreenLife App is now available on Google Play & App Store. Get it now.</p>
                            <ul class="footer-list">
                                <li><img src="images/img-googleplay.jpg" alt=""></li>
                                <li><img src="images/img-appstore.jpg" alt=""></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="newletter-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="newletter-wrap">
                            <div class="row align-items-center">
                                <div class="col-lg-3 col-md-12">
                                    <div class="newsletter-title mb-30">
                                        <h3>Join Our <br><span>Newsletter Now</span></h3>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-5">
                                    <div class="newsletter-dec mb-30">
                                        <p>Join 60.000+ subscribers and get a new discount coupon on every
                                            Wednesday.</p>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-7">
                                    <div class="newsletter-footer mb-30">
                                        <form id="newsletterForm111" action="/suscriber" method="POST">
                                            {{csrf_field()}}
                                            <div class="input-group">
                                                <input placeholder="Your email address..."
                                                       name="newsletterEmail" required
                                                       id="newsletterEmail" type="text">
                                                <span class="input-group-btn">
                                                    <div class="subscribe-button">
                                                        <button class="subscribe-btn" type="submit">Subscribe</button>
                                                    </div>
                                                </span>
                                            </div>
                                        </form>
                                        {{--<input type="text" placeholder="Your email address...">
                                        <div class="subscribe-button">
                                            <button class="subscribe-btn">Subscribe</button>
                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="copy-left-text">
                            @if(getConfiguration('copyright'))
                                {{ getConfiguration('copyright') }}
                            @else
                                <p>Copyright &copy; <a
                                            href="#">{{getConfiguration('site_title')?getConfiguration('site_title'):"E-bancha"}}</a> {{ date('Y') }}
                                    . All Right Reserved.</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="copy-right-image">
                            <img src="assets/images/icon/img-payment.png" alt="">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>

<!-- JS
============================================ -->
<script src="{{ asset('js/app.js') }}"></script>
<!-- Modernizer JS -->
<script src="{{ asset('js/modernizr-3.6.0.min.js') }}"></script>
<!-- jQuery JS -->
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- Plugins JS -->
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/swiper.min.js') }}"></script>
<script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/countdown.min.js') }}"></script>
<script src="{{ asset('js/image-zoom.min.js') }}"></script>
<script src="{{ asset('js/fancybox.js') }}"></script>
<script src="{{ asset('js/scrollup.min.js') }}"></script>
<script src="{{ asset('js/jqueryui.min.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('js/main.js') }}"></script>

@stack('scripts')


</body>