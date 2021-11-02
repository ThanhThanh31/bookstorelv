@extends('client.template.master')
@section('content')
    <div class="welcome-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wlc-setion-title text-center mt-100">
                        <h2 style="color: #9D4D4A"><b>Chào mừng đến với AnnaBooks !</b></h2>
                        <p>AnnaBooks - Tri thức là bất tận, kết nối những sẻ chia !!!</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="welcome-imgae mt-50">
                        <a href="">
                            <img style="max-width: 100%; height: 400px" src="{{ asset('template_client/img/banner/sayhi.jpg') }}" alt="">
                            <span class="text_right" style="right: 20px;">company history</span>
                        </a>
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
                    <div class="corporate-about-section" style="padding: 38px 0px 0px 0px;">
                    </div>
                    <!-- corporate-about-section end -->

                    <!-- product-module-2-area start -->
                    <div class="product-module-2-area border-solid-1 ptb-100">
                        <div class="row">
                            <div class="col">
                                <div class="section-title text-center mb-50">
                                    <h3 style="color: #9D4D4A"><b>THỂ LOẠI SẢN PHẨM</b></h3>
                                    <div class="module-description">
                                        <p>Khám phá tất cả thể loại sản phẩm của AnnaBooks</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="product-module-2-active owl-carousel">
                                @foreach($showCate as $keys) 
                                <div class="list-syle-item">
                                    <div class="product-wrap">
                                        <div class="product-caption right-caption text-right" style="width: 100%;">
                                            <h4 class="product-name"><a href="{{ route('detail.cate', ['id' => $keys->tl_id]) }}">{{ $keys->tl_ten }}</a>
                                            </h4>
                                            <p class="product-des">{!! $keys->tl_mota !!}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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
                        <h4>SẢN PHẨM CỦA CHÚNG TÔI</h4>
                        <h2>SẢN PHẨM MỚI NHẤT</h2>
                        <div class="module-description">
                            <p>Khám phá những sản phẩm mới nhất của AnnaBooks</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product-active owl-carousel">
                    @foreach($showPro as $key)
                    <div class="col-lg-3">
                        <!-- single-product-area start -->
                        <div class="single-product-area">
                            <div class="product-thumb">
                                <a href="{{ route('detail.pro', ['id' => $key->sp_id]) }}">
                                    <img style="height: 350px;" class="primary-image" src="{{ asset($key->sp_hinhanh) }}"
                                        alt="">
                                </a>
                            </div>
                            <div class="product-caption">
                                <h4 class="product-name"><a href="{{ $key->sp_id }}">{{ $key->sp_ten }}</a></h4>
                                <div class="price-box">
                                    <span class="new-price">{{number_format($key->sp_gia,0,',','.').' '.'VNĐ'}}</span>
                                </div>
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
