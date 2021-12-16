@extends('client.template.master')
@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area ptb-30 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Trang cá nhân của {{ $nd->username }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->
    <!-- main-content-wrap start -->

    <div class="container" style="padding-top: 30px">
        <div class="row" style="border: 1px solid #eee;">
            <div class="col-lg-5 col-md-6" style="border-right: 1px solid #eee;">
                <div class="list" style="float: left; margin-left: 20px; padding: 17px;">
                    <a href="{{ route('detail.pro', ['id' => $nd->nd_id]) }}"></a>
                    @if ($nd->nd_anh == null)
                        <div>
                            <img style="border-radius: 50%; border-radius: 50%; width: 20%;" alt="" src="{{ asset('template_client/img/icon/admin.jpg') }}">
                            <span style="padding-left: 20px; font-weight: 600">{{ $nd->username }}</span>
                        </div>
                    @else
                        <div>
                            <img style="border-radius: 50%; border-radius: 50%; width: 20%;" alt="" src="{{ asset($nd->nd_anh) }}">
                            <span style="padding-left: 20px; font-weight: 600">{{ $nd->username }}</span>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="list" style="margin-left: 20px; padding: 17px">
                    <ul class="show">
                        <li>Ngày tham gia: &emsp;<span style="font-weight: 600">{{ \Carbon\Carbon::parse($nd->created_at)->toDateString() }}</span></li>
                        <li>Địa chỉ: &emsp;<span style="font-weight: 600">{{ $nd->ttp_ten }},&nbsp;{{ $nd->qh_ten }},&nbsp;{{ $nd->xp_ten }}</span></li>
                        <li>Số điện thoại: &emsp;<span style="font-weight: 600">{{ $nd->nd_sdt }}</span></li>
                        <li>Số sản phẩm: &emsp;<span style="font-weight: 600">{{ count($store) }}</span></li>
                        <li>Số bài viết: &emsp;<span style="font-weight: 600">{{ count($post) }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content-wrap">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="product-info-detailed mt-100">
                        <div class="discription-tab-menu">
                            <ul role="tablist" class="nav">
                                <li class="active"><a href="#description" data-toggle="tab"
                                        class="active show">Sản phẩm</a></li>
                                <li><a href="#descriptionn" data-toggle="tab">Bài viết</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="discription-content">
                        <div class="tab-content">
                            <div class="tab-pane fade in active show" id="description">
                                <div class="description-content">
                                    @if (count($store) == 0)
                                        <span style="width: 100%" class="alert alert-warning">Hiện tại chưa có sản phẩm nào đăng bán !!!</span>
                                    @else
                                    <!--  shop-products-wrapper strar -->
                                    <div class="shop-products-wrapper">
                                        <!-- tab-content start -->
                                        <div class="tab-content">
                                            <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                                <div class="shop-product-area">
                                                    <div class="row">
                                                        @foreach($store as $key)
                                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                                            <!-- single-product-area start -->
                                                            <div class="single-product-area mt-30">
                                                                <div class="product-thumb">
                                                                    <a href="{{ route('detail.pro', ['id' => $key->sp_id]) }}">
                                                                        <img style="height: 350px;"class="primary-image" src="{{ asset($key->sp_hinhanh) }}" alt="">
                                                                    </a>
                                                                    @if ($key->sp_soluong == 0)
                                                                    <div class="label-product label_sale">Hết</div>
                                                                    @endif
                                                                    @if ($key->sp_tinhtrang == 2)
                                                                    <div class="label-product label_new">Khóa</div>
                                                                    @endif
                                                                </div>
                                                                <div class="product-caption">
                                                                    <h4 class="product-name"><a href="{{ route('detail.pro', ['id' => $key->sp_id]) }}">{{ $key->sp_ten }}</a></h4>
                                                                    <div class="price-box">
                                                                        <span class="new-price">{{number_format($key->sp_gia,0,',','.').' '.'VNĐ'}}</span>
                                                                    </div>
                                                                    @if ($key->sp_soluong == 0)
                                                                    <a href="" class="action-cart-btn">
                                                                        Sản phẩm đã hết hàng
                                                                    </a>
                                                                    @else
                                                                    <a href="{{ route('cart.add', ['id' => $key->sp_id]) }}" class="action-cart-btn">
                                                                        Thêm vào giỏ hàng
                                                                    </a>
                                                                    @endif
                                                                    @if ($key->sp_tinhtrang == 2)
                                                                    <a href="" class="action-cart-btn">
                                                                        Sản phẩm đang tạm khóa
                                                                    </a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <!-- single-product-area end -->
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <!-- Phân trang - start -->
                                                {{-- @if (count($store) != 0)
                                                <div class="paginatoin-area">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <ul class="pagination-box">
                                                                @if ($store->currentPage() != 1)
                                                                    <li>
                                                                        <a class="Pre" href="{!! str_replace('/?', '?', $store->url($store->currentPage() - 1)) !!}">|< </a>
                                                                    </li>
                                                                @endif
                                                                @for ($i = 1; $i <= $store->lastPage(); $i = $i + 1)
                                                                    <li>
                                                                        <a class="{!! $store->currentPage() == $i ? 'active' : ' ' !!}"
                                                                            href="{!! str_replace('/?', '?', $store->url($i)) !!}">{!! $i !!}</a>
                                                                    </li>
                                                                @endfor
                                                                @if ($store->currentPage() != $store->lastPage())
                                                                    <li>
                                                                        <a class="Next" href="{!! str_replace('/?', '?', $store->url($store->currentPage() + 1)) !!}"> >|</a>
                                                                    </li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif --}}
                                                <!-- Phân trang end -->
                                            </div>
                                            <!-- tab-content end -->
                                        </div>
                                        <!--  shop-products-wrapper end -->
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane" id="descriptionn">
                                <div class="description-content">
                                    @if (count($post) == 0)
                                        <span style="width: 100%" class="alert alert-warning">Hiện tại chưa có bài viết nào được đăng tải !!!</span>
                                    @else
                                    <div class="main-blog-wrap pt-100" style="padding-top: 1px">
                                        <!-- single-blog-area start -->
                                        @foreach ($post as $key)
                                            <div class="single-blog-area" id="listPost">
                                                <div class="post-category">
                                                </div>
                                                <div class="blog-titel blog-image">
                                                    <h1><a href="{{ route('post.detail', ['id' => $key->bv_id]) }}"><span style="text-transform: capitalize">{{ $key->bv_tieude }}</span></a>
                                                    </h1>
                                                </div>
                                                <span class="post-author">
                                                    <span class="posted-by">Bài viết được đăng bởi </span><span style="text-transform: capitalize">{{ $key->username }}</span>
                                                </span>
                                                <span class="post-separator"> | </span>
                                                <span class="post-date">{{ \Carbon\Carbon::parse($key->created_at)->toDateString() }}</span>
                                                <div class="post-thumbnail">
                                                    <a href="{{ route('post.detail', ['id' => $key->bv_id]) }}">
                                                        <img src="{{ asset($key->bv_hinhanh) }}" alt="">
                                                    </a>
                                                </div>
                                                <div class="postinfo-wrapper">
                                                    <p class="mb-30">{!! $key->bv_tomtat !!}</p>
                                                    <a href="{{ route('post.detail', ['id' => $key->bv_id]) }}"
                                                        class="readmore button" title="{{ $key->bv_tieude }}">Đọc bài viết</a>
                                                </div>
                                            </div>
                                        @endforeach
                                        <!-- single-blog-area end -->
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="shop-top-bar pt-100">
                        @if (count($store) == 0)
                            <span style="width: 100%" class="alert alert-warning">Hiện chưa có sản phẩm nào đăng bán !!!</span>
                        @else
                        <div class="shop-bar-inner">
                            <div class="product-view-mode">
                            </div>
                        </div>
                    </div>
                    @endif
                    <!--  shop-products-wrapper strar -->
                    <div class="shop-products-wrapper">
                        <!-- tab-content start -->
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                <div class="shop-product-area">
                                    <div class="row">
                                        @foreach($store as $key)
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <!-- single-product-area start -->
                                            <div class="single-product-area mt-30">
                                                <div class="product-thumb">
                                                    <a href="{{ route('detail.pro', ['id' => $key->sp_id]) }}">
                                                        <img style="height: 350px;"class="primary-image" src="{{ asset($key->sp_hinhanh) }}" alt="">
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
                                <!-- paginatoin-area start -->
                                <!-- paginatoin-area start -->
                            @if (count($store) != 0)
                            <div class="paginatoin-area">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="pagination-box">
                                            @if ($store->currentPage() != 1)
                                                <li>
                                                    <a class="Pre" href="{!! str_replace('/?', '?', $store->url($store->currentPage() - 1)) !!}">|< </a>
                                                </li>
                                            @endif
                                            @for ($i = 1; $i <= $store->lastPage(); $i = $i + 1)
                                                <li>
                                                    <a class="{!! $store->currentPage() == $i ? 'active' : ' ' !!}"
                                                        href="{!! str_replace('/?', '?', $store->url($i)) !!}">{!! $i !!}</a>
                                                </li>
                                            @endfor
                                            @if ($store->currentPage() != $store->lastPage())
                                                <li>
                                                    <a class="Next" href="{!! str_replace('/?', '?', $store->url($store->currentPage() + 1)) !!}"> >|</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!-- paginatoin-area end -->
                            </div>
                            <!-- tab-content end -->
                        </div>
                        <!--  shop-products-wrapper end -->
                    </div>
                </div>
            </div> --}}
        </div>
        <!-- main-content-wrap end -->
    @endsection
