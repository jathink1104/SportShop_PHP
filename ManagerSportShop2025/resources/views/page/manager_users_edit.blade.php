@extends('dashboard_master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h4 class="mb-0">Chỉnh sửa tài khoản</h4>
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

            <form action="{{ route('manager_users.update', $users->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Tên người dùng</label>
                    <input type="text" name="full_name" class="form-control" value="{{ $users->full_name }}" required>
                </div>


                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <textarea name="email" class="form-control" rows="3">{{ $users->email}}</textarea>
                </div>
                <div class="mb-3">
                    <label  class="form-label">Mật khẩu</label>
                    <input type="text" name="password" class="form-control" value="{{ $users->password }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mã thông báo</label>
                    <input type="text" name="remember_token" class="form-control" value="{{ $users->remember_token }}" >
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cập nhật tài khoản</button>
                <a href="{{ route('manager_users') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Quay lại</a>
            </form>
        </div>
    </div>
</div>
@endsection
