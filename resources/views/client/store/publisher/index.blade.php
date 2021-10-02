@extends('client.store.template.master')
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
                <a href="{{ route('editor.roll') }}" class="btn btn-success">Thêm nhà xuất bản
                </a>
            </div>
            <br>
            @if (Session::has('editor'))
                <b class="text-success">{{ Session::get('editor') }}</b>
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
                        @foreach ($editor as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->nxb_ten }}</td>
                                <td>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->nxb_ten }} ?')" href="{{ route('editor.eliminate', ['ideditor' => $item->nxb_id, 'idstorefront' => $item->ch_id]) }}"
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
