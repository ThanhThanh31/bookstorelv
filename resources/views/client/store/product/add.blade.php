@extends('client.store.template.master')
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
                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <lable for=""> Tên sản phẩm</lable>
                                        <input type="text" name="ten" class="form-control" id=""
                                            placeholder="Nhập vào tên sản phẩm">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <lable for="">Giá sản phẩm</lable>
                                        <input class="form-control" type="number" name="gia"
                                            placeholder="Nhập vào giá sản phẩm">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <lable for="">Thể loại</lable>
                                            <select name="theloai" class="form-control theLoai">
                                                <option value="">Chọn thể loại</option>
                                                @foreach ($mix as $item => $key)
                                                    <option value="{{ $key->tl_id }}">{{ $key->tl_ten }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <lable for="">Lĩnh vực</lable>
                                            <select name="linhvuc" class="form-control linhVuc">
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <lable for="">Số trang</lable>
                                            <input class="form-control" type="number" name="sotrang"
                                                placeholder="Nhập vào số trang sản phẩm">
                                        </div>
                                        <div class="form-group">
                                            <lable for="">Kích thước</lable>
                                            <input class="form-control" type="text" name="kichthuoc"
                                                placeholder="Nhập vào kích thước sản phẩm">
                                        </div>
                                        <div class="form-group">
                                            <lable for="">Số lượng</lable>
                                            <input type="number" name="soluong" class="form-control" id=""
                                                placeholder="Nhập vào số lượng sản phẩm">
                                        </div>
                                        <div class="form-group">
                                            <lable for="">Loại bìa</lable>
                                            <select name="loaibia" class="form-control">
                                                <option value="">Chọn loại bìa</option>
                                                @foreach ($lb as $item => $keys)
                                                    <option value="{{ $keys->lb_id }}">{{ $keys->lb_ten }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <lable for="">Tác giả</lable>
                                            <select name="tacgia" class="form-control">
                                                <option value="">Chọn tác giả</option>
                                                @foreach ($tg as $item => $lock)
                                                    <option value="{{ $lock->tg_id }}">{{ $lock->tg_ten }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <lable for="">Hình ảnh sản phẩm</lable>
                                            <input type="file" style="padding-top: 3px" name="anh" class="form-control"
                                                id="" multiple aria-describedby="helpId">
                                        </div>
                                        <div class="form-group">
                                            <lable for="">Hình ảnh liên quan</lable>
                                            @for ($i = 1; $i < 4; $i++)
                                                <input type="file" style="padding-top: 3px" name="anhlink[]"
                                                    class="form-control" id="" multiple aria-describedby="helpId">
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <lable for="">Nhà xuất bản</lable>
                                        <select name="nhaxuatban" class="form-control">
                                            <option value="">Chọn nhà xuất bản</option>
                                            @foreach ($nxb as $item => $tie)
                                                <option value="{{ $tie->nxb_id }}">{{ $tie->nxb_ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <lable for="">Công ty phát hành</lable>
                                        <select name="congty" class="form-control">
                                            <option value="">Chọn công ty phát hành</option>
                                            @foreach ($cty as $item)
                                                <option value="{{ $item->cty_id }}">{{ $item->cty_ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <lable for="">Mô tả sản phẩm</lable>
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
                        url: BASE_URL + "/store/" + getIDCat + "/get",
                        dataType: "json",
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
