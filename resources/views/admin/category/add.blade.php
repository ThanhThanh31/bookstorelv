@extends('admin.template.master')
@section('title-page')
    Thêm loại sản phẩm
@endsection
@section('title-page-detail')
    Thêm loại sản phẩm
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
                    <form method="POST" action="{{ route('cate.add') }}">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Tên thể loại</label>
                                            <input type="text" name="theloai" class="form-control" id="">
                                            <span class="error-message">{{ $errors->first('theloai') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Mô tả thể loại</label>
                                            <textarea class="textarea" placeholder="Nhập vào mô tả thể loại" name="moTa"
                                            class="form-control" rows="8" cols="50">
                                            </textarea>
                                            <span class="error-message">{{ $errors->first('moTa') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('cate.index') }}" type="button" class="btn btn-secondary">Trở về</a>
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
