@extends('admin.template.master')
@section('title-page')
    Tác giả
@endsection
@section('title-page-detail')
    Tác giả
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{ route('author.create') }}" class="btn btn-primary">Thêm tác giả</a>
            </div>
            <br>
            @if (session()->has('author'))
                <i>
                    <div style="font-size: 15px; color: #155724; background-color: #d4edda;" class="alert alert-success">
                        {{ session()->get('author') }}
                    </div>
                </i>
            @endif
            @if (count($author) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;" class="alert alert-warning">Hiện tại chưa có tác giả sản phẩm nào</div>
            @else
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @if ($author->currentPage() != 1)
                    <li class="page-item">
                        <a class="page-link" href="{!! str_replace('/?', '?', $author->url($author->currentPage() - 1)) !!}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    @endif
                    @for ($i = 1; $i <= $author->lastPage(); $i = $i + 1)
                    <li class="page-item {!! $author->currentPage() == $i ? 'active' : ' ' !!}">
                        <a class="page-link" href="{!! str_replace('/?', '?', $author->url($i)) !!}">{!! $i !!}</a>
                    </li>
                    @endfor
                    @if ($author->currentPage() != $author->lastPage())
                    <li class="page-item">
                        <a class="page-link" href="{!! str_replace('/?', '?', $author->url($author->currentPage() + 1)) !!}" aria-label="Next">
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
                            <th>Tên tác giả sản phẩm</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($author as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->tg_ten }}</td>
                                <td>
                                    <a href="{{ route('author.manipulate', ['id' => $item->tg_id]) }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i></a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->tg_ten }} ?')" href="{{ route('author.delete', ['id' => $item->tg_id]) }}"
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
