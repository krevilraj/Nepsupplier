@extends('layouts.app')

@section('content')


<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Product Details</li>
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
                <div class="row single-product-area product-details-inner">
                    <div class="col-lg-5 col-md-6">
                        <!-- Product Details Left -->
                        <div class="product-large-slider">
                            <div class="pro-large-img img-zoom">
                                <img src="{{ asset('images/product-04.jpg') }}" alt="product-details" />
                                <a href="images/product-04.jpg" data-fancybox="images"><i class="fa fa-search"></i></a>
                            </div>
                            <div class="pro-large-img img-zoom">
                                <img src="{{ asset('images/product-04.jpg') }}" alt="product-details" />
                                <a href="images/product-04.jpg" data-fancybox="images"><i class="fa fa-search"></i></a>
                            </div>
                            <div class="pro-large-img img-zoom">
                                <img src="{{ asset('images/product-04.jpg') }}" alt="product-details" />
                                <a href="images/product-04.jpg" data-fancybox="images"><i class="fa fa-search"></i></a>
                            </div>
                            <div class="pro-large-img img-zoom">
                                <img src="{{ asset('images/product-04.jpg') }}" alt="product-details" />
                                <a href="images/product-04.jpg" data-fancybox="images"><i class="fa fa-search"></i></a>
                            </div>
                            <div class="pro-large-img img-zoom">
                                <img src="{{ asset('images/product-04.jpg') }}" alt="product-details" />
                                <a href="images/product-04.jpg" data-fancybox="images"><i class="fa fa-search"></i></a>
                            </div>

                        </div>
                        <div class="product-nav">
                            <div class="pro-nav-thumb">
                                <img src="{{ asset('images/product-05.jpg') }}" alt="product-details" />
                            </div>
                            <div class="pro-nav-thumb">
                                <img src="{{ asset('images/product-11.jpg') }}" alt="product-details" />
                            </div>
                            <div class="pro-nav-thumb">
                                <img src="{{ asset('images/product-07.jpg') }}" alt="product-details" />
                            </div>
                            <div class="pro-nav-thumb">
                                <img src="{{ asset('images/product-08.jpg') }}" alt="product-details" />
                            </div>
                            <div class="pro-nav-thumb">
                                <img src="{{ asset('images/product-12.jpg') }}" alt="product-details" />
                            </div>
                        </div>
                        <!--// Product Details Left -->
                    </div>

                    <div class="col-lg-7 col-md-6">
                        <div class="product-details-view-content">
                            <div class="product-info">
                                <h3>Ornare sed consequat</h3>
                                <div class="product-rating d-flex">
                                    <ul class="d-flex">
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                    </ul>
                                    <a href="#reviews">(<span class="count">1</span> customer review)</a>
                                </div>
                                <div class="price-box">
                                    <span class="new-price">$70.00 - $83.00</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>



                                <div class="single-add-to-cart">
                                    <button class="add-to-cart" type="submit">Buy product</button>

                                </div>
                                <ul class="stock-cont">
                                    <li class="product-sku">Sku: <span>P006</span></li>
                                    <li class="product-stock-status">Categories: <a href="#">Butter & Eggs,</a> <a href="#">Cultured Butter</a></li>
                                    <li class="product-stock-status">Tag: <a href="#">Man</a></li>
                                </ul>
                                <div class="share-product-socail-area">
                                    <p>Share this product</p>
                                    <ul class="single-product-share">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-description-area section-pt">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-details-tab">
                                <ul role="tablist" class="nav">
                                    <li class="active" role="presentation">
                                        <a data-toggle="tab" role="tab" href="#description" class="active">Description</a>
                                    </li>
                                    <li role="presentation">
                                        <a data-toggle="tab" role="tab" href="#reviews">Reviews</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="product_details_tab_content tab-content">
                                <!-- Start Single Content -->
                                <div class="product_tab_content tab-pane active" id="description" role="tabpanel">
                                    <div class="product_description_wrap  mt-30">
                                        <div class="product_desc mb-30">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>

                                            <p>Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget.</p>
                                        </div>

                                    </div>
                                </div>
                                <!-- End Single Content -->
                                <!-- Start Single Content -->
                                <div class="product_tab_content tab-pane" id="reviews" role="tabpanel">
                                    <div class="review_address_inner mt-30">
                                        <!-- Start Single Review -->
                                        <div class="pro_review">
                                            <div class="review_thumb">
                                                <img alt="review images" src="{{ asset('images/reviewer.jpg') }}">
                                            </div>
                                            <div class="review_details">
                                                <div class="review_info mb-10">
                                                    <ul class="product-rating d-flex mb-10">
                                                        <li><span class="icon-star"></span></li>
                                                        <li><span class="icon-star"></span></li>
                                                        <li><span class="icon-star"></span></li>
                                                        <li><span class="icon-star"></span></li>
                                                        <li><span class="icon-star"></span></li>
                                                    </ul>
                                                    <h5>Admin - <span> November 19, 2019</span></h5>

                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in viverra ex, vitae vestibulum arcu. Duis sollicitudin metus sed lorem commodo, eu dapibus libero interdum. Morbi convallis viverra erat, et aliquet orci congue vel. Integer in odio enim. Pellentesque in dignissim leo. Vivamus varius ex sit amet quam tincidunt iaculis.</p>
                                            </div>
                                        </div>
                                        <!-- End Single Review -->
                                    </div>
                                    <!-- Start RAting Area -->
                                    <div class="rating_wrap mt-50">
                                        <h5 class="rating-title-1">Add a review </h5>
                                        <p>Your email address will not be published. Required fields are marked *</p>
                                        <h6 class="rating-title-2">Your Rating</h6>
                                        <div class="rating_list">
                                            <div class="review_info mb-10">
                                                <ul class="product-rating d-flex mb-10">
                                                    <li><span class="icon-star"></span></li>
                                                    <li><span class="icon-star"></span></li>
                                                    <li><span class="icon-star"></span></li>
                                                    <li><span class="icon-star"></span></li>
                                                    <li><span class="icon-star"></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End RAting Area -->
                                    <div class="comments-area comments-reply-area">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <form action="#" class="comment-form-area">
                                                    <div class="row comment-input">
                                                        <div class="col-md-6 comment-form-author mt-15">
                                                            <label>Name <span class="required">*</span></label>
                                                            <input type="text" required="required" name="Name">
                                                        </div>
                                                        <div class="col-md-6 comment-form-email mt-15">
                                                            <label>Email <span class="required">*</span></label>
                                                            <input type="text" required="required" name="email">
                                                        </div>
                                                    </div>
                                                    <div class="comment-form-comment mt-15">
                                                        <label>Comment</label>
                                                        <textarea class="comment-notes" required="required"></textarea>
                                                    </div>
                                                    <div class="comment-form-submit mt-15">
                                                        <input type="submit" value="Submit" class="comment-submit">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="related-product-area section-pt">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h3> Related Product</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row row-8 product-row-6-active">
                        <div class="product-col">
                            <!-- Single Product Start -->
                            <div class="single-product-wrap mt-10">
                                <div class="product-image">
                                    <a href="#"><img src="{{ asset('images/product-01.jpg') }}" alt=""></a>
                                    <span class="onsale">Sale!</span>
                                </div>
                                <div class="product-content">
                                    <div class="price-box">
                                        <span class="new-price">144.00 - 147.00</span>
                                    </div>
                                    <h6 class="product-name"><a href="#">Aliquam lobortis</a></h6>

                                    <div class="product-button-action">
                                        <a href="#" class="add-to-cart">Select </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Product End -->
                        </div>
                         <div class="product-col">
                            <!-- Single Product Start -->
                            <div class="single-product-wrap mt-10">
                                <div class="product-image">
                                    <a href="#"><img src="{{ asset('images/product-02.jpg') }}" alt=""></a>
                                    <span class="onsale">Sale!</span>
                                </div>
                                <div class="product-content">
                                    <div class="price-box">
                                        <span class="new-price">144.00 - 147.00</span>
                                    </div>
                                    <h6 class="product-name"><a href="#">Aliquam lobortis</a></h6>

                                    <div class="product-button-action">
                                        <a href="#" class="add-to-cart">Select </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Product End -->
                        </div>
                        <div class="product-col">
                            <!-- Single Product Start -->
                            <div class="single-product-wrap mt-10">
                                <div class="product-image">
                                    <a href="#"><img src="{{ asset('images/product-03.jpg') }}" alt=""></a>
                                    <span class="onsale">Sale!</span>
                                </div>
                                <div class="product-content">
                                    <div class="price-box">
                                        <span class="new-price">144.00 - 147.00</span>
                                    </div>
                                    <h6 class="product-name"><a href="#">Aliquam lobortis</a></h6>

                                    <div class="product-button-action">
                                        <a href="#" class="add-to-cart">Select </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Product End -->
                        </div>
                         <div class="product-col">
                            <!-- Single Product Start -->
                            <div class="single-product-wrap mt-10">
                                <div class="product-image">
                                    <a href="#"><img src="{{ asset('images/product-04.jpg') }}" alt=""></a>
                                    <span class="onsale">Sale!</span>
                                </div>
                                <div class="product-content">
                                    <div class="price-box">
                                        <span class="new-price">144.00 - 147.00</span>
                                    </div>
                                    <h6 class="product-name"><a href="#">Aliquam lobortis</a></h6>

                                    <div class="product-button-action">
                                        <a href="#" class="add-to-cart">Select </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Product End -->
                        </div>
                         <div class="product-col">
                            <!-- Single Product Start -->
                            <div class="single-product-wrap mt-10">
                                <div class="product-image">
                                    <a href="#"><img src="{{ asset('images/product-05.jpg') }}" alt=""></a>
                                    <span class="onsale">Sale!</span>
                                </div>
                                <div class="product-content">
                                    <div class="price-box">
                                        <span class="new-price">144.00 - 147.00</span>
                                    </div>
                                    <h6 class="product-name"><a href="#">Aliquam lobortis</a></h6>

                                    <div class="product-button-action">
                                        <a href="#" class="add-to-cart">Select </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Product End -->
                        </div>
                         <div class="product-col">
                            <!-- Single Product Start -->
                            <div class="single-product-wrap mt-10">
                                <div class="product-image">
                                    <a href="#"><img src="{{ asset('images/product-06.jpg') }}" alt=""></a>
                                    <span class="onsale">Sale!</span>
                                </div>
                                <div class="product-content">
                                    <div class="price-box">
                                        <span class="new-price">144.00 - 147.00</span>
                                    </div>
                                    <h6 class="product-name"><a href="#">Aliquam lobortis</a></h6>

                                    <div class="product-button-action">
                                        <a href="#" class="add-to-cart">Select </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Product End -->
                        </div>
                         <div class="product-col">
                            <!-- Single Product Start -->
                            <div class="single-product-wrap mt-10">
                                <div class="product-image">
                                    <a href="#"><img src="{{ asset('images/product-07.jpg') }}" alt=""></a>
                                    <span class="onsale">Sale!</span>
                                </div>
                                <div class="product-content">
                                    <div class="price-box">
                                        <span class="new-price">144.00 - 147.00</span>
                                    </div>
                                    <h6 class="product-name"><a href="#">Aliquam lobortis</a></h6>

                                    <div class="product-button-action">
                                        <a href="#" class="add-to-cart">Select </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Product End -->
                        </div>
                    </div>
                </div>

                <div class="related-product-area section-pt">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h3>Upsell Products</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row row-8 product-row-6-active">
                        <div class="product-col">
                            <!-- Single Product Start -->
                            <div class="single-product-wrap mt-10">
                                <div class="product-image">
                                    <a href="#"><img src="{{ asset('images/product-08.jpg') }}" alt=""></a>
                                    <span class="onsale">Sale!</span>
                                </div>

                                <div class="product-content">
                                    <div class="price-box">
                                        <span class="new-price">144.00 - 147.00</span>
                                    </div>
                                    <h6 class="product-name"><a href="#">Aliquam lobortis</a></h6>

                                    <div class="product-button-action">
                                        <a href="#" class="add-to-cart">Select </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Product End -->
                        </div>
                        <div class="product-col">
                            <!-- Single Product Start -->
                            <div class="single-product-wrap mt-10">
                                <div class="product-image">
                                    <a href="#"><img src="{{ asset('images/product-09.jpg') }}" alt=""></a>
                                    <span class="onsale">Sale!</span>
                                </div>

                                <div class="product-content">
                                    <div class="price-box">
                                        <span class="new-price">144.00 - 147.00</span>
                                    </div>
                                    <h6 class="product-name"><a href="#">Aliquam lobortis</a></h6>

                                    <div class="product-button-action">
                                        <a href="#" class="add-to-cart">Select </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Product End -->
                        </div>
                        <div class="product-col">
                            <!-- Single Product Start -->
                            <div class="single-product-wrap mt-10">
                                <div class="product-image">
                                    <a href="#"><img src="{{ asset('images/product-11.jpg') }}" alt=""></a>
                                    <span class="onsale">Sale!</span>
                                </div>

                                <div class="product-content">
                                    <div class="price-box">
                                        <span class="new-price">144.00 - 147.00</span>
                                    </div>
                                    <h6 class="product-name"><a href="#">Aliquam lobortis</a></h6>

                                    <div class="product-button-action">
                                        <a href="#" class="add-to-cart">Select </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Product End -->
                        </div>
                        <div class="product-col">
                            <!-- Single Product Start -->
                            <div class="single-product-wrap mt-10">
                                <div class="product-image">
                                    <a href="#"><img src="{{ asset('images/product-12.jpg') }}" alt=""></a>
                                    <span class="onsale">Sale!</span>
                                </div>

                                <div class="product-content">
                                    <div class="price-box">
                                        <span class="new-price">144.00 - 147.00</span>
                                    </div>
                                    <h6 class="product-name"><a href="#">Aliquam lobortis</a></h6>

                                    <div class="product-button-action">
                                        <a href="#" class="add-to-cart">Select </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Product End -->
                        </div>
                        <div class="product-col">
                            <!-- Single Product Start -->
                            <div class="single-product-wrap mt-10">
                                <div class="product-image">
                                    <a href="#"><img src="{{ asset('images/product-01.jpg') }}" alt=""></a>
                                    <span class="onsale">Sale!</span>
                                </div>

                                <div class="product-content">
                                    <div class="price-box">
                                        <span class="new-price">144.00 - 147.00</span>
                                    </div>
                                    <h6 class="product-name"><a href="#">Aliquam lobortis</a></h6>

                                    <div class="product-button-action">
                                        <a href="#" class="add-to-cart">Select </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Product End -->
                        </div>
                        <div class="product-col">
                            <!-- Single Product Start -->
                            <div class="single-product-wrap mt-10">
                                <div class="product-image">
                                    <a href="#"><img src="{{ asset('images/product-02.jpg') }}" alt=""></a>
                                    <span class="onsale">Sale!</span>
                                </div>

                                <div class="product-content">
                                    <div class="price-box">
                                        <span class="new-price">144.00 - 147.00</span>
                                    </div>
                                    <h6 class="product-name"><a href="#">Aliquam lobortis</a></h6>

                                    <div class="product-button-action">
                                        <a href="#" class="add-to-cart">Select </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Product End -->
                        </div>
                        <div class="product-col">
                            <!-- Single Product Start -->
                            <div class="single-product-wrap mt-10">
                                <div class="product-image">
                                    <a href="product-details.html"><img src="{{ asset('images/product/product-02.jpg') }}" alt=""></a>
                                    <span class="onsale">Sale!</span>
                                </div>
                                <div class="product-button">
                                    <a href="wishlist.html" class="add-to-wishlist"><i class="icon-heart"></i></a>
                                </div>
                                <div class="product-content">
                                    <div class="price-box">
                                        <span class="new-price">14.00</span>
                                        <span class="old-price">18.00</span>
                                    </div>
                                    <h6 class="product-name"><a href="product-details.html">Aliquet auctor sem</a></h6>

                                    <div class="product-button-action">
                                        <a href="#" class="add-to-cart">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Product End -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- main-content-wrap end -->

@endsection