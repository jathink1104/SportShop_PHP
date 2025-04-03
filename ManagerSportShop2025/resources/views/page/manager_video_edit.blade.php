@extends('dashboard_master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h4>Chỉnh sửa Video</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('manager_videos.update', $video->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Tiêu đề</label>
                    <input type="text" name="title" class="form-control" value="{{ $video->title }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mô tả</label>
                    <textarea name="description" class="form-control">{{ $video->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">URL Video</label>
                    <input type="text" name="url" class="form-control" value="{{ $video->url }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Thumbnail</label>
                    <input type="text" name="thumbnail" class="form-control" value="{{ $video->thumbnail }}" required>
                </div>
                <button type="submit" class="btn btn-warning">Cập nhật</button>
                <a href="{{ route('manager_videos') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
</div>
@endsection
