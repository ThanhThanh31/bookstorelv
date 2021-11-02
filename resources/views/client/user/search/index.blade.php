@extends('client.template.master')
@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area ptb-30 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Tìm kiếm sản phẩm</li>
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
                            <h4 class="filter-title">Thể loại</h4>
                            @foreach($list_category as $keys)
                            <div class="list_group_item">
                                <ul>
                                    <li><a href="{{ route('detail.cate', ['id' => $keys->tl_id]) }}">{{ $keys->tl_ten }}</a></li>
                                </ul>
                            </div>
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
                                @if (count($search_product) == 0)
                                <span>Không tìm thấy sản phẩm nào khớp với lựa chọn của bạn !!!</span>
                                @else
                                <span>Tìm thấy {{ count($search_product) }} sản phẩm ở trang hiện tại trên tổng số {!! $search_product->lastPage() !!} trang</span>
                                @endif
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
                                                    <h4 class="product-name"><a href="single-product.html">{{ $keys->sp_ten }}</a></h4>
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
                            <!-- paginatoin-area start -->
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
