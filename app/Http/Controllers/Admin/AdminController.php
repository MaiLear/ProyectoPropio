<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\StoreRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin_index');
    }

    public function store(StoreRequest $request)
    {
        $request->validate([
            'image' => ['required', 'image']
        ]);
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
   
    public function create()
    {
        return view('admin.admin_register');
    }
    
}
