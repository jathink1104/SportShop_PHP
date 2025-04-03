@extends('dashboard_master')

@section('content')
<div class="container">
    <h2>Chỉnh sửa hóa đơn</h2>
    <form action="{{ route('manager_bills.update', $bill->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_customer" class="form-label">Khách hàng</label>
            <select name="id_customer" class="form-control">
                @foreach($customers as $customer)
                <option value="{{ $customer->id }}" {{ $bill->id_customer == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="date_order" class="form-label">Ngày đặt</label>
            <input type="date" name="date_order" class="form-control" value="{{ $bill->date_order }}" required>
        </div>
        <div class="mb-3">
            <label for="total" class="form-label">Tổng tiền</label>
            <input type="number" name="total" class="form-control" value="{{ $bill->total }}" required>
        </div>
        <div class="mb-3">
            <label for="payment" class="form-label">Phương thức thanh toán</label>
            <input type="text" name="payment" class="form-control" value="{{ $bill->payment }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
