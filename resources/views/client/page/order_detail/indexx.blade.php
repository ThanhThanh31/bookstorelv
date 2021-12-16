@extends('client.page.template.master')
@section('title-page')
Chi tiết đơn hàng
@endsection
@section('title-page-detail')
Chi tiết đơn hàng
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            @if (count($shows) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;" class="alert alert-warning">Hiện tại không có lịch sử báo xấu bài viết nào</div>
            @else
            <div class="row">
                <a href="{{ route('order.index') }}" type="button" class="btn btn-secondary">Trở về</a>
            </div>
            <br>
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr style="text-align: center">
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Giá sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Tổng giá</th>
                            <th>Thời gian đặt hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($shows as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->sp_ten }}</td>
                                <td>
                                    <img src="{{ asset($item->sp_hinhanh) }}" alt="" style="height: 100px;  width: 70px">
                                </td>
                                <td>{{ $item->sp_gia }} VNĐ</td>
                                <td>{{ $item->so_luong }}</td>
                                <td>{{ $item->don_gia }} VNĐ</td>
                                <td>{{ \Carbon\Carbon::parse($item->dh_ngaylap)->toDateString() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </section>
@endsection
