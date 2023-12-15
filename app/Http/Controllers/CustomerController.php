<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Http\Requests\StoreRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function index(Request $request)
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
        return view('customer.customer_register');
    }



    public function store(StoreRequest $request)
    {

        $hashPassword = Hash::make($request->password);
        $request->validate([
            'last_name' => ['string', 'min:3']
        ]);
        $url = env('URL_SERVER_API');
        $response = Http::post($url . '/customers', [
            'first_name' => $request->first_name,
            'second_name' => $request->second_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' =>  $hashPassword
        ]);
        $msg = $response['msg'];
        return to_route('customer.create')->with('msg', $msg);
    }

    public function show()
    {
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
        if (Auth::guard('customer')->attempt($request->only(['email', 'password']))) {
            $request->session()->regenerate();
            $usuario = Auth::user();
            $url = env("URL_SERVER_API");
            Http::post($url."/cart/store",[
                "cart" => $request->dataCart,
                "email" => $request->email
            ]);
            return view('index', compact('usuario'));
        } else {
            return view('customer.customer_login');
        }
    }


    public function forgotPassword()
    {
        return view('forgot_password');
    }

    public function forgotPasswordPost(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:customers']
        ]);
        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email'  => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('emails.reset_password_email', ['token' => $token, 'route' => 'customer.resetpassword'], function ($message) use ($request) {
            $message->from($request->email);
            $message->subject("Reset Password");
            $message->to("santi@gmail.com");
        });
        return to_route('customer.forgotpassword')->with('msg', 'Send successfull');
    }

    public function resetPassword($token)
    {
        return view('reset_password', compact('token'));
    }

    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:customers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required']
        ]);

        $updatePassword = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if (!$updatePassword) {
            return to_route('customer.resetpassword')->with('msg', 'Invalid');
        }
        Customer::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where('email', $request->email)->delete();

        return to_route('customer.login')->with('msg', 'Sucess - password reset success');
    }

    public function destroy($idCustomer)
    {
        $url = env('URL_SERVER_API');
        $response = Http::delete($url . "/customers/{$idCustomer}");
        $msg = $response['msg'];
        return to_route('customer.index')->with('msg', $msg);
    }

    public function shop()
    {
        $url = env('URL_SERVER_API');
        $response = Http::get($url . '/products');
        $data = $response['products'];
        $data = $data["data"];
        $newProducts = $response['newProducts'];
        return view('shop', compact('data', 'newProducts'));
    }

    public function login()
    {
        return view('customer.customer_login');
    }

    
}
