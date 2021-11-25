@extends('admin.template.master')
@section('title-page')
    Thêm lĩnh vực
@endsection
@section('title-page-detail')
    Thêm lĩnh vực
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('field.season') }}">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=""> Tên lĩnh vực</label>
                                        <input type="text" name="tenlinhVuc" class="form-control" id="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Thể loại</label>
                                        <select name="theloai" class="form-control" selected>
                                            <option value="">--- Chọn thể loại ---</option>
                                            @foreach ($cateList as $item => $key)
                                                <option value="{{ $key->tl_id }}">{{ $key->tl_ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Thêm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
