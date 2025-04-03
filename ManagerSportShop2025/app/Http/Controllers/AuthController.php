<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;


class AuthController extends Controller
{
    public function getLogin(){
        return view('page.dangnhap');
    }

    public function getRegister(){
        return view('page.dangky');
    }


        public function postLogin(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Thử đăng nhập
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('trang-chu')->with('success', 'Đăng nhập thành công!');
            } else {
                return redirect()->back()->with('error', 'Email hoặc mật khẩu không đúng.');
            }
        }


    public function postRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Tạo user mới
        $user = User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        // Gán mặc định role 'user'
        $userRole = Role::where('name', 'user')->first(); 
        if ($userRole) {
            $user->roles()->attach($userRole->id);
        }
    
        // Đăng nhập ngay sau khi đăng ký
        Auth::login($user);
    
        return redirect()->route('trang-chu')->with('success', 'Đăng ký thành công!');
    }
    

    public function logout(Request $request)
    {
        Auth::logout(); 

        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 

        return redirect()->route('trang-chu')->with('success', 'Bạn đã đăng xuất thành công!');
    }
}
