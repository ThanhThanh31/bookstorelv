@extends('client.store.template.master')
@section('title-page')
    Lĩnh vực
@endsection
@section('title-page-detail')
    Lĩnh vực
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{ route('store.formfie') }}" class="btn btn-success">Thêm lĩnh vực</a>
            </div>
            <br>
            @if (Session::has('prosperous'))
                <b class="text-success">{{ Session::get('prosperous') }}</b>
            @endif
            <br>
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr style="text-align: center">
                            <th>STT</th>
                            <th>Tên lĩnh vực</th>
                            <th>Tên thể loại</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($showfield as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->lv_ten }}</td>
                                <td>{{ $item->tl_ten }}</td>
                                <td>
                                    <a href="{{ route('store.edit', ['id' => $item->lv_id]) }}"
                                        class="btn btn-warning">Chỉnh sửa</a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->lv_ten }} ?')" href="{{ route('store.destroy', ['id' => $item->lv_id]) }}"
                                        class="btn btn-danger">Xóa
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
