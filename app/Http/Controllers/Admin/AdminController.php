<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        return view('admin.admin_index');
    }

    public function store(Request $request){
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8'],
                'image' => ['required','image']
            ]);
            $images = $request->file('image')->store('public/images');
            $urlImage = Storage::url($images);
            $hashPassword = Hash::make($credentials['password']);
            $url = env('URL_SERVER_API');
            $response = Http::post($url.'/admins',[
                'first_name' => $request->first_name,
                'second_name' => $request->second_name,
                'email' => $credentials['email'],
                'image' => $urlImage,
                'password' => $hashPassword
            ]);
            $data=$response->json();
            // return redirect(route('admin.create'))->with('data',$data);
            return view('admin.admin_register', compact('data'));
    }


    public function show(){
    }

    public function update(Request $request, Admin $admin){
        $hashPassword = Hash::make($request->password);
        $url = env('URL_SERVER_API');
        $response = Http::put($url.'/update',[
            'first_name' => $request->first_name ?? $admin->first_name,
            'second_name' => $request->second_name ?? $admin->second_name,
            'email' => $request->email ?? $admin->email,
            'password' => $hashPassword ?? $admin->password
        ]);
        $data = $response->json();
    }

    public function destroy(Admin $admin){

    }
    public function authenticate(Request $request){
        //Impongo unas reglas a los datos que obtengo
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);
        //Para utilizar Auth::attempt($valor) con un modelo diferene a User
        //  debe crear un guardia en la carpeta App\Config\auth.php
        if(Auth::guard('admin')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect(route('admin.index'));
        }
        else{
            return view('admin.admin_login');
        }
    }
    public function loginCreate(){
        return view('admin.admin_login');
    }
    public function registerCreate(){
        return view('admin.admin_register');
    }

   
}
