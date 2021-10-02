@extends('admin.template.master')
@section('title-page')
    Thể loại sản phẩm
@endsection
@section('title-page-detail')
    Thể loại sản phẩm
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{ route('cate.addform') }}" class="btn btn-primary">Thêm thể loại</a>
            </div>
            <br>
            @if (Session::has('get'))
                <b class="text-success">{{ Session::get('get') }}</b>
            @endif
            <br>
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr style="text-align: center">
                            <th>STT</th>
                            <th>Tên thể loại sản phẩm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($listCate as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->tl_ten }}</td>
                                <td>
                                    <a href="{{ route('cate.edit', ['id' => $item->tl_id]) }}" class="btn btn-warning">Chỉnh
                                        sửa</a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->tl_ten }} ?')" href="{{ route('cate.delete', ['id' => $item->tl_id]) }}" 
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
