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
            <div class="row">
                <a href="{{ route('publisher.create') }}" class="btn btn-primary">Thêm nhà xuất bản</a>
            </div>
            <br>
            @if (session()->has('publisher'))
                <i>
                    <div style="font-size: 15px; color: #155724; background-color: #d4edda;" class="alert alert-success">
                        {{ session()->get('publisher') }}
                    </div>
                </i>
            @endif
            @if (count($list) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;" class="alert alert-warning">Hiện tại chưa có nhà xuất bản sản phẩm nào</div>
            @else
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @if ($list->currentPage() != 1)
                    <li class="page-item">
                        <a class="page-link" href="{!! str_replace('/?', '?', $list->url($list->currentPage() - 1)) !!}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    @endif
                    @for ($i = 1; $i <= $list->lastPage(); $i = $i + 1)
                    <li class="page-item {!! $list->currentPage() == $i ? 'active' : ' ' !!}">
                        <a class="page-link" href="{!! str_replace('/?', '?', $list->url($i)) !!}">{!! $i !!}</a>
                    </li>
                    @endfor
                    @if ($list->currentPage() != $list->lastPage())
                    <li class="page-item">
                        <a class="page-link" href="{!! str_replace('/?', '?', $list->url($list->currentPage() + 1)) !!}" aria-label="Next">
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
                            <th>Tên nhà xuất bản</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($list as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->nxb_ten }}</td>
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
