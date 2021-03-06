@extends('client.template.master')
@section('content')
    <!-- slider-main-area start -->

    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area ptb-30 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Giỏ hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <!-- main-content-wrap start -->
    <div class="main-content-wrap pt-100">
        <div class="container">
            @if (session()->has('feedback'))
                <b>
                    <div style="font-size: 15px; text-align: center;" class="alert alert-success">
                        {{ session()->get('feedback') }}
                    </div>
                </b>
            @elseif(session()->has('error'))
                <b>
                    <div style="font-size: 15px; text-align: center;" class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                </b>
            @endif
            @if(Cart::count() == 0)
            <div style="font-size: 15px; text-align: center;" class="alert alert-warning">Giỏ hàng hiện tại đang rỗng !!!</div>
            @else
            <div class="row">
                <div class="col-12">
                    <form action="" enctype="multipart/form-data" class="cart-table">
                        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                        @csrf
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="plantmore-product-remove">Xóa</th>
                                        <th class="plantmore-product-remove">Lưu</th>
                                        <th class="plantmore-product-thumbnail">Hình ảnh</th>
                                        <th class="cart-product-name">Tên sản phẩm</th>
                                        <th class="plantmore-product-price">Đơn giá</th>
                                        <th class="plantmore-product-quantity">Số lượng</th>
                                        <th class="plantmore-product-subtotal">Giá sản phẩm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Cart::content() as $item)
                                        @php
                                            $subtotal = $item->price * $item->qty;
                                        @endphp
                                        <tr>
                                            <td class="plantmore-product-remove">
                                                <a onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->name }} ?')"
                                                    href="{{ route('cart.delete', ['rowId' => $item->rowId]) }}">
                                                    <i class="fa fa-times"></i>
                                                    <input type="hidden" name="row_id" class="row_id"
                                                        value="{{ $item->rowId }}" type="number">
                                                </a>
                                            </td>
                                            <td class="plantmore-product-remove">
                                                <a href="" class="updateCart" id="{{ $item->rowId }}">
                                                    <i class="fa fa-refresh"></i>
                                                </a>
                                            </td>
                                            <td class="plantmore-product-thumbnail">
                                                <a href="#"><img style="max-width: 70px; height: 100px;"
                                                        src="{{ asset($item->options->image) }}" alt=""></a>
                                            </td>
                                            <td class="plantmore-product-name"><a href="#">{{ $item->name }}</a></td>
                                            <td class="plantmore-product-price"><span
                                                    class="amount">{{ number_format($item->price, 0, ',', '.') . ' ' . 'VNĐ' }}
                                                </span>
                                            </td>
                                            <td class="plantmore-product-quantity">
                                                <input type="number" name="qty" class="qty" id="qty"
                                                    value="{{ $item->qty }}" min='1' max="" data-id="{{ $item->rowId }}">
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="amount">{{ number_format($subtotal,0,',','.').' '.'VNĐ' }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="coupon-all">
                                    <div class="coupon2">
                                        <a style="background: #9d4d4a none repeat scroll 0 0; color: #ffffff; font-size: 14px; font-weight: 500; height: 45px; line-height: 45px; padding: 0 25px; text-transform: capitalize" href="" class="btn btn-dark" name="update_cart" type="submit">Cập nhật tất cả sản phẩm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    {{-- <input style="width: 230px; height: 36px;" id="coupon_code" class="input-text" name="coupon_code" value=""
                                        placeholder="Nhập vào mã khuyến mãi" type="text"> --}}
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa tất cả sản phẩm trong giỏ hàng?')" style="background: #9d4d4a none repeat scroll 0 0; color: #ffffff; font-size: 14px; font-weight: 500; height: 45px; line-height: 45px; padding: 0 25px; text-transform: capitalize" href="{{ route('cart.alldele') }}" class="btn btn-dark" name="dell_cart"
                                        type="submit">Xóa tất cả sản phẩm
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Tổng tiền của giỏ hàng</h2>
                                <ul>
                                    <li>Tổng tiền <span>{{ Cart::subtotal(0,',','.').' '.'VNĐ' }}</span></li>
                                </ul>
                                <a style="background: #9d4d4a none repeat scroll 0 0; color: #ffffff; font-size: 14px; font-weight: 500; height: 45px; line-height: 45px; padding: 0 25px; text-transform: capitalize" href="{{ route('checkout.index') }}">Thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <!-- main-content-wrap end -->

    @push('update-cart')
    <script>
        $(document).ready(function(ev) {
            $('.updateCart').click(function(e) {
                    e.preventDefault();
                    var rowid = $(this).attr('id');
                    var qty = $(this).parent().parent().find(".qty").val();
                    // var token = $("input[name='_token']").val();
                    // alert(qty);
                    $.ajax({
                        type: "get",
                        url: BASE_URL + "/client/" + rowid + "/" + qty,
                        data: {
                            "id":rowid,
                            "qty":qty
                            },
                        success: function (response) {
                            if(response == "ok"){
                                // window.reload();
                                window.location = "/client/cart",
                                // alert("qty");
                            }
                        }
                    });
                });
        });
    </script>
    @endpush
@endsection
