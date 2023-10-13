<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

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
