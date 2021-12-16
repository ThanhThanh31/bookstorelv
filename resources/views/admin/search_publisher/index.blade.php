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
            <?php
            function prominente($str, $key_publisher){
                return str_replace($key_publisher, "<span style='color: red;'>$key_publisher</span>", $str);
            }
            ?>
            <!-- SEARCH FORM -->
            <div class="row">
                <form action="{{ route('admin.seek_publisher') }}" method="GET" class="form-inline" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group col-lg-12 col-sm-12" style="min-width: 150%; padding-left: 470px">
                        <input id="key_publisher" name="key_publisher" class="form-control" type="search" placeholder="Nhập vào tên nhà xuất bản cần tìm kiếm..." aria-label="Search">
                        <div class="input-group-append" style="background-color:#007bff">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search" style="color: #fff"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <br>
            <div class="row">
                <a href="{{ route('publisher.create') }}" class="btn btn-primary">Thêm nhà xuất bản</a>
            </div>
            <br>
            <div class="row">
                Kết quả tìm kiếm nhà xuất bản với từ khóa '{{ $key_publisher }}'
            </div>
            <br>
            @if (count($search_publisher) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;" class="alert alert-warning">Rất tiếc, không tìm thấy tên nhà xuất bản phù hợp với lựa chọn của bạn !!!</div>
            @else
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr style="text-align: center">
                            <th>STT</th>
                            <th>Tên nhà xuất bản</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($search_publisher as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{!! prominente($item->nxb_ten, $key_publisher) !!}</td>
                                <td>
                                    <a href="{{ route('publisher.modified', ['id' => $item->nxb_id]) }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i></a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->nxb_ten }} ?')" href="{{ route('publisher.eradicate', ['id' => $item->nxb_id]) }}"
                                        class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </section>
@endsection
