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
                <div class="col-md-6">
                    <form method="POST" action="{{ route('cate.add') }}">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên thể loại</label>
                            <input type="text" name="theloai" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
