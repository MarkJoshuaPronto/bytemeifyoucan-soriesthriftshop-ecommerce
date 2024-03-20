@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>User List</h1>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{ url('admin/user/add') }}" class="btn btn-primary">Add New Admin</a>
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
                      <h3 class="card-title">User List</h3>
                    </div>

                    <div class="card-body p-0">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Position</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($getUserRecord as $value)
                          <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->username }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ ($value->status == 0) ? 'Active' : 'Inactive' }}</td>
                            <td>{{ ($value->is_admin == 0) ? 'User' : '' }}</td>
                            <td>
                                <a href="{{ url('admin/user/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('admin/user/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                      <div style="padding: 10px; float: right;">
                        {!! $getUserRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                      </div>

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
