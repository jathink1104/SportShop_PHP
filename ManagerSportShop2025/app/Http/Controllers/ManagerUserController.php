<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;


class ManagerUserController extends Controller
{
    public function listUser()
    {
        $users = User::paginate(5);
        return view('page.manager_users', compact('users'));
    }

    public function create(){
        return view('page.manager_users_create');
    }


    public function store(Request $req){
        $req ->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:6|max:255',
            'remember_token' => 'nullable|string|max:100',
        ]);

        $users = new User();
        $users->full_name = $req->full_name;
        $users->email = $req->email;
        $users->password = Hash::make($req->password);
        $users->remember_token = $req->remember_token;
        $users->save();
        return redirect()->route('manager_users')->with('success', 'Thêm người dùng thành công!');
    }

    public function edit($id){
        $users = User::findOrFail($id);
        return view('page.manager_users_edit',compact('users'));
    }

    public function update (Request $req,$id){
        $req ->validate([
            'full_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'password' => 'nullable|string|min:6|max:255',
            'remember_token' => 'nullable|string|max:100',
        ]);

        $users = User::findOrFail($id);
        $users->full_name = $req->full_name;
        $users->email = $req->email;
        $users->password = $req->password;
        $users->remember_token = $req->remember_token;
        $users->save();
        return redirect()->route('manager_users')->with('success', 'Cập nhật người dùng thành công!');

    }


    public function destroy($id){
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('manager_users')->with('success', 'Xóa người người dùng thành công!');
    }
}
