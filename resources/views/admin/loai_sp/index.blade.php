@extends('admin.template.master')
@section('title-page')
    Loại sản phẩm
@endsection
@section('title-page-detail')
     Loại sản phẩm
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
               <a href="{{route('loaisp.them')}}" class="btn btn-primary">Thêm</a></div>
            <br>
            <div class="row">
                <table class="table table-hover">
                   <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên loại sản phẩm</th>
                        </tr>
                  </thead>
                   <tbody>
                        <?php $stt =1; ?>
                        @foreach ($danhSachLoai as $item)
                            <tr>
                                <td>{{ $stt ++ }}</td>
                                <td>{{ $item->l_ten }}</td>
                                <td>
                                   <a href="{{route('loaisp.edit', ['id'=> $item->l_id])}}" class="btn btn-warning">Chỉnh sửa</a>
                                   <a href="{{route('loaisp.xoa', ['id'=> $item->l_id])}}" class="btn btn-danger">Xóa</a>
                                </td>
                           </tr>
                        @endforeach
                   </tbody>
              </table>
          </div>
        </div>
    </section>
@endsection
