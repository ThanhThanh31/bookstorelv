@extends('client.page.template.master')
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
                <a href="{{ route('postuser.plus') }}" class="btn btn-primary">Thêm bài viết</a>
            </div>
            <br>
            @if (session()->has('redouble'))
                <i>
                    <div style="font-size: 15px; color: #155724; background-color: #d4edda;" class="alert alert-success">
                        {{ session()->get('redouble') }}
                    </div>
                </i>
            @endif
            @if (count($posts) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;" class="alert alert-warning">Bạn chưa đăng bài viết nào</div>
            @else
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        @if ($posts->currentPage() != 1)
                            <li class="page-item">
                                <a class="page-link" href="{!! str_replace('/?', '?', $posts->url($posts->currentPage() - 1)) !!}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                        @endif
                        @for ($i = 1; $i <= $posts->lastPage(); $i = $i + 1)
                            <li class="page-item {!! $posts->currentPage() == $i ? 'active' : ' ' !!}">
                                <a class="page-link" href="{!! str_replace('/?', '?', $posts->url($i)) !!}">{!! $i !!}</a>
                            </li>
                        @endfor
                        @if ($posts->currentPage() != $posts->lastPage())
                            <li class="page-item">
                                <a class="page-link" href="{!! str_replace('/?', '?', $posts->url($posts->currentPage() + 1)) !!}" aria-label="Next">
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
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1; ?>
                            @foreach ($posts as $item)
                                <tr style="text-align: center">
                                    <td>{{ $stt++ }}</td>
                                    <td>{{ $item->bv_tieude }}</td>
                                    <td>
                                        <img src="{{ asset($item->bv_hinhanh) }}" alt="" style="height: 70px;  width: 100px">
                                    </td>
                                    <td>
                                        <a href="{{ route('postuser.remark', ['id' => $item->bv_id]) }}"
                                            class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <a onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->bv_tieude }} ?')"
                                            href="{{ route('postuser.dab', ['id' => $item->bv_id]) }}"
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
