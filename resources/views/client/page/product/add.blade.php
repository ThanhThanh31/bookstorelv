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
                <style type="text/css">
                    .error-message { color: red; }
                </style>
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
                                            <span class="error-message">{{ $errors->first('anh') }}</span>
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
                                            <span class="error-message">{{ $errors->first('ten') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Thể loại</label>
                                            <select name="theloai" class="form-control theLoai">
                                                <option value="">--- Chọn thể loại ---</option>
                                                @foreach ($tl as $item => $key)
                                                    <option value="{{ $key->tl_id }}">{{ $key->tl_ten }}</option>
                                                @endforeach
                                            </select>
                                            <span class="error-message">{{ $errors->first('theloai') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Lĩnh vực</label>
                                            <select name="linhvuc" class="form-control linhVuc">
                                            </select>
                                            <span class="error-message">{{ $errors->first('linhvuc') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Loại bìa</label>
                                            <select name="loaibia" class="form-control">
                                                <option value="">--- Chọn loại bìa ---</option>
                                                @foreach ($lb as $item => $keys)
                                                    <option value="{{ $keys->lb_id }}">{{ $keys->lb_ten }}</option>
                                                @endforeach
                                            </select>
                                            <span class="error-message">{{ $errors->first('loaibia') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tác giả</label>
                                            <select name="tacgia" class="form-control">
                                                <option value="">--- Chọn tác giả ---</option>
                                                @foreach ($tg as $item => $lock)
                                                    <option value="{{ $lock->tg_id }}">{{ $lock->tg_ten }}</option>
                                                @endforeach
                                            </select>
                                            <span class="error-message">{{ $errors->first('tacgia') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Số trang</label>
                                        <input class="form-control" type="number" name="sotrang"
                                            placeholder="Nhập vào số trang sản phẩm">
                                        <span class="error-message">{{ $errors->first('sotrang') }}</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Kích thước</label>
                                        <input class="form-control" type="text" name="kichthuoc"
                                            placeholder="Nhập vào kích thước sản phẩm">
                                        <span class="error-message">{{ $errors->first('kichthuoc') }}</span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Giá sản phẩm (VNĐ)</label>
                                        <input class="form-control" type="number" name="gia"
                                            placeholder="Nhập vào giá sản phẩm">
                                        <span class="error-message">{{ $errors->first('gia') }}</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Số lượng</label>
                                        <input class="form-control" type="number" name="soluong"
                                            placeholder="Nhập vào số lượng sản phẩm">
                                        <span class="error-message">{{ $errors->first('soluong') }}</span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Nhà xuất bản</label>
                                        <select name="nhaxuatban" class="form-control">
                                            <option value="">--- Chọn nhà xuất bản ---</option>
                                            @foreach ($nxb as $item => $tie)
                                                <option value="{{ $tie->nxb_id }}">{{ $tie->nxb_ten }}</option>
                                            @endforeach
                                        </select>
                                        <span class="error-message">{{ $errors->first('nhaxuatban') }}</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Công ty phát hành</label>
                                        <select name="congty" class="form-control">
                                            <option value="">--- Chọn công ty phát hành ---</option>
                                            @foreach ($cty as $item)
                                                <option value="{{ $item->cty_id }}">{{ $item->cty_ten }}</option>
                                            @endforeach
                                        </select>
                                        <span class="error-message">{{ $errors->first('congty') }}</span>
                                    </div>
                                </div>
                                <label for="">Nơi bán sản phẩm</label>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="">Tỉnh thành phố</label>
                                        <select name="thanhpho" class="form-control City">
                                            <option value="">--- Chọn tỉnh thành phố ---</option>
                                            @foreach ($tp as $item => $city)
                                                <option value="{{ $city->ttp_id }}">{{ $city->ttp_ten }}</option>
                                            @endforeach
                                        </select>
                                        <span class="error-message">{{ $errors->first('thanhpho') }}</span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Quận huyện</label>
                                        <select name="quanhuyen" class="form-control Province">
                                            <option value="">--- Chọn quận huyện ---</option>
                                        </select>
                                        <span class="error-message">{{ $errors->first('quanhuyen') }}</span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Xã phường</label>
                                        <select name="xaphuong" class="form-control Ward">
                                            <option value="">--- Chọn xã phường ---</option>
                                        </select>
                                        <span class="error-message">{{ $errors->first('xaphuong') }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Mô tả sản phẩm</label>
                                            <textarea class="textarea" placeholder="Nhập vào mô tả sản phẩm" name="mota"
                                            class="form-control" rows="8" cols="50">
                                            </textarea>
                                            <span class="error-message">{{ $errors->first('mota') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="{{ route('pro.index') }}" type="button" class="btn btn-secondary">Trở về</a>
                                <button type="submit" class="btn btn-success">Xác nhận</button>
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
    @push('ajax-add-address')
    <script>
        $(document).ready(function() {
            const BASE_URL = window.location.origin;
            //jqchang - phím tắt
            $('select.City').change(function(e) {
                e.preventDefault();
                var getIDCity = $(this).children("option:selected").val();
                // console.log(getIDCat);
                $('.itemCity').remove();
                // jqajax - phím tắt
                $.ajax({
                    type: "get",
                    url: BASE_URL + "/page/" + getIDCity + "/province",
                    success: function(response) {
                        console.log(response);
                        for (let i = 0; i < response.length; i++) {
                            $('.Province').append('<option value="' + response[i].qh_id +
                                '" class="itemCity">' + response[i].qh_ten + '</option>'
                                );
                        }
                    }
                });
            });
            $('select.Province').change(function(e) {
                e.preventDefault();
                var getIDProvince = $(this).children("option:selected").val();
                // console.log(getIDCat);
                $('.itemProvince').remove();
                // jqajax - phím tắt
                $.ajax({
                    type: "get",
                    url: BASE_URL + "/page/" + getIDProvince + "/ward",
                    success: function(response) {
                        console.log(response);
                        for (let i = 0; i < response.length; i++) {
                            $('.Ward').append('<option value="' + response[i].xp_id +
                                '" class="itemProvince">' + response[i].xp_ten + '</option>'
                                );
                        }
                    }
                });
            });
        });
    </script>
    @endpush
@endsection
