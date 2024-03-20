@extends('layouts.app')
@section('style')

@endsection



@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('styles/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Profile</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    <aside class="col-md-4 col-lg-3">
                        <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                            {{-- <li class="nav-item">
                                <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="true">My Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Profile Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('user/logout') }}">Log out</a>
                            </li>
                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            {{-- <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                <p>Hello <span class="font-weight-normal text-dark">User</span> (not <span class="font-weight-normal text-dark">User</span>? <a href="{{ url('user/logout') }}">Log out</a>)
                                <br>
                                From your account dashboard you can view your <a href="#tab-orders" class="tab-trigger-link link-underline">recent orders</a>, manage your <a href="#tab-address" class="tab-trigger-link">shipping and billing addresses</a>, and <a href="#tab-account" class="tab-trigger-link">edit your password and account details</a>.</p>
                            </div><!-- .End .tab-pane --> --}}

                            {{-- <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                <p>No order has been made yet.</p>
                            </div><!-- .End .tab-pane --> --}}
                            <div class="tab-pane fade show active" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th class="text-center font-weight-bold">Order List</th>
                                            <tr>
                                                <th class="text-center font-weight-bold">Order ID</th>
                                                <th class="text-center font-weight-bold">Image</th>
                                                <th class="text-center font-weight-bold">Product</th>
                                                <th class="text-center font-weight-bold">Price</th>
                                                <th class="text-center font-weight-bold">Quantity</th>
                                                <th class="text-center font-weight-bold">Total</th>
                                                <th class="text-center font-weight-bold">Status</th>
                                                <th class="text-center font-weight-bold">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                            <tr>
                                                <td class="text-center">{{ $order->id }}</td>
                                                <td class="text-center">
                                                    <img src="{{ asset('upload/product/' . $order->product->image->image_name) }}" alt="Product Image" style="max-width: 100px; max-height: 100px; display: block; margin: 0 auto;">
                                                </td>
                                                <td class="text-center">{{ $order->product->title }}</td>
                                                <td class="text-center">${{ $order->product->price }}</td>
                                                <td class="text-center">{{ $order->quantity }}</td>
                                                <td class="text-center">${{ $order->quantity * $order->price }}</td>
                                                <td class="text-center">{{ $order->status }}</td>
                                                <td class="text-center">
                                                    @if($order->status === 'pending')
                                                    <form action="{{ route('cancel.order', ['id' => $order->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Cancel Order</button>
                                                    </form>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                <form method="POST" action="{{ route('update.profile', ['id' => Auth::user()->id]) }}">
                                    {{ csrf_field() }}
                                    @method('POST')

                                    <label>Full Name *</label>
                                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>

                                    <label>Username *</label>
                                    <input type="text" class="form-control" name="username" value="{{ Auth::user()->username }}" required>

                                    <label>Email address *</label>
                                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>

                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>SAVE PROFILE</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>

                                <hr>

                                <form method="POST" action="{{ route('update.password', ['id' => Auth::user()->id]) }}">
                                    {{ csrf_field() }}
                                    @method('POST')

                                    <label>Current password *</label>
                                    <input type="password" class="form-control" name="current_password" required>

                                    <label>New password *</label>
                                    <input type="password" class="form-control" name="new_password" required>

                                    <label>Confirm new password *</label>
                                    <input type="password" class="form-control" name="new_password_confirmation" required>

                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>CHANGE PASSWORD</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>

                                <hr>

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAccountModal">
                                    Delete Account
                                </button>
                            </div><!-- .End .tab-pane -->


                            <!-- Delete Account Modal -->
                            <div class="modal fade" id="deleteAccountModal" tabindex="-1" role="dialog" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteAccountModalLabel">Confirm Account Deletion</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete your account? This action cannot be undone.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <form method="POST" action="{{ route('delete.account', ['id' => Auth::user()->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete Account</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection



@section('script')

@endsection
