<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\CodeUnit\FunctionUnit;
use Illuminate\Support\Facades\Http;

class CustomerController extends Controller
{
    public function index(){

    }

    public function create(){
    }

    public function store(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ]);
        $hashPassword = Hash::make($credentials['password']);
        $url = env('URL_SERVER_API');
        $response = Http::post($url.'/customers', [
            'first_name' => $request->first_name,
            'second_name' => $request->second_name,
            'last_name' => $request->last_name,
            'email' => $credentials['email'],
            'password' =>  $hashPassword
        ]);
        $data = $response->json();
        return view('customer.customer_register', compact('data'));
    }

    public function update(Customer $customer, Request $request ){
        $customer->first_name = $request->first_name;
        $customer->second_name = $request->second_name;
        $customer->email = $request->email;
        $customer->password = $request->password;
        $customer->save();
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ]);
        if(Auth::guard('customer')->attempt($credentials)){
            $request->session()->regenerate();
            return view('index');
        }
        else{
            return view('customer.customer_login');
        }
    }

    public function show(){
    }

    public function shop(){
        return view('shop');
    }

    public function login(){
        return view('customer.customer_login');
    }

    public function register(){
        return view('customer.customer_register');
    }

}
