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
                                            <label>Email <span class="required">*</span></label>
                                            <input type="email" name="email" value="{{ $user->email }}">
                                        </p>
                                        <p class="coupon-input form-row-first">
                                            <label>Số điện thoại <span class="required">*</span></label>
                                            <input type="text" name="phone" value="{{ $user->nd_sdt }}">
                                        </p>
                                        <p class="coupon-input form-row-first">
                                            <label>Tỉnh thành phố <span class="required">*</span></label>
                                            <select style="font-size: 13px;" name="thanhpho" class="form-control City">
                                                <option value="">--- Chọn tỉnh thành phố ---</option>
                                                @foreach ($city as $item => $tp)
                                                <option value="{{ $tp->ttp_id }}" @if ($user->ttp_id == $tp->ttp_id) selected @endif>
                                                    {{ $tp->ttp_ten }}</option>
                                                @endforeach
                                            </select>
                                        </p>
                                        <p class="coupon-input form-row-first">
                                            <label>Quận huyện <span class="required">*</span></label>
                                            <select style="font-size: 13px;" name="quanhuyen" class="form-control Province">
                                                <option class="itemCity" value="{{ $user->qh_id }}">{{ $user->qh_ten }}</option>
                                                @foreach ($provin as $item => $keys)
                                                @endforeach
                                            </select>
                                        </p>
                                        <p class="coupon-input form-row-first">
                                            <label>Xã phường <span class="required">*</span></label>
                                            <select style="font-size: 13px;" name="xaphuong" class="form-control Ward">
                                                <option class="itemProvince" value="{{ $user->xp_id }}">{{ $user->xp_ten }}</option>
                                                @foreach ($wards as $item => $check)
                                                @endforeach
                                            </select>
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
