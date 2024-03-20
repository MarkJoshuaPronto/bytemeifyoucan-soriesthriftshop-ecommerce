@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">SoriesThriftShop</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">SoriesThriftShop</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) - First Row -->
            <div class="row">
                <div class="col-lg-6 col-12">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner" style="height: 200px;">
                            <h3>{{ $orderCount }}</h3>
                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <!-- small box -->
                    @if(!empty($adminCount) && $adminCount > 0)
                    <div class="small-box bg-success">
                        <div class="inner" style="height: 200px;">
                            <h3>{{ $adminCount }}</h3>
                            <p>Admins</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-contacts"></i>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <!-- /.row -->

            <!-- Small boxes (Stat box) - Second Row -->
            <div class="row">
                <div class="col-lg-6 col-12">
                    <!-- small box -->
                    @if(!empty($userCount) && $userCount > 0)
                    <div class="small-box bg-warning">
                        <div class="inner" style="height: 200px;">
                            <h3>{{ $userCount }}</h3>
                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-lg-6 col-12">
                    <!-- small box -->
                    @if(!empty($productsCount) && $productsCount > 0)
                    <div class="small-box bg-danger">
                        <div class="inner" style="height: 200px;">
                            <h3>{{ $productsCount }}</h3>
                            <p>Products</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-cart"></i>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <!-- /.row -->

            <!-- Main row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    @endsection




@section('script')
<script src="{{ url('assets/dist/js/pages/dashboard3.js') }}"></script>
@endsection
