<?php

namespace App\Http\Controllers;

use Cart;
use Stripe\Climate\Order;
use App\Models\OrderModel;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::all(); // Retrieve all orders from the database
        return view('user.orders.index', compact('orders'));
    }

    public function add(Request $request)
    {
        $userId = auth()->id();
        $productIds = $request->input('product_id');
        $titles = $request->input('title');
        $prices = $request->input('price');
        $quantities = $request->input('quantity');
        $status = "pending";

        foreach ($productIds as $key => $productId) {
            $title = $titles[$key];
            $price = $prices[$key];
            $quantity = $quantities[$key];

            $order = new OrderModel();
            $order->user_id = $userId;
            $order->product_id = $productId;
            $order->title = $title; // Assuming you have a 'title' column in your orders table
            $order->price = $price; // Assuming you have a 'price' column in your orders table
            $order->quantity = $quantity;
            $order->status = $status;

            $order->save();
        }

        Cart::clear();
        return redirect()->route('profile');
    }

    public function cancelOrder($id)
    {
        // Retrieve the order and delete it
        OrderModel::destroy($id);

        // Redirect back
        return redirect()->route('profile');
    }

}
