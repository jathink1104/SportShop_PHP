@extends('dashboard_master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4>Thêm Slide</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('manager_slides.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Hình ảnh</label>
                    <input type="text" name="image" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Liên kết</label>
                    <input type="text" name="link" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Lưu</button>
                <a href="{{ route('manager_slides') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
</div>
@endsection
