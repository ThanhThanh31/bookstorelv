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
                <a href="{{ route('admin.index') }}" type="button" class="btn btn-secondary">Trở về</a>&emsp;
                <a href="{{ route('statistical.index') }}" class="btn btn-primary">Xem thống kê bài viết</a>
            </div>
            <br>
            @if (count($embattle) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;" class="alert alert-warning">Hiện tại chưa có bài viết nào đăng trên diễn đàn</div>
            @else
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @if ($embattle->currentPage() != 1)
                        <li class="page-item">
                            <a class="page-link" href="{!! str_replace('/?', '?', $embattle->url($embattle->currentPage() - 1)) !!}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                    @endif
                    @for ($i = 1; $i <= $embattle->lastPage(); $i = $i + 1)
                        <li class="page-item {!! $embattle->currentPage() == $i ? 'active' : ' ' !!}">
                            <a class="page-link" href="{!! str_replace('/?', '?', $embattle->url($i)) !!}">{!! $i !!}</a>
                        </li>
                    @endfor
                    @if ($embattle->currentPage() != $embattle->lastPage())
                        <li class="page-item">
                            <a class="page-link" href="{!! str_replace('/?', '?', $embattle->url($embattle->currentPage() + 1)) !!}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
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
                        @foreach ($embattle as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->bv_tieude }}</td>
                                <td>
                                    <img src="{{ asset($item->bv_hinhanh) }}" alt="" style="height: 50px;  width: 70px">
                                </td>
                                <td>{{ $item->username }}</td>
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
