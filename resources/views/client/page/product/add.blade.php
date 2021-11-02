@extends('client.page.template.master')
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
                <div class="col-md-12">
                    <form method="POST" action="{{ route('pro.add') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Hình ảnh sản phẩm</label>
                                            <input type="file" style="padding-top: 3px" name="anh" class="form-control"
                                                id="" multiple aria-describedby="helpId">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Hình ảnh liên quan</label>
                                            @for ($i = 1; $i < 8; $i++)
                                                <input type="file" style="padding-top: 3px" name="anhlink[]"
                                                    class="form-control" id="" multiple aria-describedby="helpId">
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for=""> Tên sản phẩm</label>
                                            <input type="text" name="ten" class="form-control" id="" placeholder="Nhập vào tên sản phẩm">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Thể loại</label>
                                            <select name="theloai" class="form-control theLoai">
                                                <option value="">Chọn thể loại</option>
                                                @foreach ($mix as $item => $key)
                                                    <option value="{{ $key->tl_id }}">{{ $key->tl_ten }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Lĩnh vực</label>
                                            <select name="linhvuc" class="form-control linhVuc">
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Loại bìa</label>
                                            <select name="loaibia" class="form-control">
                                                <option value="">Chọn loại bìa</option>
                                                @foreach ($lb as $item => $keys)
                                                    <option value="{{ $keys->lb_id }}">{{ $keys->lb_ten }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tác giả</label>
                                            <select name="tacgia" class="form-control">
                                                <option value="">Chọn tác giả</option>
                                                @foreach ($tg as $item => $lock)
                                                    <option value="{{ $lock->tg_id }}">{{ $lock->tg_ten }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Nhà xuất bản</label>
                                        <select name="nhaxuatban" class="form-control">
                                            <option value="">Chọn nhà xuất bản</option>
                                            @foreach ($nxb as $item => $tie)
                                                <option value="{{ $tie->nxb_id }}">{{ $tie->nxb_ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Công ty phát hành</label>
                                        <select name="congty" class="form-control">
                                            <option value="">Chọn công ty phát hành</option>
                                            @foreach ($cty as $item)
                                                <option value="{{ $item->cty_id }}">{{ $item->cty_ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <label for="">Nơi bán sản phẩm</label>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="">Tỉnh thành phố</label>
                                        <select name="thanhpho" class="form-control">
                                            <option value="">Chọn tỉnh thành phố</option>
                                                <option value="">1</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Quận huyện</label>
                                        <select name="trangthai" class="form-control">
                                            <option value="quanhuyen">Chọn quận huyện</option>
                                                <option value="">2</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Xã phường</label>
                                        <select name="xaphuong" class="form-control">
                                            <option value="">Chọn xã phường</option>
                                                <option value="">3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="">Giá sản phẩm (VNĐ)</label>
                                        <input class="form-control" type="number" name="gia"
                                            placeholder="Nhập vào giá sản phẩm">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Số trang</label>
                                        <input class="form-control" type="number" name="sotrang"
                                            placeholder="Nhập vào số trang sản phẩm">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Kích thước</label>
                                        <input class="form-control" type="text" name="kichthuoc"
                                            placeholder="Nhập vào kích thước sản phẩm">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Trạng thái</label>
                                        <select name="trangthai" class="form-control">
                                            <option value="">Chọn trạng thái sản phẩm</option>
                                                <option value="1">Đang bán</option>
                                                <option value="2">Đã bán</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Mô tả sản phẩm</label>
                                            <textarea class="textarea" placeholder="Nhập vào mô tả sản phẩm" name="mota"
                                            class="form-control" rows="8" cols="50">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thêm</button>
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
                //jqchang - phím tắt
                $('select.theLoai').change(function(e) {
                    e.preventDefault();
                    var getIDCat = $(this).children("option:selected").val();
                    // console.log(getIDCat);
                    $('.itemCategory').remove();
                    // jqajax - phím tắt
                    $.ajax({
                        type: "get",
                        url: BASE_URL + "/page/" + getIDCat + "/get",
                        success: function(response) {
                            console.log(response);
                            for (let i = 0; i < response.length; i++) {
                                $('.linhVuc').append('<option value="' + response[i].lv_id +
                                    '" class="itemCategory">' + response[i].lv_ten + '</option>'
                                    );
                            }
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
