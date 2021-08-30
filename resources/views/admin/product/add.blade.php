@extends('admin.template.master')
@section('title-page')
Thêm sản phẩm
@endsection
@section('title-page-detail')
Thêm sản phẩm
@endsection
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-10">
                <form method="POST" action="{{ route('pro.add') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <lable for=""> Tên sản phẩm</lable>
                            <input type="text" name="tensp" class="form-control" id="">
                        </div>
                        <div class="form-group col-md-5">
                            <lable for="">Thể loại</lable>
                            <select name="theloai" class="form-control">
                                @foreach($add as $item => $key)
                                    <option value="{{ $key->tl_id }}">{{ $key->tl_ten }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <lable for="">Số lượng</lable>
                            <input type="text" name="soluong" class="form-control" id="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <lable for="">Mô tả sản phẩm</lable>
                            <textarea name="mota" id="" cols="30" rows="5" class="form-control"
                                placeholder="Nhập vào mô tả sản phẩm"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <lable for="">Chi tiết sản phẩm</lable>
                            <textarea name="chitiet" id="" cols="30" rows="5" class="form-control"
                                placeholder="Nhập vào cách sử dụng sản phẩm"></textarea>
                        </div>
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
