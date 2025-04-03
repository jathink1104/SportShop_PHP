@extends('dashboard_master')

@section('content')
<div class="container">
    <h2>Thêm chi tiết hóa đơn</h2>
    <form action="{{ route('manager_bill_details.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_bill" class="form-label">Mã hóa đơn</label>
            <select name="id_bill" class="form-control">
                @foreach($bills as $bill)
                    <option value="{{ $bill->id }}">{{ $bill->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_product" class="form-label">Sản phẩm</label>
            <select name="id_product" class="form-control">
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Số lượng</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="unit_price" class="form-label">Đơn giá</label>
            <input type="number" name="unit_price" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Lưu</button>
    </form>
</div>
@endsection
