// View danh sách hóa đơn (list)
@extends('dashboard_master')

@section('content')
<div class="container">
    <h2>Danh sách hóa đơn</h2>
    <a href="{{ route('manager_bills.create') }}" class="btn btn-success">Thêm hóa đơn</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Khách hàng</th>
                <th>Ngày đặt</th>
                <th>Tổng tiền</th>
                <th>Phương thức</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bills as $bill)
            <tr>
                <td>{{ $bill->id }}</td>
                <td>{{ $bill->bill->name }}</td>
                <td>{{ $bill->date_order }}</td>
                <td>{{ number_format($bill->total) }} VNĐ</td>
                <td>{{ $bill->payment }}</td>
                <td>
                    <a href="{{ route('manager_bills.edit', $bill->id) }}" class="btn btn-warning">Sửa</a>
                    <form action="{{ route('manager_bills.destroy', $bill->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Xác nhận xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection