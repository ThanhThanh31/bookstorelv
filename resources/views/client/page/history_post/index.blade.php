@extends('client.page.template.master')
@section('title-page')
Lịch sử báo cáo bài viết
@endsection
@section('title-page-detail')
Lịch sử báo cáo bài viết
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            @if (count($history) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;" class="alert alert-warning">Hiện tại không có lịch sử báo xấu bài viết nào</div>
            @else
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @if ($history->currentPage() != 1)
                    <li class="page-item">
                        <a class="page-link" href="{!! str_replace('/?', '?', $history->url($history->currentPage() - 1)) !!}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    @endif
                    @for ($i = 1; $i <= $history->lastPage(); $i = $i + 1)
                    <li class="page-item {!! $history->currentPage() == $i ? 'active' : ' ' !!}">
                        <a class="page-link" href="{!! str_replace('/?', '?', $history->url($i)) !!}">{!! $i !!}</a>
                    </li>
                    @endfor
                    @if ($history->currentPage() != $history->lastPage())
                    <li class="page-item">
                        <a class="page-link" href="{!! str_replace('/?', '?', $history->url($history->currentPage() + 1)) !!}" aria-label="Next">
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
                            <th>Nội dung báo cáo</th>
                            <th>Thời gian báo cáo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($history as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->bv_tieude }}</td>
                                <td>
                                    <img src="{{ asset($item->bv_hinhanh) }}" alt="" style="height: 70px;  width: 100px">
                                </td>
                                <td>{{ $item->bb_noidung }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->toDateString() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </section>
@endsection
