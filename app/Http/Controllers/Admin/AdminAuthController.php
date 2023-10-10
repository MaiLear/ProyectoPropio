<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class AdminAuthController extends Controller
{

    public function login()
    {
        return view('admin.admin_login');
    }

    public function authenticate(AdminRequest $request)
    {
        //Para utilizar Auth::attempt($valor) con un modelo diferene a User
        //  debe crear un guardia en la carpeta App\Config\auth.php
        if (Auth::guard('admin')->attempt($request->only(['email', 'password']))) {
            $request->session()->regenerate();
            $admin = auth('admin')->user();
            // Auth::login($admin);
            return to_route('admin.index');
        } else {
            return view('admin.admin_login');
        }
    }


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('admin.login');
    }
}
