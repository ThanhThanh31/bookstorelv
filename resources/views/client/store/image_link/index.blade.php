@extends('client.store.template.master')
@section('title-page')
    Hình ảnh
@endsection
@section('title-page-detail')
    Hình ảnh
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                {{-- <a href="{{ route('pro.addForm') }}" class="btn btn-success">Thêm sản phẩm</a> --}}
            </div>
            <br>
            @if (Session::has('pulloff'))
                <b class="text-success">{{ Session::get('pulloff') }}</b>
            @endif
            <br>
            <table class="table table-hover">
                <thead>
                    <tr style="text-align: center">
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh sản phẩm liên quan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 1; ?>
                    @foreach ($i as $item)
                        <tr style="text-align: center">
                            <td>{{ $stt++ }}</td>
                            <td>{{ $item->sp_ten }}</td>
                            <th>
                                <img src="{{ asset($item->a_duongdan) }}" alt="" height="100px" width="70px">
                            </th>
                            <td>
                                <a href="{{ route('image.erase', ['id' => $item->a_id]) }}" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </section>
@endsection
