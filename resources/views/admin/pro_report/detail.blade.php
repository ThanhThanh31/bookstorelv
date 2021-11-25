@extends('admin.template.master')
@section('title-page')
    Chi tiết báo cáo vi phạm
@endsection
@section('title-page-detail')
    Báo Cáo Vi Phạm - Sản Phẩm
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr style="text-align: center">
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Tên người báo cáo</th>
                            <th>Nội dung báo cáo</th>
                            <th>Thời gian báo cáo</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($li as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->sp_ten }}</td>
                                <td>
                                    <img src="{{ asset($item->sp_hinhanh) }}" alt="" style="height: 100px;  width: 70px">
                                </td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->bp_noidung }}</td>
                                <td>{{ $item->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
