 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary">
    <!-- Brand Logo -->


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('images\logo.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Str::ucfirst(Auth::user()->role) }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <li class="nav-item">
                <a href="{{route('room.index')}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Room</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('roomtype.index')}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Room Types</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('roomfacility.index')}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Room Facility</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('hotelfacility.index')}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Hotel Facility</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.logs' )}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Logs</p>
                </a>
            </li>

          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                           <i class="fas fa-sign-out-alt nav-icon"></i>
                            <p>
                               {{ __('Logout') }}
                            </p>
         </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
