<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\OrderModel;

class AdminController extends Controller
{
    public function orderList()
    {
        $data['orders'] = OrderModel::with('user')->get();
        $data['header_title'] = 'Orders';
        return view('admin.order.list', $data);
    }

    public function cancelApproval($id)
    {
    $order = OrderModel::findOrFail($id);

    // Check if the order is already approved
    if ($order->status !== 'approved') {
        return redirect()->back()->with('error', 'Order is not approved.');
    }

    // Update the status to "pending" or "cancelled"
    $order->status = 'pending'; // or 'cancelled', depending on your logic
    $order->save();

    return redirect()->back()->with('success', 'Order approval cancelled successfully.');
    }

    public function deleteOrder($id)
    {
    $order = OrderModel::findOrFail($id);
    $order->delete();

    return redirect()->back()->with('success', 'Order deleted successfully.');
    }

    public function approve($id)
    {
        $order = OrderModel::findOrFail($id);

        // Update the status to "approved"
        $order->status = 'approved';
        $order->save();

        return redirect()->back()->with('success', 'Order approved successfully.');
    }
    public function list()
    {
        $data['getRecord'] = User::getAdmin();
        $data['header_title'] = 'Admin';
        return view('admin.admin.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add New Admin';
        return view('admin.admin.add', $data);
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
        $user->is_admin = 1;
        $user->save();

        return redirect('admin/admin/list')->with('success', "Admin Successfully Created");
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        $data['header_title'] = 'Edit Admin';
        return view('admin.admin.edit', $data);
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
        $user->is_admin = 1;
        $user->save();

        return redirect('admin/admin/list')->with('success', "Admin Successfully Updated");
    }

    public function delete($id)
    {
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();
        return redirect()->back()->with('success', "Admin Successfully Deleted");
    }
}
