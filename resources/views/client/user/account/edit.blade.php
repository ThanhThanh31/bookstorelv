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
                        <li class="breadcrumb-item active">Thông tin người dùng</li>
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
                        <h3>Thông tin người dùng</h3>
                        @if (Session::has("great"))
                            <p>{{ Session::get("great") }}</p> 
                        @endif
                        <div class="login-Register-info">
                            <form method="POST" action="{{ route('user.update', ['id' => $user->nd_id]) }}">
                                @csrf
                                <p class="coupon-input form-row-first"> 
                                    <label>Tên đăng nhập <span class="required">*</span></label>
                                    <input type="text" name="name" value="{{ $user->username }}">
                                </p>
                                <p class="coupon-input form-row-first">
                                    <label>Email <span class="required">*</span></label>
                                    <input type="email" name="email" value="{{ $user->email }}">
                                </p>
                                <p class="coupon-input form-row-first">
                                    <label>Số điện thoại <span class="required">*</span></label>
                                    <input type="text" name="phone" value="{{ $user->nd_sdt }}">
                                </p>
                                <div class="clear"></div>
                                <p>
                                        <button class="button-login" type="submit">Cập nhật thông tin</button>
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
