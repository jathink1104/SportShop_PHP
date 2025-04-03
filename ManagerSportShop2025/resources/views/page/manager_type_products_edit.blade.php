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

            <form action="{{ route('manager_type_products.update', $type_product->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Tên Loại</label>
                    <input type="text" name="name" class="form-control" value="{{ $type_product->name }}" required>
                </div>


                <div class="mb-3">
                    <label class="form-label">Mô tả</label>
                    <textarea name="description" class="form-control" rows="3">{{ $type_product->description }}</textarea>
                </div>


                <div class="mb-3">
                    <label class="form-label">Hình ảnh URL</label>
                    <input type="text" name="image" class="form-control" value="{{ $type_product->image }}" placeholder="Dán URL hình ảnh vào đây">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cập nhật sản phẩm</button>
                <a href="{{ route('manager_type_products') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Quay lại</a>
            </form>
        </div>
    </div>
</div>
@endsection
