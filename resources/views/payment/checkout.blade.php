@extends('layouts.app')
@section('style')

@endsection



@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('styles/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Checkout</h1>
        </div>
    </div>
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <form action="{{ route('place-order') }}" method="POST">
                @csrf
                @method('DELETE')
                    <div class="row">
                        <div class="col-lg-9">
                            <h2 class="checkout-title">Billing Details</h2>
                                <label>Full Name *</label>
                                <input type="text" class="form-control" required>

                                <label>Company Name (Optional)</label>
                                <input type="text" class="form-control">

                                <label>Country *</label>
                                <input type="text" class="form-control" required>

                                <label>Street address *</label>
                                <input type="text" class="form-control" placeholder="House number and Street name" required>
                                <input type="text" class="form-control" placeholder="Appartments, suite, unit etc ..." required>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Town / City *</label>
                                        <input type="text" class="form-control" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>State / County *</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Postcode / ZIP *</label>
                                        <input type="text" class="form-control" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="phone">Phone *</label>
                                        <input type="tel" id="phone" class="form-control" required pattern="[0-9]*" maxlength="15">
                                      </div>

                                </div>

                                <label>Email address *</label>
                                <input type="email" class="form-control" required>

                        </div>
                        <aside class="col-lg-3">
                            <div class="summary">
                                <h3 class="summary-title">Your Order</h3>

                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach(Cart::getContent() as $key => $cart)
                                            @php
                                                $getCartProduct = App\Models\ProductModel::getSingle($cart->id);
                                            @endphp
                                        <tr>
                                            <td><a href="{{ url($getCartProduct->slug) }}">{{ $getCartProduct->title }}</a></td>
                                            <td>${{ number_format($cart->price * $cart->quantity, 2) }}</td>
                                            <input type="hidden" name="product_id[]" value="{{ $getCartProduct->id }}">
                                            <input type="hidden" name="title[]" value="{{ $getCartProduct->title }}">
                                            <input type="hidden" name="price[]" value="{{ $cart->price }}">
                                            <input type="hidden" name="quantity[]" value="{{ $cart->quantity }}">
                                        </tr>
                                        @endforeach

                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>${{ number_format(Cart::getSubTotal(), 2) }}</td>
                                        </tr>

                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>${{ number_format(Cart::getSubTotal(), 2) }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="accordion-summary" id="accordion-payment">



                                    <div class="card">
                                        <div class="card-header" id="heading-3">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                    Cash On Delivery
                                                </a>
                                            </h2>
                                        </div>
                                        <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
                                            <div class="card-body">Payment is made upon delivery of the order.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="heading-5">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                                                    Online Payment
                                                </a>
                                            </h2>
                                        </div>
                                        <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-payment">
                                            <div class="card-body">Payment is made electronically through online methods such as credit/debit card, digital wallets, etc.'
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Place Order</span>
                                    <span class="btn-hover-text">Proceed to Checkout</span>
                                </button>
                            </div>
                        </aside>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection



@section('script')

@endsection



