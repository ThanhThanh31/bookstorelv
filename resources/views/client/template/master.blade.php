<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from d29u17ylf1ylz9.cloudfront.net/t90-v2/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Aug 2018 04:57:18 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home || T90 - Fashion Ecommerce Bootstrap 4 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('template_client/img/favicon.ico') }}">
    <!-- All CSS Hear -->
    @include('client.template.css')
    <!-- Style CSS Hear -->
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience. Thanks</p>
        <![endif]-->
    <!-- Add your application content here -->

    <div class="wrapper">

        @include('client.template.header')

        <!-- main-search start -->
        <div class="main-search-active">
            <div class="sidebar-search-icon">
                <button class="search-close"><span class="icon-close"></span></button>
            </div>
            <div class="sidebar-search-input">
                <form>
                    <div class="form-search">
                        <input id="search" class="input-text" value="" placeholder="Search entire store here ..." type="search">
                        <button class="search-btn" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- main-search start -->

        @yield('content')

        <!-- footer -->
        @include('client.template.footer')
        <!-- footer -->

        <!-- Modal -->
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
                                                <img id="zoom1"
                                                    src="{{ asset('template_client/img/product/1.jpg') }}"
                                                    data-zoom-image="img/product/1.jpg" alt="big-1">
                                            </a>
                                        </div>
                                        <div class="single-zoom-thumb">
                                            <ul class="s-tab-zoom single-product-active owl-carousel" id="gallery_01">
                                                <li>
                                                    <a href="#" class="elevatezoom-gallery active" data-update=""
                                                        data-image="img/product/1.jpg"
                                                        data-zoom-image="img/product/1.jpg"><img src="img/product/1.jpg"
                                                            alt="zo-th-1" /></a>
                                                </li>
                                                <li class="">
                                                    <a href="#" class="elevatezoom-gallery"
                                                        data-image="img/product/2.jpg"
                                                        data-zoom-image="img/product/2.jpg"><img src="img/product/2.jpg"
                                                            alt="zo-th-2"></a>
                                                </li>
                                                <li class="">
                                                    <a href="#" class="elevatezoom-gallery"
                                                        data-image="img/product/3.jpg"
                                                        data-zoom-image="img/product/3.jpg"><img src="img/product/3.jpg"
                                                            alt="ex-big-3" /></a>
                                                </li>
                                                <li class="">
                                                    <a href="#" class="elevatezoom-gallery"
                                                        data-image="img/product/4.jpg"
                                                        data-zoom-image="img/product/4.jpg"><img src="img/product/4.jpg"
                                                            alt="zo-th-4"></a>
                                                </li>
                                                <li class="">
                                                    <a href="#" class="elevatezoom-gallery"
                                                        data-image="img/product/5.jpg"
                                                        data-zoom-image="img/product/5.jpg"><img src="img/product/5.jpg"
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
    </div>
    <!-- jquery -->
    @include('client.template.js')
    <!-- all plugins JS hear -->
</body>

<!-- Mirrored from d29u17ylf1ylz9.cloudfront.net/t90-v2/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Aug 2018 04:57:50 GMT -->

</html>
