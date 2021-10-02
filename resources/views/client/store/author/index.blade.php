@extends('client.store.template.master')
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
                <a href="{{ route('writer.roster') }}" class="btn btn-success">Thêm tác giả
                </a>
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
                            <th>Tên tác giả</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($author as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->tg_ten }}</td>
                                <td>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->tg_ten }} ?')" href="{{ route('writer.confounded', ['idwriter' => $item->tg_id, 'idmall' => $item->ch_id]) }}"
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
