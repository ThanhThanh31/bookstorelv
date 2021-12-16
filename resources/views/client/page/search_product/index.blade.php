@extends('client.page.template.master')
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
            function prominente($str, $key){
                return str_replace($key, "<span style='color: red;'>$key</span>", $str);
            }
            ?>
            <!-- SEARCH FORM -->
            <div class="row">
                <form action="{{ route('pro.find_products') }}" method="POST" class="form-inline" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group col-lg-12 col-sm-12" style="min-width: 150%; padding-left: 470px">
                        <input id="key" name="key" class="form-control" type="search" placeholder="Nhập vào thông tin sản phẩm cần tìm kiếm..." aria-label="Search">
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
                <a href="{{ route('pro.index') }}" type="button" class="btn btn-secondary">Trở về</a>
            </div>
            <br>
            <div class="row">
                Kết quả tìm kiếm sản phẩm với từ khóa '{{ $key }}'
            </div>
            <br>
            @if (count($find_products) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;"
                    class="alert alert-warning">Rất tiếc, không tìm thấy sản phẩm phù hợp với lựa chọn của bạn !!!</div>
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
                                <th>User</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1; ?>
                            @foreach ($find_products as $item)
                                <tr style="text-align: center">
                                    <td>{{ $stt++ }}</td>
                                    <td>{!! prominente($item->sp_ten, $key) !!}</td>
                                    <td>
                                        <img src="{{ asset($item->sp_hinhanh) }}" alt=""
                                            style="height: 100px;  width: 70px">
                                    </td>
                                    <td>{{ $item->tl_ten }}</td>
                                    <td>{{ $item->lv_ten }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>
                                        <a href="{{ route('pro.revised', ['id' => $item->sp_id]) }}"
                                            class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <a onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->sp_ten }} ?')"
                                            href="{{ route('pro.delete', ['id' => $item->sp_id]) }}"
                                            class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
