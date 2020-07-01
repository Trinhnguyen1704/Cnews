<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
	
    public function getLogin(){
    	return view('auth.login');
    }
    public function postLogin(Request $request){
        $username =  $request->username;
        $password = $request->password;
        $login = Auth::attempt([
            'username' => $username,
            'password' => $password
        ]);

        if($login) {
            return redirect()->route('admin.user.index');
        }else{
            return redirect()->route('auth.login')->with('msg','Sai username hoặc password');
        }
    }
    public function Logout(){
        Auth::logout();
        return redirect()->route('auth.login');
    }
}

//Câu lệnh JOIN 
//BT: Hoàn thiện thêm sửa xóa admin của dự án (story, user(trùng username), cat có valid): Tích hợp ck editor cho phần chi tiết (lưu ở public >> libs)
//Xem lại phần login
//Tối ưu code
