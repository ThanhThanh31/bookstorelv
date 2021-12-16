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
            <?php
            function prominente($str, $key_company){
                return str_replace($key_company, "<span style='color: red;'>$key_company</span>", $str);
            }
            ?>
            <!-- SEARCH FORM -->
            <div class="row">
                <form action="{{ route('admin.seek_company') }}" method="GET" class="form-inline" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group col-lg-12 col-sm-12" style="min-width: 150%; padding-left: 470px">
                        <input id="key_company" name="key_company" class="form-control" type="search" placeholder="Nhập vào tên công ty phát hành cần tìm kiếm..." aria-label="Search">
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
                <a href="{{ route('company.create') }}" class="btn btn-primary">Thêm công ty phát hành</a>
            </div>
            <br>
            <div class="row">
                Kết quả tìm kiếm công ty phát hành với từ khóa '{{ $key_company }}'
            </div>
            <br>
            @if (count($search_company) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;" class="alert alert-warning">Rất tiếc, không tìm thấy tên công ty phát hành phù hợp với lựa chọn của bạn !!!</div>
            @else
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr style="text-align: center">
                            <th>STT</th>
                            <th>Tên công ty phát hành</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($search_company as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{!! prominente($item->cty_ten, $key_company) !!}</td>
                                <td>
                                    <a href="{{ route('company.command', ['id' => $item->cty_id]) }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i></a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->cty_ten }} ?')" href="{{ route('company.remove', ['id' => $item->cty_id]) }}"
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
