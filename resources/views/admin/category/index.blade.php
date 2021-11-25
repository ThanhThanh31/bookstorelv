@extends('admin.template.master')
@section('title-page')
    Thể loại sản phẩm
@endsection
@section('title-page-detail')
    Thể loại sản phẩm
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{ route('cate.addform') }}" class="btn btn-primary">Thêm thể loại</a>
            </div>
            <br>
            @if (session()->has('get'))
                <i>
                    <div style="font-size: 15px; color: #155724; background-color: #d4edda;" class="alert alert-success">
                        {{ session()->get('get') }}
                    </div>
                </i>
            @endif
            @if (count($listCate) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;" class="alert alert-warning">Hiện tại chưa có thể loại sản phẩm nào</div>
            @else
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @if ($listCate->currentPage() != 1)
                    <li class="page-item">
                        <a class="page-link" href="{!! str_replace('/?', '?', $listCate->url($listCate->currentPage() - 1)) !!}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    @endif
                    @for ($i = 1; $i <= $listCate->lastPage(); $i = $i + 1)
                    <li class="page-item {!! $listCate->currentPage() == $i ? 'active' : ' ' !!}">
                        <a class="page-link" href="{!! str_replace('/?', '?', $listCate->url($i)) !!}">{!! $i !!}</a>
                    </li>
                    @endfor
                    @if ($listCate->currentPage() != $listCate->lastPage())
                    <li class="page-item">
                        <a class="page-link" href="{!! str_replace('/?', '?', $listCate->url($listCate->currentPage() + 1)) !!}" aria-label="Next">
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
                            <th>Tên thể loại sản phẩm</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($listCate as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->tl_ten }}</td>
                                <td>
                                    <a href="{{ route('cate.edit', ['id' => $item->tl_id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->tl_ten }} ?')" href="{{ route('cate.delete', ['id' => $item->tl_id]) }}"
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
