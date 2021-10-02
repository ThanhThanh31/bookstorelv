<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.index') }}" class="brand-link">
        <img src="{{ asset('template_admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
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
                    @if (Auth::guard('quan_tri')->check())
                      <span>Quản trị viên:&ensp;{{ Auth::guard('quan_tri')->user()->username }}</span>
                    @endif
                </a>
                @if (Auth::guard('quan_tri')->check())
                    <a href="{{ route('admin.logout') }}">Đăng xuất</a>
                @endif
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('cate.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Thể Loại
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.list') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Cửa Hàng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cover.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Loại Bìa
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('author.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Tác Giả
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('publisher.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Nhà Xuất Bản
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('company.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Công Ty Phát Hành
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
          