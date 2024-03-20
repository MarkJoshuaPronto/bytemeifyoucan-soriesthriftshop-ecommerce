<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Cart;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\ProductSizeModel;

class PaymentApiController extends Controller
{

    public function checkout(Request $request)
    {
        $data['meta_title'] = 'Checkout';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '  ';

        return response()->json($data);
    }

    public function cart(Request $request)
    {
        $data['meta_title'] = 'Cart';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '  ';

        return response()->json($data);
    }

    public function cart_delete($id)
    {
        Cart::remove($id);

        return response()->json(['message' => 'Cart item deleted successfully']);
    }

    public function add_to_cart(Request $request)
    {
        $getProduct = ProductModel::getSingle($request->product_id);
        $total = $getProduct->price;

        if (!empty($request->size_id)) {
            $size_id = $request->size_id;
            $getSize = ProductSizeModel::getSingle($size_id);

            $size_price = !empty($getSize->price) ? $getSize->price : 0;
            $total = $total + $size_price;
        } else {
            $size_id = 0;
        }

        $color_id = !empty($request->color_id) ? $request->color_id : 0;

        Cart::add([
            'id' => $getProduct->id,
            'name' => 'Product',
            'price' => $total,
            'quantity' => $request->qty,
            'attributes' => [
                'size_id' => $size_id,
                'color_id' => $color_id,
            ],
        ]);

        return response()->json(['message' => 'Product added to cart successfully']);
    }

    public function update_cart(Request $request)
    {
        foreach ($request->cart as $cart) {
            Cart::update($cart['id'], [
                'quantity' => [
                    'relative' => false,
                    'value' => $cart['qty']
                ],
            ]);
        }

        return response()->json(['message' => 'Cart updated successfully']);
    }
}
