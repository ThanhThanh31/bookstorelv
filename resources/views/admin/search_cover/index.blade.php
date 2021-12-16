@extends('admin.template.master')
@section('title-page')
    Loại bìa sản phẩm
@endsection
@section('title-page-detail')
    Loại bìa sản phẩm
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <?php
            function prominente($str, $key_cover){
                return str_replace($key_cover, "<span style='color: red;'>$key_cover</span>", $str);
            }
            ?>
            <!-- SEARCH FORM -->
            <div class="row">
                <form action="{{ route('admin.seek_cover') }}" method="GET" class="form-inline" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group col-lg-12 col-sm-12" style="min-width: 150%; padding-left: 470px">
                        <input id="key_cover" name="key_cover" class="form-control" type="search" placeholder="Nhập vào tên loại bìa cần tìm kiếm..." aria-label="Search">
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
                <a href="{{ route('cover.create') }}" class="btn btn-primary">Thêm loại bìa</a>
            </div>
            <br>
            <div class="row">
                Kết quả tìm kiếm loại bìa với từ khóa '{{ $key_cover }}'
            </div>
            <br>
            @if (count($search_cover) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;" class="alert alert-warning">Rất tiếc, không tìm thấy tên loại bìa phù hợp với lựa chọn của bạn !!!</div>
            @else
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr style="text-align: center">
                            <th>STT</th>
                            <th>Loại bìa sản phẩm</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($search_cover as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{!! prominente($item->lb_ten, $key_cover) !!}</td>
                                <td>
                                    <a href="{{ route('cover.edit', ['id' => $item->lb_id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->lb_ten }} ?')" href="{{ route('cover.destroy', ['id' => $item->lb_id]) }}"
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
