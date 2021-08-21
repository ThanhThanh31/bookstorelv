@extends('admin.template.master')
@section('title-page')
    Chỉnh sửa loại sản phẩm
@endsection
@section('title-page-detail')
    Chỉnh sửa loại sản phẩm
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-6">
                    <form method="POST" action="{{ route('loaisp.update', ['id'=>$category->l_id]) }}">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên loại</label>
                            <input type="text" value="{{$category->l_ten}}" name="Loaisp" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Chỉnh sửa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
