<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login_admin()
    {
        if (Auth::check() && Auth::user()->is_admin == 1)
        {
            return redirect('admin/dashboard');
        }

        return view('admin.auth.login');
    }

    public function auth_login_admin(Request $request)
    {
        $remember = $request->has('remember');

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            $user = Auth::user();
            if ($user->is_admin == 1) {
                return redirect('admin/dashboard');
            } else {
                Auth::logout();
                return redirect()->back()->with('error', "You don't have permission to access the admin dashboard.");
            }
        } else {
            return redirect()->back()->with('error', "Please enter correct email and password");
        }
    }

    public function logout_admin()
    {
        Auth::logout();
        return redirect('login');
    }

}
