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
                <div class="list" style="float: left; margin-left: 80px; padding: 17px;">
                    <a href="{{ route('detail.pro', ['id' => $nd->nd_id]) }}"></a>
                    @if ($nd->nd_anh == null)
                        <div>
                            <img style="border-radius: 50%; border-radius: 50%; width: 16%;" alt="" src="{{ asset('template_client/img/icon/admin.jpg') }}">
                            <b style="padding-left: 10px">{{ $nd->username }}</b>
                        </div>
                    @else
                        <div>
                            <img style="border-radius: 50%; border-radius: 50%; width: 16%;" alt="" src="{{ asset($nd->nd_anh) }}">
                            <b style="padding-left: 10px">{{ $nd->username }}</b>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="list" style="padding: 17px 90px">
                    <ul class="show">
                        <li>Ngày tham gia: &emsp;<b>{{ $nd->created_at }}</b></li>
                        <li>Địa chỉ: &emsp;<b>{{ $nd->nd_diachi }}</b></li>
                        <li>Số điện thoại: &emsp;<b>{{ $nd->nd_sdt }}</b></li>
                        <li>Số sản phẩm đã đăng bán: &emsp;<b>{{ count($store) }}</b></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content-wrap">
        <div class="container">
            <div class="row">
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
            </div>
        </div>
        <!-- main-content-wrap end -->
    @endsection
