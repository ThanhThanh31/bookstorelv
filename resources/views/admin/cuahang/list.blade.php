@extends('admin.template.master')
@section('title-page')
    Cửa hàng
@endsection
@section('title-page-detail')
    Cửa hàng
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr style="text-align: center">
                            <th>STT</th>
                            <th>Tên cửa hàng</th>
                            <th>Địa chỉ</th>
                            <th>Tên chủ cửa hàng</th>
                            <th>Tên quản trị</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($listStore as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->ch_tencuahang }}</td>
                                <td>{{ $item->ch_diachi }}</td>
                                <td>{{ $item->username }}</td>

                                @foreach ($quantri as $it)
                                    <td>{{ $it->username }}</td>
                                @endforeach

                                <td>
                                    @if ($item->ch_trangthai == 0)
                                        <a href="{{ route('admin.duyet', ['id' => $item->ch_id]) }}">
                                            <button class="btn btn-info">Chờ duyệt cửa hàng</button>
                                        </a>
                                    @elseif ($item->ch_trangthai == 2)
                                            <button type="button" class="btn btn-danger" disabled>Đang khóa tài khoản</button>
                                        <a href="{{ route('admin.mo', ['id' => $item->ch_id]) }}">
                                            <button class="btn btn-warning">Mở khóa tài khoản</button>
                                        </a>
                                    @else
                                        <button type="button" class="btn btn-success" disabled>Đang hoạt động</button>
                                        <a href="{{ route('admin.khoa', ['id' => $item->ch_id]) }}">
                                            <button class="btn btn-danger">Khóa tài khoản</button>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
