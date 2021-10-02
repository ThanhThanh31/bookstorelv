@extends('client.template.master')
@section('content')
    <div class="welcome-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wlc-setion-title text-center mt-100">
                        <h4>Hello world ! </h4>
                        <h2>Welcome to store</h2>
                        <p>We are a team of designers and developers that create high quality Magento, Prestashop, Opencart
                            themes and provide premium and dedicated support to our products.</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="welcome-imgae mt-50">
                        <a href="#">
                            <img src="{{ asset('template_client/img/banner/welcome.jpg') }}" alt="">
                        </a>
                        <span class="text_right">company history</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- welcome-area end -->


    <!-- section-area start -->
    <div class="section-area bg-color">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- corporate-about-section start -->
                    <div class="corporate-about-section">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <!-- single-corporate-wrap start -->
                                <div class="single-corporate-wrap mt-35">
                                    <div class="corporate-icon">
                                        <i class="icon-globe-alt icons"></i>
                                    </div>
                                    <div class="corporate-info">
                                        <p>free shipping</p>
                                        <span>Free shipping on all order</span>
                                    </div>
                                </div>
                                <!-- single-corporate-wrap end -->
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <!-- single-corporate-wrap start -->
                                <div class="single-corporate-wrap mt-35">
                                    <div class="corporate-icon">
                                        <i class="icon-earphones-alt icons"></i>
                                    </div>
                                    <div class="corporate-info">
                                        <p>Online Support 24/7</p>
                                        <span>We support online 24 hours</span>
                                    </div>
                                </div>
                                <!-- single-corporate-wrap end -->
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <!-- single-corporate-wrap start -->
                                <div class="single-corporate-wrap mt-35">
                                    <div class="corporate-icon">
                                        <i class="icon-reload icons"></i>
                                    </div>
                                    <div class="corporate-info">
                                        <p>Money Back Guarantee!</p>
                                        <span>30 day money back guarantee!</span>
                                    </div>
                                </div>
                                <!-- single-corporate-wrap end -->
                            </div>
                        </div>
                    </div>
                    <!-- corporate-about-section end -->

                    <!-- product-module-2-area start -->
                    <div class="product-module-2-area border-solid-1 ptb-100">
                        <div class="row">
                            <div class="product-module-2-active owl-carousel">
                                <div class="list-syle-item">
                                    <div class="product-wrap">
                                        <div class="product-thumb right-thumb">
                                            <a href="single-product.html">
                                                <img class="primary-image"
                                                    src="{{ asset('template_client/img/product/2.jpg') }}" alt="">
                                                <img class="secondary-image"
                                                    src="{{ asset('template_client/img/product/1.jpg') }}" alt="">
                                            </a>
                                            <div class="action-links">
                                                <a href="#" class="quick-view" title="Quick View" data-toggle="modal"
                                                    data-target="#exampleModalCenter"><i
                                                        class="icon-magnifier icons"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-caption right-caption text-right">
                                            <h4 class="product-name"><a href="single-product.html">Simple Product 001</a>
                                            </h4>
                                            <p class="product-des">Canon's press material for the EOS 5D states that it
                                                'defines (a) new D-SLR category', while we're n..</p>
                                            <div class="price-box">
                                                <span class="new-price">$98.00</span>
                                                <span class="old-price">$122.00</span>
                                            </div>
                                            <button class="btn-cart">
                                                <i class="icon-basket-loaded icons"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="product-wrap">
                                        <div class="product-thumb right-thumb">
                                            <a href="single-product.html">
                                                <img class="primary-image"
                                                    src="{{ asset('template_client/img/product/4.jpg') }}" alt="">
                                                <img class="secondary-image"
                                                    src="{{ asset('template_client/img/product/5.jpg') }}" alt="">
                                            </a>
                                            <div class="action-links">
                                                <a href="#" class="quick-view" title="Quick View" data-toggle="modal"
                                                    data-target="#exampleModalCenter"><i
                                                        class="icon-magnifier icons"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-caption right-caption text-right">
                                            <h4 class="product-name"><a href="single-product.html">Simple Product 003</a>
                                            </h4>
                                            <p class="product-des">Canon's press material for the EOS 5D states that it
                                                'defines (a) new D-SLR category', while we're n..</p>
                                            <div class="price-box">
                                                <span class="new-price">$118.00</span>
                                            </div>
                                            <button class="btn-cart">
                                                <i class="icon-basket-loaded icons"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-syle-item">
                                    <div class="product-wrap">
                                        <div class="product-thumb">
                                            <a href="single-product.html">
                                                <img class="primary-image"
                                                    src="{{ asset('template_client/img/product/3.jpg') }}" alt="">
                                                <img class="secondary-image"
                                                    src="{{ asset('template_client/img/product/4.jpg') }}" alt="">
                                            </a>
                                            <div class="action-links">
                                                <a href="#" class="quick-view" title="Quick View" data-toggle="modal"
                                                    data-target="#exampleModalCenter"><i
                                                        class="icon-magnifier icons"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="single-product.html">Simple Product 004</a>
                                            </h4>
                                            <p class="product-des">Canon's press material for the EOS 5D states that it
                                                'defines (a) new D-SLR category', while we're n..</p>
                                            <div class="price-box">
                                                <span class="new-price">$98.00</span>
                                                <span class="old-price">$122.00</span>
                                            </div>
                                            <button class="btn-cart">
                                                <i class="icon-basket-loaded icons"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="product-wrap">
                                        <div class="product-thumb">
                                            <a href="single-product.html">
                                                <img class="primary-image"
                                                    src="{{ asset('template_client/img/product/1.jpg') }}" alt="">
                                                <img class="secondary-image"
                                                    src="{{ asset('template_client/img/product/2.jpg') }}" alt="">
                                            </a>
                                            <div class="action-links">
                                                <a href="#" class="quick-view" title="Quick View" data-toggle="modal"
                                                    data-target="#exampleModalCenter"><i
                                                        class="icon-magnifier icons"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="single-product.html">Acer Aspire Desktop</a>
                                            </h4>
                                            <p class="product-des">Canon's press material for the EOS 5D states that it
                                                'defines (a) new D-SLR category', while we're n..</p>
                                            <div class="price-box">
                                                <span class="new-price">$98.00</span>
                                                <span class="old-price">$122.00</span>
                                            </div>
                                            <button class="btn-cart">
                                                <i class="icon-basket-loaded icons"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-syle-item">
                                    <div class="product-wrap">
                                        <div class="product-thumb right-thumb">
                                            <a href="single-product.html">
                                                <img class="primary-image"
                                                    src="{{ asset('template_client/img/product/1.jpg') }}" alt="">
                                            </a>
                                            <div class="action-links">
                                                <a href="#" class="quick-view" title="Quick View" data-toggle="modal"
                                                    data-target="#exampleModalCenter"><i
                                                        class="icon-magnifier icons"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-caption right-caption text-right">
                                            <h4 class="product-name"><a href="single-product.html">Simple Product 001</a>
                                            </h4>
                                            <p class="product-des">Canon's press material for the EOS 5D states that it
                                                'defines (a) new D-SLR category', while we're n..</p>
                                            <div class="price-box">
                                                <span class="new-price">$98.00</span>
                                                <span class="old-price">$122.00</span>
                                            </div>
                                            <button class="btn-cart">
                                                <i class="icon-basket-loaded icons"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="product-wrap">
                                        <div class="product-thumb right-thumb">
                                            <a href="single-product.html">
                                                <img class="primary-image"
                                                    src="{{ asset('template_client/img/product/3.jpg') }}" alt="">
                                                <img class="secondary-image"
                                                    src="{{ asset('template_client/img/product/4.jpg') }}" alt="">
                                            </a>
                                            <div class="action-links">
                                                <a href="#" class="quick-view" title="Quick View" data-toggle="modal"
                                                    data-target="#exampleModalCenter"><i
                                                        class="icon-magnifier icons"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-caption right-caption text-right">
                                            <h4 class="product-name"><a href="single-product.html">Simple Product 003</a>
                                            </h4>
                                            <p class="product-des">Canon's press material for the EOS 5D states that it
                                                'defines (a) new D-SLR category', while we're n..</p>
                                            <div class="price-box">
                                                <span class="new-price">$118.00</span>
                                            </div>
                                            <button class="btn-cart">
                                                <i class="icon-basket-loaded icons"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-syle-item">
                                    <div class="product-wrap">
                                        <div class="product-thumb">
                                            <a href="single-product.html">
                                                <img class="primary-image"
                                                    src="{{ asset('template_client/img/product/7.jpg') }}" alt="">
                                                <img class="secondary-image"
                                                    src="{{ asset('template_client/img/product/8.jpg') }}" alt="">
                                            </a>
                                            <div class="action-links">
                                                <a href="#" class="quick-view" title="Quick View" data-toggle="modal"
                                                    data-target="#exampleModalCenter"><i
                                                        class="icon-magnifier icons"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="single-product.html">Simple Product 004</a>
                                            </h4>
                                            <p class="product-des">Canon's press material for the EOS 5D states that it
                                                'defines (a) new D-SLR category', while we're n..</p>
                                            <div class="price-box">
                                                <span class="new-price">$98.00</span>
                                                <span class="old-price">$122.00</span>
                                            </div>
                                            <button class="btn-cart">
                                                <i class="icon-basket-loaded icons"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="product-wrap">
                                        <div class="product-thumb">
                                            <a href="single-product.html">
                                                <img class="primary-image"
                                                    src="{{ asset('template_client/img/product/1.jpg') }}" alt="">
                                                <img class="secondary-image"
                                                    src="{{ asset('template_client/img/product/2.jpg') }}" alt="">
                                            </a>
                                            <div class="action-links">
                                                <a href="#" class="quick-view" title="Quick View" data-toggle="modal"
                                                    data-target="#exampleModalCenter"><i
                                                        class="icon-magnifier icons"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="single-product.html">Acer Aspire
                                                    Desktop</a></h4>
                                            <p class="product-des">Canon's press material for the EOS 5D states that it
                                                'defines (a) new D-SLR category', while we're n..</p>
                                            <div class="price-box">
                                                <span class="new-price">$98.00</span>
                                                <span class="old-price">$122.00</span>
                                            </div>
                                            <button class="btn-cart">
                                                <i class="icon-basket-loaded icons"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product-module-2-area end -->
                </div>
            </div>
        </div>
    </div>
    <!-- section-area end -->

    <!-- product-area start -->
    <div class="product-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title text-center mb-50">
                        <h4>our products</h4>
                        <h2>Best seller products</h2>
                        <div class="module-description">
                            <p>Discover the best selling products of T90 stores. All the products are listed weekly in
                                store, helping customers capture products are best sellers.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product-active owl-carousel">
                    @foreach($show as $key)
                    <div class="col-lg-3">
                        <!-- single-product-area start -->
                        <div class="single-product-area">
                            <div class="product-thumb">
                                <a href="{{ route('detail.pro', ['id' => $key->sp_id]) }}">
                                    <img style="height: 350px;" class="primary-image" src="{{ asset($key->sp_hinhanh) }}"
                                        alt="">
                                    {{-- <img class="secondary-image" src="{{ asset('template_client/img/product/1.jpg') }}"
                                        alt=""> --}}
                                </a>
                                <div class="label-product label_new">New</div>
                                <div class="action-links">
                                    <a href="#" class="wishlist-btn" title="Yêu thích"><i
                                            class="icon-heart"></i></a>
                                    <a href="#" class="compare-btn" title="So sánh"><i
                                            class="icon-refresh"></i></a>
                                    <a href="#" class="quick-view" title="Quick View" data-toggle="modal"
                                        data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                </div>
                            </div>
                            <div class="product-caption">
                                <h4 class="product-name"><a href="{{ $key->sp_id }}">{{ $key->sp_ten }}</a></h4>
                                <div class="price-box">
                                    <span class="new-price">{{number_format($key->sp_gia,0,',','.').' '.'VNĐ'}}</span>
                                    {{-- <span class="old-price">$110.00</span> --}}
                                </div>
                                <a href="#" class="action-cart-btn">
                                    Thêm vào giỏ hàng
                                </a>
                            </div>
                        </div>
                        <!-- single-product-area end -->
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- product-area end -->

    <!-- Modal start-->
    <div class="modal fade modal-wrapper" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-inner-area row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-product-tab">
                                <div class="zoomWrapper">
                                    <div id="img-1" class="zoomWrapper single-zoom">
                                        <a href="#">
                                            <img id="zoom1" src="{{ asset('template_client/img/product/1.jpg') }}"
                                                data-zoom-image="img/product/1.jpg" alt="big-1">
                                        </a>
                                    </div>
                                    <div class="single-zoom-thumb">
                                        <ul class="s-tab-zoom single-product-active owl-carousel" id="gallery_01">
                                            <li>
                                                <a href="#" class="elevatezoom-gallery active" data-update=""
                                                    data-image="img/product/1.jpg" data-zoom-image="img/product/1.jpg"><img
                                                        src="{{ asset('template_client/img/product/1.jpg') }}"
                                                        alt="zo-th-1" /></a>
                                            </li>
                                            <li class="">
                                                    <a href=" #"
                                                class="elevatezoom-gallery" data-image="img/product/2.jpg"
                                                data-zoom-image="img/product/2.jpg"><img
                                                    src="{{ asset('template_client/img/product/2.jpg') }}"
                                                    alt="zo-th-2"></a>
                                            </li>
                                            <li class="">
                                                    <a href=" #"
                                                class="elevatezoom-gallery" data-image="img/product/3.jpg"
                                                data-zoom-image="img/product/3.jpg"><img
                                                    src="{{ asset('template_client/img/product/3.jpg') }}"
                                                    alt="ex-big-3" /></a>
                                            </li>
                                            <li class="">
                                                    <a href=" #"
                                                class="elevatezoom-gallery" data-image="img/product/4.jpg"
                                                data-zoom-image="img/product/4.jpg"><img
                                                    src="{{ asset('template_client/img/product/4.jpg') }}"
                                                    alt="zo-th-4"></a>
                                            </li>
                                            <li class="">
                                                    <a href=" #"
                                                class="elevatezoom-gallery" data-image="img/product/5.jpg"
                                                data-zoom-image="img/product/5.jpg"><img
                                                    src="{{ asset('template_client/img/product/5.jpg') }}"
                                                    alt="zo-th-5"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <!-- product-thumbnail-content start -->
                            <div class="quick-view-content">
                                <div class="product-info">
                                    <h2>Product Name use hear</h2>
                                    <div class="rating-box">
                                        <ul class="rating d-flex">
                                            <li><i class="icon-star"></i></li>
                                            <li><i class="icon-star"></i></li>
                                            <li><i class="icon-star"></i></li>
                                            <li><i class="icon-star"></i></li>
                                            <li><i class="icon-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="price-box">
                                        <span class="new-price">$25.50</span>
                                        <span class="old-price">$30.50</span>
                                    </div>
                                    <ul class="list-unstyled">
                                        <li>Brand: <a href="#">Hewlett-Packard</a></li>
                                        <li>Product Code: Digital</li>
                                        <li>Reward Points: 1000</li>
                                        <li>Availability: <span class="stock">In Stock</span></li>
                                    </ul>
                                    <div class="available-color">
                                        <h3>available color</h3>
                                        <ul class="color-list">
                                            <li class="active"><a class="orange" href="#"></a></li>
                                            <li><a class="paste" href="#"></a></li>
                                        </ul>
                                    </div>
                                    <form class="modal-cart">
                                        <div class="quantity">
                                            <label>Quantity</label>
                                            <div class="cart-plus-minus">
                                                <input type="number" value="1" min="0" step="1" class="input-box">
                                            </div>
                                        </div>
                                    </form>
                                    <ul class="quick-add-to-cart">
                                        <li><a href="#" class="add-to-cart"><i class="icon-basket-loaded"></i> Add
                                                to cart</a></li>
                                        <li><a class="wishlist-btn" href="#"><i class="icon-heart"></i></a></li>
                                        <li><a class="compare-btn" href="#"><i class="icon-refresh"></i></a></li>
                                    </ul>
                                    <p>Tags: <a href="#">Movado</a>,<a href="#">Omega</a><a href="#"></a></p>
                                </div>
                            </div>
                            <!-- product-thumbnail-content end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end-->

    <!-- banner-area start -->
    <div class="banner-area">
        <div class="banner-inner">
            <div class="col-custom-4 mt-30">
                <div class="single-banner-image">
                    <a href="#"><img src="{{ asset('template_client/img/banner/1.jpg') }}" alt=""></a>
                </div>
            </div>
            <div class="col-custom-8 mt-30">
                <div class="single-banner-image responsive-img">
                    <a href="#"><img src="{{ asset('template_client/img/banner/2.jpg') }}" alt=""></a>
                    <div class="banner-text">
                        <span class="text1">we are free to discount sale up to 70%</span>
                        <span class="text2">FREE UK DELIVERY + RETURN OVER £40.00 (EXCLUDING men's
                            fashion).</span>
                        <a href="shop.html" class="link">learn more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-area end -->

    <!-- latest-blog-area start -->
    <div class="latest-blog-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title text-center mb-50">
                        <h4>our news</h4>
                        <h2>Unique blog style </h2>
                        <div class="module-description">
                            Update the latest fashion trends of the shop T90, useful articles to help you learn about
                            fashion and the latest styles.
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="latest-blog-active owl-carousel">
                    <div class="col">
                        <div class="singel-latest-blog">
                            <div class="aritcles-content">
                                <div class="author-name">
                                    post by:<a href="#"> Author Name</a> - 30 Oct 2018
                                </div>
                                <a href="blog-details.html" class="articles-name">Best of Hair & Makeup New York
                                    Spring/Summer 2018 - 360° Experience</a>
                            </div>
                            <div class="articles-image">
                                <a href="blog-details.html">
                                    <img src="{{ asset('template_client/img/blog/3.jpg') }}" alt="">
                                    <span class="blog-action">
                                        <i class="icon-picture icons"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="singel-latest-blog">
                            <div class="aritcles-content">
                                <div class="author-name">
                                    post by:<a href="#"> Author Name</a> - 11 may 2018
                                </div>
                                <a href="blog-details.html" class="articles-name">Best of Hair & Makeup New York
                                    Spring/Summer 2016 - 360° Experience</a>
                            </div>
                            <div class="articles-image">
                                <a href="blog-details.html">
                                    <img src="{{ asset('template_client/img/blog/1.jpg') }}" alt="">
                                    <span class="blog-action">
                                        <i class="icon-picture icons"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="singel-latest-blog">
                            <div class="aritcles-content">
                                <div class="author-name">
                                    post by:<a href="#"> Author Name</a> - 25 July 2018
                                </div>
                                <a href="blog-details.html" class="articles-name">London Fashion Week 360° Candy Rock &
                                    Royal Fashion Day</a>
                            </div>
                            <div class="articles-image">
                                <a href="blog-details.html">
                                    <img src="{{ asset('template_client/img/blog/2.jpg') }}" alt="">
                                    <span class="blog-action">
                                        <i class="icon-picture icons"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="singel-latest-blog">
                            <div class="aritcles-content">
                                <div class="author-name">
                                    post by:<a href="#"> Author Name</a> - 21 Jun 2018
                                </div>
                                <a href="blog-details.html" class="articles-name">Mercedes Benz Fashion Week – Mirror To
                                    The Soul 360• Experience</a>
                            </div>
                            <div class="articles-image">
                                <a href="blog-details.html">
                                    <img src="{{ asset('template_client/img/blog/4.jpg') }}" alt="">
                                    <span class="blog-action">
                                        <i class="icon-picture icons"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- latest-blog-area end -->

    <!-- testimonial-area start -->
    <div class="testimonial-area bg-color ptb-100">
        <div class="container">
            <div class="row">
                <div class="testimonial-active owl-carousel">
                    <div class="col">
                        <div class="testimonial-content text-center">
                            <div class="icon-box">
                                <i class="icon-bubbles"></i>
                            </div>
                            <div class="testimonial-box">
                                <p> This is Photoshops version of Lorem Ipsum. Proin gravida nibh vel velit.Lorem ipsum
                                    dolor sit amet, consectetur adipiscing elit. In molestie augue magna. Pellentesque felis
                                    lorem, pulvinar sed eros ..</p>
                            </div>
                            <div class="testimonial-images">
                                <img src="{{ asset('template_client/img/team/1.jpg') }}" alt="">
                            </div>
                            <div class="testimonial-author">
                                <p>Rebecka Filson</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="testimonial-content text-center">
                            <div class="icon-box">
                                <i class="icon-bubbles"></i>
                            </div>
                            <div class="testimonial-box">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae facilis, veniam iste
                                    nemo aspernatur laborum quos, nihil ut sequi dolor. Velit quod adipisci voluptas libero
                                    quasi reprehenderit ..</p>
                            </div>
                            <div class="testimonial-images">
                                <img src="{{ asset('template_client/img/team/2.jpg') }}" alt="">
                            </div>
                            <div class="testimonial-author">
                                <p>jonaki roja</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial-area end -->
@endsection
