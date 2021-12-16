@extends('admin.template.master')
@section('title-page')
    Danh sách báo cáo sản phẩm
@endsection
@section('title-page-detail')
    Báo Cáo Vi Phạm - Sản Phẩm
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <br>
            @if (session()->has('overt'))
                <i>
                    <div style="font-size: 15px; color: #155724; background-color: #d4edda;" class="alert alert-success">
                        {{ session()->get('overt') }}
                    </div>
                </i>
            @endif
            @if (count($report) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;" class="alert alert-warning">Hiện không có sản phẩm nào bị ẩn do báo cáo vi phạm</div>
            @else
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @if ($report->currentPage() != 1)
                    <li class="page-item">
                        <a class="page-link" href="{!! str_replace('/?', '?', $report->url($report->currentPage() - 1)) !!}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    @endif
                    @for ($i = 1; $i <= $report->lastPage(); $i = $i + 1)
                    <li class="page-item {!! $report->currentPage() == $i ? 'active' : ' ' !!}">
                        <a class="page-link" href="{!! str_replace('/?', '?', $report->url($i)) !!}">{!! $i !!}</a>
                    </li>
                    @endfor
                    @if ($report->currentPage() != $report->lastPage())
                    <li class="page-item">
                        <a class="page-link" href="{!! str_replace('/?', '?', $report->url($report->currentPage() + 1)) !!}" aria-label="Next">
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
                            <th>Tình trạng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($report as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->sp_ten }}</td>
                                <td>
                                    <img src="{{ asset($item->sp_hinhanh) }}" alt="" style="height: 100px;  width: 70px">
                                </td>
                                <td>
                                    @if ($item->sp_tinhtrang == 2)
                                        <a onclick="return confirm('Bạn có chắc là muốn mở khóa sản phẩm {{ $item->sp_ten }} ?')" href="{{ route('product.overt', ['id' => $item->sp_id]) }}">
                                            <button class="btn btn-warning">Hiển thị sản phẩm</button>
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('product.detail', ['id' => $item->sp_id]) }}" class="btn btn-success">
                                        Xem chi tiết báo cáo</i></a>
                                    <a href="{{ route('product.details', ['id' => $item->sp_id]) }}" class="btn btn-primary">
                                        Xem chi tiết sản phẩm</i></a>
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
