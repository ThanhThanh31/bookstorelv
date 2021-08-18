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
                    <form method="POST" action="{{ route('sanpham.add') }}">
                        @csrf
                        <div class="form-row">
                           <div class="form-group col-md-5">
                               <lable for=""> Tên sản phẩm</lable>
                               <input type="text" name="tensp" class="form-control" id="" placeholder="Nhập vào tên sản phẩm">
                           </div>
                           <div class="form-group col-md-5">
                               <lable for="">Loại sản phẩm</lable>
                               <select name="LoaiSanPham" class="form-control">
                                    @foreach ($danhSach as $item => $key)
                                    <option value="{{ $key->l_id }}">{{$key->l_ten}}</option>
                                    @endforeach
                                </select>
                           </div>
                           <div class="form-group col-md-2">
                                <lable for="">Trạng thái</lable>
                                <input type="text" name="trangthai" class="form-control" id="">
                           </div>
                       </div>
                       <div class="form-row">
                           <div class="form-group col-md-6">
                                <lable for="">Mô tả</lable>
                                <textarea name="mota" id="" cols="30" rows="5" class="form-control" placeholder="Nhập vào mô tả sản phẩm"></textarea>
                           </div>
                           <div class="form-group col-md-6">
                                <lable for="">Cách dùng</lable>
                                <textarea name="cachdung" id="" cols="30" rows="5" class="form-control" placeholder="Nhập vào cách sử dụng sản phẩm"></textarea>
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



