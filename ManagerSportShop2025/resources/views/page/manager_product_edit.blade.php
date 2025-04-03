@extends('dashboard_master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h4 class="mb-0">Chỉnh sửa sản phẩm</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('manager_products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Loại sản phẩm</label>
                    <select name="id_type" class="form-select" required>
                    @foreach ($type_product as $type)
                        <option value="{{ $type->id }}" {{ $product->id_type == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mô tả</label>
                    <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Giá gốc (VNĐ)</label>
                    <input type="number" name="unit_price" class="form-control" value="{{ $product->unit_price }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Giá khuyến mãi (VNĐ)</label>
                    <input type="number" name="promotion_price" class="form-control" value="{{ $product->promotion_price }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Hình ảnh URL</label>
                    <input type="text" name="image" class="form-control" value="{{ $product->image }}" placeholder="Dán URL hình ảnh vào đây">
                </div>

                <!-- Hiển thị hình ảnh hiện tại -->
                @if ($product->image)
                    <div class="mb-3">
                        <label class="form-label">Hình ảnh hiện tại</label><br>
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-thumbnail" width="150">
                    </div>
                @endif

                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cập nhật sản phẩm</button>
                <a href="{{ route('manager_products') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Quay lại</a>
            </form>
        </div>
    </div>
</div>
@endsection
