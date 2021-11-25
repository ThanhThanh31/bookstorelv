@extends('admin.template.master')
@section('title-page')
    Người dùng
@endsection
@section('title-page-detail')
    Người dùng
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <br>
            @if (session()->has('acc'))
                <i>
                    <div style="font-size: 15px; color: #155724; background-color: #d4edda;" class="alert alert-success">
                        {{ session()->get('acc') }}
                    </div>
                </i>
            @endif
            @if (count($roll) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;" class="alert alert-warning">Hiện tại chưa có người dùng nào tham gia hệ thống</div>
            @else
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @if ($roll->currentPage() != 1)
                    <li class="page-item">
                        <a class="page-link" href="{!! str_replace('/?', '?', $roll->url($roll->currentPage() - 1)) !!}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    @endif
                    @for ($i = 1; $i <= $roll->lastPage(); $i = $i + 1)
                    <li class="page-item {!! $roll->currentPage() == $i ? 'active' : ' ' !!}">
                        <a class="page-link" href="{!! str_replace('/?', '?', $roll->url($i)) !!}">{!! $i !!}</a>
                    </li>
                    @endfor
                    @if ($roll->currentPage() != $roll->lastPage())
                    <li class="page-item">
                        <a class="page-link" href="{!! str_replace('/?', '?', $roll->url($roll->currentPage() + 1)) !!}" aria-label="Next">
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
                            <th>Tên người dùng</th>
                            <th>Email</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($roll as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    @if ($item->nd_trangthai == 1)
                                        <button type="button" class="btn btn-success" disabled>Đang hoạt động</button>
                                        <a onclick="return confirm('Bạn có chắc là muốn khóa tài khoản người dùng {{ $item->username }} ?')" href="{{ route('admin.lock', ['id' => $item->nd_id]) }}">
                                            <button class="btn btn-danger">Khóa tài khoản</button>
                                        </a>
                                    @else
                                        <button type="button" class="btn btn-danger" disabled>Đang khóa tài khoản</button>
                                        <a onclick="return confirm('Bạn có chắc là muốn mở khóa tài khoản người dùng {{ $item->username }} ?')" href="{{ route('admin.open', ['id' => $item->nd_id]) }}">
                                            <button class="btn btn-warning">Mở khóa tài khoản</button>
                                        </a>
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
