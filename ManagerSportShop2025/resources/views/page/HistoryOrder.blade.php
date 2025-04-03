@extends('master')
@section('content')
<div class="container mt-5">
    <div class="container">
        <div class="pull-right">
            <br>
            <div class="beta-breadcrumb font-large">
                <a href="index.html">Trang chủ</a> / <span>Lịch sử đơn hàng</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <br>
    <h2 class="text-center mb-4 text-primary fw-bold">Lịch sử Đơn Đặt Hàng</h2>
    
    <!-- Thông tin tài khoản -->
    <div class="card shadow-sm mb-4 p-3 rounded-3 border-0 bg-light">
        <div class="d-flex align-items-center">
            <div>
            @if(Auth::check())  
                <h5 class="mb-1 fw-bold">Họ và tên: {{ Auth::user()->full_name }}</h5>
                <p class="text-muted mb-0">Email: {{ Auth::user()->email }}</p>
             @endif
            </div>
            <br>
        </div>
    </div>
    
    <div class="shadow-lg p-4 mb-5 bg-white rounded-3 border-0">
        <div class="list-group">
            @foreach($bill as $bl)
            <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center rounded-3 mb-2 border-0 shadow-sm">
                <div>
                    <h5 class="mb-1 fw-bold">Đơn hàng {{$bl->id}}</h5>
                    <p class="mb-1 text-muted">Ngày đặt: {{$bl->created_at}}</p>
                    <p class="fw-bold text-success">Tổng tiền: {{$bl->total}}</p>
                </div>
                <div class="text-end">
                    <span class="badge bg-success p-2">Hoàn thành</span>
                    <button style="background-color:red; border:1px solid red;" class="btn btn-primary btn-sm ms-2">Xem chi tiết</button>
                </div>
            </div>
            @endforeach

        </div>
        <div style="text-align:center;" class="row d-flex justify-content-center">
                {{ $bill->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
