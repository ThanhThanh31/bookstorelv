@extends('admin.template.master')
@section('title-page')
    Tác giả
@endsection
@section('title-page-detail')
    Tác giả
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{ route('author.create') }}" class="btn btn-primary">Thêm tác giả</a>
            </div>
            <br>
            @if (Session::has('author'))
                <b class="text-success">{{ Session::get('author') }}</b>
            @endif
            <br>
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr style="text-align: center">
                            <th>STT</th>
                            <th>Tên tác giả sản phẩm</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($author as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->tg_ten }}</td>
                                <td>
                                    <a href="{{ route('author.manipulate', ['id' => $item->tg_id]) }}" class="btn btn-warning">Chỉnh
                                        sửa</a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->tg_ten }} ?')" href="{{ route('author.delete', ['id' => $item->tg_id]) }}"
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
