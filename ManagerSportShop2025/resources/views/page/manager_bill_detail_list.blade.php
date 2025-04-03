@extends('dashboard_master')

@section('content')
<div class="container">
    <h2>Danh sách chi tiết hóa đơn</h2>
    <a href="{{ route('manager_bill_details.create') }}" class="btn btn-success">Thêm chi tiết hóa đơn</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã hóa đơn</th>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($billDetails as $detail)
            <tr>
                <td>{{ $detail->id }}</td>
                <td>{{ $detail->bill->id }}</td>
                <td>{{ $detail->product->name }}</td>
                <td>{{ $detail->quantity }}</td>
                <td>{{ number_format($detail->unit_price) }} VNĐ</td>
                <td>
                    <a href="{{ route('manager_bill_details.edit', $detail->id) }}" class="btn btn-warning">Sửa</a>
                    <form action="{{ route('manager_bill_details.destroy', $detail->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
