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
                <form method="POST" action="{{ route('sp.update', ['id'=>$edit_product->sp1_id]) }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <lable for=""> Tên sản phẩm</lable>
                            <input type="text" value="{{ $edit_product->sp1_ten }}" name="tensp" class="form-control"
                                id="">
                        </div>
                        <div class="form-group col-md-5">
                            <lable for="">Loại sản phẩm</lable>
                            <select name="LoaiSanPham" class="form-control">
                                @foreach($list_cate as $item => $key)
                                    <option value="{{ $key->l_id }}"
                                        @if($edit_product->l_id == $key->l_id) selected @endif >
                                        {{ $key->l_ten }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <lable for="">Trạng thái</lable>
                            <input type="text" value="{{ $edit_product->sp1_trangthai }}" name="trangthai"
                                class="form-control" id="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <lable for="">Mô tả</lable>
                            <textarea name="mota" id="" cols="30" rows="5"
                                class="form-control">{{ $edit_product->sp1_mota }}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <lable for="">Cách dùng</lable>
                            <textarea name="cachdung" id="" cols="30" rows="5"
                                class="form-control">{{ $edit_product->sp1_cachdung }}</textarea>
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
