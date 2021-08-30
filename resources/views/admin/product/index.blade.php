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
        <div class="row">
            <a href="{{ route('pro.addForm') }}" class="btn btn-primary">Thêm sản phẩm</a></div>
        <br>
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr style="text-align: center">
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Thể loại</th>
                        <th>Số lượng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt =1; ?>
                    @foreach($listPro as $item)
                        <tr style="text-align: center">
                            <td>{{ $stt ++ }}</td>
                            <td>{{ $item->sp_ten }}</td>
                            <td>{{ $item->tl_ten }}</td>
                            <td>{{ $item->sp_soluong }}</td>
                            <td>
                                <a href="{{ route('pro.edit', ['id'=> $item->sp_id]) }}"
                                    class="btn btn-warning">Chỉnh sửa</a>
                                <a href="{{ route('pro.delete', ['id'=> $item->sp_id]) }}"
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
