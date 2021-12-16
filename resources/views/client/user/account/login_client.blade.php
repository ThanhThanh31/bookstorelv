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
                        <li class="breadcrumb-item active">Đăng nhập &amp; Đăng ký</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <!-- main-content-wrap start -->
    <div style="padding: 30px">
    </div>
    <div class="main-content-wrap pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="customer-login-register">
                        <h3>Đăng nhập</h3>
                        @if (session()->has('accomplish'))
                            <i>
                                <div style="font-size: 15px" class="alert alert-success">
                                    {{ session()->get('accomplish') }}
                                </div>
                            </i>
                        @endif
                        @if (session()->has('failure'))
                            <i>
                                <div style="font-size: 15px" class="alert alert-danger">
                                    {{ session()->get('failure') }}
                                </div>
                            </i>
                        @endif
                        <div class="login-Register-info">
                            <form method="POST" action="{{ route('user.login') }}">
                                @csrf
                                <p class="coupon-input form-row-first">
                                    <label>Email <span class="required">*</span></label>
                                    <input type="email" placeholder="Nhập vào email" name="email">
                                </p>
                                <p class="coupon-input form-row-last">
                                    <label>Mật khẩu <span class="required">*</span></label>
                                    <input type="password" name="password" placeholder="Nhập vào mật khẩu" required>
                                </p>
                                <div class="clear"></div>
                                <p>
                                    <button value="Login" name="login" class="button-login" type="submit">Đăng
                                        nhập</button>
                                    <label><input type="checkbox" value="1"><span>Ghi nhớ</span></label>
                                    <a href="#" class="lost-password">Quên mật khẩu?</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6  col-md-6 col-sm-12">
                    <div class="customer-login-register">
                        <h3>Đăng ký</h3>
                        @if (session()->has('success'))
                            <i>
                                <div style="font-size: 15px" class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            </i>
                        @elseif(session()->has('error'))
                            <i>
                                <div style="font-size: 15px" class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            </i>
                        @endif
                        <div class="login-Register-info">
                            <form method="POST" action="{{ route('user.register') }}">
                                @csrf
                                <p class="coupon-input form-row-first">
                                    <label>Tên đăng nhập <span class="required">*</span></label>
                                    <input type="text" name="name" placeholder="Nhập vào tên đăng nhập">
                                </p>
                                <p class="coupon-input form-row-first">
                                    <label>Email <span class="required">*</span></label>
                                    <input type="email" name="email" placeholder="Nhập vào email">
                                </p>
                                <p class="coupon-input form-row-first">
                                    <label>Tỉnh thành phố <span class="required">*</span></label>
                                    <select style="font-size: 13px;" name="thanhpho" class="form-control City">
                                        <option value="">--- Chọn tỉnh thành phố ---</option>
                                        @foreach ($tp as $item => $city)
                                            <option value="{{ $city->ttp_id }}">{{ $city->ttp_ten }}</option>
                                        @endforeach
                                    </select>
                                </p>
                                <p class="coupon-input form-row-first">
                                    <label>Quận huyện <span class="required">*</span></label>
                                    <select style="font-size: 13px;" name="quanhuyen" class="form-control Province">
                                        <option value="">--- Chọn quận huyện ---</option>
                                    </select>
                                </p>
                                <p class="coupon-input form-row-first">
                                    <label>Xã phường <span class="required">*</span></label>
                                    <select style="font-size: 13px;" name="xaphuong" class="form-control Ward">
                                        <option value="">--- Chọn xã phường ---</option>
                                    </select>
                                </p>

                                <p class="coupon-input form-row-first">
                                    <label>Số điện thoại <span class="required">*</span></label>
                                    <input type="text" name="phone" placeholder="Nhập vào số điện thoại">
                                </p>
                                <p class="coupon-input form-row-last">
                                    <label>Mật khẩu <span class="required">*</span></label>
                                    <input type="password" name="password" placeholder="Nhập vào mật khẩu">
                                </p>
                                <p class="coupon-input form-row-first">
                                    <label>Nhập lại mật khẩu <span class="required">*</span></label>
                                    <input type="password" name="reset_password" placeholder="Nhập lại mật khẩu vừa nhập">
                                </p>
                                <div class="clear"></div>
                                <p>
                                    <button class="button-login" type="submit">Đăng ký</button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
