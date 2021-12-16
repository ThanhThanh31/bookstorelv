@extends('client.page.template.master')
@section('title-page')
    Chi tiết đơn hàng
@endsection
@section('title-page-detail')
    Chi tiết đơn hàng
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                @if (count($shows) == 0)
                    <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;"
                        class="alert alert-warning">Hiện tại không có lịch sử báo xấu bài viết nào</div>
                @else
                <div class="row" style="padding-bottom: 5px">
                    <a href="{{ route('order.index') }}" type="button" class="btn btn-secondary">Trở về</a>
                </div>
                <br>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($a as $item)
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="">Tên khách hàng</label>
                                                    <input value="{{ $item->username }}" name="ten"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="">Email</label>
                                                    <input value="{{ $item->email }}" name="ten" class="form-control">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="">Số điện thoại</label>
                                                    <input value="{{ $item->nd_sdt }}" name="ten" class="form-control">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="">Tổng tiền (VNĐ)</label>
                                                    <input value="{{ $item->dh_tongtien }}" name="ten"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="">Ghi chú đơn hàng</label>
                                                    <input value="{{ $item->dh_ghichu }}" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Hình thức giao hàng</label>
                                                    @if ($item->dh_phuongthuc == 1)
                                                        <input value="Thanh toán trực tiếp" class="form-control">
                                                    @else
                                                        <input value="Chuyển khoản" class="form-control">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Địa chỉ giao hàng</label>
                                            <input
                                                value="{{ $item->dh_diachi }},&nbsp;{{ $item->ttp_ten }},&nbsp;{{ $item->qh_ten }},&nbsp;{{ $item->xp_ten }}"
                                                class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <form method="GET" action="{{ route('order.delivery', ['id' => $item->dh_id]) }}">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="form-group col-md-8" style="padding-top: 20px;">
                                                        <label for="">Trạng thái đơn hàng</label>
                                                        <select name="trangthai" class="form-control">
                                                            <option value="1" @if ($item->tt_id == 1) selected @endif>Đang chờ xử lý
                                                            </option>
                                                            <option value="2" @if ($item->tt_id == 2) selected @endif>Đã xử lý, đang giao
                                                                hàng</option>
                                                            <option value="3" @if ($item->tt_id == 3) selected @endif>Đã nhận hàng</option>
                                                            <option value="4" @if ($item->tt_id == 4) selected @endif>Đơn hàng đã hủy
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4" style="padding-top: 51px;">
                                                        <button type="submit" class="btn btn-success">
                                                            Cập nhật trạng thái đơn hàng
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
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
                                                        <img src="{{ asset($item->sp_hinhanh) }}" alt=""
                                                            style="height: 100px;  width: 70px">
                                                    </td>
                                                    <td>{{ $item->sp_gia }} VNĐ</td>
                                                    <td>{{ $item->so_luong }}</td>
                                                    <td>{{ $item->don_gia }} VNĐ</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->dh_ngaylap)->toDateString() }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
