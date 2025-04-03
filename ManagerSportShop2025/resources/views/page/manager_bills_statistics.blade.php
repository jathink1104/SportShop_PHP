@extends('dashboard_master')

@section('content')
<div class="container mt-4">
    <h2 class="text-center text-primary fw-bold">📊 Thống kê Hóa đơn</h2>

    <div class="row mt-4">
        <!-- Tổng số hóa đơn -->
        <div class="col-md-4">
            <div class="card border-0 shadow-lg text-white" style="background: linear-gradient(135deg, #667eea, #764ba2);">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">📄 Tổng số hóa đơn</h5>
                    <p class="display-5 fw-bold">{{ $totalBills }}</p>
                    <span class="badge bg-light text-dark">Tổng đơn hàng đã tạo</span>
                </div>
            </div>
        </div>

        <!-- Tổng doanh thu -->
        <div class="col-md-4">
            <div class="card border-0 shadow-lg text-white" style="background: linear-gradient(135deg, #16a085, #f4d03f);">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">💰 Tổng doanh thu</h5>
                    <p class="display-5 fw-bold">{{ number_format($totalRevenue) }} VNĐ</p>
                    <span class="badge bg-light text-dark">Tổng doanh thu thu được</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Thống kê phương thức thanh toán -->
    <h3 class="mt-5 text-center fw-bold text-secondary">💳 Phương thức thanh toán</h3>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <ul class="list-group shadow-sm">
                @foreach($paymentMethods as $method)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ ucfirst($method->payment) }}
                    <span class="badge bg-primary rounded-pill">{{ $method->count }}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Bảng doanh thu theo tháng -->
    <h3 class="mt-5 text-center fw-bold text-secondary">📅 Doanh thu theo tháng</h3>
    <div class="table-responsive">
        <table class="table table-hover table-bordered shadow-sm">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Tháng</th>  
                    <th>Doanh thu (VNĐ)</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($revenueByMonth as $data)
                <tr>
                    <td><strong>Tháng {{ $data->month }}</strong></td>
                    <td class="fw-bold text-success">{{ number_format($data->revenue) }} VNĐ</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
