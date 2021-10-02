@extends('client.template.master')
@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area ptb-30 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
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
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="single-product-tab">
                                    <div class="zoomWrapper">
                                        <div id="img-1" class="zoomWrapper single-zoom" style="text-align:center;">
                                                <a href="{{ route('detail.pro', ['id' => $pro->sp_id]) }}">
                                                <img style="height: 450px; width: 300px;" id="zoom1"
                                                src="{{ asset($pro->sp_hinhanh) }}" data-zoom-image=""
                                                alt="big-1">
                                            </a>
                                        </div>
                                        <div class="single-zoom-thumb">
                                            <ul class="s-tab-zoom single-product-active owl-carousel" id="gallery_01">
                                                <li>
                                                    <a href="#" class="elevatezoom-gallery active" data-update=""
                                                        data-image="" data-zoom-image="">
                                                        <img style="height: 150px" src="{{ asset($pro->sp_hinhanh) }}" alt="zo-th-1" /></a>
                                                </li>
                                                @foreach($imagg as $keys)
                                                <li class="">
                                                    <a href="#" class="elevatezoom-gallery" data-image=""
                                                        data-zoom-image="">
                                                        <img style="height: 150px" src="{{ asset($keys->a_duongdan) }}" alt="zo-th-2">
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
                                        <div class="rating-box">
                                            <ul class="rating d-flex">
                                                <li><i class="icon-star"></i></li>
                                                <li><i class="icon-star"></i></li>
                                                <li><i class="icon-star"></i></li>
                                                <li><i class="icon-star"></i></li>
                                                <li><i class="icon-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="price-box">
                                            <span
                                                class="new-price">{{ number_format($pro->sp_gia, 0, ',', '.') . ' ' . 'VNĐ' }}</span>
                                            {{-- <span class="old-price">$30.50</span> --}}
                                        </div>
                                        <ul class="list-unstyled">
                                            <li>Tác giả: <a href="#">{{ $pro->tg_ten }}</a></li>
                                            <li>Thể loại: <a href="#">{{ $pro->tl_ten }}</a></li>
                                            <li>Lĩnh vực: <a href="#">{{ $pro->lv_ten }}</a></li>
                                            <li>Mã sản phẩm: {{ $pro->sp_id }}</li>
                                            <li>Tình trạng: <span class="stock">Còn hàng</span></li>
                                        </ul>
                                        <form class="modal-cart">
                                            <div class="quantity">
                                                <label>Số lượng</label>
                                                <div class="cart-plus-minus">
                                                    <input type="number" value="1" min="0" step="1" class="input-box">
                                                </div>
                                            </div>
                                        </form>
                                        <ul class="quick-add-to-cart">
                                            <li><a href="#" class="add-to-cart"><i class="icon-basket-loaded"></i> Thêm
                                                    vào giỏ hàng</a></li>
                                            <li><a class="wishlist-btn" href="#"><i class="icon-heart"></i></a></li>
                                            <li><a class="compare-btn" href="#"><i class="icon-refresh"></i></a></li>
                                        </ul>
                                        <p>Tags: <a href="#">Movado</a>,<a href="#">Omega</a>
                                            <a href="#"></a>
                                        </p>
                                    </div>
                                </div>
                                <!-- product-thumbnail-content end -->
                            </div>
                            {{-- @endforeach --}}
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="product-info-detailed mt-100">
                                    <div class="discription-tab-menu">
                                        <ul role="tablist" class="nav">
                                            <li class="active"><a href="#description" data-toggle="tab"
                                                    class="active show">Thông tin chi tiết</a></li>
                                            <li><a href="#descriptionn" data-toggle="tab">Mô tả sản phẩm</a></li>
                                            <li><a href="#review" data-toggle="tab">Đánh giá - Nhận xét</a></li>
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
                                                <p>{{ $pro->sp_mota }}</p>
                                            </div>
                                        </div>
                                        <div id="review" class="tab-pane fade">
                                            <form class="form-review">
                                                <div class="review">
                                                    <table class="table table-striped table-bordered table-responsive">
                                                        <tbody>
                                                            <tr>
                                                                <td class="table-name"><strong>T90 Themes</strong></td>
                                                                <td class="text-right">08/05/2018</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <p>It’s both good and bad. If Nikon had achieved a
                                                                        high-quality wide lens camera with a 1 inch sensor,
                                                                        that would have been a very competitive product. So
                                                                        in that sense, it’s good for
                                                                        us. But actually, from the perspective of driving
                                                                        the 1 inch sensor market, we want to stimulate this
                                                                        market and that means multiple manufacturers.</p>
                                                                    <ul>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="review-wrap">
                                                    <h2>Nhận xét và đánh giá sản phẩm của bạn</h2>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="control-label">Họ tên</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="control-label">Nhận xét</label>
                                                            <textarea class="form-control"></textarea>
                                                            <div class="help-block"><span class="text-danger">Chú
                                                                    thích:</span> HTML is not translated!</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="control-label">Đánh giá</label>
                                                            &nbsp;&nbsp;&nbsp; Tệ&nbsp;
                                                            <input type="radio" value="1" name="rating"> &nbsp;
                                                            <input type="radio" value="2" name="rating"> &nbsp;
                                                            <input type="radio" value="3" name="rating"> &nbsp;
                                                            <input type="radio" value="4" name="rating"> &nbsp;
                                                            <input type="radio" value="5" name="rating"> &nbsp;Tốt
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="buttons clearfix">
                                                    <div class="pul-right">
                                                        <button class="button-review" type="button">Gửi</button>
                                                    </div>
                                                </div>
                                            </form>
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
                                    <h4>our products</h4>
                                    <h2>Sản phẩm tương tự</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="product-active owl-carousel">
                                <div class="col-lg-3">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area">
                                        <div class="product-thumb">
                                            <a href="single-product.html">
                                                <img class="primary-image" src="img/product/2.jpg" alt="">
                                                <img class="secondary-image" src="img/product/1.jpg" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="#" class="wishlist-btn" title="Add to Wish List"><i
                                                        class="icon-heart"></i></a>
                                                <a href="#" class="compare-btn" title="Compare this Product"><i
                                                        class="icon-refresh"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-toggle="modal"
                                                    data-target="#exampleModalCenter"><i
                                                        class="icon-magnifier icons"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="single-product.html">Simple Product 003</a>
                                            </h4>
                                            <div class="price-box">
                                                <span class="new-price">$99.00</span>
                                                <span class="old-price">$110.00</span>
                                            </div>
                                            <a href="#" class="action-cart-btn">
                                                Thêm vào giỏ hàng
                                            </a>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-3">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area">
                                        <div class="product-thumb">
                                            <a href="single-product.html">
                                                <img class="primary-image" src="img/product/5.jpg" alt="">
                                                <img class="secondary-image" src="img/product/6.jpg" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="#" class="wishlist-btn" title="Add to Wish List"><i
                                                        class="icon-heart"></i></a>
                                                <a href="#" class="compare-btn" title="Compare this Product"><i
                                                        class="icon-refresh"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-toggle="modal"
                                                    data-target="#exampleModalCenter"><i
                                                        class="icon-magnifier icons"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="single-product.html">Simple Product 003</a>
                                            </h4>
                                            <div class="price-box">
                                                <span class="new-price">$99.00</span>
                                                <span class="old-price">$110.00</span>
                                            </div>
                                            <a href="#" class="action-cart-btn">
                                                Add to Cart
                                            </a>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-3">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area">
                                        <div class="product-thumb">
                                            <a href="single-product.html">
                                                <img class="primary-image" src="img/product/6.jpg" alt="">
                                            </a>
                                            <div class="label-product label_sale">Sale!</div>
                                            <div class="action-links">
                                                <a href="#" class="wishlist-btn" title="Add to Wish List"><i
                                                        class="icon-heart"></i></a>
                                                <a href="#" class="compare-btn" title="Compare this Product"><i
                                                        class="icon-refresh"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-toggle="modal"
                                                    data-target="#exampleModalCenter"><i
                                                        class="icon-magnifier icons"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="single-product.html">Simple Product 008</a>
                                            </h4>
                                            <div class="price-box">
                                                <span class="new-price">$98.00</span>
                                                <span class="old-price">$122.00</span>
                                            </div>
                                            <a href="#" class="action-cart-btn">
                                                Add to Cart
                                            </a>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-3">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area">
                                        <div class="product-thumb">
                                            <a href="single-product.html">
                                                <img class="primary-image" src="img/product/8.jpg" alt="">
                                                <img class="secondary-image" src="img/product/6.jpg" alt="">
                                            </a>
                                            <div class="label-product label_new">New</div>
                                            <div class="action-links">
                                                <a href="#" class="wishlist-btn" title="Add to Wish List"><i
                                                        class="icon-heart"></i></a>
                                                <a href="#" class="compare-btn" title="Compare this Product"><i
                                                        class="icon-refresh"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-toggle="modal"
                                                    data-target="#exampleModalCenter"><i
                                                        class="icon-magnifier icons"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="single-product.html">Simple Product 003</a>
                                            </h4>
                                            <div class="price-box">
                                                <span class="new-price">$100.00</span>
                                                <span class="old-price">$140.00</span>
                                            </div>
                                            <a href="#" class="action-cart-btn">
                                                Add to Cart
                                            </a>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                                <div class="col-lg-3">
                                    <!-- single-product-area start -->
                                    <div class="single-product-area">
                                        <div class="product-thumb">
                                            <a href="single-product.html">
                                                <img class="primary-image" src="img/product/7.jpg" alt="">
                                            </a>
                                            <div class="label-product label_sale">Sale!</div>
                                            <div class="action-links">
                                                <a href="#" class="wishlist-btn" title="Add to Wish List"><i
                                                        class="icon-heart"></i></a>
                                                <a href="#" class="compare-btn" title="Compare this Product"><i
                                                        class="icon-refresh"></i></a>
                                                <a href="#" class="quick-view" title="Quick View" data-toggle="modal"
                                                    data-target="#exampleModalCenter"><i
                                                        class="icon-magnifier icons"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="single-product.html">Simple Product 006</a>
                                            </h4>
                                            <div class="price-box">
                                                <span class="new-price">$98.00</span>
                                                <span class="old-price">$122.00</span>
                                            </div>
                                            <a href="#" class="action-cart-btn">
                                                Add to Cart
                                            </a>
                                        </div>
                                    </div>
                                    <!-- single-product-area end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->
@endsection
