<header>

@if (Request::segment(1) == '')
<!-- slider-main-area start -->
<div class="slider-main-area">
    <div class="slider-active owl-carousel">
        <div class="slider-wrapper" style="background-image:url(template_client/img/slider/home-01-1.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="slider-text-info style-1 slider-text-animation">
                            <h2 class="title1">SPRING for men’s 2018</h2>
                            <h1 class="sub-title">ADRIEN SAHORES MODELS SUMMER 2018</h1>
                            <div class="slider-1-des">
                                <p>Mens Spring Fashion Scarves Infinity Eternity Cowl Neck Scarves Men
                                    Fashion Scarf Men.</p>
                            </div>
                            <div class="slier-btn-1">
                                <a title="shop now" href="#" class="btn">shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-wrapper" style="background-image:url(template_client/img/slider/home-01-2.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="slider-text-info style-1  slider-text-animation">
                            <h2 class="title1">SPRING for men’s 2018</h2>
                            <h1 class="sub-title">Opening Ceremony Men's.</h1>
                            <div class="slider-1-des">
                                <p>Mens Spring Fashion Scarves Infinity Eternity Cowl Neck Scarves Men
                                    Fashion Scarf Men. </p>
                            </div>
                            <div class="slier-btn-1">
                                <a title="shop now" href="#" class="btn">shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

    <!-- header-top-area start -->
    <div id="stickymenu" class="header-inner clearfix bg-white solidblockmenu">
        <div class="container-inner">
            <!-- logo-container start -->
            <div class="logo-container">
                <div class="logo">
                    <a href="index.html"><img src="{{asset('template_client/img/logo/logo.png')}}" alt=""></a>
                </div>
            </div>
            <!-- logo-container end -->
            <!-- main-menu-area start -->
            <div class="horizontal-menu main-menu-area d-none d-lg-block">
                <nav>
                    <ul>
                        <li><a href="{{ route('client.index') }}">Trang chủ</a>
                        </li>
                        <li class="mega_parent"><a href="shop.html">Trang <i class="icon-arrow-down"></i></a>
                            <ul class="mega-menu">
                                <li><a href="#">Column One</a>
                                    <ul>
                                        <li><a href="my-account.html">Tài khoản</a></li>
                                        <li><a href="frequently-question.html">FAQ</a></li>
                                        <li><a href="{{  route('client.form')  }}">Đăng nhập &amp; Đăng ký</a></li>
                                        <li><a href="error404.html">Error 404</a></li>
                                        <li class="menu-image"><a href="shop.html"><img src="{{asset('template_client/img/banner/menu-1.jpg')}}"
                                                    alt=""></a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Column Two</a>
                                    <ul>
                                        <li><a href="blog-left.html">Blog Left</a></li>
                                        <li><a href="blog.html">Blog Right</a></li>
                                        <li><a href="blog-fullwidth.html">Blog Full Width</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                        <li class="menu-image"><a href="shop.html"><img src="{{asset('template_client/img/banner/menu-2.jpg')}}"
                                                    alt=""></a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Column Three</a>
                                    <ul>
                                        <li><a href="shop.html">Shop Left</a></li>
                                        <li><a href="shop-right.html">Shop Right</a></li>
                                        <li><a href="shop-fullwidth.html">Shop Full Width</a></li>
                                        <li><a href="wishlist.html">Wish List</a></li>
                                        <li class="menu-image"><a href="shop.html"><img src="{{asset('template_client/img/banner/menu-3.jpg')}}"
                                                    alt=""></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="shop.html">Cửa hàng</a></li>
                        <li><a href="shop.html">Sản phẩm</a></li>
                        <li><a href="about.html">Giới thiệu</a></li>
                        <li><a href="contact.html">Liên hệ</a></li>
                        <li><a href="blog.html">Tin tức</a></li>
                    </ul>
                </nav>
            </div>
            <!-- main-menu-area end -->
            <!-- box-right start -->
            <div class="box-right">
                <!-- search-box-area start -->
                <div class="search-box-area">
                    <span class="sidebar-trigger-search"><i class="icon-magnifier icons"></i></span>
                </div>
                <!-- search-box-area end -->
                <!-- box-setting start -->
                <div class="box-setting">
                    <div class="btn-group">
                        <button class="settings-box-inner dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="icon-settings icons"></i>
                        </button>
                        <div class="dropdown-menu setting-content">
                            <div class="account">
                                <button class="setting-btn">Tài khoản <i class="icon-arrow-down"></i></button>
                                <ul class="setting-list">
                                    @if (Auth::guard('nguoi_dung')->check() && Auth::guard('nguoi_dung')->user()->q_id == 1)
                                    <li><span style="color: white">Xin chào, {{ Auth::guard('nguoi_dung')->user()->username }}</span></li>
                                    <li><a href="{{ route('store.reStore') }}">Đăng ký cửa hàng</a></li>
                                    <li><a href="{{ route('user.edit') }}">Thông tin người dùng</a></li>
                                    <li><a href="{{ route('user.pass') }}">Thay đổi mật khẩu</a></li>
                                    <li><a href="{{ route('user.logout') }}">Đăng xuất</a></li>
                                    @elseif (Auth::guard('nguoi_dung')->check() && Auth::guard('nguoi_dung')->user()->q_id == 2)
                                    <li><span style="color: white">Xin chào, {{ Auth::guard('nguoi_dung')->user()->username }}</span></li>
                                    <li><a href="{{ route('store.manage') }}">Quản lý cửa hàng</a></li>
                                    <li><a href="{{ route('store.info') }}">Thông tin cửa hàng</a></li>
                                    <li><a href="{{ route('user.edit') }}">Thông tin người dùng</a></li>
                                    <li><a href="{{ route('user.pass') }}">Thay đổi mật khẩu</a></li>
                                    <li><a href="{{ route('user.logout') }}">Đăng xuất</a></li>
                                    @else
                                    <li><a href="{{ route('client.form') }}">Đăng ký</a></li>
                                    <li><a href="{{ route('client.form') }}">Đăng nhập</a></li>
                                    @endif
                                </ul>
                            </div>
                            <div class="currency">
                                <form action="#">
                                    <button class="setting-btn">Currency: USD <i class="icon-arrow-down"></i></button>
                                    <ul class="setting-list">
                                        <li>
                                            <a href="#">€ Euro</a>
                                        </li>
                                        <li>
                                            <a href="#">£ Pound Sterling</a>
                                        </li>
                                        <li>
                                            <a href="#">$US Dollar</a>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                            <div class="language">
                                <form action="#">
                                    <button class="setting-btn">Language: en-gb<i class="icon-arrow-down"></i> </button>
                                    <ul class="setting-list">
                                        <li>
                                            <a href="#"><img src="{{asset('template_client/img/icon/de-de.png')}}" alt=""> English</a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="{{asset('template_client/img/icon/en-gb.png')}}" alt=""> Germany</a>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- box-setting end -->
                <!-- top-shopoing-cart start -->
                <div id="top-shopoing-cart" class="btn-group">
                    <button class="shopping-cart dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="icon-basket-loaded icons"></i>
                        <span class="top-cart-total">
                            <span class="item-text-number">2</span>
                        </span>
                    </button>
                    <div class="dropdown-menu">
                        <ul class="mini-cart-sub">
                            <li class="single-cart">
                                <div class="cart-img">
                                    <a href="single-product.html"><img src="{{asset('template_client/img/cart/1.jpg')}}" alt=""></a>
                                </div>
                                <div class="cart-info">
                                    <a href="single-product.html">Acer Aspire E 15</a>
                                    <p class="cart-quantity">×1</p>
                                    <p class="cart-price">$68.00</p>
                                </div>
                                <button class="cart-remove" title="Remove"><i class="ion-android-close"></i></button>
                            </li>
                            <li class="single-cart">
                                <div class="cart-img">
                                    <a href="single-product.html"><img src="{{asset('template_client/img/cart/1.jpg')}}" alt=""></a>
                                </div>
                                <div class="cart-info">
                                    <a href="single-product.html">Acer Aspire E 15</a>
                                    <p class="cart-quantity">×1</p>
                                    <p class="cart-price">$68.00</p>
                                </div>
                                <button class="cart-remove" title="Remove"><i class="ion-android-close"></i></button>
                            </li>
                            <li class="cart-total-box">
                                <h5>Sub-Total :<span class="float-right">$264.00</span></h5>
                                <h5>VAT (20%) :<span class="float-right">$52.80</span></h5>
                                <h5>Total :<span class="float-right">$320.80</span></h5>
                            </li>
                            <li>
                                <p class="text-center cart-button">
                                    <a href="cart.html">View Cart</a>
                                    <a href="checkout.html">Checkout</a>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- top-shopoing-cart end -->
            </div>
            <!-- box-right end -->
        </div>
        <!-- mobile-menu-area start-->
        <div class="mobile-menu-area d-block d-lg-none">
            <div class="mobile-menu">
                <nav id="mobile-menu-active">
                    <ul>
                        <li><a href="index.html">Home</a>
                            <ul class="dorpdown-menu">
                                <li><a href="index.html">Home Page 1</a></li>
                                <li><a href="index-2.html">Home Page 2</a></li>
                                <li><a href="index-3.html">Home Page 3</a></li>
                                <li><a href="index-4.html">Home Page 4</a></li>
                                <li><a href="index-5.html">Home Page 5</a></li>
                                <li><a href="index-6.html">Home Page 6</a></li>
                            </ul>
                        </li>
                        <li><a href="shop.html">Page</a>
                            <ul>
                                <li><a href="#">Column One</a>
                                    <ul>
                                        <li><a href="my-account.html">My Account</a></li>
                                        <li><a href="frequently-question.html">FAQ</a></li>
                                        <li><a href="login-register.html">Login &amp; Register</a></li>
                                        <li><a href="error404.html">Error 404</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Column Two</a>
                                    <ul>
                                        <li><a href="blog-left.html">Blog Left</a></li>
                                        <li><a href="blog.html">Blog Right</a></li>
                                        <li><a href="blog-fullwidth.html">Blog Full Width</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Column Three</a>
                                    <ul>
                                        <li><a href="shop.html">Shop Left</a></li>
                                        <li><a href="shop-right.html">Shop Right</a></li>
                                        <li><a href="shop-fullwidth.html">Shop Full Width</a></li>
                                        <li><a href="wishlist.html">Wish List</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="shop.html">accessories</a></li>
                        <li><a href="shop.html">Special Offers</a></li>
                        <li><a href="about.html">About us</a></li>
                        <li><a href="contact.html">Contact us</a></li>
                        <li><a href="blog.html">Blog</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- mobile-menu-area end-->
    </div>
    <!-- header-top-area end -->
</header>
