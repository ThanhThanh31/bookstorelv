<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Đăng bán sản phẩm</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template_client/img/icon.ico') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @include('client.page.template.css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  @include('client.page.template.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('client.page.template.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('title-page')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('page.manage') }}">Trang chủ</a></li>
              <li class="breadcrumb-item active">@yield('title-page-detail')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- footer -->
  @include('client.page.template.footer')
  <!-- footer -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('client.page.template.js')
@stack('ajax-add-product')
@stack('ajax-add-address')
</body>
</html>
