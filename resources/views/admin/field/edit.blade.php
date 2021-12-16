@extends('admin.template.master')
@section('title-page')
    Chỉnh sửa lĩnh vực
@endsection
@section('title-page-detail')
    Chỉnh sửa lĩnh vực
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
                    <form method="POST" action="{{ route('field.uphold', ['id' => $fields->lv_id]) }}">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=""> Tên lĩnh vực</label>
                                        <input type="text" value="{{ $fields->lv_ten }}" name="tenlinhVuc"
                                            class="form-control" id="">
                                            <span class="error-message">{{ $errors->first('tenlinhVuc') }}</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Thể loại</label>
                                        <select name="theloai" class="form-control">
                                            @foreach ($categorys as $item => $keys)
                                                <option value="{{ $keys->tl_id }}" @if ($fields->tl_id == $keys->tl_id) selected @endif>
                                                    {{ $keys->tl_ten }}</option>
                                            @endforeach
                                        </select>
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
