@extends('admin.template.master')
@section('title-page')
    Chỉnh sửa tác giả sản phẩm
@endsection
@section('title-page-detail')
    Chỉnh sửa tác giả sản phẩm
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
                    <form method="POST" action="{{ route('author.update', ['id' => $show->tg_id]) }}">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Tên tác giả</label>
                                            <input type="text" value="{{ $show->tg_ten }}" name="tacgia"
                                                class="form-control" id="">
                                                <span class="error-message">{{ $errors->first('tacgia') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('author.index') }}" type="button" class="btn btn-secondary">Trở về</a>
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
