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
                                <h4 class="product-name"><a href="{{ route('detail.pro', ['id' => $key->sp_id]) }}">{{ $key->sp_ten }}</a></h4>
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

    <!-- latest-blog-area start -->
    <div class="latest-blog-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title text-center mb-50">
                        <h4>Bài viết của chúng tôi</h4>
                        <h2>BÀI VIẾT MỚI NHẤT </h2>
                        <div class="module-description">
                            Khám phá những bài viết mới nhất của AnnaBooks
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="latest-blog-active owl-carousel">
                    @foreach($showPost as $key)
                    <div class="col">
                        <div class="singel-latest-blog">
                            <div class="aritcles-content">
                                <div class="author-name">
                                    Đăng bởi:<a href="#"> {{ $key->username }}</a> - {{ $key->created_at }}
                                </div>
                                <a href="{{ route('post.detail', ['id' => $key->bv_id]) }}"
                                    class="articles-name">{{ $key->bv_tieude }}
                                </a>
                            </div>
                            <br>
                            <div class="articles-image">
                                <a href="{{ route('post.detail', ['id' => $key->bv_id]) }}">
                                    <img style="height: 240px;" src="{{ asset($key->bv_hinhanh) }}" alt="">
                                    <span class="blog-action">
                                        <i class="icon-picture icons"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- latest-blog-area end -->
@endsection
