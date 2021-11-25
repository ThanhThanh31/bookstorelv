@extends('admin.template.master')
@section('title-page')
    Sản phẩm
@endsection
@section('title-page-detail')
    Sản phẩm
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            @if (count($align) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;" class="alert alert-warning">Hiện tại chưa có sản phẩm nào được đăng bán</div>
            @else
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @if ($align->currentPage() != 1)
                        <li class="page-item">
                            <a class="page-link" href="{!! str_replace('/?', '?', $align->url($align->currentPage() - 1)) !!}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                    @endif
                    @for ($i = 1; $i <= $align->lastPage(); $i = $i + 1)
                        <li class="page-item {!! $align->currentPage() == $i ? 'active' : ' ' !!}">
                            <a class="page-link" href="{!! str_replace('/?', '?', $align->url($i)) !!}">{!! $i !!}</a>
                        </li>
                    @endfor
                    @if ($align->currentPage() != $align->lastPage())
                        <li class="page-item">
                            <a class="page-link" href="{!! str_replace('/?', '?', $align->url($align->currentPage() + 1)) !!}" aria-label="Next">
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
                            <th>Thể loại</th>
                            <th>Lĩnh vực</th>
                            <th>Tên người dùng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($align as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->sp_ten }}</td>
                                <td>
                                    <img src="{{ asset($item->sp_hinhanh) }}" alt="" style="height: 100px;  width: 70px">
                                </td>
                                <td>{{ $item->tl_ten }}</td>
                                <td>{{ $item->lv_ten }}</td>
                                <td>{{ $item->username }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </section>
@endsection
