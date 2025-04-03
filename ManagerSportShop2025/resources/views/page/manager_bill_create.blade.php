
@extends('dashboard_master')

@section('content')
<div class="container">
    <h2>Thêm hóa đơn</h2>
    <form action="{{ route('manager_bills.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_customer" class="form-label">Khách hàng</label>
            <select name="id_customer" class="form-control">
                @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="date_order" class="form-label">Ngày đặt</label>
            <input type="date" name="date_order" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="total" class="form-label">Tổng tiền</label>
            <input type="number" name="total" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="payment" class="form-label">Phương thức thanh toán</label>
            <input type="text" name="payment" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
@endsection
