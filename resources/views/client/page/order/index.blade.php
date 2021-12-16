@extends('client.page.template.master')
@section('title-page')
Danh sách đơn hàng
@endsection
@section('title-page-detail')
Danh sách đơn hàng
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            @if (session()->has('order'))
                <i>
                    <div style="font-size: 15px; color: #155724; background-color: #d4edda;" class="alert alert-success">
                        {{ session()->get('order') }}
                    </div>
                </i>
            @endif
            <br>
            @if (count($show) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;" class="alert alert-warning">Hiện tại không có đơn hàng nào</div>
            @else
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr style="text-align: center">
                            <th>STT</th>
                            <th>Tổng tiền</th>
                            <th>Tên khách hàng</th>
                            <th>Trạng thái đơn hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($show as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->dh_tongtien }} VNĐ</td>
                                <td>{{ $item->username }}</td>
                                <td>
                                    @if ($item->tt_id == 1)
                                            <button class="btn btn-warning">Đang chờ xử lý</button>
                                    @elseif ($item->tt_id == 2)
                                            <button class="btn btn-info">Đã xử lý, đang giao hàng</button>
                                    @elseif ($item->tt_id == 3)
                                        <button class="btn btn-success">Đã nhận hàng</button>
                                    @else
                                        <button href="" class="btn btn-danger">Đơn hàng đã hủy</button>
                                    @endif
                                    <a href="{{ route('order.detail_order', ['id' => $item->dh_id]) }}" class="btn btn-primary">
                                        Xem chi tiết</i></a>
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
