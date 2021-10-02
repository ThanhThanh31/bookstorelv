@extends('client.store.template.master')
@section('title-page')
    Sản phẩm
@endsection
@section('title-page-detail')
    Sản phẩm
@endsection
@section('content')
    <section class="content"> 
        <div class="container-fluid">
            <div class="row">
                <a href="{{ route('pro.addForm') }}" class="btn btn-success">Thêm sản phẩm</a>
            </div>
            <br>
            @if (Session::has('make'))
                <b class="text-success">{{ Session::get('make') }}</b>
            @endif
            <br>
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr style="text-align: center">
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Thể loại</th>
                            <th>Lĩnh vực</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($show as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->sp_ten }}</td>
                                <th>
                                    <img src="{{ asset($item->sp_hinhanh) }}" alt="" height="100px" width="70px">
                                </th>
                                <td>{{ $item->tl_ten }}</td>
                                <td>{{ $item->lv_ten }}</td>
                                <td>
                                    <a href="{{ route('pro.revised', ['id' => $item->sp_id]) }}"
                                        class="btn btn-warning">Chỉnh sửa</a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->sp_ten }} ?')"
                                        href="{{ route('pro.delete', ['id' => $item->sp_id]) }}"
                                        class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
