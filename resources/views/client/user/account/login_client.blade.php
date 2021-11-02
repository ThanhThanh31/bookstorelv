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
                                    <label>Địa chỉ <span class="required">*</span></label>
                                    <input type="text" name="diachi" placeholder="Nhập vào địa chỉ">
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
@endsection
