<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenController extends Controller
{
    public function login(){
        return view('login');
    }
   
    public function postLogin(Request $request){
        $dataUserLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $remember = $request->has('remember');
        // check nut remember tra ve true thi gui len server
        if (Auth::attempt($dataUserLogin , $remember)) {
            if ( Auth::user()->role == '1' ) {
                return redirect()->route('admin.users.dashBoard')->with(['message' => 'Dang nhap thanh cong']);
            }else {
                return redirect()->route('client.listClients')->with(['message' => 'Dang nhap thanh cong']);
            }
        }else {
            return redirect()->route('login')->with(['message' => 'email hoac password khong dung']);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with([
            'messageError' => 'Đăng Xuất Thành Công',
        ]);
    }
    public function register(){
        return view('register');
    }

    public function postRegister(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required','email'],
            'password' => ['required'],
        ],[
            'name.required' => 'name không được để trống',
            'email.required' => 'Email không được để trống',
            'password.required' => 'Password không được để trống',
        ]);
        $existingUser = User::where('email', $request->email)->first();
        if ($existingUser) {
            // Nếu tồn tại, redirect về lại trang đăng ký với thông báo lỗi
            return redirect()->back()->withInput()->withErrors(['email' => 'Email đã tồn tại. Vui lòng sử dụng email khác.']);
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('client.listClients')->with(['message' => 'Đăng ký thành công! Đăng nhập để tiếp tục.']);
    }

    public function forgotPassword() {
        return view('forgot'); // Hiển thị trang nhập email để đặt lại mật khẩu
    }
    

}
