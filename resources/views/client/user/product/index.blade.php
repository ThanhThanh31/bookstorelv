@extends('client.template.master')
@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area ptb-30 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Sản phẩm</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->
    <!-- main-content-wrap start -->
    <div class="main-content-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">
                    <!-- filter-wrapper start -->
                    <div class="filter-wrapper pt-100">
                        <!-- filter-wrap start -->
                        <div class="filter-wrap mb-30">
                            <h4 class="filter-title">Price</h4>
                            <!-- filter-price-content start -->
                            <div class="filter-price-content">
                                <form action="#" method="post">
                                    <div id="price-slider" class="price-slider"></div>
                                    <div class="filter-price-wapper">
                                        <div class="filter-price-cont">
                                            <div class="input-type">
                                                <input type="text" id="min-price" readonly="" />
                                            </div>
                                            <span>—</span>
                                            <div class="input-type">
                                                <input type="text" id="max-price" readonly="" />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- filter-price-content end -->
                        </div>
                        <!-- filter-wrap end -->
                        <!-- filter-wrap start -->
                        <div class="filter-wrap mb-30">
                            <h4 class="filter-title">Categories</h4>
                            <div class="list_group_item">
                                <ul>
                                    <li><a href="#">Categories1 (9)</a></li>
                                    <li><a href="#">Categories2 (6)</a></li>
                                    <li><a href="#">Categories3 (7)</a></li>
                                    <li><a href="#">Categories4 (3)</a></li>
                                    <li><a href="#">Categories5 (8)</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- filter-wrap end -->
                        <!-- filter-wrap start -->
                        <div class="filter-wrap mb-30">
                            <h4 class="filter-title">Color</h4>
                            <div class="list_group_item">
                                <ul>
                                    <li><a href="#">Black (4)</a></li>
                                    <li><a href="#">Blue (6)</a></li>
                                    <li><a href="#">Brown (7)</a></li>
                                    <li><a href="#">White (3)</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- filter-wrap end -->
                        <!-- filter-wrap start -->
                        <div class="filter-wrap mb-30">
                            <h4 class="filter-title">Manufacturer</h4>
                            <div class="list_group_item">
                                <ul>
                                    <li><a href="#">Christian Dior (8)</a></li>
                                    <li><a href="#">Ferragama (7)</a></li>
                                    <li><a href="#">Hermes (9)</a></li>
                                    <li><a href="#">Louis Vuitton (11)</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- filter-wrap end -->
                        <!-- filter-wrap start -->
                        <div class="filter-wrap">
                            <div class="single-banner-image">
                                <a href="#"><img alt="" src="img/banner/4.jpg"></a>
                            </div>
                        </div>
                        <!-- filter-wrap end -->
                    </div>
                    <!-- filter-wrapper end -->
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="shop-top-bar pt-100">
                        <div class="shop-bar-inner">
                            <div class="product-view-mode">
                                <!-- shop-item-filter-list start -->
                                <ul role="tablist" class="nav shop-item-filter-list">
                                    <li role="presentation" class="active"><a href="#grid-view" aria-controls="grid-view" role="tab" data-toggle="tab" class="active show" aria-selected="true"><i class="fa fa-th"></i></a></li>
                                    <li role="presentation"><a href="#list-view" aria-controls="list-view" role="tab" data-toggle="tab"><i class="fa fa-th-list"></i></a></li>
                                </ul>
                                <!-- shop-item-filter-list end -->
                            </div>
                            <div class="toolbar-amount">
                                <span>Showing 1 to 9 of 15</span>
                            </div>
                        </div>
                        <!-- product-select-box start -->
                        <div class="product-select-box">
                            <div class="product-short">
                                <label>Sort By: </label>
                                <select class="nice-select">
                                        <option value="Relevance">Relevance</option>
                                        <option value="Name">Name (A - Z)</option>
                                        <option value="Name">Name (Z - A)</option>
                                        <option value="Price">Price (Low &gt; High)</option>
                                        <option value="Rating">Rating (Lowest)</option>
                                        <option value="Model-asc">Model (A - Z)</option>
                                        <option value="Model-az">Model (Z - A)</option>
                                    </select>
                            </div>
                        </div>
                        <!-- product-select-box end -->
                    </div>
                    <!--  shop-products-wrapper strar -->
                    <div class="shop-products-wrapper">
                        <!-- tab-content start -->
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                <div class="shop-product-area">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <!-- single-product-area start -->
                                            <div class="single-product-area mt-30">
                                                <div class="product-thumb">
                                                    <a href="single-product.html">
                                                        <img class="primary-image" src="img/product/2.jpg" alt="">
                                                        <img class="secondary-image" src="img/product/1.jpg" alt="">
                                                    </a>
                                                    <div class="label-product label_new">New</div>
                                                    <div class="action-links">
                                                        <a href="#" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                        <a href="#" class="compare-btn" title="Compare this Product"><i class="icon-refresh"></i></a>
                                                        <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-caption">
                                                    <h4 class="product-name"><a href="single-product.html">Simple Product 003</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">$99.00</span>
                                                        <span class="old-price">$110.00</span>
                                                    </div>
                                                    <a href="#" class="action-cart-btn">
                                                            Add to Cart
                                                        </a>
                                                </div>
                                            </div>
                                            <!-- single-product-area end -->
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <!-- single-product-area start -->
                                            <div class="single-product-area mt-30">
                                                <div class="product-thumb">
                                                    <a href="single-product.html">
                                                        <img class="primary-image" src="img/product/3.jpg" alt="">
                                                        <img class="secondary-image" src="img/product/4.jpg" alt="">
                                                    </a>
                                                    <div class="label-product label_sale">Sale!</div>
                                                    <div class="action-links">
                                                        <a href="#" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                        <a href="#" class="compare-btn" title="Compare this Product"><i class="icon-refresh"></i></a>
                                                        <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-caption">
                                                    <h4 class="product-name"><a href="single-product.html">Simple Product 009</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">$99.00</span>
                                                    </div>
                                                    <a href="#" class="action-cart-btn">
                                                            Add to Cart
                                                        </a>
                                                </div>
                                            </div>
                                            <!-- single-product-area end -->
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <!-- single-product-area start -->
                                            <div class="single-product-area mt-30">
                                                <div class="product-thumb">
                                                    <a href="single-product.html">
                                                        <img class="primary-image" src="img/product/9.jpg" alt="">
                                                    </a>
                                                    <div class="label-product label_new">New</div>
                                                    <div class="action-links">
                                                        <a href="#" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                        <a href="#" class="compare-btn" title="Compare this Product"><i class="icon-refresh"></i></a>
                                                        <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-caption">
                                                    <h4 class="product-name"><a href="single-product.html">Simple Product 003</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">$110.00</span>
                                                        <span class="old-price">$120.00</span>
                                                    </div>
                                                    <a href="#" class="action-cart-btn">
                                                            Add to Cart
                                                        </a>
                                                </div>
                                            </div>
                                            <!-- single-product-area end -->
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <!-- single-product-area start -->
                                            <div class="single-product-area mt-30">
                                                <div class="product-thumb">
                                                    <a href="single-product.html">
                                                        <img class="primary-image" src="img/product/12.jpg" alt="">
                                                    </a>
                                                    <div class="label-product label_new">New</div>
                                                    <div class="label-product label_sale">Sale!</div>
                                                    <div class="action-links">
                                                        <a href="#" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                        <a href="#" class="compare-btn" title="Compare this Product"><i class="icon-refresh"></i></a>
                                                        <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-caption">
                                                    <h4 class="product-name"><a href="single-product.html">Simple Product 008</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">$130.00</span>
                                                        <span class="old-price">$220.00</span>
                                                    </div>
                                                    <a href="#" class="action-cart-btn">
                                                            Add to Cart
                                                        </a>
                                                </div>
                                            </div>
                                            <!-- single-product-area end -->
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <!-- single-product-area start -->
                                            <div class="single-product-area mt-30">
                                                <div class="product-thumb">
                                                    <a href="single-product.html">
                                                        <img class="primary-image" src="img/product/11.jpg" alt="">
                                                        <img class="secondary-image" src="img/product/12.jpg" alt="">
                                                    </a>
                                                    <div class="label-product label_new">New</div>
                                                    <div class="action-links">
                                                        <a href="#" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                        <a href="#" class="compare-btn" title="Compare this Product"><i class="icon-refresh"></i></a>
                                                        <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-caption">
                                                    <h4 class="product-name"><a href="single-product.html">Simple Product 012</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">$92.00</span>
                                                        <span class="old-price">$100.00</span>
                                                    </div>
                                                    <a href="#" class="action-cart-btn">
                                                            Add to Cart
                                                        </a>
                                                </div>
                                            </div>
                                            <!-- single-product-area end -->
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <!-- single-product-area start -->
                                            <div class="single-product-area mt-30">
                                                <div class="product-thumb">
                                                    <a href="single-product.html">
                                                        <img class="primary-image" src="img/product/13.jpg" alt="">
                                                    </a>
                                                    <div class="label-product label_sale">Sale!</div>
                                                    <div class="action-links">
                                                        <a href="#" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                        <a href="#" class="compare-btn" title="Compare this Product"><i class="icon-refresh"></i></a>
                                                        <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-caption">
                                                    <h4 class="product-name"><a href="single-product.html">Simple Product 0010</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">$96.00</span>
                                                    </div>
                                                    <a href="#" class="action-cart-btn">
                                                            Add to Cart
                                                        </a>
                                                </div>
                                            </div>
                                            <!-- single-product-area end -->
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <!-- single-product-area start -->
                                            <div class="single-product-area mt-30">
                                                <div class="product-thumb">
                                                    <a href="single-product.html">
                                                        <img class="primary-image" src="img/product/10.jpg" alt="">
                                                    </a>
                                                    <div class="label-product label_new">New</div>
                                                    <div class="label-product label_sale">Sale!</div>
                                                    <div class="action-links">
                                                        <a href="#" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                        <a href="#" class="compare-btn" title="Compare this Product"><i class="icon-refresh"></i></a>
                                                        <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-caption">
                                                    <h4 class="product-name"><a href="single-product.html">Simple Product 007</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">$100.00</span>
                                                        <span class="old-price">$90.00</span>
                                                    </div>
                                                    <a href="#" class="action-cart-btn">
                                                            Add to Cart
                                                        </a>
                                                </div>
                                            </div>
                                            <!-- single-product-area end -->
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <!-- single-product-area start -->
                                            <div class="single-product-area mt-30">
                                                <div class="product-thumb">
                                                    <a href="single-product.html">
                                                        <img class="primary-image" src="img/product/19.jpg" alt="">
                                                    </a>
                                                    <div class="label-product label_new">New</div>
                                                    <div class="label-product label_sale">Sale!</div>
                                                    <div class="action-links">
                                                        <a href="#" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                        <a href="#" class="compare-btn" title="Compare this Product"><i class="icon-refresh"></i></a>
                                                        <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-caption">
                                                    <h4 class="product-name"><a href="single-product.html">Simple Product 008</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">$130.00</span>
                                                        <span class="old-price">$220.00</span>
                                                    </div>
                                                    <a href="#" class="action-cart-btn">
                                                            Add to Cart
                                                        </a>
                                                </div>
                                            </div>
                                            <!-- single-product-area end -->
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <!-- single-product-area start -->
                                            <div class="single-product-area mt-30">
                                                <div class="product-thumb">
                                                    <a href="single-product.html">
                                                        <img class="primary-image" src="img/product/17.jpg" alt="">
                                                        <img class="secondary-image" src="img/product/18.jpg" alt="">
                                                    </a>
                                                    <div class="label-product label_new">New</div>
                                                    <div class="action-links">
                                                        <a href="#" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                        <a href="#" class="compare-btn" title="Compare this Product"><i class="icon-refresh"></i></a>
                                                        <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-caption">
                                                    <h4 class="product-name"><a href="single-product.html">Simple Product 011</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">$91.00</span>
                                                        <span class="old-price">$104.00</span>
                                                    </div>
                                                    <a href="#" class="action-cart-btn">
                                                            Add to Cart
                                                        </a>
                                                </div>
                                            </div>
                                            <!-- single-product-area end -->
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <!-- single-product-area start -->
                                            <div class="single-product-area mt-30">
                                                <div class="product-thumb">
                                                    <a href="single-product.html">
                                                        <img class="primary-image" src="img/product/20.jpg" alt="">
                                                    </a>
                                                    <div class="label-product label_sale">Sale!</div>
                                                    <div class="action-links">
                                                        <a href="#" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                        <a href="#" class="compare-btn" title="Compare this Product"><i class="icon-refresh"></i></a>
                                                        <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-caption">
                                                    <h4 class="product-name"><a href="single-product.html">Simple Product 0020</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">$99.00</span>
                                                    </div>
                                                    <a href="#" class="action-cart-btn">
                                                            Add to Cart
                                                        </a>
                                                </div>
                                            </div>
                                            <!-- single-product-area end -->
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <!-- single-product-area start -->
                                            <div class="single-product-area mt-30">
                                                <div class="product-thumb">
                                                    <a href="single-product.html">
                                                        <img class="primary-image" src="img/product/21.jpg" alt="">
                                                    </a>
                                                    <div class="label-product label_new">New</div>
                                                    <div class="label-product label_sale">Sale!</div>
                                                    <div class="action-links">
                                                        <a href="#" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                        <a href="#" class="compare-btn" title="Compare this Product"><i class="icon-refresh"></i></a>
                                                        <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-caption">
                                                    <h4 class="product-name"><a href="single-product.html">Simple Product 0017</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">$150.00</span>
                                                        <span class="old-price">$170.00</span>
                                                    </div>
                                                    <a href="#" class="action-cart-btn">
                                                            Add to Cart
                                                        </a>
                                                </div>
                                            </div>
                                            <!-- single-product-area end -->
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <!-- single-product-area start -->
                                            <div class="single-product-area mt-30">
                                                <div class="product-thumb">
                                                    <a href="single-product.html">
                                                        <img class="primary-image" src="img/product/23.jpg" alt="">
                                                    </a>
                                                    <div class="label-product label_new">New</div>
                                                    <div class="label-product label_sale">Sale!</div>
                                                    <div class="action-links">
                                                        <a href="#" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                        <a href="#" class="compare-btn" title="Compare this Product"><i class="icon-refresh"></i></a>
                                                        <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-caption">
                                                    <h4 class="product-name"><a href="single-product.html">Simple Product 008</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">$130.00</span>
                                                        <span class="old-price">$220.00</span>
                                                    </div>
                                                    <a href="#" class="action-cart-btn">
                                                            Add to Cart
                                                        </a>
                                                </div>
                                            </div>
                                            <!-- single-product-area end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="list-view" class="tab-pane fade" role="tabpanel">
                                <div class="row">
                                    <div class="col">
                                        <div class="row product-layout-list">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="product-thumb">
                                                    <a href="single-product.html">
                                                        <img class="primary-image" src="img/product/2.jpg" alt="">
                                                        <img class="secondary-image" src="img/product/1.jpg" alt="">
                                                    </a>
                                                    <div class="label-product label_new">New</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8">
                                                <div class="product-caption">
                                                    <h4 class="product-name"><a href="single-product.html">Simple Product 003</a></h4>
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
                                                        <span class="new-price">$88.00</span>
                                                        <span class="old-price">$150.00</span>
                                                    </div>
                                                    <p class="product-des">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, harum, provident eum quo suscipit tempore inventore. Quam, dicta quibusdam fugiat impedit nulla, cum deleniti commodi?</p>
                                                    <ul class="quick-add-to-cart">
                                                        <li><a class="add-to-cart" href="#"><i class="icon-basket-loaded"></i> Add to cart</a></li>
                                                        <li><a href="#" class="wishlist-btn"><i class="icon-heart"></i></a></li>
                                                        <li><a href="#" class="compare-btn"><i class="icon-refresh"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row product-layout-list">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="product-thumb">
                                                    <a href="single-product.html">
                                                        <img class="primary-image" src="img/product/3.jpg" alt="">
                                                        <img class="secondary-image" src="img/product/4.jpg" alt="">
                                                    </a>
                                                    <div class="label-product label_new">New</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8">
                                                <div class="product-caption">
                                                    <h4 class="product-name"><a href="single-product.html">Simple Product 005</a></h4>
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
                                                        <span class="new-price">$99.00</span>
                                                        <span class="old-price">$110.00</span>
                                                    </div>
                                                    <p class="product-des">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, harum, provident eum quo suscipit tempore inventore. Quam, dicta quibusdam fugiat impedit nulla, cum deleniti commodi?</p>
                                                    <ul class="quick-add-to-cart">
                                                        <li><a class="add-to-cart" href="#"><i class="icon-basket-loaded"></i> Add to cart</a></li>
                                                        <li><a href="#" class="wishlist-btn"><i class="icon-heart"></i></a></li>
                                                        <li><a href="#" class="compare-btn"><i class="icon-refresh"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row product-layout-list">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="product-thumb">
                                                    <a href="single-product.html">
                                                        <img class="primary-image" src="img/product/5.jpg" alt="">
                                                        <img class="secondary-image" src="img/product/6.jpg" alt="">
                                                    </a>
                                                    <div class="label-product label_new">New</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8">
                                                <div class="product-caption">
                                                    <h4 class="product-name"><a href="single-product.html">Simple Product 008</a></h4>
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
                                                        <span class="new-price">$100.00</span>
                                                        <span class="old-price">$110.00</span>
                                                    </div>
                                                    <p class="product-des">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, harum, provident eum quo suscipit tempore inventore. Quam, dicta quibusdam fugiat impedit nulla, cum deleniti commodi?</p>
                                                    <ul class="quick-add-to-cart">
                                                        <li><a class="add-to-cart" href="#"><i class="icon-basket-loaded"></i> Add to cart</a></li>
                                                        <li><a href="#" class="wishlist-btn"><i class="icon-heart"></i></a></li>
                                                        <li><a href="#" class="compare-btn"><i class="icon-refresh"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row product-layout-list">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="product-thumb">
                                                    <a href="single-product.html">
                                                        <img class="primary-image" src="img/product/18.jpg" alt="">
                                                        <img class="secondary-image" src="img/product/20.jpg" alt="">
                                                    </a>
                                                    <div class="label-product label_new">New</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8">
                                                <div class="product-caption">
                                                    <h4 class="product-name"><a href="single-product.html">Simple Product 010</a></h4>
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
                                                        <span class="new-price">$56.00</span>
                                                        <span class="old-price">$99.00</span>
                                                    </div>
                                                    <p class="product-des">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, harum, provident eum quo suscipit tempore inventore. Quam, dicta quibusdam fugiat impedit nulla, cum deleniti commodi?</p>
                                                    <ul class="quick-add-to-cart">
                                                        <li><a class="add-to-cart" href="#"><i class="icon-basket-loaded"></i> Add to cart</a></li>
                                                        <li><a href="#" class="wishlist-btn"><i class="icon-heart"></i></a></li>
                                                        <li><a href="#" class="compare-btn"><i class="icon-refresh"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- paginatoin-area start -->
                            <div class="paginatoin-area">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="pagination-box">
                                            <li><a class="active" href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li>
                                                <a class="Next" href="#"> >|</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- paginatoin-area end -->
                        </div>
                        <!-- tab-content end -->
                    </div>
                    <!--  shop-products-wrapper end -->
                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->
    @endsection
