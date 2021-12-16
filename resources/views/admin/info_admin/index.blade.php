@extends('admin.template.master')
@section('title-page')
    Thông tin quản trị
@endsection
@section('title-page-detail')
Thông tin quản trị
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                @if (session()->has('yes'))
                    <i>
                        <div style="font-size: 15px; width: 305%; color: #155724; background-color: #d4edda;" class="alert alert-success">
                            {{ session()->get('yes') }}
                        </div>
                    </i>
                @endif
                @foreach ($admin as $item => $key)
                    <div class="col-md-12">
                        {{-- <form method="POST" action="{{ route('information.update', ['id' => $key->tt_id]) }}" enctype="multipart/form-data">
                            @csrf --}}
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                            @if ($key->qt_anh == null)
                                            <div class="form-group" style="text-align:center">
                                                <img width="60%" height="250px" src="{{ asset('template_client/img/icon/admin.jpg') }}" alt="">
                                                <input class="form-control" type="hidden"
                                                    value="{{ asset('template_client/img/icon/admin.jpg') }}">
                                            </div>
                                            @else
                                            <div class="form-group" style="text-align:center">
                                                <img width="60%" height="250px" src="{{ asset($key->qt_anh) }}" alt="">
                                                <input class="form-control" type="hidden" value="{{ asset($key->qt_anh) }}">
                                            </div>
                                            @endif
                                            <!-- Button trigger modal -->
                                            <div class="form-group" style="text-align:center">
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                                        Cập nhật ảnh đại diện
                                                </button>
                                            </div>

                                                <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form class="form-edit" action="{{ route('admin.update', ['id' => $key->qt_id]) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="file" style="padding-top: 3px" name="avatars"
                                                                    class="form-control" id="" multiple aria-describedby="helpId">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Đóng</button>
                                                                <button href="" type="submit" class="btn btn-primary">Lưu hình ảnh</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label for="">Tên quản trị</label>
                                                <input value="{{ $key->username }}" name="ten"
                                                    class="form-control" id="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input value="{{ $key->email }}" name="ten"
                                                    class="form-control" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                {{-- <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                                </div> --}}
                            </div>
                        {{-- </form> --}}
                    </div>
                @endforeach
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
