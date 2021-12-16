@extends('client.page.template.master')
@section('title-page')
    Thêm bài viết
@endsection
@section('title-page-detail')
    Thêm bài viết
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
                    <form method="POST" action="{{ route('postuser.redouble') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Tiêu đề bài viết</label>
                                            <input class="form-control" type="text" name="tieude"
                                                placeholder="Nhập vào tiêu đề bài viết">
                                            <span class="error-message">{{ $errors->first('tieude') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Hình ảnh bài viết</label>
                                            <input type="file" style="padding-top: 3px" name="anhbaiviet"
                                                class="form-control" id="" multiple aria-describedby="helpId">
                                            <span class="error-message">{{ $errors->first('anhbaiviet') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Tóm tắt tiêu đề bài viết</label>
                                            <textarea class="textarea" placeholder="Nhập vào tóm tắt bài viết"
                                                name="tomtat" class="form-control" rows="8" cols="50">
                                                </textarea>
                                            <span class="error-message">{{ $errors->first('tomtat') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nội dung bài viết</label>
                                            <textarea class="textarea" placeholder="Nhập vào nội dung bài viết"
                                                name="noidung" class="form-control" rows="8" cols="50">
                                                </textarea>
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
