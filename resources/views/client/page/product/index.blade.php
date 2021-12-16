@extends('client.page.template.master')
@section('title-page')
    Sản phẩm
@endsection
@section('title-page-detail')
    Sản phẩm
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- SEARCH FORM -->
            <div class="row">
                <form action="{{ route('pro.find_products') }}" method="POST" class="form-inline" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group col-lg-12 col-sm-12" style="min-width: 150%; padding-left: 470px">
                        <input id="key" name="key" class="form-control" type="search" placeholder="Nhập vào tên sản phẩm cần tìm kiếm..." aria-label="Search">
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
                <a href="{{ route('pro.addForm') }}" class="btn btn-primary">Thêm sản phẩm</a>
            </div>
            <br>
            @if (session()->has('make'))
                <i>
                    <div style="font-size: 15px; color: #155724; background-color: #d4edda;" class="alert alert-success">
                        {{ session()->get('make') }}
                    </div>
                </i>
            @endif
            @if (count($show) == 0)
                <div style="font-size: 15px; text-align: center; color: #856404; background-color: #fff3cd;"
                    class="alert alert-warning">Bạn chưa có sản phẩm nào đăng bán</div>
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
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Thể loại</th>
                                <th>Lĩnh vực</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1; ?>
                            @foreach ($show as $item)
                                <tr style="text-align: center">
                                    <td>{{ $stt++ }}</td>
                                    <td>{{ $item->sp_ten }}</td>
                                    <td>
                                        <img src="{{ asset($item->sp_hinhanh) }}" alt=""
                                            style="height: 100px;  width: 70px">
                                    </td>
                                    <td>{{ $item->tl_ten }}</td>
                                    <td>{{ $item->lv_ten }}</td>
                                    <td>
                                        <a href="{{ route('pro.revised', ['id' => $item->sp_id]) }}"
                                            class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <a onclick="return confirm('Bạn có chắc là muốn xóa {{ $item->sp_ten }} ?')"
                                            href="{{ route('pro.delete', ['id' => $item->sp_id]) }}"
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
