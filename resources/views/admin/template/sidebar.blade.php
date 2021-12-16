<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.index') }}" class="brand-link">
        <img src="{{ asset('template_client/img/icon.ico') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ANNABOOKS</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @if (Auth::guard('quan_tri')->check())
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (Auth::guard('quan_tri')->user()->qt_anh == null)
                    <img src="{{ asset('template_client/img/icon/admin.jpg') }}" class="img-circle elevation-2"
                        alt="User Image">
                @else
                    <img src="{{ asset( Auth::guard('quan_tri')->user()->qt_anh ) }}" class="img-circle elevation-2"
                        alt="User Image">
                @endif
            </div>
            <div class="info">
                <a class="d-block">
                    <span>{{ Auth::guard('quan_tri')->user()->username }}</span>
                </a>
                <a href="{{ route('admin.infor_admin') }}">Thông tin quản trị</a>
                <br>
                <a href="{{ route('admin.logout') }}">Đăng xuất</a>
            </div>
        </div>
        @endif
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.information') }}" class="nav-link
                    @if (Request::segment(2) == 'information')
                        active
                    @endif
                    ">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Thông tin website
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cate.index') }}" class="nav-link
                    @if (Request::segment(2) == 'category')
                        active
                    @endif
                    ">
                        <i class="nav-icon fas fa-paw"></i>
                        <p>
                            Thể Loại
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('field.index') }}" class="nav-link
                    @if (Request::segment(2) == 'field')
                        active
                    @endif
                    ">
                        <i class="nav-icon fas fa-snowflake"></i>
                        <p>
                            Lĩnh vực
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cover.index') }}" class="nav-link
                    @if (Request::segment(2) == 'cover')
                        active
                    @endif
                    ">
                        <i class="nav-icon fas fa-cannabis"></i>
                        <p>
                            Loại Bìa
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('author.index') }}" class="nav-link
                    @if (Request::segment(2) == 'author')
                        active
                    @endif
                    ">
                        <i class="nav-icon fas fa-pencil-alt"></i>
                        <p>
                            Tác Giả
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('publisher.index') }}" class="nav-link
                    @if (Request::segment(2) == 'publisher')
                        active
                    @endif
                    ">
                        <i class="nav-icon fas fa-guitar"></i>
                        <p>
                            Nhà Xuất Bản
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('company.index') }}" class="nav-link
                    @if (Request::segment(2) == 'company')
                        active
                    @endif
                    ">
                        <i class="nav-icon fas fa-umbrella"></i>
                        <p>
                            Công Ty Phát Hành
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('post.report') }}" class="nav-link
                    @if (Request::segment(2) == 'post-report')
                        active
                    @endif
                    ">
                        <i class="nav-icon fas fa-thumbtack"></i>
                        <p>
                            Báo Cáo Bài Viết
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('product.report') }}" class="nav-link
                    @if (Request::segment(2) == 'product-report')
                        active
                    @endif
                    ">
                        <i class="nav-icon fas fa-paperclip"></i>
                        <p>
                            Báo Cáo Sản Phẩm
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
