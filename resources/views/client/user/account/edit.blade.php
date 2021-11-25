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
                <div class="col-lg-12  col-md-12 col-sm-12">
                    @if (Auth::guard('nguoi_dung')->check() && Auth::guard('nguoi_dung')->user()->q_id == 2)
                        <div style="font-size: 15px" class="alert alert-danger"><i>Tài khoản của bạn đã bị khóa !</i></div>
                    @endif
                    @if (session()->has('prosper'))
                        <i>
                            <div style="font-size: 15px" class="alert alert-success">
                                {{ session()->get('prosper') }} 
                            </div>
                        </i>
                    @endif
                    @if (session()->has('great'))
                        <i>
                            <div style="font-size: 15px" class="alert alert-success">
                                {{ session()->get('great') }}
                            </div>
                        </i>
                    @endif
                    <div class="customer-login-register">
                        <h3>Thông tin người dùng</h3>
                        <div class="login-Register-info">
                            <form method="POST" action="{{ route('user.update', ['id' => $user->nd_id]) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        @if ($user->nd_anh == null)
                                        <div class="form-group" style="text-align:center; padding-top: 10px">
                                            <img src="{{ asset('template_client/img/icon/admin.jpg') }}" width="60%"
                                                alt="">
                                            <input class="form-control" type="hidden" name="anh" id=""
                                                value="{{ asset('template_client/img/icon/admin.jpg') }}">
                                        </div>
                                        @else
                                        <div class="form-group" style="text-align:center; padding-top: 10px">
                                            <img src="{{ asset($user->nd_anh) }}" width="60%"
                                                alt="">
                                            <input class="form-control" type="hidden" name="anh" id=""
                                                value="{{ asset($user->nd_anh) }}">
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="">Cập nhật ảnh đại diện</label>
                                            <input type="file" style="padding-top: 3px" name="avatar"
                                                class="form-control" id="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="coupon-input form-row-first">
                                            <label>Tên đăng nhập <span class="required">*</span></label>
                                            <input type="text" name="name" value="{{ $user->username }}">
                                        </p>
                                        <p class="coupon-input form-row-first">
                                            <label>Địa chỉ <span class="required">*</span></label>
                                            <input type="text" name="diachi" value="{{ $user->nd_diachi }}">
                                        </p>
                                        <p class="coupon-input form-row-first">
                                            <label>Email <span class="required">*</span></label>
                                            <input type="email" name="email" value="{{ $user->email }}">
                                        </p>
                                        <p class="coupon-input form-row-first">
                                            <label>Số điện thoại <span class="required">*</span></label>
                                            <input type="text" name="phone" value="{{ $user->nd_sdt }}">
                                        </p>
                                    </div>
                                        <div class="clear"></div>
                                        <p style="padding-left: 20px">
                                            <button class="button-login" type="submit">Cập nhật thông tin</button>
                                        </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->
@endsection
