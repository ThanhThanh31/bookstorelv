@extends('admin.template.master')
@section('title-page')
    Chi tiết sản phẩm
@endsection
@section('title-page-detail')
    Chi tiết sản Phẩm
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{ route('product.report') }}" type="button" class="btn btn-secondary">Trở về</a>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" style="text-align:center; padding-top: 10px">
                                            <a href="{{ route('product.details', ['id' => $show->sp_id]) }}"></a>
                                            <img src="{{ asset($show->sp_hinhanh) }}" width="50%" height="370px" alt="">
                                        </div>
                                        @if (count($image) != 0)
                                            <label for="">Hình ảnh sản phẩm liên quan</label>
                                            <div class="form-row">
                                                @foreach ($image as $item)
                                                    <div class="form-group col-md-3">
                                                        <img style="text-align: center; width: 70px; height: 100px" src="{{ asset($item->a_duongdan) }}">
                                                    </div>
                                                @endforeach
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <b>Tên người đăng bán:</b>&emsp;{{ $show->username }}
                                        </div>
                                        <div class="form-group">
                                            <b>Tên sản phẩm:</b>&emsp;{{ $show->sp_ten }}
                                        </div>
                                        <div class="form-group">
                                            <b>Trạng thái:</b>&emsp;
                                                @if ($show->sp_trangthai == 1)
                                                    Đang bán
                                                @else
                                                    Đã bán
                                                @endif
                                        </div>
                                        <div class="form-group">
                                            <b>Thể loại:</b>&emsp;{{ $show->tl_ten }}
                                        </div>
                                        <div class="form-group">
                                            <b>Lĩnh vực:</b>&emsp;{{ $show->lv_ten }}
                                        </div>
                                        <div class="form-group">
                                            <b>Số trang:</b>&emsp;{{ $show->sp_sotrang }}
                                        </div>
                                        <div class="form-group">
                                            <b>Kích thước:</b>&emsp;{{ $show->sp_kichthuoc }}
                                        </div>
                                        <div class="form-group">
                                            <b>Giá sản phẩm (VNĐ):</b>&emsp;{{ $show->sp_gia }}
                                        </div>
                                        <div class="form-group">
                                            <b>Loại bìa:</b>&emsp;{{ $show->lb_ten }}
                                        </div>
                                        <div class="form-group">
                                            <b>Tác giả:</b>&emsp;{{ $show->tg_ten }}
                                        </div>
                                        <div class="form-group">
                                            <b>Nhà xuất bản:</b>&emsp;{{ $show->nxb_ten }}
                                        </div>
                                        <div class="form-group">
                                            <b>Công ty phát hành:</b>&emsp;{{ $show->cty_ten }}
                                        </div>
                                        <div class="form-group">
                                            <b>Nơi bán sản phẩm:</b>&emsp;{{ $show->ttp_ten }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Mô tả sản phẩm</label>
                                        <div class="form-group">
                                            <p>{!! $show->sp_mota !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
