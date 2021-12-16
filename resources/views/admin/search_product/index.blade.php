@extends('admin.template.master')
@section('title-page')
    Sản phẩm
@endsection
@section('title-page-detail')
    Sản phẩm
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <?php
            function prominente($str, $key_product){
                return str_replace($key_product, "<span style='color: red;'>$key_product</span>", $str);
            }
            ?>
            <!-- SEARCH FORM -->
            <div class="row">
                <form action="{{ route('admin.seek_product') }}" method="GET" class="form-inline" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group col-lg-12 col-sm-12" style="min-width: 150%; padding-left: 470px">
                        <input id="key_product" name="key_product" class="form-control" type="search" placeholder="Nhập vào tên sản phẩm cần tìm kiếm..." aria-label="Search">
                        <div class="input-group-append" style="background-color:#007bff">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search" style="color: #fff"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <br>
            <div class="row">
                <a href="{{ route('admin.align') }}" type="button" class="btn btn-secondary">Trở về</a>&emsp;
                <a href="{{ route('statistical_pro.index') }}" class="btn btn-primary">Xem thống kê sản phẩm</a>
            </div>
            <br>
            <div class="row">
                Kết quả tìm kiếm sản phẩm với từ khóa '{{ $key_product }}'
            </div>
            <br>
            @if (count($search_product) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;" class="alert alert-warning">Rất tiếc, không tìm thấy tên sản phẩm phù hợp với lựa chọn của bạn !!!</div>
            @else
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr style="text-align: center">
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Thể loại</th>
                            <th>Lĩnh vực</th>
                            <th>Tên người dùng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($search_product as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->sp_ten }}</td>
                                <td>
                                    <img src="{{ asset($item->sp_hinhanh) }}" alt="" style="height: 100px;  width: 70px">
                                </td>
                                <td>{!! prominente($item->tl_ten, $key_product) !!}</td>
                                <td>{!! prominente($item->lv_ten, $key_product) !!}</td>
                                <td>{!! prominente($item->username, $key_product) !!}</td>
                                <td>
                                    <a href="{{ route('admin.detail_pro', ['id' => $item->sp_id]) }}" class="btn btn-success">
                                        Xem chi tiết sản phẩm</i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </section>
@endsection
