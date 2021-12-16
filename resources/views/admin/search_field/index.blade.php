@extends('admin.template.master')
@section('title-page')
    Lĩnh vực
@endsection
@section('title-page-detail')
    Lĩnh vực
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <?php
            function prominente($str, $key_field){
                return str_replace($key_field, "<span style='color: red;'>$key_field</span>", $str);
            }
            ?>
            <!-- SEARCH FORM -->
            <div class="row">
                <form action="{{ route('admin.seek_field') }}" method="GET" class="form-inline" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group col-lg-12 col-sm-12" style="min-width: 150%; padding-left: 470px">
                        <input id="key_field" name="key_field" class="form-control" type="search" placeholder="Nhập vào tên lĩnh vực cần tìm kiếm..." aria-label="Search">
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
                <a href="{{ route('field.create') }}" class="btn btn-primary">Thêm lĩnh vực</a>
            </div>
            <br>
            <div class="row">
                Kết quả tìm kiếm lĩnh vực với từ khóa '{{ $key_field }}'
            </div>
            <br>
            @if (count($search_field) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;" class="alert alert-warning">Rất tiếc, không tìm thấy lĩnh vực sản phẩm phù hợp với lựa chọn của bạn !!!</div>
            @else
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr style="text-align: center">
                            <th>STT</th>
                            <th>Tên thể loại</th>
                            <th>Tên lĩnh vực</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($search_field as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{!! prominente($item->tl_ten, $key_field) !!}</td>
                                <td>{!! prominente($item->lv_ten, $key_field) !!}</td>
                                <td>
                                    <a href="{{ route('field.wipe', ['id' => $item->lv_id]) }}"
                                        class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->lv_ten }} ?')" href="{{ route('field.efface', ['id' => $item->lv_id]) }}"
                                        class="btn btn-danger"><i class="fas fa-trash-alt"></i>
                                    </a>
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
