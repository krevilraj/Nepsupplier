@php
    $image = $product->getImageAttribute();

@endphp
<div class="images">

    <a href="{{ $image->largeUrl }}" itemprop="image" class="yith_magnifier_zoom woocommerce-main-image " title="4">
        <img  width="400" height="400" id="product-zoom" src="{{ $image->largeUrl }}" class="attachment-shop_single size-shop_single wp-post-image"
             data-zoom-image="{{ $image->largeUrl }}" sizes="(max-width: 400px) 100vw, 400px"
             alt="Product main image">
        {{--<img width="400" height="400" src="file:///N:/xampp/htdocs/ecommerce/wp-content/uploads/2019/04/15-400x400.jpg" class="attachment-shop_single size-shop_single wp-post-image" alt=""  sizes="(max-width: 400px) 100vw, 400px" />--}}
    </a>
    @if($product->getProductGallery())

    <div class="thumbnails slider">
        <ul class="yith_magnifier_gallery">
            @foreach($product->getProductGallery() as $gallery)

            <li class="yith_magnifier_thumbnail {{$loop->first?"first":""}}">
                <a href="{{ $gallery->largeUrl }}" class="yith_magnifier_thumbnail first" title="{{++$loop->index}}" data-small="{{ $gallery->largeUrl }}">
                    <img width="100" height="100" src="{{ $gallery->smallUrl }}" class="attachment-shop_thumbnail size-shop_thumbnail" alt=""/>
                </a>
            </li>
            @endforeach
        </ul>



        <div id="slider-prev"></div>
        <div id="slider-next"></div>
    </div>
    @endif

</div>


{{--
<div class="product-img-box col-sm-5">
    <div class="product-img-box-wrapper">
        <div class="product-img-wrapper">
            <img id="product-zoom" src="{{ $image->largeUrl }}"
                 data-zoom-image="{{ $image->largeUrl }}"
                 alt="Product main image">
        </div>

        <a href="#" class="product-img-zoom" title="Zoom">
            <span class="glyphicon glyphicon-search"></span>
        </a>
    </div>

    @if($product->getProductGallery())
        <div class="owl-carousel manual" id="productGalleryThumbs">
            @foreach($product->getProductGallery() as $gallery)
                <div class="product-img-wrapper">
                    <a href="javascript:void(0
                    );" data-image="{{ $gallery->largeUrl }}"
                       data-zoom-image="{{ $gallery->largeUrl }}"
                       class="product-gallery-item">
                        <img src="{{ $gallery->mediumUrl }}" alt="product">
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>--}}
