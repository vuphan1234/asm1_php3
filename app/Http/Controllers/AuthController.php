<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', ['pageTitle' => 'Đăng nhập']);
    }
    public function postlogin(LoginRequest $request)
    {
//         dd($request->all());
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/');
        }
        return redirect()->back()->with('error', 'Tài khoản hay mật khẩu không chính xác!');
    }
    public function register()
    {
        return view('auth.register', ['pageTitle' => 'Đăng ký']);
    }
    public function postregister(RegisterRequest $request)
    {
        try {
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect('/login')->with('success', 'Đăng ký thành công. Vui lòng đăng nhập.');
        } catch (\Throwable $th) {
            Log::error('Lỗi đăng ký: ' . $th->getMessage());
            dd($th->getMessage());
        }

//        dd($request->all());
    }
}
