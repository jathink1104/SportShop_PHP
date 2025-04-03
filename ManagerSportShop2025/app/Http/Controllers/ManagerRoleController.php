<?php
namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;

class ManagerRoleController extends Controller{
  public function listRole(){
    $roles = Role::all();
    return view('page.manager_roles',compact('roles'));
  }

  public function create(){
    return view('page.manager_roles_create');
  }

  public function store(Request $req){
    $req -> validate([
      'name' => 'required|string|max:255',
      'description' => 'nullable|string|max:255',
    ]);

    $roles = new Role();
    $roles->name = $req->name;
    $roles->description = $req->description;
    $roles->save();
    return redirect()->route('manager_roles')->with('success', 'Thêm vai trò thành công!');
  }

  public function edit($id){
    $roles = Role::findOrFail($id);
    return view('page.manager_roles_edit',compact('roles'));
  }

  public function update(Request $req, $id){
    $req -> validate([
      'name' => 'required|string|max:255',
      'description' => 'nullable|string|max:255',
    ]);
    $roles = Role::findOrFail($id);
    $roles->name = $req->name;
    $roles->description = $req->description;
    $roles->save();
    return redirect()->route('manager_roles')->with('success', 'Cập nhật vai trò thành công!');

  } 


  public function destroy($id){
    $roles = Role::findOrFail($id);
    if($roles ==null){
      return redirect()->route('manager_roles');
    }
    $roles->delete();
    return redirect()->route('manager_roles')->with('success', 'Xóa vai trò thành công!');

  }


}


