<?php

namespace App\Http\Controllers;
use App\Models\OrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Middleware\UserMiddleware;
use App\Models\ProductImageModel;

class ProfileController extends Controller
{
    public function __construct()
    {
        // Apply UserMiddleware to the show method
        $this->middleware(UserMiddleware::class)->only('show');
    }

    public function show()
    {
        $user = Auth::user();

        if ($user) {
            // Retrieve orders associated with the user along with related products
            $orders = OrderModel::with('product')->where('user_id', $user->id)->get();


            // Fetch product images for each order
            $orders->each(function ($order) {
                $order->product->image = ProductImageModel::where('product_id', $order->product_id)->first();
            });

            $view = view('profile', compact('user', 'orders'));

            return cache()->remember('profile_' . $user->id, 60, function () use ($view) {
                return $view->render();
            });
        } else {
            return redirect()->route('/');
        }
    }

    public function logout_user()
    {
        Auth::logout();
        return redirect('profile');
    }
}
