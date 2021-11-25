@extends('admin.template.master')
@section('title-page')
    Danh sách bài viết bị ẩn
@endsection
@section('title-page-detail')
    Báo Cáo Vi Phạm - Bài Viết
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <br>
            @if (session()->has('pendent'))
                <i>
                    <div style="font-size: 15px; color: #155724; background-color: #d4edda;" class="alert alert-success">
                        {{ session()->get('pendent') }}
                    </div>
                </i>
            @endif
            @if (count($reports) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;" class="alert alert-warning">Hiện không có bài viết nào bị ẩn do báo xấu</div>
            @else
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @if ($reports->currentPage() != 1)
                    <li class="page-item">
                        <a class="page-link" href="{!! str_replace('/?', '?', $reports->url($reports->currentPage() - 1)) !!}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    @endif
                    @for ($i = 1; $i <= $reports->lastPage(); $i = $i + 1)
                    <li class="page-item {!! $reports->currentPage() == $i ? 'active' : ' ' !!}">
                        <a class="page-link" href="{!! str_replace('/?', '?', $reports->url($i)) !!}">{!! $i !!}</a>
                    </li>
                    @endfor
                    @if ($reports->currentPage() != $reports->lastPage())
                    <li class="page-item">
                        <a class="page-link" href="{!! str_replace('/?', '?', $reports->url($reports->currentPage() + 1)) !!}" aria-label="Next">
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
                            <th>Tên bài viết</th>
                            <th>Tình trạng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($reports as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->bv_tieude }}</td>
                                <td>
                                    @if ($item->bv_tinhtrang == 2)
                                        <a onclick="return confirm('Bạn có chắc là muốn mở khóa bài viết {{ $item->bv_tieude }} ?')" href="{{ route('post.pendent', ['id' => $item->bv_id]) }}">
                                            <button class="btn btn-warning">Hiển thị bài viết</button>
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('post.highlight', ['id' => $item->bv_id]) }}" class="btn btn-success">
                                        Xem chi tiết báo cáo</i></a>
                                    <a href="{{ route('post.professed', ['id' => $item->bv_id]) }}" class="btn btn-primary">
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
