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
                        @if (session()->has('danger'))
                            <i>
                                <div class="alert alert-danger">
                                    {{ session()->get('danger') }}
                                </div>
                            </i>
                        @endif
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="single-product-tab">
                                    <div class="zoomWrapper">
                                        <div id="img-1" class="zoomWrapper single-zoom" style="text-align:center;">
                                            <a href="">
                                                <img style="height: 450px; width: 300px;" id="zoom1"
                                                    src="{{ asset($pro->sp_hinhanh) }}"
                                                    data-zoom-image="{{ asset($pro->sp_hinhanh) }}" alt="big-1">
                                            </a>
                                        </div>
                                        <div class="single-zoom-thumb">
                                            <ul class="s-tab-zoom single-product-active owl-carousel" id="gallery_01">
                                                @if (count($imagg) != 0)
                                                    <li>
                                                        <a href="#" class="elevatezoom-gallery active" data-update=""
                                                            data-image="{{ asset($pro->sp_hinhanh) }}"
                                                            data-zoom-image="{{ asset($pro->sp_hinhanh) }}">
                                                            <img style="height: 150px" src="{{ asset($pro->sp_hinhanh) }}"
                                                                alt="zo-th-1" />
                                                        </a>
                                                    </li>
                                                @endif
                                                @foreach ($imagg as $keys)
                                                    <li>
                                                        <a href="" class="elevatezoom-gallery"
                                                            data-image="{{ asset($keys->a_duongdan) }}"
                                                            data-zoom-image="{{ asset($keys->a_duongdan) }}">
                                                            <img style="height: 150px"
                                                                src="{{ asset($keys->a_duongdan) }}" alt="zo-th-2">
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
                                        @if ($pro->sp_tinhtrang == 1)
                                            <div class="price-box">
                                                <span
                                                    class="new-price">{{ number_format($pro->sp_gia, 0, ',', '.') . ' ' . 'VNĐ' }}</span>
                                            </div>
                                            <ul class="list-unstyled">
                                                <li>Người đăng bán: &emsp;{{ $pro->username }}</li>
                                                <li>Số điện thoại: &emsp;{{ $pro->nd_sdt }}</li>
                                                <li>Nơi bán:
                                                    &emsp;{{ $pro->ttp_ten }},&nbsp;{{ $pro->qh_ten }},&nbsp;{{ $pro->xp_ten }}
                                                </li>
                                                <li>Tác giả: &emsp;{{ $pro->tg_ten }}</li>
                                                <li>Thể loại: &emsp;<a
                                                        href="{{ route('detail.cate', ['id' => $pro->tl_id]) }}">{{ $pro->tl_ten }}</a>
                                                </li>
                                                <li>Lĩnh vực: &emsp;<a
                                                        href="{{ route('detail.field', ['id' => $pro->lv_id]) }}">{{ $pro->lv_ten }}</a>
                                                </li>
                                                <li>Số lượng hiện có: &emsp;{{ $pro->sp_soluong }}</li>
                                            </ul>
                                        @endif
                                        @if ($pro->sp_soluong == 0)
                                            <ul class="quick-add-to-cart">
                                                <li style="width: 100%; text-align: center" class="alert alert-danger">Sản
                                                    phẩm đã hết hàng !!!</li>
                                            </ul>
                                        @else
                                            @if ($pro->sp_tinhtrang == 1)
                                                @if (Auth::guard('nguoi_dung')->check() && Auth::guard('nguoi_dung')->user()->q_id == 1)
                                                    <ul class="quick-add-to-cart">
                                                        <li><a href="#" class="add-to-cart">Thêm vào giỏ hàng</a></li>
                                                    </ul>
                                                @endif
                                                <ul class="quick-add-to-cart">
                                                    <li><a href="{{ route('detail.pageUser', ['id' => $pro->nd_id]) }}"
                                                            class="add-to-cart">Xem trang người bán</a></li>
                                                </ul>
                                            @endif
                                            <ul class="quick-add-to-cart">
                                                <!-- Button trigger modal -->
                                                @if (Auth::guard('nguoi_dung')->check() && Auth::guard('nguoi_dung')->user()->q_id == 1)
                                                    @if ($pro->sp_tinhtrang == 2)
                                                        <!--san pham bi an -->
                                                        <li style="width: 100%; text-align: center"
                                                            class="alert alert-warning">Sản phẩm đã bị
                                                            ẩn do báo cáo vi phạm</li>
                                                    @else
                                                        <a style="background: #9d4d4a none repeat scroll 0 0; border-radius: 25px; color: #ffffff; font-size: 14px; display: block; font-weight: 500; height: 45px; line-height: 45px; margin-right: 400px; padding: 0 25px; text-transform: capitalize;"
                                                            type="button" class="btn btn-secondary" data-toggle="modal"
                                                            data-target="#exampleModal">Báo cáo
                                                        </a>
                                                        <!-- Modal -->
                                                        <form
                                                            action="{{ route('report.product', ['id' => $pro->sp_id]) }}">
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
                                                                            <button
                                                                                onclick="return confirm('Xác nhận báo cáo vi phạm sản phẩm {{ $pro->sp_ten }} ?')"
                                                                                type="submit"
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
                                        @endif
                                    </div>
                                </div>
                                <!-- product-thumbnail-content end -->
                            </div>
                        </div>
                        @if ($pro->sp_tinhtrang == 1)
                            <div class="row">
                                <div class="col">
                                    <div class="product-info-detailed mt-100">
                                        <div class="discription-tab-menu">
                                            <ul role="tablist" class="nav">
                                                <li class="active"><a href="#description" data-toggle="tab"
                                                        class="active show">Thông tin chi tiết</a></li>
                                                <li><a href="#descriptionn" data-toggle="tab">Mô tả sản phẩm</a></li>
                                                <li><a href="#review" data-toggle="tab">Bình luận</a></li>
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
                                                    <div class="col-lg-12">
                                                        <h3 class="comment-reply-title">Viết bình luận của bạn...</h3>
                                                        <form class="comment-form-area"
                                                            action="{{ route('comment.product', ['id' => $pro->sp_id]) }}"
                                                            method="POST">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <p class="comment-form-comment">
                                                                <label>Bình luận</label>
                                                                <textarea name="comment"
                                                                    placeholder="Nội dung bình luận"></textarea>
                                                            </p>
                                                            </p>
                                                            <div class="comment-form-submit">
                                                                <input type="submit" class="comment-submit"
                                                                    value="Gửi bình luận">
                                                            </div>
                                                        </form>
                                                    </div>
                                                @else
                                                    <ul style="width: 100%; text-align: center" class="alert alert-warning">
                                                        Đăng
                                                        nhập hoặc đăng ký tài khoản để bình
                                                        luận sản phẩm...</ul>
                                                @endif
                                                <div class="review" id="reviews">
                                                    <!-- comments-area  start -->
                                                    <div class="comments-area mt-100">
                                                        <h4>Có {{ count($parent) + count($child) }} bình luận</h4>
                                                        @foreach ($parent as $key)
                                                            <ol class="commentlist">
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
                                                                                    alt=""
                                                                                    src="{{ asset($key->nd_anh) }}">
                                                                            </div>
                                                                        @endif
                                                                        <div class="comment-info">
                                                                            @if ($pro->username == $key->username)
                                                                                <i class="fa fa-star">&ensp;Người
                                                                                    bán</i>
                                                                                <a>{{ $key->username }}</a>
                                                                            @else
                                                                                <a>{{ $key->username }}</a>
                                                                            @endif
                                                                            @if (Auth::guard('nguoi_dung')->check() && Auth::guard('nguoi_dung')->user()->q_id == 1)
                                                                                <div class="reply">
                                                                                    <a href="#" class="reply-comment"
                                                                                        data-id="{{ $key->bs_id }}">Trả
                                                                                        lời</a>
                                                                                    @if ($key->username == Auth::guard('nguoi_dung')->user()->username)
                                                                                        <a href="{{ route('comment.delete', ['id' => $key->bs_id]) }}"
                                                                                            onclick="return confirm('Bạn có chắc là muốn xóa ?')"
                                                                                            href="#"
                                                                                            data-id="{{ $key->bs_id }}">Xóa</a>
                                                                                        <!-- Button trigger modal -->
                                                                                        <a style="border: 1px solid #9D4D4A; border-radius: 500px; color: #9D4D4A; font-size: 11px;height: 28px; padding: 0 20px; line-height: 26px"
                                                                                            type="button"
                                                                                            data-toggle="modal"
                                                                                            data-target="#exampleModal{{ $key->bs_id }}">
                                                                                            Chỉnh sửa
                                                                                        </a>
                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade"
                                                                                            id="exampleModal{{ $key->bs_id }}"
                                                                                            tabindex="-1" role="dialog"
                                                                                            aria-labelledby="exampleModalLabel"
                                                                                            aria-hidden="true">
                                                                                            <div class="modal-dialog"
                                                                                                role="document">
                                                                                                <div class="modal-content">
                                                                                                    <form
                                                                                                        class="form-edit"
                                                                                                        action="{{ route('comment.updated', ['id' => $key->bs_id]) }}"
                                                                                                        method="POST">
                                                                                                        <input type="hidden"
                                                                                                            name="_token"
                                                                                                            value="{{ csrf_token() }}">
                                                                                                        <div
                                                                                                            class="modal-body">
                                                                                                            <p
                                                                                                                class="comment-form-comment">
                                                                                                                <label>Chỉnh
                                                                                                                    sửa
                                                                                                                    bình
                                                                                                                    luận</label>
                                                                                                                <textarea
                                                                                                                    name="edit"
                                                                                                                    placeholder="Nội dung trả lời bình luận"
                                                                                                                    cols="30"
                                                                                                                    rows="10"
                                                                                                                    class="textarea">{{ $key->bs_noidung }}
                                                                                                </textarea>
                                                                                                            </p>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="modal-footer">
                                                                                                            <button
                                                                                                                type="button"
                                                                                                                class="btn btn-secondary"
                                                                                                                data-dismiss="modal">Trở
                                                                                                                về</button>
                                                                                                            <button
                                                                                                                onclick="return confirm('Bạn có chắc là muốn cập nhật bình luận ?')"
                                                                                                                type="submit"
                                                                                                                class="btn btn-primary">Xác
                                                                                                                nhận</button>
                                                                                                        </div>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                            @endif
                                                                            <span
                                                                                class="date">{{ \Carbon\Carbon::parse($key->created_at)->toDateString() }}</span>
                                                                            <p>{!! $key->bs_noidung !!}</p>
                                                                        </div>
                                                                        <form class="formReply form-reply"
                                                                            action="{{ route('reply.product', ['idsp' => $pro->sp_id, 'idbl' => $key->bs_id]) }}"
                                                                            method="POST">
                                                                            <input type="hidden" name="_token"
                                                                                value="{{ csrf_token() }}">
                                                                            <p class="comment-form-comment">
                                                                                <label>Trả lời bình luận</label>
                                                                                <textarea name="replies"
                                                                                    placeholder="Nội dung trả lời bình luận"></textarea>
                                                                            </p>
                                                                            <div class="comment-form-submit">
                                                                                <input type="submit" class="comment-submit"
                                                                                    value="Gửi bình luận">
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <ol>
                                                                        @foreach ($child as $c)
                                                                            @if ($c->bs_id_reply == $key->bs_id)
                                                                                <li>
                                                                                    <div class="single-comment">
                                                                                        @if ($c->nd_anh == null)
                                                                                            <div
                                                                                                class="comment-avatar img-full">
                                                                                                <img style="height: 50px; border-radius: 50%;"
                                                                                                    alt=""
                                                                                                    src="{{ asset('template_client/img/icon/admin.jpg') }}">
                                                                                            </div>
                                                                                        @else
                                                                                            <div
                                                                                                class="comment-avatar img-full">
                                                                                                <img style="height: 50px; border-radius: 50%;"
                                                                                                    alt=""
                                                                                                    src="{{ asset($c->nd_anh) }}">
                                                                                            </div>
                                                                                        @endif
                                                                                        <div class="comment-info">
                                                                                            @if ($pro->username == $c->username)
                                                                                                <i class="fa fa-star">&ensp;Người
                                                                                                    bán</i>
                                                                                                <a
                                                                                                    data-id="{{ $c->bs_id_reply }}">{{ $c->username }}</a>
                                                                                            @else
                                                                                                <a
                                                                                                    data-id="{{ $c->bs_id_reply }}">{{ $c->username }}</a>
                                                                                            @endif
                                                                                            @if (Auth::guard('nguoi_dung')->check() && Auth::guard('nguoi_dung')->user()->q_id == 1)
                                                                                                @if ($c->username == Auth::guard('nguoi_dung')->user()->username)
                                                                                                    <div
                                                                                                        class="reply">
                                                                                                        <a href="{{ route('comment.product', ['id' => $c->bs_id]) }}"
                                                                                                            onclick="return confirm('Bạn có chắc là muốn xóa ?')"
                                                                                                            href="#"
                                                                                                            data-id="{{ $c->bs_id }}">Xóa</a>
                                                                                                        <!-- Button trigger modal -->
                                                                                                        <a style="border: 1px solid #9D4D4A; border-radius: 500px; color: #9D4D4A;
                                                                                                          font-size: 11px;height: 28px; padding: 0 20px; line-height: 26px"
                                                                                                            type="button"
                                                                                                            data-toggle="modal"
                                                                                                            data-target="#exampleModal{{ $c->bs_id }}">Chỉnh
                                                                                                            sửa
                                                                                                        </a>
                                                                                                        <!-- Modal -->
                                                                                                        <div class="modal fade"
                                                                                                            id="exampleModal{{ $c->bs_id }}"
                                                                                                            tabindex="-1"
                                                                                                            role="dialog"
                                                                                                            aria-labelledby="exampleModalLabel"
                                                                                                            aria-hidden="true">
                                                                                                            <div class="modal-dialog"
                                                                                                                role="document">
                                                                                                                <div
                                                                                                                    class="modal-content">
                                                                                                                    <div
                                                                                                                        class="modal-header">
                                                                                                                        <button
                                                                                                                            type="button"
                                                                                                                            class="close"
                                                                                                                            data-dismiss="modal"
                                                                                                                            aria-label="Close">
                                                                                                                            <span
                                                                                                                                aria-hidden="true">&times;</span>
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                    <form
                                                                                                                        class="form-edit"
                                                                                                                        action="{{ route('comment.updated', ['id' => $c->bs_id]) }}"
                                                                                                                        method="POST">
                                                                                                                        <input
                                                                                                                            type="hidden"
                                                                                                                            name="_token"
                                                                                                                            value="{{ csrf_token() }}">
                                                                                                                        <div
                                                                                                                            class="modal-body">
                                                                                                                            <p
                                                                                                                                class="comment-form-comment">
                                                                                                                                <label>Chỉnh
                                                                                                                                    sửa
                                                                                                                                    bình
                                                                                                                                    luận</label>
                                                                                                                                <textarea
                                                                                                                                    name="edit"
                                                                                                                                    placeholder="Nội dung trả lời bình luận"
                                                                                                                                    cols="30"
                                                                                                                                    rows="10"
                                                                                                                                    class="textarea">{{ $c->bs_noidung }}
                                                                                                                    </textarea>
                                                                                                                            </p>
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="modal-footer">
                                                                                                                            <button
                                                                                                                                type="button"
                                                                                                                                class="btn btn-secondary"
                                                                                                                                data-dismiss="modal">Trở
                                                                                                                                về</button>
                                                                                                                            <button
                                                                                                                                onclick="return confirm('Bạn có chắc là muốn cập nhật bình luận ?')"
                                                                                                                                type="submit"
                                                                                                                                class="btn btn-primary">Xác
                                                                                                                                nhận
                                                                                                                            </button>
                                                                                                                        </div>
                                                                                                                    </form>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                            @endif
                                                                                            <span
                                                                                                lass="date">{{ \Carbon\Carbon::parse($c->created_at)->toDateString() }}</span>
                                                                                            <p>{!! $c->bs_noidung !!}</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                            @endif
                                                                        @endforeach
                                                                    </ol>
                                                                </li>
                                                            </ol>
                                                        @endforeach
                                                    </div>
                                                    <!-- comments-area  end -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
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
                                    <h2>Sản phẩm liên quan</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @if (count($same) == 0)
                                <span style="width: 100%; text-align: center" class="alert alert-warning">Rất tiếc, hiện
                                    tại
                                    không có sản phẩm liên quan nào !!!</span>
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
                                                    @if ($key->sp_soluong == 0)
                                                    <div class="label-product label_sale">Hết</div>
                                                    @endif
                                                    @if ($key->sp_tinhtrang == 2)
                                                    <div class="label-product label_new">Khóa</div>
                                                    @endif
                                                </div>
                                                <div class="product-caption">
                                                    <h4 class="product-name"><a style="text-transform: capitalize"
                                                            href="{{ route('detail.pro', ['id' => $key->sp_id]) }}">{{ $key->sp_ten }}</a>
                                                    </h4>
                                                    <div class="price-box">
                                                        <span
                                                            class="new-price">{{ number_format($key->sp_gia, 0, ',', '.') . ' ' . 'VNĐ' }}</span>
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
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('comment-product-reply')
        <script>
            $(document).ready(function(ev) {
                $('.form-reply').hide();
                $('.reply-comment').click(function(e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    var form_reply = '.form-reply' + id;
                    $('.form-reply').show();
                });
            });
        </script>
    @endpush
    <!-- main-content-wrap end -->
@endsection
