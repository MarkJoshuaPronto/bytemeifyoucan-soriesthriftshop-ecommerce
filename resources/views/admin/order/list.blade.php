@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order List</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('admin.layouts._message')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Order List</h3>
                        </div>

                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->title }}</td>
                                        <td>{{ $order->product->price }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->quantity * $order->price }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>
                                            @if($order->status === 'pending')
                                                <a href="{{ route('admin.order.approve', ['id' => $order->id]) }}" class="btn btn-success">Approve</a>
                                            @elseif($order->status === 'approved')
                                                <form action="{{ route('cancel.approval', ['id' => $order->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Cancel Approval</button>
                                                </form>
                                            @elseif($order->status === 'cancelled')
                                                <a href="{{ route('admin.order.approve', ['id' => $order->id]) }}" class="btn btn-success">Approve</a>
                                            @endif
                                            <form action="{{ route('order.delete', ['id' => $order->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" style="margin-top: 10px;">Delete Order</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
@endsection
