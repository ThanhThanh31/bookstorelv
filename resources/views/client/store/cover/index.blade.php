@extends('client.store.template.master')
@section('title-page')
    Loại bìa
@endsection
@section('title-page-detail')
    Loại bìa
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{ route('book.checklist') }}" class="btn btn-success">Thêm loại bìa
                </a>
            </div>
            <br>
            @if (Session::has('cover'))
                <b class="text-success">{{ Session::get('cover') }}</b>
            @endif
            <br>
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr style="text-align: center">
                            <th>STT</th>
                            <th>Tên loại bìa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($cover as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->lb_ten }}</td>
                                <td>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->lb_ten }} ?')"
                                        href="{{ route('book.erased', ['idcover' => $item->lb_id, 'idshop' => $item->ch_id]) }}"
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
