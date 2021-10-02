@extends('client.store.template.master')
@section('title-page')
    Chi tiết sản phẩm
@endsection
@section('title-page-detail')
    Chi tiết sản phẩm
@endsection
@section('content')
{{-- {{ dd($danhsach_dm) }} --}}
    <body>
        <main class="container">
            <header class="row text-center"></header>
            <section class="row">
                <div class="col-md-12">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                Thêm thông tin cho sản phẩm
                                @if (Session::has('success'))
                                    <p style="color: rgb(20, 163, 16)" >{{ Session::get('success') }}</p>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Tên sản phẩm</label>
                                            <input type="text" name="tenSanPham" id="" class="form-control"
                                                placeholder="Tên sản phẩm" aria-describedby="helpId">
                                            <small id="helpId" class="text-muted">Tên sản phẩm là bắt buộc</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Số lượng</label>
                                            <input type="text" name="soLuong" id="" class="form-control" placeholder=""
                                                aria-describedby="helpId">
                                            <small id="helpId" class="text-muted">Số lượng là bắt buộc</small>
                                        </div>
                                        <div class="input-group form-group">
                                            <span class="input-group-text">Giá sản phẩm</span>
                                            <input class="form-control" type="number" name="giaSanPham" placeholder="Giá sản phẩm"
                                                aria-label="Recipient's ">
                                            <span class="input-group-text">VND</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Danh mục</label>
                                            <select class="form-control danhMuc" name="danhMuc" >
                                                <option>Chọn danh mục</option>
                                                {{-- @foreach ($danhsach_dm as $item)

                                                    <option value="{{ $item->id_dm }}">{{ $item->ten_dm }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Loại sản phẩm</label>
                                            <select class="form-control loaiSanPham" name="loaiSanPham" id="">
                                                {{-- @foreach ($danhsach_lsp as $item)

                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('template-client') }}/img/avatar.jpg" width="50%"
                                            class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                                            alt="">
                                        <div class="form-group">
                                            <label for=""></label>
                                            <input type="file" style="padding-top: 3px" name="hinhAnh" id="" class="form-control"
                                                placeholder="Hình ảnh" aria-describedby="helpId"><br>
                                            <small id="helpId" class="text-muted">Hình ảnh sản phẩm là bắt buộc</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Mô tả</label>
                                            <textarea class="form-control" name="moTa" id="" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Lưu sản phẩm</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </main>

    </body>
    {{-- @push('ajax-add-product')
        <script>
            $(document).ready(function () {
                const BASE_URL = window.location.origin //lấy base url
                $('select.danhMuc').change(function (e) {
                    e.preventDefault();
                    var getIDCat = $(this).children("option:selected").val();
                    console.log(getIDCat);
                    $('.itemLSP').remove();
                     $.ajax({
                         type: "get",
                         url: BASE_URL + "/client/get-product-type/"+getIDCat,
                        //  data: "data",
                         dataType: "json",
                         success: function (response) {
                            for (let i = 0; i < response.length; i++){
                               $('.loaiSanPham').append('<option value="'+response[i].id+'" class = "itemLSP">'+response[i].ten_lsp+'</option>');
                            }
                          }
                     });
                });

            });
        </script>
    @endpush --}}
@endsection