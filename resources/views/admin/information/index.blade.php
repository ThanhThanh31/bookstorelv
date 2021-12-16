@extends('admin.template.master')
@section('title-page')
    Thông tin trang website
@endsection
@section('title-page-detail')
    Giới thiệu trang website
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <style type="text/css">
                    .error-message { color: red; }
                </style>
                @if (session()->has('yes'))
                    <i>
                        <div style="font-size: 15px; width: 305%; color: #155724; background-color: #d4edda;" class="alert alert-success">
                            {{ session()->get('yes') }}
                        </div>
                    </i>
                @endif
                @foreach ($contact as $item => $key)
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('information.update', ['id' => $key->tt_id]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Tiêu đề trang website</label>
                                                <input class="form-control" type="text" value="{{ $key->tt_tieude }}"
                                                    name="tieude" placeholder="Nhập vào tiêu đề bài viết">
                                                    <span class="error-message">{{ $errors->first('tieude') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Nội dung giới thiệu website</label>
                                                <textarea class="form-control" id="ckeditor"
                                                    placeholder="Nhập vào nội dung giới thiệu website" name="noidung"
                                                    rows="8" cols="50">{{ $key->tt_noidung }}
                                                        </textarea>
                                                        <span class="error-message">{{ $errors->first('noidung') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Bản đồ</label>
                                                <textarea placeholder="Nhập vào thông tin liên hệ" name="map"
                                                    class="form-control" rows="8" cols="50">{{ $key->tt_bando }}
                                                        </textarea>
                                                        <span class="error-message">{{ $errors->first('map') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Fanpage</label>
                                                <textarea placeholder="Nhập vào thông tin fanpage" name="fanpage"
                                                    class="form-control" rows="8" cols="50">{{ $key->tt_fanpage }}
                                                        </textarea>
                                                        <span class="error-message">{{ $errors->first('fanpage') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Thông tin liên hệ</label>
                                                <textarea class="form-control" id="ckeditor1"
                                                    placeholder="Nhập vào thông tin liên hệ" name="lienhe" rows="8"
                                                    cols="50">{{ $key->tt_lienhe }}
                                                    </textarea>
                                                    <span class="error-message">{{ $errors->first('lienhe') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @push('ckeditor')
        <script>
            CKEDITOR.replace('ckeditor');
            CKEDITOR.replace('ckeditor1');
        </script>
    @endpush
@endsection
