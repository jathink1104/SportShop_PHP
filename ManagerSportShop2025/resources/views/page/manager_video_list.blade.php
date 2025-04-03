@extends('dashboard_master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4>Danh sách Video</h4>
            <a href="{{ route('manager_videos.create') }}" class="btn btn-light"><i class="fas fa-plus"></i> Thêm Video</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Mô tả</th>
                        <th>URL</th>
                        <th>Thumbnail</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($videos as $video)
                        <tr>
                            <td>{{ $video->id }}</td>
                            <td class="fw-bold">{{ $video->title }}</td>
                            <td class="text-truncate" style="max-width: 150px;">{{ $video->description }}</td>
                            <td><a href="{{ $video->url }}" target="_blank">Xem Video</a></td>
                            <td><img src="{{ $video->thumbnail }}" alt="{{ $video->title }}" class="img-thumbnail" width="80"></td>
                            <td>
                                <a href="{{ route('manager_videos.edit', $video->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Sửa</a>
                                <form action="{{ route('manager_videos.destroy', $video->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
