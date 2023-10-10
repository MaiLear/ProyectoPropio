<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin_index');
    }

    public function store(AdminRequest $request)
    {
        $images = $request->file('image')->store('public/images');
        $urlImage = Storage::url($images);
        $hashPassword = Hash::make($request->password);
        $url = env('URL_SERVER_API');
        $response = Http::post($url . '/admins', [
            'first_name' => $request->first_name,
            'second_name' => $request->second_name,
            'email' => $request->email,
            'img' => $urlImage,
            'password' => $hashPassword
        ]);
        $data = $response->json();
        // return redirect(route('admin.create'))->with('data',$data);
        return view('admin.admin_register', compact('data'));
    }


    public function show()
    {
    }

    public function update(AdminRequest $request, Admin $admin)
    {
        $hashPassword = Hash::make($request->password);
        $url = env('URL_SERVER_API');
        $response = Http::put($url . '/update', [
            'first_name' => $request->first_name ?? $admin->first_name,
            'second_name' => $request->second_name ?? $admin->second_name,
            'email' => $request->email ?? $admin->email,
            'password' => $hashPassword ?? $admin->password
        ]);
        $data = $response->json();
    }

    public function destroy(Admin $admin)
    {
    }
    public function authenticate(AdminRequest $request)
    {
        //Para utilizar Auth::attempt($valor) con un modelo diferene a User
        //  debe crear un guardia en la carpeta App\Config\auth.php
        if (Auth::guard('admin')->attempt($request->toArray())) {
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

    public function loginCreate()
    {
        return view('admin.admin_login');
    }
    public function registerCreate()
    {
        return view('admin.admin_register');
    }
}
