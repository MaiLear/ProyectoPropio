<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class CustomerController extends Controller
{
    public function indexCustomer(Request $request)
    {
        $url = env('URL_SERVER_API');
        $response = Http::get($url . '/customers', [
            'value' => $request->search
        ]);
        $dataCustomer = $response->json();
        return view('admin.customer', compact('dataCustomer'));
    }

    public function create()
    {
    }

    public function store(StoreRequest $request)
    {

        $hashPassword = Hash::make($request->password);
        $request->validate([
            'last_name'=> ['string', 'min:3']
        ]);
        $url = env('URL_SERVER_API');
        $response = Http::post($url . '/customers', [
            'first_name' => $request->first_name,
            'second_name' => $request->second_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' =>  $hashPassword
        ]);
        $data = $response->json();
        return view('customer.customer_register', compact('data'));
    }

    public function update(Request $request, $idCustomer)
    {
        $url = env('URL_SERVER_API');
        $response = Http::put($url . "customers/{$idCustomer}", [
            'first_name' => $request->first_name,
            'second_name' => $request->second_name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        $data = $response->json();
        return to_route('admin.customer.index')->with('data', $data);
    }

    public function authenticate(CustomerRequest $request)
    {
        if (Auth::guard('customer')->attempt($request->toArray())) {
            $request->session()->regenerate();
            $usuario = Auth::user();
            return view('index', compact('usuario'));
        } else {
            return view('customer.customer_login');
        }
    }

    public function customersDelete($idCustomer)
    {
        $url = env('URL_SERVER_API');
        $response = Http::delete($url . "/customers/$idCustomer");
        $data = $response->json();
        $msg = $data['msg'];
        return to_route('admin.customer.index')->with('msg', $msg);
    }

    public function show()
    {
    }

    public function shop()
    {
        $url = env('URL_SERVER_API');
        $response = Http::get($url . '/products');
        $data = $response['products'];
        $newProducts = $response['newProducts'];
        return view('shop', compact('data', 'newProducts'));
    }

    public function login()
    {
        return view('customer.customer_login');
    }

    public function register()
    {
        return view('customer.customer_register');
    }
}
