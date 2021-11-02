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
                <div class="col-md-12">
                    <form method="POST" action="{{ route('cate.add') }}">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tên thể loại</label>
                                            <input type="text" name="theloai" class="form-control" id="">
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Thêm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
