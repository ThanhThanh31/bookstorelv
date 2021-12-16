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
            @if (session()->has('as'))
                <i>
                    <div style="font-size: 15px; color: #155724; background-color: #d4edda;" class="alert alert-success">
                        {{ session()->get('as') }}
                    </div>
                </i>
            @endif
            @if (count($show) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;" class="alert alert-warning">Hiện tại chưa có lĩnh vực sản phẩm nào</div>
            @else
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @if ($show->currentPage() != 1)
                    <li class="page-item">
                        <a class="page-link" href="{!! str_replace('/?', '?', $show->url($show->currentPage() - 1)) !!}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    @endif
                    @for ($i = 1; $i <= $show->lastPage(); $i = $i + 1)
                    <li class="page-item {!! $show->currentPage() == $i ? 'active' : ' ' !!}">
                        <a class="page-link" href="{!! str_replace('/?', '?', $show->url($i)) !!}">{!! $i !!}</a>
                    </li>
                    @endfor
                    @if ($show->currentPage() != $show->lastPage())
                    <li class="page-item">
                        <a class="page-link" href="{!! str_replace('/?', '?', $show->url($show->currentPage() + 1)) !!}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </nav>
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
                        @foreach ($show as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->tl_ten }}</td>
                                <td>{{ $item->lv_ten }}</td>
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
