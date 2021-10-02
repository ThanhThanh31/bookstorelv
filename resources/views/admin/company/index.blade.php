@extends('admin.template.master')
@section('title-page')
    Công ty phát hành
@endsection
@section('title-page-detail')
    Công ty phát hành
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{ route('company.create') }}" class="btn btn-primary">Thêm công ty phát hành</a>
            </div>
            <br>
            @if (Session::has('company'))
                <b class="text-success">{{ Session::get('company') }}</b>
            @endif
            <br>
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr style="text-align: center">
                            <th>STT</th>
                            <th>Tên công ty phát hành</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?> 
                        @foreach ($company as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->cty_ten }}</td>
                                <td>
                                    <a href="{{ route('company.command', ['id' => $item->cty_id]) }}" class="btn btn-warning">Chỉnh
                                        sửa</a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->cty_ten }} ?')" href="{{ route('company.remove', ['id' => $item->cty_id]) }}"
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
