@extends('client.store.template.master')
@section('title-page')
    Chọn nhà xuất bản
@endsection
@section('title-page-detail')
    Nhà xuất bản
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('editor.select')}}">
                        @csrf
                        @foreach ($checkEditor as $item)
                            <div class="form-check-inline">
                                    <input name="creator[]" style="margin-left: 20px" class="form-check-input" type="checkbox" id="" value="{{ $item->nxb_id }}">
                                    <label class="form-check-label" for=""> {{ $item->nxb_ten }}</label>
                            </div>
                            <br>
                        @endforeach
                        <br>
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
