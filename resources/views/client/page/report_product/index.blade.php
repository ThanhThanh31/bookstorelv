@extends('client.page.template.master')
@section('title-page')
    Danh sách sản phẩm bị báo cáo
@endsection
@section('title-page-detail')
    Sản phẩm bị báo cáo
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            @if (count($rope) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;" class="alert alert-warning">Hiện không có sản phẩm nào bị ẩn do báo cáo vi phạm</div>
            @else
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @if ($rope->currentPage() != 1)
                    <li class="page-item">
                        <a class="page-link" href="{!! str_replace('/?', '?', $rope->url($rope->currentPage() - 1)) !!}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    @endif
                    @for ($i = 1; $i <= $rope->lastPage(); $i = $i + 1)
                    <li class="page-item {!! $rope->currentPage() == $i ? 'active' : ' ' !!}">
                        <a class="page-link" href="{!! str_replace('/?', '?', $rope->url($i)) !!}">{!! $i !!}</a>
                    </li>
                    @endfor
                    @if ($rope->currentPage() != $rope->lastPage())
                    <li class="page-item">
                        <a class="page-link" href="{!! str_replace('/?', '?', $rope->url($rope->currentPage() + 1)) !!}" aria-label="Next">
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($rope as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->sp_ten }}</td>
                                <td>
                                    <img src="{{ asset($item->sp_hinhanh) }}" alt="" style="height: 100px;  width: 70px">
                                </td>
                                <td>
                                    @if ($item->sp_tinhtrang == 2)
                                        <button type="button" class="btn btn-warning" disabled>Sản phẩm đang tạm khóa</button>
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
