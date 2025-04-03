@extends('dashboard_master')
@section('content')

<!-- Doanh số & Doanh thu Bắt đầu -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Doanh số hôm nay</p>
                    <h6 class="mb-0">$1234</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Tổng doanh số</p>
                    <h6 class="mb-0">$1234</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Doanh thu hôm nay</p>
                    <h6 class="mb-0">$1234</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Tổng doanh thu</p>
                    <h6 class="mb-0">$1234</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Doanh số & Doanh thu Kết thúc -->

<!-- Biểu đồ doanh số Bắt đầu -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Doanh số toàn cầu</h6>
                    <a href="">Xem tất cả</a>
                </div>
                <canvas id="worldwide-sales"></canvas>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Doanh số & Doanh thu</h6>
                    <a href="">Xem tất cả</a>
                </div>
                <canvas id="salse-revenue"></canvas>
            </div>
        </div>
    </div>
</div>
<!-- Biểu đồ doanh số Kết thúc -->

<!-- Bán hàng gần đây Bắt đầu -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Giao dịch gần đây</h6>
            <a href="">Xem tất cả</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">Ngày</th>
                        <th scope="col">Hóa đơn</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Số tiền</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>01 Tháng 1 2045</td>
                        <td>INV-0123</td>
                        <td>John Doe</td>
                        <td>$123</td>
                        <td>Đã thanh toán</td>
                        <td><a class="btn btn-sm btn-primary" href="">Chi tiết</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Bán hàng gần đây Kết thúc -->

<!-- Tiện ích Bắt đầu -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="mb-0">Tin nhắn</h6>
                    <a href="">Xem tất cả</a>
                </div>
                <div class="d-flex align-items-center border-bottom py-3">
                    <img class="rounded-circle flex-shrink-0" src="source_admin/assets/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">John Doe</h6>
                            <small>15 phút trước</small>
                        </div>
                        <span>Tin nhắn ngắn gọn ở đây...</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-light rounded p-4">
                <h6 class="mb-0">Lịch</h6>
                <div id="calender"></div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-light rounded p-4">
                <h6 class="mb-0">Danh sách công việc</h6>
                <div class="d-flex mb-2">
                    <input class="form-control bg-transparent" type="text" placeholder="Nhập công việc">
                    <button type="button" class="btn btn-primary ms-2">Thêm</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Tiện ích Kết thúc -->



@endsection
