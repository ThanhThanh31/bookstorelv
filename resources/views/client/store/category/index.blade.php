@extends('client.store.template.master')
@section('title-page')
    Thể loại
@endsection
@section('title-page-detail')
    Thể loại
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <a href="{{route('store.show')}}" class="btn btn-primary">Thêm thể loại
            </a>
        </div>
        <br>
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr style="text-align: center">
                        <th>STT</th>
                        <th>Tên thể loại sản phẩm</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt =1; ?>
                    @foreach ($listt as $item)
                        <tr style="text-align: center">
                            <td>{{ $stt ++ }}</td>
                            <td>{{ $item->tl_ten }}</td>
                            <td>
                                <a href="{{ route('store.dele', ['idCat'=> $item->tl_id, 'idstore'=> $item->ch_id]) }}"
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
