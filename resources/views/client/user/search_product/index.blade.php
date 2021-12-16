@extends('client.template.master')
@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area ptb-30 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Kết quả tìm kiếm sản phẩm</li>
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
                            <h4 class="filter-title">Thể loại</h4>
                            @foreach($list_category as $keys)
                                    <li><a href="{{ route('detail.cate', ['id' => $keys->tl_id]) }}">{{ $keys->tl_ten }}</a></li>
                            @endforeach
                        </div>
                        <!-- filter-wrap end -->

                        <!-- filter-wrap start -->
                        <div class="filter-wrap">
                            <div class="single-banner-image">
                                <a href="#"><img alt="" src="{{ asset('template_client/img/banner/d.jpg') }}"></a>
                            </div>
                        </div>
                        <!-- filter-wrap end -->
                    </div>
                    <!-- filter-wrapper end -->
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="shop-top-bar pt-100">
                        @if (count($search_product) == 0)
                                <span style="width: 100%" class="alert alert-warning">Rất tiếc, không tìm thấy sản phẩm phù hợp với lựa chọn của bạn !!!</span>
                        @else
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
                                <span>Tìm thấy {{ count($search_product) }} sản phẩm ở trang hiện tại trên tổng số {!! $search_product->lastPage() !!} trang</span>
                            </div>
                        </div>
                        <!-- product-select-box start -->
                        @endif
                        <!-- product-select-box end -->
                    </div>
                    <!--  shop-products-wrapper strar -->
                    <div class="shop-products-wrapper">
                        <!-- tab-content start -->
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                <div class="shop-product-area">
                                    <div class="row">
                                        @foreach($search_product as $keys)
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <!-- single-product-area start -->
                                            <div class="single-product-area mt-30">
                                                <div class="product-thumb">
                                                    <a href="{{ route('detail.pro', ['id' => $keys->sp_id]) }}">
                                                        <img style="height: 350px;" class="primary-image" src="{{ asset($keys->sp_hinhanh) }}" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-caption">
                                                    <h4 class="product-name"><a href="{{ route('detail.pro', ['id' => $keys->sp_id]) }}" style="text-transform: capitalize">{{ $keys->sp_ten }}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">{{number_format($keys->sp_gia,0,',','.').' '.'VNĐ'}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-area end -->
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div id="list-view" class="tab-pane fade" role="tabpanel">
                                <div class="row">
                                    <div class="col">
                                        <div class="row product-layout-list">
                                            @foreach($search_product as $keys)
                                            <div class="col-lg-4 col-md-4">
                                                <div class="product-thumb">
                                                    <a href="{{ route('detail.pro', ['id' => $keys->sp_id]) }}">
                                                        <img style="padding-bottom: 20px;" class="primary-image"
                                                            src="{{ asset($keys->sp_hinhanh) }}" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8">
                                                <div class="product-caption">
                                                    <h4 class="product-name"><a href="{{ route('detail.pro', ['id' => $keys->sp_id]) }}" style="text-transform: capitalize">{{ $keys->sp_ten }}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">{{ number_format($keys->sp_gia, 0, ',', '.') . ' ' . 'VNĐ' }}</span>
                                                    </div>
                                                    <p class="product-des">Tình trạng sản phẩm:
                                                        @if ($keys->sp_trangthai == 1)
                                                            <span style="color: #9D4D4A">Đang bán</span>
                                                        @else
                                                            <span style="color: #9D4D4A">Đã bán</span>
                                                        @endif
                                                    </p>
                                                    <p class="product-des"><b>Mô tả</b></p>
                                                    <p class="product-des">{!! $keys->sp_mota !!}</p>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- paginatoin-area start -->
                            @if (count($search_product) != 0)
                            <div class="paginatoin-area">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="pagination-box">
                                            @if($search_product->currentPage() != 1)
                                            <li>
                                                <a class="Pre" href="{!! str_replace('/?','?',$search_product->url($search_product->currentPage() - 1)) !!}">|< </a>
                                            </li>
                                            @endif
                                            @for ($i = 1; $i <= $search_product->lastPage(); $i = $i + 1)
                                            <li>
                                                <a class="{!! ($search_product->currentPage() == $i) ? 'active' : ' ' !!}" href="{!! str_replace('/?','?',$search_product->url($i)) !!}">{!! $i !!}</a>
                                            </li>
                                            @endfor
                                            @if($search_product->currentPage() != $search_product->lastPage())
                                            <li>
                                                <a class="Next" href="{!! str_replace('/?','?',$search_product->url($search_product->currentPage() + 1)) !!}"> >|</a>
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
