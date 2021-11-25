@extends('admin.template.master')
@section('title-page')
    Loại bìa sản phẩm
@endsection
@section('title-page-detail')
    Loại bìa sản phẩm
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{ route('cover.create') }}" class="btn btn-primary">Thêm loại bìa</a>
            </div>
            <br>
            @if (session()->has('fish'))
                <i>
                    <div style="font-size: 15px; color: #155724; background-color: #d4edda;" class="alert alert-success">
                        {{ session()->get('fish') }}
                    </div>
                </i>
            @endif
            @if (count($type) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;" class="alert alert-warning">Hiện tại chưa có loại bìa sản phẩm nào</div>
            @else
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @if ($type->currentPage() != 1)
                    <li class="page-item">
                        <a class="page-link" href="{!! str_replace('/?', '?', $type->url($type->currentPage() - 1)) !!}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    @endif
                    @for ($i = 1; $i <= $type->lastPage(); $i = $i + 1)
                    <li class="page-item {!! $type->currentPage() == $i ? 'active' : ' ' !!}">
                        <a class="page-link" href="{!! str_replace('/?', '?', $type->url($i)) !!}">{!! $i !!}</a>
                    </li>
                    @endfor
                    @if ($type->currentPage() != $type->lastPage())
                    <li class="page-item">
                        <a class="page-link" href="{!! str_replace('/?', '?', $type->url($type->currentPage() + 1)) !!}" aria-label="Next">
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
                            <th>Loại bìa sản phẩm</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($type as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->lb_ten }}</td>
                                <td>
                                    <a href="{{ route('cover.edit', ['id' => $item->lb_id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->lb_ten }} ?')" href="{{ route('cover.destroy', ['id' => $item->lb_id]) }}"
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
