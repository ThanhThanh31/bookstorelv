@extends('client.store.template.master')
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
                <div class="col-md-12">
                    <form method="POST" action="{{ route('pro.amend', ['id' => $product->sp_id]) }}"
                        enctype="multipart/form-data">
                        { !! $mota !!}
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group" style="text-align:center; padding-top: 10px">
                                            <img src="{{ asset($product->sp_hinhanh) }}" width="75%" height="330px"
                                                alt="">
                                            <input class="form-control" type="hidden" name="anh" id=""
                                                value="{{ $product->sp_hinhanh }}">
                                        </div>
                                        <div class="form-group">
                                            <lable for="">Thay đổi ảnh sản phẩm</lable>
                                            <input type="file" style="padding-top: 3px" name="anh_edit"
                                                class="form-control" id="" aria-describedby="helpId">
                                        </div>
                                        <div class="form-row" style="text-align:center">
                                            @foreach ($image as $item)
                                                <div class="form-group col-md-4">
                                                    <img src="{{ asset($item->a_duongdan) }}" width="70px" height="100px"
                                                        alt="">
                                                    <input class="form-control" type="hidden" name="lienquan" id=""
                                                        value="{{ $item->a_duongdan }}" @if ($product->a_id == $item->a_id) @endif>
                                                </div>
                                            @endforeach
                                        </div>
                                        {{-- <div class="form-group">
                                            <lable for="">Thêm ảnh sản phẩm liên quan</lable>
                                            <input type="file" style="padding-top: 3px" name="anhlinks[]"
                                                class="form-control" id="" aria-describedby="helpId">
                                        </div> --}}
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <lable for=""> Tên sản phẩm</lable>
                                            <input type="text" value="{{ $product->sp_ten }}" name="ten"
                                                class="form-control" id="">
                                        </div>
                                        <div class="form-group">
                                            <lable for="">Thể loại</lable>
                                            <select name="theloai" class="form-control theLoai">
                                                @foreach ($category as $item => $key)
                                                    <option value="{{ $key->tl_id }}" @if ($product->tl_id == $key->tl_id) selected @endif>
                                                        {{ $key->tl_ten }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <lable for="">Lĩnh vực</lable>
                                            <select name="linhvuc" class="form-control linhVuc">
                                                <option class="itemCate" value="{{ $product->lv_id }}">
                                                    {{ $product->lv_ten }}</option>
                                                @foreach ($field as $item => $keys)
                                                    {{-- <option value="{{ $keys->lv_id }}"
                                                        @if ($product->lv_id == $keys->lv_id) selected @endif >
                                                        {{ $keys->lv_ten }}</option> --}}
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <lable for="">Số trang</lable>
                                                <input class="form-control" type="number" name="sotrang"
                                                    value="{{ $product->sp_sotrang }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <lable for="">Kích thước</lable>
                                                <input class="form-control" type="text" name="kichthuoc"
                                                    value="{{ $product->sp_kichthuoc }}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <lable for="">Số lượng</lable>
                                                <input class="form-control" type="number" name="soluong"
                                                    value="{{ $product->sp_soluong }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <lable for="">Giá sản phẩm</lable>
                                                <input class="form-control" type="number" name="gia"
                                                    value="{{ $product->sp_gia }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <lable for="">Loại bìa</lable>
                                            <select name="loaibia" class="form-control">
                                                @foreach ($type as $item => $ty)
                                                    <option value="{{ $ty->lb_id }}" @if ($product->lb_id == $ty->lb_id) selected @endif>
                                                        {{ $ty->lb_ten }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <lable for="">Tác giả</lable>
                                            <select name="tacgia" class="form-control">
                                                @foreach ($author as $au)
                                                    <option value="{{ $au->tg_id }}" @if ($product->tg_id == $au->tg_id) selected @endif>
                                                        {{ $au->tg_ten }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <lable for="">Nhà xuất bản</lable>
                                        <select name="nhaxuatban" class="form-control">
                                            @foreach ($editor as $item => $ed)
                                                <option value="{{ $ed->nxb_id }}" @if ($product->nxb_id == $ed->nxb_id) selected @endif>
                                                    {{ $ed->nxb_ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <lable for="">Công ty phát hành</lable>
                                        <select name="congty" class="form-control">
                                            @foreach ($company as $comp)
                                                <option value="{{ $comp->cty_id }}" @if ($product->cty_id == $comp->cty_id) selected @endif>
                                                    {{ $comp->cty_ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <lable for="">Mô tả sản phẩm</lable>
                                            <textarea name="mota" cols="30" rows="10" class="textarea">{{ $product->sp_mota }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Chỉnh sửa</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @push('ajax-add-product')
        <script>
            $(document).ready(function() {
                const BASE_URL = window.location.origin;
                //khai báo biến submit form lấy đối tượng nút submit
                // var submit = $("button[type='submit']");
                // submit.click(){}
                //jqchang - phím tắt
                $('select.theLoai').change(function(e) {
                    e.preventDefault();
                    var getIDCat = $(this).children("option:selected").val();
                    // console.log(getIDCat);
                    $('.itemCate').remove();
                    // jqajax - phím tắt
                    $.ajax({
                        type: "get",
                        url: BASE_URL + "/store/" + getIDCat + "/get",
                        dataType: "json",
                        success: function(response) {
                            // console.log(response);
                            for (let i = 0; i < response.length; i++) {
                                $('.linhVuc').append('<option value="' + response[i].lv_id +
                                    '" class="itemCate">' + response[i].lv_ten + '</option>');
                            }
                        }
                    });
                });
            })
        </script>
    @endpush
@endsection
