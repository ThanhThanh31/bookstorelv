<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('store.manage') }}" class="brand-link">
        <img src="{{ asset('template_admin/dist/img/AdminLTELogo.png') }}" alt="Cửa hàng Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Cửa hàng</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('template_admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    @if (Auth::guard('nguoi_dung')->check() && Auth::guard('nguoi_dung')->user()->q_id == 2)
                      <span>Chủ cửa hàng:&ensp;{{ Auth::guard('nguoi_dung')->user()->username }}</span>
                    @endif
                </a>
                @if (Auth::guard('nguoi_dung')->check())
                    <a href="{{ route('store.logout') }}">Đăng xuất</a>
                @endif
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('store.list') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Thể loại
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('store.field') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Lĩnh vực
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
