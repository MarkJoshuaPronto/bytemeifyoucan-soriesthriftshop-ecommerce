<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminApiController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getAdmin();
        $data['header_title'] = 'Admin';
        return response()->json($data);
    }

    public function add(Request $request)
    {
        $data['header_title'] = 'Add New Admin';
        return response()->json($data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'status' => 'required|in:0', // Assuming status can only be 0 for active
            // Add other validation rules as needed
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->is_admin = 1;
        $user->save();

        return response()->json(['success' => true, 'message' => 'Admin Successfully Created']);
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        $data['header_title'] = 'Edit Admin';
        return response()->json($data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'sometimes|min:6', // 'sometimes' means the field is required only if provided
            'status' => 'required|in:0', // Assuming status can only be 0 for active
            // Add other validation rules as needed
        ]);

        $user = User::getSingle($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->status = $request->status;
        $user->is_admin = 1;
        $user->save();

        return response()->json(['success' => true, 'message' => 'Admin Successfully Updated']);
    }

    public function delete($id)
    {
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();
        return response()->json(['success' => true, 'message' => 'Admin Successfully Deleted']);
    }
}
