@extends('client.template.master')
@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area ptb-30 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Chi tiết sản phẩm - {{ $pro->sp_ten }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <!-- main-content-wrap start -->
    <div class="main-content-wrap pt-100">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="sinlge-product-wrap">
                        @if (session()->has('report'))
                            <i>
                                <div class="alert alert-success">
                                    {{ session()->get('report') }}
                                </div>
                            </i>
                        @endif
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="single-product-tab">
                                    <div class="zoomWrapper">
                                        <div id="img-1" class="zoomWrapper single-zoom" style="text-align:center;">
                                            <a href="{{ route('detail.pro', ['id' => $pro->sp_id]) }}">
                                                <img style="height: 450px; width: 300px;" id="zoom1"
                                                    src="{{ asset($pro->sp_hinhanh) }}" data-zoom-image="" alt="big-1">
                                            </a>
                                        </div>
                                        <div class="single-zoom-thumb">
                                            <ul class="s-tab-zoom single-product-active owl-carousel" id="gallery_01">
                                                <li>
                                                    <a href="#" class="elevatezoom-gallery active" data-update=""
                                                        data-image="" data-zoom-image="">
                                                        <img style="height: 150px" src="{{ asset($pro->sp_hinhanh) }}"
                                                            alt="zo-th-1" />
                                                    </a>
                                                </li>
                                                @foreach ($imagg as $keys)
                                                    <li class="">
                                                        <a href="#" class="elevatezoom-gallery" data-image=""
                                                            data-zoom-image="">
                                                            <img style="height: 150px"
                                                                src="{{ asset($keys->a_duongdan) }}" alt="zo-th-2">
                                                            <input class="form-control" type="hidden" id=""
                                                                value="{{ $keys->a_duongdan }}" @if ($pro->a_id == $keys->a_id) @endif>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <!-- product-thumbnail-content start -->
                                <div class="quick-view-content">
                                    <div class="product-info">
                                        <h2>{{ $pro->sp_ten }}</h2>
                                        <div class="price-box">
                                            <span
                                                class="new-price">{{ number_format($pro->sp_gia, 0, ',', '.') . ' ' . 'VNĐ' }}</span>
                                        </div>
                                        <ul class="list-unstyled">
                                            <li>Người đăng bán: &emsp;{{ $pro->username }}</li>
                                            <li>Số điện thoại: &emsp;{{ $pro->nd_sdt }}</li>
                                            <li>Nơi bán: &emsp;{{ $pro->ttp_ten }}</li>
                                            <li>Tác giả: &emsp;{{ $pro->tg_ten }}</li>
                                            <li>Thể loại: &emsp;<a
                                                    href="{{ route('detail.cate', ['id' => $pro->tl_id]) }}">{{ $pro->tl_ten }}</a>
                                            </li>
                                            <li>Lĩnh vực: &emsp;<a
                                                    href="{{ route('detail.field', ['id' => $pro->lv_id]) }}">{{ $pro->lv_ten }}</a>
                                        </ul>

                                        @if ($pro->sp_trangthai == 1) {{-- Trạng thái = 1: Đang bán --}}
                                            @if ($pro->sp_tinhtrang == 1)
                                                <ul class="quick-add-to-cart">
                                                    <li><a href="#" class="add-to-cart">Chat với người bán</a></li>
                                                </ul>
                                                <ul class="quick-add-to-cart">
                                                    <li><a href="{{ route('detail.pageUser', ['id' => $pro->nd_id]) }}"
                                                            class="add-to-cart">Xem trang người bán</a></li>
                                                </ul>
                                            @endif
                                            <ul class="quick-add-to-cart">
                                                <!-- Button trigger modal -->
                                                @if (Auth::guard('nguoi_dung')->check() && Auth::guard('nguoi_dung')->user()->q_id == 1)
                                                    @if ($pro->sp_tinhtrang == 2)
                                                        <li style="width: 100%; text-align: center"
                                                            class="alert alert-warning">Sản phẩm đã bị
                                                            ẩn do báo cáo vi phạm</li>
                                                    @else
                                                        <a style="background: #9d4d4a none repeat scroll 0 0; border-radius: 25px; color: #ffffff; font-size: 14px; display: block; font-weight: 500; height: 45px; line-height: 45px; margin-right: 360px; padding: 0 25px; text-transform: capitalize;"
                                                        type="button" class="btn btn-secondary" data-toggle="modal"
                                                            data-target="#exampleModal">Báo cáo vi phạm
                                                        </a>
                                                        <!-- Modal -->
                                                        <form action="{{ route('report.product', ['id' => $pro->sp_id]) }}">
                                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">Báo cáo vi
                                                                                phạm sản phẩm đăng bán
                                                                            </h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <textarea rows="5" cols="100"
                                                                                        name="noidungvipham"
                                                                                        class="form-control"
                                                                                        placeholder=" Nhập vào nội dung vi phạm ..."></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Đóng</button>
                                                                            <button onclick="return confirm('Xác nhận báo cáo vi phạm sản phẩm {{ $pro->sp_ten }} ?')" type="submit"
                                                                                class="btn btn-primary">Gửi</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    @endif
                                                @else
                                                    @if ($pro->sp_tinhtrang == 2)
                                                        <li style="width: 100%; text-align: center"
                                                            class="alert alert-warning">Sản phẩm đã bị
                                                            ẩn do báo cáo vi phạm</li>
                                                    @endif
                                                @endif
                                            </ul>
                                        @else {{-- Trạng thái = 2: Đã bán --}}
                                            <ul class="quick-add-to-cart">
                                                <li style="width: 100%; text-align: center" class="alert alert-danger">Sản
                                                    phẩm đã bán hết !!!</li>
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                                <!-- product-thumbnail-content end -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="product-info-detailed mt-100">
                                    <div class="discription-tab-menu">
                                        <ul role="tablist" class="nav">
                                            <li class="active"><a href="#description" data-toggle="tab"
                                                    class="active show">Thông tin chi tiết</a></li>
                                            <li><a href="#descriptionn" data-toggle="tab">Mô tả sản phẩm</a></li>
                                            {{-- <li><a href="#review" data-toggle="tab">Bình luận</a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="discription-content">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active show" id="description">
                                            <div class="description-content">
                                                <table class="table table">
                                                    <tbody>
                                                        <tr>
                                                            <th>Công ty phát hành</th>
                                                            <td>{{ $pro->cty_ten }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Kích thước</th>
                                                            <td>{{ $pro->sp_kichthuoc }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Số trang</th>
                                                            <td>{{ $pro->sp_sotrang }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Loại bìa</th>
                                                            <td>{{ $pro->lb_ten }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Nhà xuất bản</th>
                                                            <td>{{ $pro->nxb_ten }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="descriptionn">
                                            <div class="description-content">
                                                <p>{!! $pro->sp_mota !!}</p>
                                            </div>
                                        </div>
                                        <div id="review" class="tab-pane fade">
                                            @if (Auth::guard('nguoi_dung')->check() && Auth::guard('nguoi_dung')->user()->q_id == 1)
                                                <form class="form-review" action="">
                                                    <div class="review-wrap">
                                                        <h2>Viết bình luận của bạn...</h2>
                                                        <div class="form-group row">
                                                            <div class="col">
                                                                <label class="control-label">Bình luận</label>
                                                                <input type="hidden" name="sp_id" value="{{ $pro->sp_id }}">
                                                                <textarea id="comment-content" name="content" class="form-control" placeholder="Nhập nội dung bình luận..."></textarea>
                                                                <small style="color: red" id="comment-error" class="help-pro"></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="buttons clearfix">
                                                        <div class="pul-right">
                                                            <button id="btn-comment" class="button-review" type="submit">Gửi</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            @else
                                                <ul style="width: 100%; text-align: center" class="alert alert-warning">Đăng
                                                    nhập hoặc đăng ký tài khoản để bình
                                                    luận sản phẩm...</ul>
                                            @endif
                                            <div class="review" id="reviews">
                                                <!-- comments-area  start -->
                                                <div class="comments-area mt-100" id="">
                                                    <h4>Có bình luận</h4>
                                                    {{-- <ol class="commentlist">
                                                        @foreach ($binhluan as $key)
                                                            <li>
                                                                <div class="single-comment">
                                                                    @if ($key->nd_anh == null)
                                                                        <div class="comment-avatar img-full">
                                                                            <img style="height: 50px; border-radius: 50%;"
                                                                                alt=""
                                                                                src="{{ asset('template_client/img/icon/admin.jpg') }}">
                                                                        </div>
                                                                    @else
                                                                        <div class="comment-avatar img-full">
                                                                            <img style="height: 50px; border-radius: 50%;"
                                                                                alt="" src="{{ asset($key->nd_anh) }}">
                                                                        </div>
                                                                    @endif
                                                                    <div class="comment-info">
                                                                        <a href="#">{{ $key->username }}</a>
                                                                        <div class="reply">
                                                                            <a href="#">Trả lời</a>
                                                                        </div>
                                                                        <span class="date">{{ $key->created_at }}</span>
                                                                        <p>{!! $key->bs_noidung !!}</p>
                                                                    </div>
                                                                </div>
                                                                <ol>
                                                                    <li>
                                                                        <div class="single-comment">
                                                                            <div class="comment-avatar img-full">
                                                                                <img alt="" src="img/icon/admin.jpg">
                                                                            </div>
                                                                            <div class="comment-info">
                                                                                <a href="#">admin</a>
                                                                                <div class="reply">
                                                                                    <a href="#">Trả lời</a>
                                                                                </div>
                                                                                <span class="date">October 6, 2014 at 1:38 am</span>
                                                                                <p>just a nice post</p>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ol>
                                                            </li>
                                                        @endforeach
                                                    </ol> --}}
                                                </div>
                                                {{-- @include('posts.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id]) --}}
                                                <!-- comments-area  end -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="related-products box-module pt-100">
                        <div class="row">
                            <div class="col">
                                <div class="section-title text-center mb-50">
                                    <h4>Sản Phẩm Của Chúng Tôi</h4>
                                    <h2>Sản phẩm tương tự</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @if (count($same) == 0)
                                <span style="width: 100%; text-align: center" class="alert alert-warning">Rất tiếc, hiện tại
                                    không có sản phẩm
                                    tương tự nào !!!</span>
                            @else
                                <div class="product-active owl-carousel">
                                    @foreach ($same as $key)
                                        <div class="col-lg-3">
                                            <!-- single-product-area start -->
                                            <div class="single-product-area">
                                                <div class="product-thumb">
                                                    <a href="{{ route('detail.pro', ['id' => $key->sp_id]) }}">
                                                        <img style="height: 350px;" class="primary-image"
                                                            src="{{ asset($key->sp_hinhanh) }}" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-caption">
                                                    <h4 class="product-name"><a
                                                            href="{{ route('detail.pro', ['id' => $key->sp_id]) }}">{{ $key->sp_ten }}</a>
                                                    </h4>
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
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->
@endsection
