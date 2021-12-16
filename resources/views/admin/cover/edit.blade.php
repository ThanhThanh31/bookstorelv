@extends('admin.template.master')
@section('title-page')
    Chỉnh sửa loại bìa sản phẩm
@endsection
@section('title-page-detail')
    Chỉnh sửa loại bìa sản phẩm
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
                    <form method="POST" action="{{ route('cover.update', ['id' => $edit->lb_id]) }}">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Tên loại bìa</label>
                                            <input type="text" value="{{ $edit->lb_ten }}" name="loaibia"
                                                class="form-control" id="">
                                                <span class="error-message">{{ $errors->first('loaibia') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('cover.index') }}" type="button" class="btn btn-secondary">Trở về</a>
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
