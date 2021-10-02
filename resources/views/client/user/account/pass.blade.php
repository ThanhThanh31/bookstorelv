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
                        <li class="breadcrumb-item active">Thay đổi mật khẩu</li>
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
                <div class="col-lg-10  col-md-10 col-sm-12">
                    <div class="customer-login-register">
                        <h3>Thay đổi mật khẩu</h3>
                        @if (Session::has("no"))
                            <p>{{ Session::get("no") }}</p>
                        @endif
                        @if (Session::has("yes"))
                            <p>{{ Session::get("yes") }}</p>
                        @endif
                        <div class="login-Register-info">
                            <form method="POST" action="{{ route('user.change', ['id' => Auth::guard('nguoi_dung')->user()->nd_id]) }}">
                                @csrf
                                <p class="coupon-input form-row-last">
                                    <label>Mật khẩu<span class="required">*</span></label>
                                    <input id="" type="password" name="current_password">
                                </p>
                                <p class="coupon-input form-row-last">
                                    <label>Mật khẩu mới<span class="required">*</span></label>
                                    <input id="" type="password" name="new_password">
                                </p>
                                <p class="coupon-input form-row-last">
                                    <label>Nhập lại mật khẩu mới<span class="required">*</span></label>
                                    <input id="" type="password" name="password_confirmation">
                                </p>
                                <div class="clear"></div>
                                <p>
                                        <button class="button-login" type="submit">Cập nhật</button>
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
