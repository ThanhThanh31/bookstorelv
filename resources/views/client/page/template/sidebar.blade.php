<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('page.manage') }}"></a>

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

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('pro.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Sản Phẩm
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('postuser.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-fan"></i>
                        <p>
                            Bài Viết
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pro.rope') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Sản phẩm bị ẩn
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pro.historyProduct') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Lịch sử báo cáo vi phạm
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('postuser.buckle') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Bài viết bị ẩn
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('postuser.historyPost') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Lịch sử báo xấu
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        <!-- TESTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT -->
    </div>
    <!-- /.sidebar -->
</aside>
