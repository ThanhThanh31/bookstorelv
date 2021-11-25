@extends('client.template.master')
@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area ptb-30 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Giới thiệu</li>
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
                @foreach($contacts as $key)
                <div class="col-lg-11 col-sm-12 col-12">
                    <div class="main-blog-wrap pt-100" style="padding: 50px 0px 0 100px">
                        <!-- single-blog-area start -->
                        <div>
                            <div class="blog-titel blog-image">
                                <h2 style="color: #9D4D4A; border-bottom: 1px solid #DADADA; margin-bottom: 25px;">{{ $key->tt_tieude }}</h2>
                            </div>
                            <div class="postinfo-wrapper" style="padding-bottom: 50px">
                                <h5 class="posted-by" style="font-weight: bold">Giới thiệu website của chúng tôi - AnnaBooks </h5>
                                <p class="posted-by">{!! $key->tt_noidung !!}</p>
                            </div>
                            <div class="postinfo-wrapper" style="padding-bottom: 50px">
                                <h5 class="posted-by" style="font-weight: bold">Địa chỉ bản đồ </h5><p class="posted-by">
                                    <p class="posted-by">{!! $key->tt_bando !!}</p>
                            </div>
                            <div class="postinfo-wrapper">
                                <h5 class="posted-by" style="font-weight: bold">Thông tin liên hệ </h5>
                                <p class="posted-by">{!! $key->tt_fanpage !!}</p>
                                <p class="posted-by">{!! $key->tt_lienhe !!}</p>
                            </div>
                        </div>
                        <!-- single-blog-area end -->
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->
@endsection
