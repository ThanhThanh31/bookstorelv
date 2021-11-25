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
                            <h4 class="filter-title">Giá</h4>
                            <!-- filter-price-content start -->
                            <div class="filter-price-content">
                                <form action="#" method="GET">
                                    <div id="price-slider" class="price-slider"></div>
                                    <div class="filter-price-wapper">
                                        <style type="text/css">
                                            .style-range p {
                                                float: left;
                                                width: 35%;
                                            }
                                        </style>
                                        <div class="style-range">
                                            <p><input type="text" id="amount_start" readonly style="border:0; color:#9D4D4A; font-weight:bold;"></p>
                                            <p><input type="text" id="amount_end" readonly style="border:0; color:#9D4D4A; font-weight:bold;"></p>
                                        </div>
                                        <input type="hidden" name="start_price" id="start_price">
                                        <input type="hidden" name="end_price" id="end_price">
                                        <div class="clearfix"></div>
                                            <input type="submit" name="filter_price" value="Lọc giá" class="btn btn-dark">
                                    </div>
                                </form>
                            </div>
                            <!-- filter-price-content end -->
                        </div>
                        <!-- filter-wrap end -->
                        <!-- filter-wrap start -->
                        <div class="filter-wrap mb-30">
                            <form action="" method="GET">
                                <h4 class="filter-title">Nơi bán</h4>
                                <select name="id_city" id="cityy" class="form-control" style="font-size: 14px">
                                    <option value="">--- Chọn tỉnh thành phố ---</option>
                                    @foreach ($city as $tinh)
                                        <option value="{{ request()->fullUrlWithQuery(['id_city' => $tinh->ttp_id]) }}">
                                            {{ $tinh->ttp_ten }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                        <!-- filter-wrap end -->
                        <!-- filter-wrap start -->
                        <div class="filter-wrap mb-30">
                            <h4 class="filter-title">Thể loại</h4>
                            @foreach ($theloai as $keys)
                                <li><a href="{{ route('detail.cate', ['id' => $keys->tl_id]) }}">{{ $keys->tl_ten }}</a></li>
                            @endforeach
                        </div>
                        <!-- filter-wrap end -->
                        <!-- filter-wrap start -->
                        <div class="filter-wrap">
                            <div class="single-banner-image">
                                <a href="#"><img alt="" src="{{ asset('template_client/img/banner/e.jpg') }}"></a>
                            </div>
                        </div>
                        <!-- filter-wrap end -->
                    </div>
                    <!-- filter-wrapper end -->
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="shop-top-bar pt-100">
                        @if (count($sanpham) == 0)
                            <span style="width: 100%" class="alert alert-warning">Rất tiếc, trang hiện tại không có sản phẩm
                                !!!</span>
                        @else
                            <div class="shop-bar-inner">
                                <div class="product-view-mode">
                                    <!-- shop-item-filter-list start -->
                                    <ul role="tablist" class="nav shop-item-filter-list">
                                        <li role="presentation" class="active"><a href="#grid-view"
                                                aria-controls="grid-view" role="tab" data-toggle="tab"
                                                class="active show" aria-selected="true"><i
                                                    class="fa fa-th"></i></a></li>
                                        <li role="presentation"><a href="#list-view" aria-controls="list-view" role="tab"
                                                data-toggle="tab"><i class="fa fa-th-list"></i></a></li>
                                    </ul>
                                    <!-- shop-item-filter-list end -->
                                </div>
                                <div class="toolbar-amount">
                                    <span>Có {{ count($sanpham) }} sản phẩm ở trang hiện tại trên tổng số
                                        {!! $sanpham->lastPage() !!} trang</span>
                                </div>
                            </div>
                            <!-- product-select-box start -->
                            <div class="product-select-box">
                                <div class="product-short">
                                    <label for="amount">Sắp xếp theo: </label>
                                    <form action="" method="GET">
                                        <select name="sort" id="sort" class="nice-select">
                                            <option value="">Mặc định</option>
                                            <option value="{{ Request::url() }}?sort_by=name_A_Z">Tên sản phẩm (A - Z)
                                            </option>
                                            <option value="{{ Request::url() }}?sort_by=name_Z_A">Tên sản phẩm (Z - A)
                                            </option>
                                            <option value="{{ Request::url() }}?sort_by=prices_increase">Giá (Thấp &gt; Cao)
                                            </option>
                                            <option value="{{ Request::url() }}?sort_by=prices_decrease">Giá (Cao &gt; Thấp)
                                            </option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <!-- product-select-box end -->
                        @endif
                    </div>
                    <!--  shop-products-wrapper strar -->
                    <div class="shop-products-wrapper">
                        <!-- tab-content start -->
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                <div class="shop-product-area">
                                    <div class="row">
                                        @foreach ($sanpham as $key)
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <!-- single-product-area start -->
                                                <div class="single-product-area mt-30">
                                                    <div class="product-thumb">
                                                        <a href="{{ route('detail.pro', ['id' => $key->sp_id]) }}">
                                                            <img style="height: 350px;" class="primary-image"
                                                                src="{{ asset($key->sp_hinhanh) }}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-caption">
                                                        <h4 class="product-name"><a
                                                                href="single-product.html">{{ $key->sp_ten }}</a></h4>
                                                        <div class="price-box">
                                                            <span
                                                                class="new-price">{{ number_format($key->sp_gia, 0, ',', '.') . ' ' . 'VNĐ' }}</span>
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
                                            @foreach ($sanpham as $key)
                                            <div class="col-lg-4 col-md-4">
                                                <div class="product-thumb">
                                                    <a href="{{ route('detail.pro', ['id' => $key->sp_id]) }}">
                                                        <img style="padding-bottom: 20px;" class="primary-image"
                                                            src="{{ asset($key->sp_hinhanh) }}" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8">
                                                <div class="product-caption">
                                                    <h4 class="product-name"><a href="single-product.html">{{ $key->sp_ten }}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">{{ number_format($key->sp_gia, 0, ',', '.') . ' ' . 'VNĐ' }}</span>
                                                    </div>
                                                    <p class="product-des">Tình trạng sản phẩm:
                                                        @if ($key->sp_trangthai == 1)
                                                            <span style="color: #9D4D4A">Đang bán</span>
                                                        @else
                                                            <span style="color: #9D4D4A">Đã bán</span>
                                                        @endif
                                                    </p>
                                                    <p class="product-des"><b>Mô tả</b></p>
                                                    <p class="product-des">{!! $key->sp_mota !!}</p>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- paginatoin-area start -->
                            @if (count($sanpham) != 0)
                                <div class="paginatoin-area">
                                    <div class="row">
                                        <div class="col-12">
                                            <ul class="pagination-box">
                                                @if ($sanpham->currentPage() != 1)
                                                    <li>
                                                        <a class="Pre" href="{!! str_replace('/?', '?', $sanpham->url($sanpham->currentPage() - 1)) !!}">|< </a>
                                                    </li>
                                                @endif
                                                @for ($i = 1; $i <= $sanpham->lastPage(); $i = $i + 1)
                                                    <li>
                                                        <a class="{!! $sanpham->currentPage() == $i ? 'active' : ' ' !!}"
                                                            href="{!! str_replace('/?', '?', $sanpham->url($i)) !!}">{!! $i !!}</a>
                                                    </li>
                                                @endfor
                                                @if ($sanpham->currentPage() != $sanpham->lastPage())
                                                    <li>
                                                        <a class="Next" href="{!! str_replace('/?', '?', $sanpham->url($sanpham->currentPage() + 1)) !!}"> >|</a>
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
    @push('add-pro-by-city')
        <script>
            $(document).ready(function() {
                $('#cityy').change(function(e) {
                    var url = $(this).children("option:selected").val();
                    if (url) {
                        window.location = url;
                    }
                });
                $('#sort').on('change', function() {
                    var sort = $(this).val();
                    if (sort) {
                        window.location = sort;
                    }
                    return false;
                });
                $("#price-slider").slider({
                    range: true,
                    min:{{ $min_price_range }},
                    max:{{ $max_price_range }},
                    values: [ {{ $min_price }}, {{ $max_price }} ],
                    // steps: 10,
                    slide: function(event, ui) {
                        $( "#amount_start" ).val(ui.values[ 0 ] + ' VNĐ');
                        $( "#amount_end" ).val(ui.values[ 1 ] + ' VNĐ');

                        $( "#start_price" ).val(ui.values[ 0 ]);
                        $( "#end_price" ).val(ui.values[ 1 ]);
                    }
                });
                $( "#amount_start" ).val($( "#price-slider" ).slider("values",0) + ' VNĐ');
                $( "#amount_end" ).val($( "#price-slider" ).slider("values",1) + ' VNĐ');
            });
        </script>
    @endpush
@endsection
