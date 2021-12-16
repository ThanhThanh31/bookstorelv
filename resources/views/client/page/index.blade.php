@extends('client.page.template.master')
@section('title-page')
Trang chủ
@endsection
@section('title-page-detail')
Trang chủ
@endsection
@section('content')
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{  $san_pham }}</h3>
                <p>Sản Phẩm</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-albums"></i>
              </div>
              <a href="{{ route('pro.index') }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $bai_viet }}</h3>

                <p>Bài Viết</p>
              </div>
              <div class="icon">
                <i class="ion ion-compose"></i>
              </div>
              <a href="{{ route('postuser.index') }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $don_hang }}</h3>
                    <p>Đơn hàng</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('order.index') }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection
