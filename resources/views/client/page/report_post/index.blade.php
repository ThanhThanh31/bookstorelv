@extends('client.page.template.master')
@section('title-page')
    Danh sách bài viết bị báo cáo
@endsection
@section('title-page-detail')
    Bài viết bị báo cáo
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            @if (count($buckle) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;" class="alert alert-warning">Hiện không có bài viết nào bị ẩn do báo xấu</div>
            @else
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @if ($buckle->currentPage() != 1)
                    <li class="page-item">
                        <a class="page-link" href="{!! str_replace('/?', '?', $buckle->url($buckle->currentPage() - 1)) !!}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    @endif
                    @for ($i = 1; $i <= $buckle->lastPage(); $i = $i + 1)
                    <li class="page-item {!! $buckle->currentPage() == $i ? 'active' : ' ' !!}">
                        <a class="page-link" href="{!! str_replace('/?', '?', $buckle->url($i)) !!}">{!! $i !!}</a>
                    </li>
                    @endfor
                    @if ($buckle->currentPage() != $buckle->lastPage())
                    <li class="page-item">
                        <a class="page-link" href="{!! str_replace('/?', '?', $buckle->url($buckle->currentPage() + 1)) !!}" aria-label="Next">
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
                            <th>Hình ảnh</th>
                            <th>Tình trạng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($buckle as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->bv_tieude }}</td>
                                <td>
                                    <img src="{{ asset($item->bv_hinhanh) }}" alt="" style="height: 60px;  width: 90px">
                                </td>
                                <td>
                                    @if ($item->bv_tinhtrang == 2)
                                        <button type="button" class="btn btn-warning" disabled>Bài viết đang tạm khóa</button>
                                    @endif
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
