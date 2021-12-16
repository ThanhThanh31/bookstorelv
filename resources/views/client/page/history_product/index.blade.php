@extends('client.page.template.master')
@section('title-page')
Lịch sử báo cáo sản phẩm
@endsection
@section('title-page-detail')
Lịch sử báo cáo sản phẩm
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            @if (count($pro_history) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;" class="alert alert-warning">Hiện tại không có lịch sử báo xấu bài viết nào</div>
            @else
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @if ($pro_history->currentPage() != 1)
                    <li class="page-item">
                        <a class="page-link" href="{!! str_replace('/?', '?', $pro_history->url($pro_history->currentPage() - 1)) !!}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    @endif
                    @for ($i = 1; $i <= $pro_history->lastPage(); $i = $i + 1)
                    <li class="page-item {!! $pro_history->currentPage() == $i ? 'active' : ' ' !!}">
                        <a class="page-link" href="{!! str_replace('/?', '?', $pro_history->url($i)) !!}">{!! $i !!}</a>
                    </li>
                    @endfor
                    @if ($pro_history->currentPage() != $pro_history->lastPage())
                    <li class="page-item">
                        <a class="page-link" href="{!! str_replace('/?', '?', $pro_history->url($pro_history->currentPage() + 1)) !!}" aria-label="Next">
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
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Nội dung báo cáo</th>
                            <th>Thời gian báo cáo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($pro_history as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->sp_ten }}</td>
                                <td>
                                    <img src="{{ asset($item->sp_hinhanh) }}" alt="" style="height: 100px;  width: 70px">
                                </td>
                                <td>{{ $item->bp_noidung }}</td>
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
