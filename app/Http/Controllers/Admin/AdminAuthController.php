<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AdminAuthController extends Controller
{

    public function __construct()
    {
        session_start();
    }

    public function login()
    {
        return view('admin.admin_login');
    }

    public function authenticate(AdminRequest $request)
    {
        $url = env("URL_SERVER_API");
        $response = Http::post($url . '/admins/authenticate', [
            'email' => $request->email,
            'password' => $request->password
        ]);
        if ($response['status'] == 500) {
            return view('admin.admin_login', compact($response['msg']));
        }
        $adminToken = $response['token'];
        session()->put('admin_authenticate', true);
        session()->put('admin', $response['user']);
        return view('admin.admin_index', compact('adminToken'));
    }


    public function logout()
    {
        // if (!isset($_SESSION['token'])) return to_route('admin.login');x 
        $url = env("URL_SERVER_API");
        $response = Http::get($url . '/admins/logout');
        session()->flush();
        return $response['status'] == 500
            ? $response
            : to_route('admin.login');
    }

    public function forgotPassword()
    {
        return view('forgot_password_admin');
    }

    public function forgotPasswordPost(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:admins']
        ]);
        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email'  => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('emails.reset_password_email', ['token' => $token, 'route' => 'admin.resetpassword'], function ($message) use ($request) {
            $message->from($request->email);
            $message->subject("Reset Password");
            $message->to("juanpablo@gmail.com");
        });
        return to_route('admin.forgotpassword')->with('msg', 'Send successfull');
    }

    public function resetPassword($token)
    {
        return view('reset_password_admin', compact('token'));
    }

    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required']
        ]);

        $updatePassword = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if (!$updatePassword) {
            return to_route('admin.resetpassword')->with('msg', 'Invalid');
        }
        Admin::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where('email', $request->email)->delete();

        return to_route('admin.login')->with('msg', 'Sucess - password reset success');
    }
}
