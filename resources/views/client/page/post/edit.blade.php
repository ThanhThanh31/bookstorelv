@extends('client.page.template.master')
@section('title-page')
    Chỉnh sửa bài viết
@endsection
@section('title-page-detail')
    Chỉnh sửa bài viết
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <style type="text/css">
                    .error-message { color: red; }
                </style>
                <div class="col-md-12">
                    <form method="POST" action="{{ route('postuser.overhaul', ['id' => $edit->bv_id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Tiêu đề bài viết</label>
                                            <input class="form-control" value="{{ $edit->bv_tieude }}" type="text" name="tieude"
                                                placeholder="Nhập vào tiêu đề bài viết">
                                                <span class="error-message">{{ $errors->first('tieude') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Hình ảnh bài viết</label>
                                            <img src="{{ asset($edit->bv_hinhanh) }}" alt="" style="width: 100%; height: 300px">
                                            <input class="form-control" type="hidden" name="image" id=""
                                                value="{{ $edit->bv_hinhanh }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Thay đổi ảnh bài viết</label>
                                            <input type="file" style="padding-top: 3px" name="anhbaiviet"
                                                class="form-control" id="" aria-describedby="helpId">
                                                <span class="error-message">{{ $errors->first('anhbaiviet') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Tóm tắt tiêu đề bài viết</label>
                                            <textarea class="textarea" placeholder="Nhập vào tóm tắt bài viết"
                                                name="tomtat" class="form-control" rows="8" cols="50">{{ $edit->bv_tomtat }}</textarea>
                                                <span class="error-message">{{ $errors->first('tomtat') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nội dung bài viết</label>
                                            <textarea class="textarea" placeholder="Nhập vào nội dung bài viết"
                                                name="noidung" class="form-control" rows="8" cols="50">{{ $edit->bv_noidung }}</textarea>
                                                <span class="error-message">{{ $errors->first('noidung') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="{{ route('postuser.index') }}" type="button" class="btn btn-secondary">Trở về</a>
                                <button type="submit" class="btn btn-success">Xác nhận</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
