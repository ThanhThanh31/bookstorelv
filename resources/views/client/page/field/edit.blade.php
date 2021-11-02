@extends('client.store.template.master')
@section('title-page')
    Chỉnh sửa lĩnh vực
@endsection
@section('title-page-detail')
    Chỉnh sửa lĩnh vực
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('store.updatee', ['id' => $edit_field->lv_id]) }}">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <lable for=""> Tên lĩnh vực</lable>
                                        <input type="text" value="{{ $edit_field->lv_ten }}" name="tenLinhvuc"
                                            class="form-control" id="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <lable for="">Thể loại</lable>
                                        <select name="theLoai" class="form-control">
                                            @foreach ($list_category as $item => $key)
                                                <option value="{{ $key->tl_id }}" @if ($edit_field->tl_id == $key->tl_id) selected @endif>
                                                    {{ $key->tl_ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Chỉnh sửa</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
