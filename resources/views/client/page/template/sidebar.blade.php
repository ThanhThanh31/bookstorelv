<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('page.manage') }}" class="brand-link">
        <img src="{{ asset('template_client/img/icon.ico') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ANNABOOKS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @if (Auth::guard('nguoi_dung')->check() && Auth::guard('nguoi_dung')->user()->q_id == 1)
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (Auth::guard('nguoi_dung')->user()->nd_anh == null)
                    <img alt="User Image" class="img-circle elevation-2" src="{{ asset('template_client/img/icon/admin.jpg') }}" alt="">
                @else
                    <img alt="User Image" class="img-circle elevation-2" src="{{ asset( Auth::guard('nguoi_dung')->user()->nd_anh ) }}">
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">
                      <span>{{ Auth::guard('nguoi_dung')->user()->username }}</span>
                </a>
                <a href="{{ route('client.index') }}"><i title="Về trang chủ" class="nav-icon fas fa-home"></i></a>&emsp;
                <a href="{{ route('page.logout') }}"><i  title="Đăng xuất" class="nav-icon fas fa-sign-out-alt"></i></a>
            </div>
        </div>
        @endif

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('pro.index') }}" class="nav-link
                    @if (Request::segment(2) == 'product')
                    active
                    @endif
                    ">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Sản Phẩm
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pro.rope') }}" class="nav-link
                    @if (Request::segment(2) == 'rope')
                    active
                    @endif
                    ">
                        <i class="nav-icon fas fa-paperclip"></i>
                        <p>
                            Sản phẩm bị báo cáo
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pro.historyProduct') }}" class="nav-link
                    @if (Request::segment(2) == 'annals')
                    active
                    @endif
                    ">
                        <i class="nav-icon fas fa-chart-area"></i>
                        <p>
                            Lịch sử báo cáo sản phẩm
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('postuser.index') }}" class="nav-link
                    @if (Request::segment(2) == 'postuser')
                    active
                    @endif
                    ">
                        <i class="nav-icon fas fa-fan"></i>
                        <p>
                            Bài Viết
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('postuser.buckle') }}" class="nav-link
                    @if (Request::segment(2) == 'buckle')
                    active
                    @endif
                    ">
                        <i class="nav-icon fas fa-thumbtack"></i>
                        <p>
                            Bài viết bị báo cáo
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('postuser.historyPost') }}" class="nav-link
                    @if (Request::segment(2) == 'history')
                    active
                    @endif
                    ">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            Lịch sử báo cáo bài viết
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        <!-- TEST -->
    </div>
    <!-- /.sidebar -->
</aside>
