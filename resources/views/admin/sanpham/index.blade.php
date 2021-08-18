@extends('admin.template.master')
@section('title-page')
    Sản phẩm
@endsection
@section('title-page-detail')
    Sản phẩm
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
               <a href="{{route('sp.them')}}" class="btn btn-primary">Thêm</a></div>
            <br>
            <div class="row">
                <table class="table table-hover">
                   <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Loại sản phẩm</th>
                        </tr>
                  </thead>
                   <tbody>
                        <?php $stt =1; ?>
                        @foreach ($danhSachSP as $item)
                            <tr>
                            <td>{{ $stt ++ }}</td>
                            <td>{{ $item->sp1_ten }}</td>
                            <td>{{ $item->l_ten }}</td>
                                <td>
                                   <a href="#" class="btn btn-warning">Chỉnh sửa</a>
                                   <a href="{{route('sanpham.xoa', ['id'=> $item->sp1_id])}}" class="btn btn-danger">Xóa</a>
                                </td>
                           </tr>
                        @endforeach
                   </tbody>
              </table>
          </div>
        </div>
    </section>
@endsection


