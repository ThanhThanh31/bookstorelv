@extends('client.store.template.master')
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
            <div class="col-md-10">
                <form method="POST" action="{{route('store.showcate')}}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <lable for=""> Tên lĩnh vực</lable>
                            <input type="text" name="tenLinhvuc" class="form-control" id="">
                        </div>
                        <div class="form-group col-md-5">
                            <lable for="">Thể loại</lable>
                            <select name="theLoai" class="form-control" selected>
                                @foreach($addd as $item => $key)
                                    <option value="{{ $key->tl_id }}">{{ $key->tl_ten }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
