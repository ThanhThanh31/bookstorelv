@extends('admin.template.master')
@section('title-page')
    Loại bìa sản phẩm
@endsection
@section('title-page-detail')
    Loại bìa sản phẩm
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{ route('cover.create') }}" class="btn btn-primary">Thêm loại bìa</a>
            </div>
            <br>
            @if (Session::has('fish'))
                <b class="text-success">{{ Session::get('fish') }}</b>
            @endif
            <br>
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr style="text-align: center">
                            <th>STT</th>
                            <th>Loại bìa sản phẩm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($type as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->lb_ten }}</td>
                                <td>
                                    <a href="{{ route('cover.edit', ['id' => $item->lb_id]) }}" class="btn btn-warning">Chỉnh
                                        sửa</a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->lb_ten }} ?')" href="{{ route('cover.destroy', ['id' => $item->lb_id]) }}"
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
