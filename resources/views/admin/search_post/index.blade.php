@extends('admin.template.master')
@section('title-page')
    Bài viết
@endsection
@section('title-page-detail')
    Bài viết
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <?php
            function prominente($str, $key_post){
                return str_replace($key_post, "<span style='color: red;'>$key_post</span>", $str);
            }
            ?>
            <!-- SEARCH FORM -->
            <div class="row">
                <form action="{{ route('admin.seek_post') }}" method="GET" class="form-inline" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group col-lg-12 col-sm-12" style="min-width: 150%; padding-left: 470px">
                        <input id="key_post" name="key_post" class="form-control" type="search" placeholder="Nhập vào tên bài viết cần tìm kiếm..." aria-label="Search">
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
                <a href="{{ route('admin.embattle') }}" type="button" class="btn btn-secondary">Trở về</a>&emsp;
                <a href="{{ route('statistical.index') }}" class="btn btn-primary">Xem thống kê bài viết</a>
            </div>
            <br>
            <div class="row">
                Kết quả tìm kiếm bài viết với từ khóa '{{ $key_post }}'
            </div>
            <br>
            @if (count($search_post) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;" class="alert alert-warning">Rất tiếc, không tìm thấy tên bài viết phù hợp với lựa chọn của bạn !!!</div>
            @else
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr style="text-align: center">
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Hình ảnh</th>
                            <th>Tên người dùng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($search_post as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{!! prominente($item->bv_tieude, $key_post) !!}</td>
                                <td>
                                    <img src="{{ asset($item->bv_hinhanh) }}" alt="" style="height: 50px;  width: 70px">
                                </td>
                                <td>{!! prominente($item->username, $key_post) !!}</td>
                                <td>
                                    <a href="{{ route('admin.detail_post', ['id' => $item->bv_id]) }}" class="btn btn-success">
                                        Xem chi tiết bài viết</i></a>
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
