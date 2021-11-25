<header>
    {{-- *************slider giao diện*************** --}}
    {{-- @if (Request::segment(1) == '')
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
    @endif --}}

    <!-- header-top-area start -->
    <div id="stickymenu" class="header-inner clearfix bg-white solidblockmenu">
        <div class="container-inner">
            <!-- logo-container start -->
            <div class="logo-container" style="max-width: 245px">
                <div class="logo" style="padding: 9px 0px">
                    <a href="index.html"><img style="height: 48px; max-width: 207px " src="{{ asset('template_client/img/logo/logo.png') }}" alt=""></a>
                </div>
            </div>
            <!-- logo-container end -->
            <!-- main-menu-area start -->
            <div class="horizontal-menu main-menu-area d-none d-lg-block" style="padding-right: 470px">
                <nav>
                    <ul>
                        <li><a href="{{ route('client.index') }}">Trang chủ</a>
                        </li>
                        {{-- <li class="mega_parent"><a href="shop.html">Trang <i class="icon-arrow-down"></i></a>
                            <ul class="mega-menu">
                                <li><a href="#">Column One</a>
                                    <ul>
                                        <li><a href="my-account.html">Tài khoản</a></li>
                                        <li><a href="frequently-question.html">FAQ</a></li>
                                        <li><a href="{{ route('client.form') }}">Đăng nhập &amp; Đăng ký</a></li>
                                        <li><a href="error404.html">Error 404</a></li>
                                        <li class="menu-image"><a href="shop.html"><img
                                                    src="{{ asset('template_client/img/banner/menu-1.jpg') }}"
                                                    alt=""></a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Column Two</a>
                                    <ul>
                                        <li><a href="blog-left.html">Blog Left</a></li>
                                        <li><a href="blog.html">Blog Right</a></li>
                                        <li><a href="blog-fullwidth.html">Blog Full Width</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                        <li class="menu-image"><a href="shop.html"><img
                                                    src="{{ asset('template_client/img/banner/menu-2.jpg') }}"
                                                    alt=""></a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Column Three</a>
                                    <ul>
                                        <li><a href="shop.html">Shop Left</a></li>
                                        <li><a href="shop-right.html">Shop Right</a></li>
                                        <li><a href="shop-fullwidth.html">Shop Full Width</a></li>
                                        <li><a href="wishlist.html">Wish List</a></li>
                                        <li class="menu-image"><a href="shop.html"><img
                                                    src="{{ asset('template_client/img/banner/menu-3.jpg') }}"
                                                    alt=""></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li> --}}
                        <li><a href="{{ route('detail.index') }}">Sản phẩm</a></li>
                        <li><a href="{{ route('information.index') }}">Giới thiệu</a></li>
                        <li><a href="{{ route('post.index') }}">Diễn đàn</a></li>
                    </ul>
                </nav>
            </div>
            <!-- main-menu-area end -->
            <!-- box-right start -->
            <div class="box-right" style="padding-right: 120px">
                {{-- <div id="top-shopoing-cart" class="btn-group"> --}}
                @if (Auth::guard('nguoi_dung')->check() && Auth::guard('nguoi_dung')->user()->q_id == 1)
                    <span class="top-cart-total" style="font-weight: 500; padding-right: 50px">
                    @if (Auth::guard('nguoi_dung')->user()->nd_anh == null)
                    <img style="height: 50px; padding-right: 5px; border-radius: 50%;" src="{{ asset('template_client/img/icon/admin.jpg') }}" alt="">
                    @else
                    <img style="height: 50px; padding-right: 5px; border-radius: 50%;" alt="" src="{{ asset( Auth::guard('nguoi_dung')->user()->nd_anh ) }}">
                    @endif
                    Xin chào, {{ Auth::guard('nguoi_dung')->user()->username }}</span>
                @else
                    <span class="top-cart-total" style="font-weight: 500; padding-right: 50px">
                    <img style="height: 50px; padding-right: 5px; border-radius: 50%;" src="{{ asset('template_client/img/icon/admin.jpg') }}" alt="">
                    <a href="{{ route('client.form') }}">Đăng nhập/Đăng ký</a>
                @endif
                {{-- </div> --}}
            </div>
            <div class="box-right">
                <!-- search-box-area start -->
                <div class="search-box-area">
                    <span class="sidebar-trigger-search"><i class="icon-magnifier icons" title="Tìm kiếm sản phẩm"></i></span>
                </div>
                <!-- search-box-area end -->
                <!-- box-setting start -->
                <div class="box-setting">
                    <div class="btn-group">
                        <button class="settings-box-inner dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="icon-settings icons" @if (Auth::guard('nguoi_dung')->check() && Auth::guard('nguoi_dung')->user()->q_id == 1)
                                title="Xin chào, {{ Auth::guard('nguoi_dung')->user()->username }}" @else title="Đăng nhập tài khoản" @endif></i>
                        </button>
                        <div class="dropdown-menu setting-content">
                            <div class="account">
                                <button class="setting-btn">Tài khoản <i class="icon-arrow-down"></i></button>
                                <ul class="setting-list">
                                    @if (Auth::guard('nguoi_dung')->check() && Auth::guard('nguoi_dung')->user()->q_id == 1)
                                        <li><a href="{{ route('page.manage') }}">Đăng bán sản phẩm</a></li>
                                        <li><a href="{{ route('user.edit') }}">Thông tin người dùng</a></li>
                                        <li><a href="{{ route('user.pass') }}">Thay đổi mật khẩu</a></li>
                                        <li><a href="{{ route('user.logout') }}">Đăng xuất</a></li>
                                    @elseif (Auth::guard('nguoi_dung')->check() && Auth::guard('nguoi_dung')->user()->q_id == 2)
                                        <li><span style="color: white">Xin chào,
                                                {{ Auth::guard('nguoi_dung')->user()->username }}</span></li>
                                        <li><a href="{{ route('client.form') }}">Đăng ký</a></li>
                                        <li><a href="{{ route('client.form') }}">Đăng nhập</a></li>
                                    @else
                                        <li><a href="{{ route('client.form') }}">Đăng ký</a></li>
                                        <li><a href="{{ route('client.form') }}">Đăng nhập</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- box-setting end -->
                <!-- top-shopoing-cart start -->
                {{-- *******************Giỏ hàng*********************** --}}
                {{-- <div id="top-shopoing-cart" class="btn-group">
                    <button class="shopping-cart dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="icon-basket-loaded icons" title="Giỏ hàng của bạn có {{ Cart::count() }} sản phẩm"></i>
                        <span class="top-cart-total">
                            <span class="item-text-number"><b>{{ Cart::count() }}</b></span>
                        </span>
                    </button>
                    @php
				            $subtotal = Cart::subtotal();
                            $total = Cart::total();
				    @endphp
                    <div class="dropdown-menu">
                        <ul class="mini-cart-sub">
                            @foreach (Cart::content() as $item)
                                <li class="single-cart">
                                    <div class="cart-img">
                                        <a href="single-product.html"><img style="width: 67px; height: 90px;"
                                                src="{{ asset($item->options->image) }}" alt=""></a>
                                    </div>
                                    <div class="cart-info">
                                        <a href="single-product.html">{{ $item->name }}</a>
                                        <p class="cart-quantity">×{{ $item->qty }}</p>
                                        <p class="cart-price">{{ number_format($item->price, 0, ',', '.') . ' ' . 'VNĐ' }}</p>
                                    </div>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->name }} khỏi giỏ hàng?')"
                                        href="{{ route('cart.delete', ['rowId' => $item->rowId]) }}" type="button" class="cart-remove" title="Xóa sản phẩm khỏi giỏ hàng"><i
                                            class="ion-android-close">X</i></a>
                                </li>
                            @endforeach
                                <li class="cart-total-box">
                                    <h5>Tổng tiền :<span class="float-right">{{ $subtotal}}</span></h5>
                                </li>
                            <li>
                                <p class="text-center cart-button">
                                    <a href="{{ route('cart.index') }}">Xem giỏ hàng</a>
                                    <a href="checkout.html">Thanh toán</a>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div> --}}
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
