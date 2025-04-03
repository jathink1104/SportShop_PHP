@extends('dashboard_master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Danh sách tài khoản người dùng</h4>
            <a href="{{ route('manager_users.create') }}" class="btn btn-light">
                <i class="fas fa-plus"></i> Thêm tài khoản người dùng
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
                        <th>Tên người dùng</th>
                        <th>Email</th>
                        <th>Mật khẩu</th>
                        <th>Mã thông báo</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                        <td>{{ $user->id }}</td>
                            <td class="fw-bold">{{ $user->full_name }}</td>
                            <td>{{ $user->email}}</td>
                            <td class="text-truncate" style="max-width: 150px;">{{ $user->password }}</td>
                            <td class="text-danger fw-bold">{{ $user->remember_token }}</td>
                            <td class="text-success fw-bold">{{ $user->created_at }}</td>
                            <td class="text-success fw-bold">{{ $user->updated_at }}</td>

                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('manager_users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Sửa
                                    </a>
                                    <form action="{{ route('manager_users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
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
                {{ $users->links('pagination::bootstrap-4') }}
            </div>

        </div>
    </div>
</div>
@endsection
