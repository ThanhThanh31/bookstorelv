@extends('admin.template.master')
@section('title-page')
    Thể loại sản phẩm
@endsection
@section('title-page-detail')
    Thể loại sản phẩm
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <?php
            function prominente($str, $key_cate){
                return str_replace($key_cate, "<span style='color: red;'>$key_cate</span>", $str);
            }
            ?>
            <!-- SEARCH FORM -->
            <div class="row">
                <form action="{{ route('admin.seek_category') }}" method="GET" class="form-inline" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group col-lg-12 col-sm-12" style="min-width: 150%; padding-left: 470px">
                        <input id="key_cate" name="key_cate" class="form-control" type="search" placeholder="Nhập vào tên thể loại cần tìm kiếm..." aria-label="Search">
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
                <a href="{{ route('cate.addform') }}" class="btn btn-primary">Thêm thể loại</a>
            </div>
            <br>
            <div class="row">
                Kết quả tìm kiếm thể loại với từ khóa '{{ $key_cate }}'
            </div>
            <br>
            @if (count($search_category) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;" class="alert alert-warning">Rất tiếc, không tìm thấy thể loại sản phẩm phù hợp với lựa chọn của bạn !!!</div>
            @else
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr style="text-align: center">
                            <th>STT</th>
                            <th>Tên thể loại sản phẩm</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($search_category as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{!! prominente($item->tl_ten, $key_cate) !!}</td>
                                <td>
                                    <a href="{{ route('cate.edit', ['id' => $item->tl_id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->tl_ten }} ?')" href="{{ route('cate.delete', ['id' => $item->tl_id]) }}"
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
