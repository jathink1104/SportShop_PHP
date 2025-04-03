@extends('dashboard_master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Thêm vai trò mới cho người dùng</h4>
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

            <form action="{{ route('manager_roles.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Tên vai trò</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">  
                    <label class="form-label">Mô tả</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Lưu vai trò</button>
                <a href="{{ route('manager_roles') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Quay lại</a>
            </form>
        </div>
    </div>
</div>
@endsection
