@extends('dashboard_master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4>Thêm Video Mới</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('manager_videos.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Tiêu đề</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mô tả</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">URL Video</label>
                    <input type="text" name="url" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Thumbnail</label>
                    <input type="text" name="thumbnail" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Lưu Video</button>
                <a href="{{ route('manager_videos') }}" class="btn btn-secondary">Quay lại</a>
            </form>
        </div>
    </div>
</div>
@endsection
