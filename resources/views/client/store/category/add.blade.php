@extends('client.store.template.master')
@section('title-page')
    Chọn thể loại sản phẩm
@endsection
@section('title-page-detail')
    Thể loại sản phẩm
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('store.choose')}}">
                        @csrf
                        @foreach ($checkCate as $item)
                            <div class="form-check-inline">
                                    <input name="checkloai[]" style="margin-left: 20px" class="form-check-input" type="checkbox" id="" value="{{ $item->tl_id }}">
                                    <label style="margin-right: 90px" class="form-check-label" for=""> {{ $item->tl_ten }}</label>
                            </div>
                            <br>
                        @endforeach
                        <br>
                        <div class="form-group">
                            <button style="margin-top: 20px" type="submit" class="btn btn-success">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
