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
    <div class="main-content-wrap pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="customer-login-register">
                        <h3>Đăng nhập</h3>
                        @if (Session::has("failure"))
                            <p>{{ Session::get("failure") }}</p>
                        @endif
                        @if (Session::has("prosper"))
                            <p>{{ Session::get("prosper") }}</p>
                        @endif
                        @if (Session::has("accomplish"))
                            <p>{{ Session::get("accomplish") }}</p>
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
                                    <button value="Login" name="login" class="button-login" type="submit">Đăng nhập</button>
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
                        @if (Session::has("error"))
                            <p>{{ Session::get("error") }}</p>
                        @endif
                        @if (Session::has("success"))
                            <p>{{ Session::get("success") }}</p>
                        @endif
                        <div class="login-Register-info">
                            <form method="POST" action="{{ route('user.register') }}">
                                @csrf
                                <p class="coupon-input form-row-first">
                                    <label>Tên đăng nhập <span class="required">*</span></label>
                                    <input type="text" name="name">
                                </p>
                                <p class="coupon-input form-row-first">
                                    <label>Email <span class="required">*</span></label>
                                    <input type="email" name="email">
                                </p>
                                <p class="coupon-input form-row-first">
                                    <label>Số điện thoại <span class="required">*</span></label>
                                    <input type="text" name="phone">
                                </p>
                                <p class="coupon-input form-row-last">
                                    <label>Mật khẩu <span class="required">*</span></label>
                                    <input type="password" name="password">
                                </p>
                                <p class="coupon-input form-row-first">
                                    <label>Nhập lại mật khẩu <span class="required">*</span></label>
                                    <input type="password" name="reset_password">
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
@endsection
