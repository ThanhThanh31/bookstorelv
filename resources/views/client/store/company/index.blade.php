@extends('client.store.template.master')
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
                <a href="{{ route('issuer.namlist') }}" class="btn btn-success">Thêm công ty phát hành</a>
            </div>
            <br>
            @if (Session::has('issuer'))
                <b class="text-success">{{ Session::get('issuer') }}</b>
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
                        @foreach ($ds as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->cty_ten }}</td>
                                <td>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->cty_ten }} ?')" href="{{ route('issuer.berlin', ['idissuer' => $item->cty_id, 'iddepartment' => $item->ch_id]) }}"
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
