@extends('dashboard_master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Danh sách phân quyền</h4>
            <a href="{{ route('manager_role_users.create') }}" class="btn btn-light">
                <i class="fas fa-plus"></i> Thêm phân quyền cho tài khoản
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            <table class="table table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID người dùng</th>
                        <th>Tên người dùng</th>
                        <th>Email người dùng</th>
                        <th>Id quyền</th>
                        <th>Tên phân loại</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($userroles as $r)
                        <tr>
                            <td>{{ $r->user_id }}</td>
                            <td>{{ $r->user->full_name ?? 'N/A' }}</td>
                            <td>{{ $r->user->email ?? 'N/A' }}</td>
                            <td>{{ $r->role_id }}</td>
                            <td>{{ $r->role->name ?? 'N/A' }}</td>
                            <td>
                                <div class="btn-group">
                                <a href="{{ route('manager_role_users.edit', ['user_id' => $r->user_id, 'role_id' => $r->role_id]) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Sửa
                                    </a>
                                    <form action="{{ route('manager_role_users.destroy', ['user_id' => $r->user_id, 'role_id' => $r->role_id]) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
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
                {{ $userroles->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
