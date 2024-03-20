@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-12">
                  <h1>Add New Admin</h1>
                </div>
              </div>
            </div>
          </section>

          <section class="content">
            <div class="container-fluid">
              <div class="row">


                <div class="col-md-12">
                    <div class="card card-primary">
                      <form action="" method="post">
                        {{ csrf_field() }}
                        <div class="card-footer">
                            <a href="{{ url('admin/admin/list') }}" class="btn btn-primary">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" required value="{{ old('name') }}" name="name" placeholder="Enter Name">
                                <div style="color:red">{{ $errors->first('name') }}</div>
                            </div>

                          <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" required value="{{ old('username') }}" name="username" placeholder="Enter Username">
                          </div>
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required value="{{ old('email') }}" name="email" placeholder="Enter Email">
                            <div style="color:red">{{ $errors->first('email') }}</div>
                          </div>
                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" required name="password" placeholder="Password">
                          </div>
                          <div class="form-group">
                            <label>Position</label>
                            <select class="form-control" name="is_admin" required>
                                <option {{ (old('is_admin') == 1) ? 'selected' : '' }} value="1">Admin</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" required>
                                <option {{ (old('status') == 0) ? 'selected' : '' }} value="0">Active</option>
                                <option {{ (old('status') == 1) ? 'selected' : '' }} value="1">Inactive</option>
                            </select>
                          </div>
                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
          </section>
</div>
@endsection

@section('script')
@endsection
