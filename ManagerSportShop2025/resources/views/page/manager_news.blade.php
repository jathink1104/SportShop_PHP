@extends('dashboard_master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Danh sách tin tức</h4>
            <a href="{{route('manager_news.create')}}" class="btn btn-light">
                <i class="fas fa-plus"></i> Thêm tin tức mới
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
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Hình ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news as $new)
                        <tr>
                            <td>{{ $new->id }}</td>
                            <td class="fw-bold">{{ $new->title }}</td>
                            <td class="fw-bold">{{ $new->content }}</td>
                            <td>
                                <img src="{{ $new->image}}" alt="" class="img-thumbnail rounded shadow-sm" width="60">
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('manager_news.edit',$new->id)}}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Sửa
                                    </a>
                                    <form action="{{route('manager_news.destroy',$new->id)}}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
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
                {{ $news->links('pagination::bootstrap-4') }}
            </div>

        </div>
    </div>
</div>
@endsection
