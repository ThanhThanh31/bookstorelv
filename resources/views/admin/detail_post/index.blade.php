@extends('admin.template.master')
@section('title-page')
    Chi tiết bài viết
@endsection
@section('title-page-detail')
    Chi tiết bài viết
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{ route('admin.embattle') }}" type="button" class="btn btn-secondary">Trở về</a>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" style="text-align:center; padding-top: 10px">
                                            <a href="{{ route('product.details', ['id' => $shows->bv_id]) }}"></a>
                                            <img src="{{ asset($shows->bv_hinhanh) }}" style="width: 100%; height: 300px;" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <b>Tên người đăng bài viết:</b>&emsp;{{ $shows->username }}
                                        </div>
                                        <label for="">Tên bài viết</label>
                                        <div class="form-group">
                                            <p>{!! $shows->bv_tieude !!}</p>
                                        </div>
                                        <label for="">Tóm tắt tiêu đề bài viết</label>
                                        <div class="form-group">
                                            <p>{!! $shows->bv_tomtat !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Nội dung bài viết</label>
                                        <div class="form-group">
                                            <p>{!! $shows->bv_noidung !!}</p>
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
