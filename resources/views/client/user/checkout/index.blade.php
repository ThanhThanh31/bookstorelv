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
                        <li class="breadcrumb-item"><a href="{{ route('cart.index') }}">Giỏ hàng</a></li>
                        <li class="breadcrumb-item active">Thanh toán</li>
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
            @endif
            @if(Cart::count() == 0)
            <div style="font-size: 15px; text-align: center;" class="alert alert-warning">Giỏ hàng hiện tại đang rỗng !!!</div>
            @else
            <!-- checkout-area start -->
                @if (Auth::guard('nguoi_dung')->check() && Auth::guard('nguoi_dung')->user()->q_id == 1)
                <div class="checkout-area">
                    <div class="row">
                        <div class="col-lg-12" style="padding-left: 180px;">
                            <div class="row">
                                <form action="{{ route('checkout.payment') }}" method="POST">
                                    @csrf
                                    <div class="col-lg-10 col-sm-12">
                                        <div class="checkbox-form mt-30">
                                            <h3 class="shoping-checkboxt-title">Thông tin người dùng</h3>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <p class="single-form-row">
                                                        <label>Tỉnh thành phố <span class="required">*</span></label>
                                                        <select style="font-size: 13px;" name="thanhpho" class="form-control City">
                                                            <option value="">--- Chọn tỉnh thành phố ---</option>
                                                        @foreach ($tp as $item => $city)
                                                            <option value="{{ $city->ttp_id }}">{{ $city->ttp_ten }}</option>
                                                        @endforeach
                                                    </select>
                                                    </p>
                                                </div>
                                                <div class="col-lg-12">
                                                    <p class="single-form-row">
                                                        <label>Quận huyện <span class="required">*</span></label>
                                                        <select style="font-size: 13px;" name="quanhuyen" class="form-control Province">
                                                            <option value="">--- Chọn quận huyện ---</option>
                                                        </select>
                                                    </p>
                                                </div>
                                                <div class="col-lg-12">
                                                    <p class="single-form-row">
                                                        <label>Xã phường</label>
                                                        <select style="font-size: 13px;" name="xaphuong" class="form-control Ward">
                                                            <option value="">--- Chọn xã phường ---</option>
                                                        </select>
                                                    </p>
                                                </div>
                                                <div class="col-lg-12">
                                                    <p class="single-form-row">
                                                        <label>Số nhà hoặc tên đường <span
                                                                class="required">*</span></label>
                                                        <input type="text" name="diachi"
                                                            placeholder="Nhập vào địa chỉ là số nhà hoặc tên đường...">
                                                    </p>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="single-form-row">
                                                        <label>Phương thức thanh toán <span class="required">*</span></label>
                                                        <select style="font-size: 13px;" name="phuongthuc" class="form-control">
                                                                <option value="">--- Chọn phương thức thanh toán ---</option>
                                                                <option value="1">Thanh toán trực tiếp</option>
                                                                <option value="2">Chuyển khoản</option>
                                                            </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <p class="single-form-row m-0">
                                                        <label>Ghi chú đơn hàng</label>
                                                        <textarea name="ghichu" cols="5" rows="2" class="checkout-mess"
                                                            placeholder="Nhập vào nội dung cần ghi chú cho đơn hàng..."></textarea>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-sm-12">
                                        <div class="checkout-review-order mt-30 ">
                                            <h3 class="shoping-checkboxt-title">Chi tiết đặt hàng</h3>
                                            <table class="checkout-review-order-table">
                                                <thead>
                                                    <tr>
                                                        <th class="t-product-name">Sản phẩm</th>
                                                        <th class="product-total">Tổng giá</th>
                                                    </tr>
                                                </thead>
                                                @foreach (Cart::content() as $item)
                                                    @php
                                                        $subtotal = $item->price * $item->qty;
                                                    @endphp
                                                    <tbody>
                                                        <tr class="cart_item">
                                                            <td class="t-product-name">{{ $item->name }}<strong
                                                                    class="product-quantity"> × {{ $item->qty }}</strong>
                                                            </td>
                                                            <td class="t-product-price">
                                                                <span>{{ number_format($subtotal, 0, ',', '.') . ' ' . 'VNĐ' }}</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                @endforeach
                                                <tfoot>
                                                    <tr class="cart-subtotal">
                                                        <th>Tổng tiền</th>
                                                        <td><span>{{ Cart::subtotal(0, ',', '.') . ' ' . 'VNĐ' }}</span></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <div class="checkout-payment">
                                                <button class="button-continue-payment" type="submit">Tiến hành thanh toán</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- checkout-area end -->
                @endif
            @endif
        </div>
    </div>
    <!-- main-content-wrap end -->
    @push('address-user')
    <script>
        $(document).ready(function() {
            const BASE_URL = window.location.origin;
            //jqchang - phím tắt
            $('select.City').change(function(e) {
                e.preventDefault();
                var getIDCity = $(this).children("option:selected").val();
                // console.log(getIDCat);
                $('.itemCity').remove();
                // jqajax - phím tắt
                $.ajax({
                    type: "get",
                    url: BASE_URL + "/client/" + getIDCity + "/province-user",
                    success: function(response) {
                        console.log(response);
                        for (let i = 0; i < response.length; i++) {
                            $('.Province').append('<option value="' + response[i].qh_id +
                                '" class="itemCity">' + response[i].qh_ten + '</option>'
                                );
                        }
                    }
                });
            });
            $('select.Province').change(function(e) {
                e.preventDefault();
                var getIDProvince = $(this).children("option:selected").val();
                // console.log(getIDCat);
                $('.itemProvince').remove();
                // jqajax - phím tắt
                $.ajax({
                    type: "get",
                    url: BASE_URL + "/client/" + getIDProvince + "/ward-user",
                    success: function(response) {
                        console.log(response);
                        for (let i = 0; i < response.length; i++) {
                            $('.Ward').append('<option value="' + response[i].xp_id +
                                '" class="itemProvince">' + response[i].xp_ten + '</option>'
                                );
                        }
                    }
                });
            });
        });
    </script>
    @endpush
@endsection
