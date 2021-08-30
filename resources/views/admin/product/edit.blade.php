@extends('admin.template.master')
@section('title-page')
    Chỉnh sửa sản phẩm
@endsection
@section('title-page-detail')
    Chỉnh sửa sản phẩm
@endsection
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-10">
                <form method="POST" action="{{ route('pro.update', ['id'=>$edit_product->sp_id]) }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <lable for=""> Tên sản phẩm</lable>
                            <input type="text" value="{{ $edit_product->sp_ten }}" name="tensp" class="form-control"
                                id="">
                        </div>
                        <div class="form-group col-md-5">
                            <lable for="">Thể loại</lable>
                            <select name="theloai" class="form-control">
                                @foreach($list_cate as $item => $key)
                                    <option value="{{ $key->tl_id }}"
                                        @if($edit_product->tl_id == $key->tl_id) selected @endif >
                                        {{ $key->tl_ten }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <lable for="">Số lượng</lable>
                            <input type="text" value="{{ $edit_product->sp_soluong }}" name="soluong"
                                class="form-control" id="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <lable for="">Mô tả</lable>
                            <textarea name="mota" id="" cols="30" rows="5"
                                class="form-control">{{ $edit_product->sp_mota }}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <lable for="">Chi tiết</lable>
                            <textarea name="chitiet" id="" cols="30" rows="5"
                                class="form-control">{{ $edit_product->sp_chitiet }}</textarea>
                        </div>
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
