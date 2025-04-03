<!-- Bộ tải (Spinner) Bắt đầu -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Đang tải...</span>
    </div>
</div>
<!-- Bộ tải (Spinner) Kết thúc -->

<!-- Thanh bên (Sidebar) Bắt đầu -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{route('dashboard')}}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa me-2"></i>Sport Shop</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="source_admin/assets/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            @if(Auth::check())  
                <div class="ms-3">
                    <h6 class="mb-0">{{ Auth::user()->full_name }}</h6>
                    <span>
                        @if(Auth::user()->hasRole('admin'))
                            Quản trị viên
                        @else
                            Người dùng
                        @endif
                    </span>
                </div>
            @endif

        </div>
        <div class="navbar-nav w-100">
            <a href="{{route('dashboard')}}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Bảng điều khiển</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle d-flex align-items-center py-2" data-bs-toggle="dropdown">
                    <i class="fa fa-laptop me-2"></i> <span class="fw-bold">Quản lý</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow-lg rounded-3">
                    <a href="{{route('manager_bills')}}" class="dropdown-item d-flex align-items-center">
                        <i class="fa fa-file-invoice me-2 text-primary"></i> Hóa đơn
                    </a>
                    <a href="{{route('manager_bill_details')}}" class="dropdown-item d-flex align-items-center">
                        <i class="fa fa-list-alt me-2 text-secondary"></i> Chi tiết hóa đơn
                    </a>
                    <a href="{{route('manager_customers')}}" class="dropdown-item d-flex align-items-center">
                        <i class="fa fa-users me-2 text-success"></i> Khách hàng
                    </a>
                    <a href="{{route('manager_news')}}" class="dropdown-item d-flex align-items-center">
                        <i class="fa fa-newspaper me-2 text-danger"></i> Tin tức
                    </a>
                    <a href="{{route('manager_products')}}" class="dropdown-item d-flex align-items-center">
                        <i class="fa fa-box me-2 text-warning"></i> Sản phẩm
                    </a>
                    <a href="{{route('manager_roles')}}" class="dropdown-item d-flex align-items-center">
                        <i class="fa fa-user-shield me-2 text-info"></i> Vai trò
                    </a>
                    <a href="{{route('manager_slides')}}" class="dropdown-item d-flex align-items-center">
                        <i class="fa fa-images me-2 text-dark"></i> Trình chiếu
                    </a>
                    <a href="{{route('manager_type_products')}}" class="dropdown-item d-flex align-items-center">
                        <i class="fa fa-tags me-2 text-primary"></i> Loại sản phẩm
                    </a>
                    <a href="{{route('manager_users')}}" class="dropdown-item d-flex align-items-center">
                        <i class="fa fa-user me-2 text-secondary"></i> Người dùng
                    </a>
                    <a href="{{route('manager_role_users')}}" class="dropdown-item d-flex align-items-center">
                        <i class="fa fa-key me-2 text-success"></i> Quyền người dùng
                    </a>
                    <a href="{{route('manager_videos')}}" class="dropdown-item d-flex align-items-center">
                        <i class="fa fa-video me-2 text-danger"></i> Video
                    </a>
                </div>
            </div>


            <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Tiện ích</a>
            <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Biểu mẫu</a>
            <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Bảng</a>
            <a href="{{route('manager_bills.statistics')}}" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Biểu đồ</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Trang</a>
                <div class="dropdown-menu bg-transparent border-0">
                <div class="d-flex flex-column">
                    <a href="{{ route('trang-chu') }}" class="btn btn-primary mb-2">Trở về trang chủ</a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <button class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Đăng xuất
                    </button>
                </div>

                
            </div>
        </div>
    </nav>
</div>
<!-- Thanh bên (Sidebar) Kết thúc -->
