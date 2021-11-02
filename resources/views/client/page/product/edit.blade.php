@extends('client.page.template.master')
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
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group" style="text-align:center; padding-top: 10px">
                                            <img src="{{ asset($product->sp_hinhanh) }}" width="80%" height="375px"
                                                alt="">
                                            <input class="form-control" type="hidden" name="anh" id=""
                                                value="{{ $product->sp_hinhanh }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Thay đổi ảnh sản phẩm</label>
                                            <input type="file" style="padding-top: 3px" name="anh_edit"
                                                class="form-control" id="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for=""> Tên sản phẩm</label>
                                            <input type="text" value="{{ $product->sp_ten }}" name="ten"
                                                class="form-control" id="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Thể loại</label>
                                            <select name="theloai" class="form-control theLoai">
                                                @foreach ($category as $item => $key)
                                                    <option value="{{ $key->tl_id }}" @if ($product->tl_id == $key->tl_id) selected @endif>
                                                        {{ $key->tl_ten }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Lĩnh vực</label>
                                            <select name="linhvuc" class="form-control linhVuc">
                                                <option class="itemCate" value="{{ $product->lv_id }}">
                                                    {{ $product->lv_ten }}</option>
                                                @foreach ($field as $item => $keys)
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-row">
                                            @foreach ($image as $item)
                                                <div class="form-group col-md-3">
                                                    <img src="{{ asset($item->a_duongdan) }}" width="70px" height="100px"
                                                        alt="">
                                                        <div class="form-group" style="padding-top: 5px;padding-left: 14px;">
                                                            <a type="button" class="btn btn-danger" onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->a_duongdan }} ?')"
                                                                href="{{ route('image.erase', ['id' => $item->a_id]) }}"><i class="fas fa-trash-alt"></i></a>
                                                        </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#exampleModal">Thêm hình ảnh liên quan
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Thêm hình ảnh sản phẩm liên quan</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="file" style="padding-top: 3px" name="link"
                                                            class="form-control" id="" multiple aria-describedby="helpId">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Đóng</button>
                                                        <button href="" type="submit" class="btn btn-primary">Lưu hình ảnh</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="">Giá sản phẩm (VNĐ)</label>
                                        <input class="form-control" type="number" name="gia"
                                            value="{{ $product->sp_gia }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Số trang</label>
                                        <input class="form-control" type="number" name="sotrang"
                                            value="{{ $product->sp_sotrang }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Kích thước</label>
                                        <input class="form-control" type="text" name="kichthuoc"
                                            value="{{ $product->sp_kichthuoc }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Trạng thái</label>
                                        <select name="trangthai" class="form-control">
                                            <option value="1" @if ($product->sp_trangthai == 1) selected @endif>Đang bán</option>
                                            <option value="2" @if ($product->sp_trangthai == 2) selected @endif>Đã bán</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Loại bìa</label>
                                        <select name="loaibia" class="form-control">
                                            @foreach ($type as $item => $ty)
                                                <option value="{{ $ty->lb_id }}" @if ($product->lb_id == $ty->lb_id) selected @endif>
                                                    {{ $ty->lb_ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Tác giả</label>
                                        <select name="tacgia" class="form-control">
                                            @foreach ($author as $au)
                                                <option value="{{ $au->tg_id }}" @if ($product->tg_id == $au->tg_id) selected @endif>
                                                    {{ $au->tg_ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Nhà xuất bản</label>
                                        <select name="nhaxuatban" class="form-control">
                                            @foreach ($editor as $item => $ed)
                                                <option value="{{ $ed->nxb_id }}" @if ($product->nxb_id == $ed->nxb_id) selected @endif>
                                                    {{ $ed->nxb_ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Công ty phát hành</label>
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
                                            <label for="">Mô tả sản phẩm</label>
                                            <textarea name="mota" cols="30" rows="10"
                                                class="textarea">{{ $product->sp_mota }}</textarea>
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
                        url: BASE_URL + "/page/" + getIDCat + "/get",
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
