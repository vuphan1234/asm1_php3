<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {

        return view('auth.login', ['pageTitle' => 'Đăng nhập']);
    }
    public function postlogin(Request $request)
    {
        // dd($request->all());
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/');
        }
        return redirect()->back()->with('error', 'Tài khoản hay mật khẩu không chính xác!');
    }
    public function register()
    {
        return view('auth.register', ['pageTitle' => 'Đăng ký']);
    }
    public function postregister(Request $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);

        try {
            User::create($request->all());
        } catch (\Throwable $th) {
            dd($th);
        }
        return redirect('/login');
    }

}
