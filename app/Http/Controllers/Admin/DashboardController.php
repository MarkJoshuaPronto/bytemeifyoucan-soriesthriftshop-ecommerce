<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $adminCount = User::where('is_admin', 1)->count();
        $userCount = User::where('is_admin', 0)->count();
        $productsCount = ProductModel::count();
        $orderCount = OrderModel::count(); // Counting total orders
        $data['adminCount'] = $adminCount;
        $data['userCount'] = $userCount;
        $data['productsCount'] = $productsCount;
        $data['orderCount'] = $orderCount; // Adding order count to the data array

        $data['header_title'] = 'Dashboard';
        return view('admin.dashboard', $data);
    }

}
