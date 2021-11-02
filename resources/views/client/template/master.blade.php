<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from d29u17ylf1ylz9.cloudfront.net/t90-v2/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Aug 2018 04:57:18 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AnnaBooks || ABS - Kết nối những sẻ</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template_client/img/icon.ico') }}">
    <!-- All CSS Hear -->
    @include('client.template.css')
    <!-- Style CSS Hear -->
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience. Thanks</p>
        <![endif]-->
    <!-- Add your application content here -->

    <div class="wrapper">

        @include('client.template.header')

        <!-- main-search start -->
        <div class="main-search-active">
            <div class="sidebar-search-icon">
                <button class="search-close"><span class="icon-close"></span></button>
            </div>
            <div class="sidebar-search-input">
                <form action="{{ route('user.search') }}">
                    <div class="form-search">
                        <input id="search" name="key" class="input-text" value="" placeholder="Nhập vào từ khóa tìm kiếm về sản phẩm..."
                            type="search">
                        <button class="search-btn" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- main-search start -->

        @yield('content')

        <!-- footer -->
        @include('client.template.footer')
        <!-- footer -->
    </div>
    <!-- jquery -->
    @include('client.template.js')
    <!-- all plugins JS hear -->
</body>

<!-- Mirrored from d29u17ylf1ylz9.cloudfront.net/t90-v2/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Aug 2018 04:57:50 GMT -->

</html>
