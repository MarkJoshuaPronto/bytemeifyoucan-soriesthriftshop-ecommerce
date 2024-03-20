<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.signin');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->is_admin == 1) {
                return redirect()->intended('admin/dashboard');
            } else {
                return redirect()->intended('/');
            }
        }

        // Authentication failed due to invalid credentials
        return redirect()->back()->withInput()->withErrors(['email' => 'Invalid email or password.']);
    }
}
