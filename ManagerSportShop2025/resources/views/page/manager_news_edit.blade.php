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

            <form action="{{ route('manager_news.update', $new->id) }}" method="POST">

                @csrf
                @method('PUT')  

                <div class="mb-3">
                    <label class="form-label">Tên tiêu đề</label>
                    <input type="text" name="title" class="form-control" value="{{ $new->title }}" required>
                </div>


                <div class="mb-3">
                    <label class="form-label">Nội dung</label>
                    <textarea name="content" class="form-control" rows="3">{{ $new->content }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Hình ảnh URL</label>
                    <input type="text" name="image" class="form-control" value="{{ $new->image }}" placeholder="Dán URL hình ảnh vào đây">
                </div>

                <!-- Hiển thị hình ảnh hiện tại -->


                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cập nhật sản phẩm</button>
                <a href="{{ route('manager_news') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Quay lại</a>
            </form>
        </div>
    </div>
</div>
@endsection
