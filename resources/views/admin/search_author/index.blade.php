@extends('admin.template.master')
@section('title-page')
    Tác giả
@endsection
@section('title-page-detail')
    Tác giả
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <?php
            function prominente($str, $key_author){
                return str_replace($key_author, "<span style='color: red;'>$key_author</span>", $str);
            }
            ?>
            <!-- SEARCH FORM -->
            <div class="row">
                <form action="{{ route('admin.seek_author') }}" method="GET" class="form-inline" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group col-lg-12 col-sm-12" style="min-width: 150%; padding-left: 470px">
                        <input id="key_author" name="key_author" class="form-control" type="search" placeholder="Nhập vào tên tác giả cần tìm kiếm..." aria-label="Search">
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
                <a href="{{ route('author.create') }}" class="btn btn-primary">Thêm tác giả</a>
            </div>
            <br>
            <div class="row">
                Kết quả tìm kiếm tác giả với từ khóa '{{ $key_author }}'
            </div>
            <br>
            @if (count($search_author) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;" class="alert alert-warning">Rất tiếc, không tìm thấy tác giả sản phẩm phù hợp với lựa chọn của bạn !!!</div>
            @else
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr style="text-align: center">
                            <th>STT</th>
                            <th>Tên tác giả sản phẩm</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($search_author as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{!! prominente($item->tg_ten, $key_author) !!}</td>
                                <td>
                                    <a href="{{ route('author.manipulate', ['id' => $item->tg_id]) }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i></a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->tg_ten }} ?')" href="{{ route('author.delete', ['id' => $item->tg_id]) }}"
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
