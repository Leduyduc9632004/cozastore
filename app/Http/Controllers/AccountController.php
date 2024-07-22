<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function login(){
        return view('client.login');
    }

    public function register(){
        return view('client.register');
    }

    public function confirmRegister(StoreUserRequest $request){
            $user = $request->all();
            Hash::make($request->password); 
            User::query()->create($user);
            return redirect()->route('client.login')->with('success','Đăng ký thành công');
    }

    public function confirmLogin(LoginRequest $request){
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('client.home');
        }else{
            return redirect()->route('client.login')->with('message','Đăng nhập thất bại, tài khoản hoặc mật khẩu không đúng');
        }
    }
    
}
