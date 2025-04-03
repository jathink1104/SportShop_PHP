@extends('dashboard_master')

@section('content')

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Danh sách sản phẩm</h4>
            <a href="{{ route('manager_products.create') }}" class="btn btn-light">
                <i class="fas fa-plus"></i> Thêm sản phẩm
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="d-flex align-items-center gap-2">
                <form action="{{ route('manager_products.search') }}" method="GET" class="d-flex">
                    <div class="input-group" style="max-width: 300px;">
                        <input type="text" name="query" class="form-control form-control-sm" placeholder="Tìm kiếm..." value="{{ request('query') }}" required>
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>

                @if(request()->has('query'))
                    <a href="{{ route('manager_products') }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left"></i> Quay lại
                    </a>
                @endif
            </div>
            <br>

            <table class="table table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Loại</th>
                        <th>Mô tả</th>
                        <th>Giá gốc</th>
                        <th>Giá khuyến mãi</th>
                        <th>Hình ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td class="fw-bold">{{ $product->name }}</td>
                            <td>{{ $product->id_type }}</td>
                            <td class="text-truncate" style="max-width: 150px;">{{ $product->description }}</td>
                            <td class="text-danger fw-bold">{{ number_format($product->unit_price) }} VNĐ</td>
                            <td class="text-success fw-bold">{{ number_format($product->promotion_price) }} VNĐ</td>
                            <td>
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-thumbnail rounded shadow-sm" width="60">
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('manager_products.edit', $product->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Sửa
                                    </a>
                                    <form action="{{ route('manager_products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Xóa
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row d-flex justify-content-center">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>

        </div>
    </div>
</div>
@endsection
