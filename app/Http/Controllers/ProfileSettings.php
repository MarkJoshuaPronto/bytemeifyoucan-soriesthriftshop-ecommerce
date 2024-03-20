<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\OrderModel;

class ProfileSettings extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,'.$id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        ]);

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        if (!Hash::check($request->input('current_password'), $user->password)) {
            throw ValidationException::withMessages(['current_password' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully');
    }

    public function deleteAccount($id)
    {
        try {
            $user = User::findOrFail($id);

            // Delete associated orders
            OrderModel::where('user_id', $id)->delete();

            // Delete the user account
            $user->delete();

            Auth::logout();

            return redirect('/')->with('success', 'Account deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete account: ' . $e->getMessage());
        }
    }
}
