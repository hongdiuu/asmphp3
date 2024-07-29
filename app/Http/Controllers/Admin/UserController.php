<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use function Laravel\Prompts\select;

class UserController extends Controller
{
  
    public function dashBoard()
    {
        
        return view('admin.users.dashboard');
    }

    public function listUsers()
    {
        $listUser =  User::query()->paginate(7);
        return view('admin.users.list-user')->with(['listUser' => $listUser]);
    }

    public function addUsers(Request $request)
    {
        $request->validate([
            'name' => ['required', 'name'],
            'email' => ['required', 'email'],
            'password' => 'required',
            'role' => 'required',
        ], [
            'name.required' => 'Tên không được bỏ trống',
            'email.required' => 'Email không được để trống',
            'password.required' => 'Password không được để trống',
            'role.required' => 'Role không được bỏ trống',
        ]);

        $check = User::where('email', $request->email)->exists();
        if (!$check) {
            $newUser = new User();
            $newUser->name = $request->name;
            $newUser->email = $request->email;
            $newUser->password = bcrypt($request->password);
            $newUser->role = $request->role;
            $newUser->save();
        }else {
            return redirect()->back()->with([
                'message' => 'Email Đã Tồn Tại',
            ]);
        }
        return redirect()->back()->with([
            'message' => 'Thêm Mới Thành Công',
        ]);
    }

    public function deleteUsers(Request $request){
        $request->validate([
            'id' => 'required',
        ],[
            'id.required' => 'ID người dùng là bắt buộc.',
        ]);
        User::where('id', $request->id)->delete();
        return redirect()->back()->with([
            'message' => 'Xoá Thành Công',
        ]);
    }

    public function detailUsers(Request $request){
        $user = user::where('id', $request->id)->select('id','name','email','role')->first();
        return json_encode($user);
    }

    public function updatelUsers(Request $request){
        $request->validate([
            'idUser' =>'required',
            'name' => 'required',
            'email' => ['required', 'email'],
            'role' => 'required',
        ], [
            'idUser' =>'Id không được bỏ trống',
            'name.required' => 'Tên không được bỏ trống',
            'email.required' => 'Email không được để trống',
            'role.required' => 'Role không được bỏ trống',
        ]);
        $user = User::where('id', $request->idUser);
        if ($user->exists()) {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
            ];
            $user->update($data);     
        }
        return redirect()->back()->with([
            'message' => 'Chỉnh Sửa Thành Công',
        ]);
    }

    public function listClients()
    {
        return view('client.product.list-client');
    }


}
