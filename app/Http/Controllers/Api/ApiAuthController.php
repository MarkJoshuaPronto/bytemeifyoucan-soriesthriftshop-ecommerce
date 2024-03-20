<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'username' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'User successfully registered',
            'user' => [
                'name' => $user->name,
                'username' => $user->username,
                'email' => $user->email,
            ]
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = Str::random(80);
            $user->api_token = hash('sha256', $token);
            User::where('id', $user->id)->update(['api_token' => hash('sha256', $token)]);

            return response()->json([
                'access_token' => $user->api_token,
                'token_type' => 'bearer',
                'message' => 'User successfully logged in',
                'user' => [
                    'username' => $user->username,
                    'email' => $user->email,
                ]
            ]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function userProfile(Request $request)
    {
        $user = User::where('api_token', $request->bearerToken())->first();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'user' => [
                'username' => $user->username,
                'email' => $user->email,
            ]
        ]);
    }

    public function logout(Request $request)
    {
        $user = User::where('api_token', $request->bearerToken())->first();

        if ($user) {
            $user->update(['api_token' => null]);
        }

        return response()->json(['message' => 'User successfully signed out']);
    }
}
