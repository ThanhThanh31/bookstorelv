@extends('admin.template.master')
@section('title-page')
    Nhà xuất bản
@endsection
@section('title-page-detail')
   Nhà xuất bản
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{ route('publisher.create') }}" class="btn btn-primary">Thêm nhà xuất bản</a>
            </div>
            <br>
            @if (Session::has('publisher'))
                <b class="text-success">{{ Session::get('publisher') }}</b>
            @endif
            <br>
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr style="text-align: center">
                            <th>STT</th>
                            <th>Tên nhà xuất bản</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($list as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->nxb_ten }}</td>
                                <td>
                                    <a href="{{ route('publisher.modified', ['id' => $item->nxb_id]) }}" class="btn btn-warning">Chỉnh
                                        sửa</a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->nxb_ten }} ?')" href="{{ route('publisher.eradicate', ['id' => $item->nxb_id]) }}"
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
