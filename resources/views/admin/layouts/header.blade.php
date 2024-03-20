  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div href="#" class="brand-link" style="text-align: center";>
      <span class="brand-text">SoriesThriftShop</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="justify-content: center;">
        <div class="info">
          <a class="d-block">Admin: {{ Auth::user()->name }}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{ url('admin/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/order/list')}}" class="nav-link @if(Request::segment(2) == 'order') active @endif">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                Orders
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/admin/list')}}" class="nav-link @if(Request::segment(2) == 'admin') active @endif">
                <i class="nav-icon fas fa-users"></i>
                <p>
                Admin
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/user/list')}}" class="nav-link @if(Request::segment(2) == 'user') active @endif">
                <i class="nav-icon fas fa-users"></i>
                <p>
                Users
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/category/list')}}" class="nav-link @if(Request::segment(2) == 'category') active @endif">
                <i class="nav-icon fas fa fa-list-alt"></i>
                <p>
                Category
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/sub_category/list')}}" class="nav-link @if(Request::segment(2) == 'sub_category') active @endif">
                <i class="nav-icon fas fa fa-list-alt"></i>
                <p>
                Sub Category
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/brand/list')}}" class="nav-link @if(Request::segment(2) == 'brand') active @endif">
                <i class="nav-icon fas fa fa-list-alt"></i>
                <p>
                Brand
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/color/list')}}" class="nav-link @if(Request::segment(2) == 'color') active @endif">
                <i class="nav-icon fas fa-palette"></i>
                <p>
                Color
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/product/list')}}" class="nav-link @if(Request::segment(2) == 'product') active @endif">
                <i class="nav-icon fas fa-box"></i>
                <p>
                Product
              </p>
            </a>
          </li>



          <li class="nav-item">
            <a href="{{ url('admin/logout')}}" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                Logout
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
