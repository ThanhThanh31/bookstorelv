@extends('admin.template.master')
@section('title-page')
    Tổng quan
@endsection
@section('title-page-detail')
    Tổng quan
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
                <h3>{{ $quantity_product }}</h3>
                <p>Sản Phẩm</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-albums"></i>
              </div>
              <a href="{{ route('admin.align') }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $quantity_post }}</h3>
                <p>Bài Viết</p>
              </div>
              <div class="icon">
                <i class="ion ion-compose"></i>
              </div>
              <a href="{{ route('admin.embattle') }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $quantity_user }}</h3>
                <p>Người Dùng</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="{{ route('admin.list') }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection
