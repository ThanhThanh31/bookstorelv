@extends('admin.template.master')
@section('title-page')
    Thông tin người dùng
@endsection
@section('title-page-detail')
    Thông tin người dùng
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{ route('admin.list') }}" type="button" class="btn btn-secondary">Trở về</a>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="" style="padding-left: 30px">Ảnh đại diện</label>
                                        <div class="form-group" style="text-align:center; padding-top: 10px">
                                            @if ($ds->nd_anh == null)
                                            <div class="form-group" style="text-align:center">
                                                <img width="40%" height="200px" src="{{ asset('template_client/img/icon/admin.jpg') }}" alt="">
                                                <input class="form-control" type="hidden"
                                                    value="{{ asset('template_client/img/icon/admin.jpg') }}">
                                            </div>
                                            @else
                                            <div class="form-group" style="text-align:center">
                                                <img width="40%" height="200px" src="{{ asset($ds->nd_anh) }}" alt="">
                                                <input class="form-control" type="hidden" value="{{ asset($ds->nd_anh) }}">
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <b>Tên người dùng:</b>&emsp;{{ $ds->username }}
                                        </div>
                                        <div class="form-group">
                                            <b>Email:</b>&emsp;{{ $ds->email }}
                                        </div>
                                        <div class="form-group">
                                            <b>Số điện thoại:</b>&emsp;{{ $ds->nd_sdt }}
                                        </div>
                                        <label for="">Địa chỉ người dùng</label>
                                        <div class="form-group">
                                            <b>Tỉnh thành phố:</b>&emsp;{{ $ds->ttp_ten }}
                                        </div>
                                        <div class="form-group">
                                            <b>Xã phường:</b>&emsp;{{ $ds->qh_ten }}
                                        </div>
                                        <div class="form-group">
                                            <b>Quận huyện:</b>&emsp;{{ $ds->xp_ten }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
