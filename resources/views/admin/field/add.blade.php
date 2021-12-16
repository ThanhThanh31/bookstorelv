@extends('admin.template.master')
@section('title-page')
    Thêm lĩnh vực
@endsection
@section('title-page-detail')
    Thêm lĩnh vực
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
                    <form method="POST" action="{{ route('field.season') }}">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=""> Tên lĩnh vực</label>
                                        <input type="text" name="tenlinhVuc" class="form-control" id="">
                                        <span class="error-message">{{ $errors->first('tenlinhVuc') }}</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Thể loại</label>
                                        <select name="theloai" class="form-control" selected>
                                            <option value="">--- Chọn thể loại ---</option>
                                            @foreach ($cateList as $item => $key)
                                                <option value="{{ $key->tl_id }}">{{ $key->tl_ten }}</option>
                                            @endforeach
                                        </select>
                                        <span class="error-message">{{ $errors->first('theloai') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('field.index') }}" type="button" class="btn btn-secondary">Trở về</a>
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
