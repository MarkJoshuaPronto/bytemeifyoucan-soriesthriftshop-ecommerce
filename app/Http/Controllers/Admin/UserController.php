<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data['getUserRecord'] = User::getUser();
        $data['header_title'] = 'User';
        return view('admin.user.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add New User';
        return view('admin.user.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->is_admin = 0;
        $user->save();

        return redirect('admin/user/list')->with('success', "User Successfully Created");
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        $data['header_title'] = 'Edit User';
        return view('admin.user.edit', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        $user = User::getSingle($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->status = $request->status;
        $user->is_admin = 0;
        $user->save();

        return redirect('admin/user/list')->with('success', "User Successfully Updated");
    }

    public function delete($id)
    {
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();
        return redirect()->back()->with('success', "User Successfully Deleted");
    }
}
