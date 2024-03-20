<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiUserController extends Controller
{


        public function show($id)
        {
            $user = User::find($id);

            if (!$user) {
                return response()->json(['error' => 'User not found'], 404);
            }

            return response()->json(['user' => $user]);
        }



    public function index() {
        $users = User::all();
        return response()->json(['message' => 'GET request received successfully', 'data' => $users]);
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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = new User([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'api_token' => Str::random(60), // Generate a random API token
        ]);

        $user->save();

        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }

    public function update(Request $request, $id) {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return response()->json(['user' => $user]);
    }

    public function destroy($id) {
        $room = User::find($id);
        $room->delete();
        return response()->json(['message' => "Successfully deleted!"]);
    }
}
