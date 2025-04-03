<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\UserRole;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;


class ManagerUserRoleController extends Controller
{
    public function listUserRole()
    {
        $userroles = UserRole::with(['user', 'role'])->paginate(4);
        return view('page.manager_user_roles', compact('userroles'));
    }

    public function create(){
        $users = User::all();
        $roles = Role::all();
        return view('page.manager_user_roles_create',compact('users','roles'));
    }


    public function store(Request $req)
    {
        $req->validate([
            'user_id' => 'required|string|max:255',
            'role_id' => 'required|exists:roles,id',
        ]);

        if (UserRole::where('user_id', $req->user_id)->where('role_id', $req->role_id)->exists()) {
            return redirect()->route('manager_role_users')->with('error', 'Người dùng này đã có vai trò này!');
        }

        $userroles = new UserRole();
        $userroles->user_id = $req->user_id;
        $userroles->role_id = $req->role_id;
        $userroles->save();

        return redirect()->route('manager_role_users')->with('success', 'Thêm người dùng thành công!');
    }

    public function edit($user_id, $role_id)
    {
        $userRole = UserRole::where('user_id', $user_id)->where('role_id', $role_id)->first();

        if (!$userRole) {
            return redirect()->route('manager_role_users')->with('error', 'Không tìm thấy dữ liệu!');
        }

        $users = User::all();
        $roles = Role::all();
        
        return view('page.manager_user_roles_edit', compact('userRole', 'users', 'roles'));
    }



    public function update(Request $req, $user_id, $role_id)
    {
        $req->validate([
            'user_id' => 'required|string|max:255',
            'role_id' => 'required|exists:roles,id',
        ]);
    
        $userRole = UserRole::where('user_id', $user_id)->where('role_id', $role_id)->first();
    
        if (!$userRole) {
            return redirect()->route('manager_role_users')->with('error', 'Không tìm thấy dữ liệu để cập nhật!');
        }
    
        if (UserRole::where('user_id', $req->user_id)->where('role_id', $req->role_id)->exists()) {
            return redirect()->route('manager_role_users')->with('error', 'Người dùng này đã có vai trò này!');
        }
    
        $userRole->delete();
    
        UserRole::create([
            'user_id' => $req->user_id,
            'role_id' => $req->role_id,
        ]);
    
        return redirect()->route('manager_role_users')->with('success', 'Cập nhật người dùng thành công!');
    }
    



    public function destroy($user_id, $role_id)
    {
        // Tìm dữ liệu cần xóa
        $userRole = UserRole::where('user_id', $user_id)
                            ->where('role_id', $role_id)
                            ->first();
    
        if (!$userRole) {
            return redirect()->route('manager_role_users')->with('error', 'Không tìm thấy dữ liệu để xóa!');
        }
    
        // Xóa bản ghi
        UserRole::where('user_id', $user_id)->where('role_id', $role_id)->delete();
    
        return redirect()->route('manager_role_users')->with('success', 'Xóa người dùng khỏi vai trò thành công!');
    }

    
}
