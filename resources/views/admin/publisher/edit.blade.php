@extends('admin.template.master')
@section('title-page')
    Chỉnh sửa nhà xuất bản
@endsection
@section('title-page-detail')
    Chỉnh sửa nhà xuất bản
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('publisher.updating', ['id' => $editor->nxb_id]) }}">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tên nhà xuất bản</label>
                                            <input type="text" value="{{ $editor->nxb_ten }}" name="xuatban"
                                                class="form-control" id="">
                                        </div>
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
