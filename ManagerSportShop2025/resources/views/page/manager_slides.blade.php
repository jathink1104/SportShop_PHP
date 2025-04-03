@extends('dashboard_master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Danh sách Slide</h4>
            <a href="{{ route('manager_slides.create') }}" class="btn btn-light">
                <i class="fas fa-plus"></i> Thêm Slide
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <table class="table table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Hình ảnh</th>
                        <th>Liên kết</th>
                        <th>Hành động</th>  
                    </tr>
                </thead>
                <tbody>
                    @foreach($slides as $slide)
                        <tr>
                            <td>{{ $slide->id }}</td>
                            <td>
                                <img src="{{ $slide->link }}" alt="Slide Image" class="img-thumbnail" width="100">
                            </td>
                            <td>
                                <a href="{{ $slide->image }}" target="_blank">{{ $slide->link }}</a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('manager_slides.edit', $slide->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Sửa
                                    </a>
                                    <form action="{{ route('manager_slides.destroy', $slide->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa slide này?')">
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

            <div class="d-flex justify-content-center">
                {{ $slides->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
