@extends('client.template.master')
@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area ptb-30 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Đăng ký cửa hàng</li>
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
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="customer-login-register">
                        <h3>Thông tin cửa hàng</h3>
                        @if (Session::has("fine"))
                            <p>{{ Session::get("fine") }}</p>
                        @endif
                        @if (Session::has("un"))
                            <p>{{ Session::get("un") }}</p>
                        @endif
                        <div class="login-Register-info"> 
                            <form method="POST" action="{{ route('store.addStore') }}">
                                @csrf
                                <p class="coupon-input form-row-first">
                                    <label>Tên cửa hàng <span class="required">*</span></label>
                                    <input type="text" name="tenCuaHang">
                                </p>
                                <p class="coupon-input form-row-last">
                                    <label>Địa chỉ <span class="required">*</span></label>
                                    <input type="text" name="diaChi">
                                </p>
                                <div class="clear"></div>
                                <p>
                                    <button value="Login" name="login" class="button-login" type="submit">Đăng ký</button>
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
