<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('page.manage') }}"></a>

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
                    @if (Auth::guard('nguoi_dung')->check())
                      <span>Xin chào,&ensp;{{ Auth::guard('nguoi_dung')->user()->username }}</span>
                    @endif
                </a>
                <a href="{{ route('client.index') }}">Về trang chủ</a>
                <br>
                @if (Auth::guard('nguoi_dung')->check())
                    <a href="{{ route('page.logout') }}">Đăng xuất</a>
                @endif
            </div>
        </div>

        <!-- Sidebar Menu -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                {{-- <li class="nav-item">
                    <a href="{{ route('store.category') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Thể Loại
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('store.field') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Lĩnh Vực
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('book.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Loại Bìa
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('writer.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Tác Giả
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('editor.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Nhà Xuất Bản
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('issuer.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Công Ty Phát Hành
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('pro.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Sản Phẩm
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('image.link') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Hình ảnh
                        </p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        <!-- TESTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT -->
    </div>
    <!-- /.sidebar -->
</aside>
